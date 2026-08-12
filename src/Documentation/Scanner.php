<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use ReflectionType;
use RedSky\Html\Metadata\Component as ComponentMetadata;
use RedSky\Html\Metadata\Method as MethodMetadata;

/**
 * Scans HTML component classes and creates documentation metadata.
 *
 * The scanner discovers component classes and inspects their
 * metadata, methods, properties, parameters, return types,
 * inheritance, visibility, and modifiers.
 *
 * The scanner is responsible only for discovering information.
 * It does not render or format the final documentation.
 *
 * Example:
 *
 * ```php
 * $scanner = new Scanner();
 *
 * $registry = $scanner->scan([
 *     Button::class,
 *     TextInput::class,
 * ]);
 * ```
 */
class Scanner
{
    /**
     * Scans a list of component classes.
     *
     * Classes that do not exist or are abstract are ignored.
     *
     * @param array<int, string> $classes
     */
    public function scan(array $classes): ComponentRegistry
    {
        $registry = new ComponentRegistry();

        foreach ($classes as $class) {
            $component = $this->scanClass($class);

            if ($component !== null) {
                $registry->register($component);
            }
        }

        return $registry;
    }



    /**
     * Scans a single component class.
     *
     * Returns null when the class does not exist or is abstract.
     */
    protected function scanClass(string $class): ?Component
    {
        if (!class_exists($class)) {
            return null;
        }

        $reflection = new ReflectionClass($class);

        if ($reflection->isAbstract()) {
            return null;
        }

        $metadata = $this->getMetadata($reflection);

        if ($metadata !== null) {
            $component = new Component(
                name: $metadata->name(),
                class: $class,
                category: $metadata->category(),
                description: $metadata->description(),
                version: $metadata->version(),
                deprecated: $metadata->isDeprecated()
            );
        } else {
            $component = new Component(
                name: $reflection->getShortName(),
                class: $class,
                category: $this->resolveCategory($reflection),
                description: $this->resolveClassDescription($reflection),
                version: null,
                deprecated: false
            );
        }

        /*
         * Scan the public API of the component.
         */
        $this->scanMethods(
            $reflection,
            $component
        );

        $this->scanProperties(
            $reflection,
            $component
        );

        return $component;
    }



    /**
     * Scans public methods declared by the component
     * and inherited from parent classes.
     *
     * ReflectionClass::getMethods() returns public methods
     * declared by the class and inherited from its parents.
     *
     * Protected and private methods are intentionally excluded
     * from the public documentation API.
     */
    protected function scanMethods(
        ReflectionClass $reflection,
        Component $component
    ): void {
        foreach ($reflection->getMethods() as $method) {
            if (!$method->isPublic()) {
                continue;
            }

            $documentation = $this->createMethodDocumentation(
                $method,
                $reflection
            );

            $component->addMethod($documentation);
        }
    }



    /**
     * Creates documentation metadata for a reflected method.
     *
     * The resulting metadata contains the method's parameters,
     * return type, declaring class, inheritance state, visibility,
     * and PHP modifiers.
     */
    protected function createMethodDocumentation(
        ReflectionMethod $method,
        ReflectionClass $component
    ): Method {
        $declaringClass = $method->getDeclaringClass();

        return new Method(
            name: $method->getName(),
            description: $this->resolveMethodDescription($method),
            returnType: $this->resolveReturnType($method),
            parameters: $this->scanParameters($method),
            declaringClass: $declaringClass->getName(),
            inherited: $declaringClass->getName() !== $component->getName(),
            visibility: $this->resolveVisibility($method),
            static: $method->isStatic(),
            final: $method->isFinal(),
            abstract: $method->isAbstract()
        );
    }



    /**
     * Scans all parameters of a method.
     *
     * Each parameter is represented by a Parameter metadata object.
     *
     * @return array<string, Parameter>
     */
    protected function scanParameters(
        ReflectionMethod $method
    ): array {
        $parameters = [];

        foreach ($method->getParameters() as $parameter) {
            $documentation = $this->createParameterDocumentation(
                $parameter
            );

            $parameters[$parameter->getName()] = $documentation;
        }

        return $parameters;
    }



    /**
     * Creates documentation metadata for a reflected parameter.
     *
     * The parameter metadata includes:
     *
     * - name
     * - type
     * - optional state
     * - default value
     * - variadic state
     */
    protected function createParameterDocumentation(
        ReflectionParameter $parameter
    ): Parameter {
        $type = $this->resolveType(
            $parameter->getType()
        );

        $default = null;

        if ($parameter->isDefaultValueAvailable()) {
            $default = $parameter->getDefaultValue();
        }

        return new Parameter(
            name: $parameter->getName(),
            type: $type,
            optional: $parameter->isOptional(),
            default: $default,
            variadic: $parameter->isVariadic()
        );
    }



    /**
     * Scans public properties declared by the component
     * and inherited from parent classes.
     *
     * ReflectionClass::getProperties() returns properties declared
     * by the class and inherited from parent classes.
     *
     * Protected and private properties are intentionally excluded
     * from the public documentation API.
     */
    protected function scanProperties(
        ReflectionClass $reflection,
        Component $component
    ): void {
        foreach ($reflection->getProperties() as $property) {
            /* It will give me all properties,
              but if I only want public ones. 
             Then use the commented condition. */
            /* 
            if (!$property->isPublic()) {
                continue;
            }
            */
            $documentation = $this->createPropertyDocumentation(
                $property,
                $reflection
            );

            $component->addProperty($documentation);
        }
    }



    /**
     * Creates documentation metadata for a reflected property.
     *
     * The resulting metadata contains the property's type,
     * description, default value, declaring class, inheritance
     * state, visibility, static state, and readonly state.
     */
    protected function createPropertyDocumentation(
        ReflectionProperty $property,
        ReflectionClass $component
    ): Property {
        $declaringClass = $property->getDeclaringClass();

        $type = $this->resolveType(
            $property->getType()
        );

        $default = null;

        if ($property->hasDefaultValue()) {
            $default = $property->getDefaultValue();
        }

        return new Property(
            name: $property->getName(),
            type: $type,
            description: $this->resolvePropertyDescription($property),
            default: $default,
            declaringClass: $declaringClass->getName(),
            inherited: $declaringClass->getName() !== $component->getName(),
            visibility: $this->resolvePropertyVisibility($property),
            static: $property->isStatic(),
            readonly: $property->isReadOnly()
        );
    }



    /**
     * Resolves the description of a property.
     *
     * The scanner currently uses the property's PHPDoc
     * when available and falls back to a generic description.
     */
    protected function resolvePropertyDescription(
        ReflectionProperty $property
    ): string {
        $docComment = $property->getDocComment();

        if ($docComment !== false) {
            $description = $this->extractDocDescription(
                $docComment
            );

            if ($description !== '') {
                return $description;
            }
        }

        return sprintf(
            'Property %s.',
            $property->getName()
        );
    }



    /**
     * Resolves property visibility.
     */
    protected function resolvePropertyVisibility(
        ReflectionProperty $property
    ): string {
        if ($property->isPublic()) {
            return 'public';
        }

        if ($property->isProtected()) {
            return 'protected';
        }

        return 'private';
    }



    /**
     * Resolves a Reflection type into a readable string.
     *
     * Supports:
     *
     * - built-in types
     * - nullable types
     * - union types
     * - intersection types
     * - class types
     *
     * Returns "mixed" when no type declaration exists.
     */
    protected function resolveType(
        ?ReflectionType $type
    ): string {
        if ($type === null) {
            return 'mixed';
        }

        return (string) $type;
    }



    /**
     * Resolves the return type of a method.
     */
    protected function resolveReturnType(
        ReflectionMethod $method
    ): string {
        return $this->resolveType(
            $method->getReturnType()
        );
    }



    /**
     * Resolves the method visibility.
     */
    protected function resolveVisibility(
        ReflectionMethod $method
    ): string {
        if ($method->isPublic()) {
            return 'public';
        }

        if ($method->isProtected()) {
            return 'protected';
        }

        return 'private';
    }



    /**
     * Resolves the method description.
     *
     * The scanner first checks the Method metadata attribute.
     * If no metadata exists, it checks the method PHPDoc.
     * If no PHPDoc exists, it generates a generic description.
     */
    protected function resolveMethodDescription(
        ReflectionMethod $method
    ): string {
        $attributes = $method->getAttributes(
            MethodMetadata::class
        );

        if ($attributes !== []) {
            /** @var MethodMetadata $metadata */
            $metadata = $attributes[0]->newInstance();

            return $metadata->description();
        }

        $docComment = $method->getDocComment();

        if ($docComment !== false) {
            $description = $this->extractDocDescription(
                $docComment
            );

            if ($description !== '') {
                return $description;
            }
        }

        return sprintf(
            'Method %s.',
            $method->getName()
        );
    }



    /**
     * Resolves the description of a component class.
     *
     * Uses the class PHPDoc when no Component metadata
     * attribute is available.
     */
    protected function resolveClassDescription(
        ReflectionClass $reflection
    ): ?string {
        $docComment = $reflection->getDocComment();

        if ($docComment === false) {
            return null;
        }

        $description = $this->extractDocDescription(
            $docComment
        );

        return $description !== ''
            ? $description
            : null;
    }



    /**
     * Extracts the main description from a PHPDoc block.
     *
     * Tags such as @param, @return, @var, and @deprecated
     * are excluded from the description.
     */
    protected function extractDocDescription(
        string $docComment
    ): string {
        $docComment = preg_replace(
            '/^\/\*\*|\*\/$/',
            '',
            trim($docComment)
        );

        if ($docComment === null) {
            return '';
        }

        $lines = preg_split(
            '/\R/',
            $docComment
        );

        if ($lines === false) {
            return '';
        }

        $description = [];

        foreach ($lines as $line) {
            $line = trim($line);

            $line = preg_replace(
                '/^\*\s?/',
                '',
                $line
            );

            if ($line === null) {
                continue;
            }

            if ($line === '') {
                if ($description !== []) {
                    break;
                }

                continue;
            }

            if (str_starts_with($line, '@')) {
                break;
            }

            $description[] = $line;
        }

        return trim(
            implode(' ', $description)
        );
    }



    /**
     * Returns Component metadata defined on the class.
     */
    protected function getMetadata(
        ReflectionClass $reflection
    ): ?ComponentMetadata {
        $attributes = $reflection->getAttributes(
            ComponentMetadata::class
        );

        if ($attributes === []) {
            return null;
        }

        /** @var ComponentMetadata $metadata */
        $metadata = $attributes[0]->newInstance();

        return $metadata;
    }



    /**
     * Resolves the component category from its namespace.
     *
     * Example:
     *
     * RedSky\Html\Components\Form\TextInput
     *
     * becomes:
     *
     * Form
     */
    protected function resolveCategory(
        ReflectionClass $reflection
    ): ?string {
        $namespace = $reflection->getNamespaceName();

        $prefix = 'RedSky\\Html\\Components\\';

        if (!str_starts_with($namespace, $prefix)) {
            return null;
        }

        $relative = substr(
            $namespace,
            strlen($prefix)
        );

        if ($relative === '') {
            return null;
        }

        return explode(
            '\\',
            $relative
        )[0];
    }
}
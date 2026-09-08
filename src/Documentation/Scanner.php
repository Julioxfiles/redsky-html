<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use ReflectionType;
use RedSky\Html\Metadata\Component as ComponentMetadata;
use RedSky\Html\Metadata\Example as ExampleMetadata;
use RedSky\Html\Metadata\Method as MethodMetadata;

class Scanner
{
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

        $this->scanMethods($reflection, $component);
        $this->scanProperties($reflection, $component);
        $this->scanExamples($reflection, $component);

        return $component;
    }


    protected function scanMethods(
        ReflectionClass $reflection,
        Component $component
    ): void {
        foreach ($reflection->getMethods() as $method) {
            if (!$method->isPublic()) {
                continue;
            }

            $component->addMethod(
                $this->createMethodDocumentation(
                    $method,
                    $reflection
                )
            );
        }
    }


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


    protected function scanParameters(
        ReflectionMethod $method
    ): array {
        $parameters = [];

        foreach ($method->getParameters() as $parameter) {
            $parameters[$parameter->getName()] =
                $this->createParameterDocumentation($parameter);
        }

        return $parameters;
    }


    protected function createParameterDocumentation(
        ReflectionParameter $parameter
    ): Parameter {
        $default = null;
        $hasDefault = false;

        if ($parameter->isDefaultValueAvailable()) {
            $default = $parameter->getDefaultValue();
            $hasDefault = true;
        }

        return new Parameter(
            name: $parameter->getName(),
            type: $this->resolveType($parameter->getType()),
            optional: $parameter->isOptional(),
            default: $default,
            variadic: $parameter->isVariadic(),
            hasDefault: $hasDefault
        );
    }


    protected function scanProperties(
        ReflectionClass $reflection,
        Component $component
    ): void {
        foreach ($reflection->getProperties() as $property) {
            $component->addProperty(
                $this->createPropertyDocumentation(
                    $property,
                    $reflection
                )
            );
        }
    }


    protected function createPropertyDocumentation(
        ReflectionProperty $property,
        ReflectionClass $component
    ): Property {
        $declaringClass = $property->getDeclaringClass();

        $default = null;
        $hasDefault = false;

        if ($property->hasDefaultValue()) {
            $default = $property->getDefaultValue();
            $hasDefault = true;
        }

        return new Property(
            name: $property->getName(),
            type: $this->resolveType($property->getType()),
            description: $this->resolvePropertyDescription($property),
            default: $default,
            hasDefault: $hasDefault,
            declaringClass: $declaringClass->getName(),
            inherited: $declaringClass->getName() !== $component->getName(),
            visibility: $this->resolvePropertyVisibility($property),
            static: $property->isStatic(),
            readonly: $property->isReadOnly()
        );
    }


    /**
     * Scans usage examples for a component.
     *
     * Examples declared directly on the component class take
     * precedence over external example definitions.
     *
     * When the component does not define any inline examples,
     * the scanner looks for an external example class under:
     *
     * Documentation/Examples/{ComponentName}Examples.php
     *
     * External example classes may define examples using
     * #[Example] attributes on the class itself or on methods.
     *
     * This allows large components to keep their production
     * classes focused while keeping their documentation examples
     * organized separately.
     */
    protected function scanExamples(
        ReflectionClass $reflection,
        Component $component
    ): void {
        $attributes = $reflection->getAttributes(
            ExampleMetadata::class
        );

        if ($attributes !== []) {
            $this->addExamples(
                $attributes,
                $component
            );

            return;
        }

        $this->scanExternalExamples(
            $reflection,
            $component
        );
    }


    /**
     * Adds example metadata to a component.
     *
     * @param array<int, \ReflectionAttribute> $attributes
     */
    protected function addExamples(
        array $attributes,
        Component $component
    ): void {
        foreach ($attributes as $attribute) {
            /** @var ExampleMetadata $metadata */
            $metadata = $attribute->newInstance();

            $component->addExample(
                $this->createExample($metadata)
            );
        }
    }


    /**
     * Creates documentation example metadata from an Example
     * attribute instance.
     */
    protected function createExample(
        ExampleMetadata $metadata
    ): Example {
        return new Example(
            $metadata->title(),
            $metadata->code(),
            $metadata->description(),
            $metadata->language(),
            $metadata->isPrimary(),
            $metadata->output()
        );
    }


    /**
     * Scans the external example class associated with a component.
     *
     * The external class is loaded only when the corresponding
     * PHP file exists.
     */
    protected function scanExternalExamples(
        ReflectionClass $componentReflection,
        Component $component
    ): void {
        $exampleClass = $this->resolveExternalExampleClass(
            $componentReflection
        );

        if ($exampleClass === null) {
            return;
        }

        if (!class_exists($exampleClass)) {
            return;
        }

        $reflection = new ReflectionClass($exampleClass);

        $this->scanExternalClassExamples(
            $reflection,
            $component
        );

        $this->scanExternalMethodExamples(
            $reflection,
            $component
        );
    }


    /**
     * Resolves the external example class for a component.
     *
     * Example:
     *
     * RedSky\Html\Components\Form\TextInput
     *
     * becomes:
     *
     * RedSky\Html\Documentation\Examples\TextInputExamples
     */
    protected function resolveExternalExampleClass(
        ReflectionClass $componentReflection
    ): ?string {
        $className = $componentReflection->getShortName();

        $file = dirname(__DIR__)
            . DIRECTORY_SEPARATOR
            . 'Documentation'
            . DIRECTORY_SEPARATOR
            . 'Examples'
            . DIRECTORY_SEPARATOR
            . $className
            . 'Examples.php';

        if (!is_file($file)) {
            return null;
        }

        $class = 'RedSky\\Html\\Documentation\\Examples\\'
            . $className
            . 'Examples';

        require_once $file;

        return $class;
    }


    /**
     * Scans #[Example] attributes declared directly on an
     * external example class.
     */
    protected function scanExternalClassExamples(
        ReflectionClass $reflection,
        Component $component
    ): void {
        $attributes = $reflection->getAttributes(
            ExampleMetadata::class
        );

        if ($attributes === []) {
            return;
        }

        $this->addExamples(
            $attributes,
            $component
        );
    }


    /**
     * Scans #[Example] attributes declared on methods of an
     * external example class.
     *
     * Only methods that explicitly define Example attributes
     * are considered. The methods themselves do not need to
     * be executed.
     */
    protected function scanExternalMethodExamples(
        ReflectionClass $reflection,
        Component $component
    ): void {
        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(
                ExampleMetadata::class
            );

            if ($attributes === []) {
                continue;
            }

            $this->addExamples(
                $attributes,
                $component
            );
        }
    }


    protected function resolvePropertyDescription(
        ReflectionProperty $property
    ): string {
        $docComment = $property->getDocComment();

        if ($docComment !== false) {
            $description = $this->extractDocDescription($docComment);

            if ($description !== '') {
                return $description;
            }
        }

        return sprintf(
            'Property %s.',
            $property->getName()
        );
    }


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


    protected function resolveType(
        ?ReflectionType $type
    ): string {
        if ($type === null) {
            return 'mixed';
        }

        return (string) $type;
    }


    protected function resolveReturnType(
        ReflectionMethod $method
    ): string {
        return $this->resolveType(
            $method->getReturnType()
        );
    }


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
            $description = $this->extractDocDescription($docComment);

            if ($description !== '') {
                return $description;
            }
        }

        return sprintf(
            'Method %s.',
            $method->getName()
        );
    }


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

        $lines = preg_split('/\R/', $docComment);

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

        return explode('\\', $relative)[0];
    }
}
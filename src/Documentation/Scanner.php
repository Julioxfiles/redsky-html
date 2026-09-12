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
                description: $this->extractDocDescription(
                    $reflection->getDocComment()
                ),
                version: null,
                deprecated: false
            );
        }

        $this->scanMethods($reflection, $component);
        $this->scanProperties($reflection, $component);
        $this->scanExampleFiles($reflection, $component);
        $this->scanResources($reflection, $component);

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
            description: '',
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
     * Loads PHP example files for a component.
     */
    protected function scanExampleFiles(
        ReflectionClass $reflection,
        Component $component
    ): void {
        $namespace = $reflection->getNamespaceName();

        $prefix = 'RedSky\\Html\\Components\\';

        if (!str_starts_with($namespace, $prefix)) {
            return;
        }

        $relative = substr(
            $namespace,
            strlen($prefix)
        );

        $parts = explode('\\', $relative);

        if (count($parts) === 0) {
            return;
        }

        $category = $parts[0];
        $name = $reflection->getShortName();

        $directory = dirname(__DIR__)
            . DIRECTORY_SEPARATOR
            . 'Components'
            . DIRECTORY_SEPARATOR
            . $category
            . DIRECTORY_SEPARATOR
            . $name
            . DIRECTORY_SEPARATOR
            . 'Examples';

        if (!is_dir($directory)) {
            return;
        }

        $loader = new ExampleLoader();
        $renderer = new ExampleRenderer();

        foreach ($loader->load($directory) as $example) {
            $example->setOutput(
                $renderer->renderFormatted(
                    $example->file()
                )
            );

            $component->addExampleFile($example);
        }
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
                $description[] = '';
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


    protected function scanResources(
        ReflectionClass $reflection,
        Component $component
    ): void {
        $category = strtolower(
            $this->resolveCategory($reflection) ?? ''
        );

        $name = strtolower(
            $reflection->getShortName()
        );

        $base = dirname(__DIR__, 3)
            . DIRECTORY_SEPARATOR
            . '..'
            . DIRECTORY_SEPARATOR
            . 'redsky-ui'
            . DIRECTORY_SEPARATOR
            . 'resources';

        $css = $base
            . DIRECTORY_SEPARATOR
            . 'css'
            . DIRECTORY_SEPARATOR
            . 'components'
            . DIRECTORY_SEPARATOR
            . $category
            . DIRECTORY_SEPARATOR
            . $name
            . DIRECTORY_SEPARATOR
            . $name
            . '.css';

        if (is_file($css)) {
            $content = file_get_contents($css);

            if ($content !== false) {
                $component->setCss($content);
            }
        }

        $js = $base
            . DIRECTORY_SEPARATOR
            . 'js'
            . DIRECTORY_SEPARATOR
            . 'components'
            . DIRECTORY_SEPARATOR
            . $category
            . DIRECTORY_SEPARATOR
            . $name
            . DIRECTORY_SEPARATOR
            . $name
            . '.js';

        if (is_file($js)) {
            $content = file_get_contents($js);

            if ($content !== false) {
                $component->setJavascript($content);
            }
        }
    }
}
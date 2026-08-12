<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Represents documentation metadata for an HTML component.
 *
 * This object is the runtime representation used by the
 * documentation system.
 *
 * A component documentation object contains the component's
 * identity and metadata, together with its documented methods,
 * properties, and usage examples.
 *
 * Example:
 *
 * ```php
 * $component = new Component(
 *     name: 'TextInput',
 *     class: TextInput::class,
 *     category: 'Form',
 *     description: 'Represents an HTML text input.',
 *     version: '1.0.0'
 * );
 * ```
 */
class Component
{
    /**
     * Component name.
     */
    protected string $name;


    /**
     * Component class name.
     */
    protected string $class;


    /**
     * Component category.
     */
    protected ?string $category;


    /**
     * Component description.
     */
    protected ?string $description;


    /**
     * Component version.
     */
    protected ?string $version;


    /**
     * Indicates whether the component is deprecated.
     */
    protected bool $deprecated;


    /**
     * Documented methods.
     *
     * The method name is used as the array key.
     *
     * @var array<string, Method>
     */
    protected array $methods = [];


    /**
     * Documented properties.
     *
     * The property name is used as the array key.
     *
     * @var array<string, Property>
     */
    protected array $properties = [];


    /**
     * Usage examples.
     *
     * @var array<int, Example>
     */
    protected array $examples = [];


    /**
     * Creates component documentation metadata.
     *
     * @param string      $name        Component name.
     * @param string      $class       Fully qualified component class name.
     * @param string|null $category    Component category.
     * @param string|null $description Component description.
     * @param string|null $version     Component version.
     * @param bool        $deprecated  Whether the component is deprecated.
     */
    public function __construct(
        string $name,
        string $class,
        ?string $category = null,
        ?string $description = null,
        ?string $version = null,
        bool $deprecated = false
    ) {
        $this->name = $name;
        $this->class = $class;
        $this->category = $category;
        $this->description = $description;
        $this->version = $version;
        $this->deprecated = $deprecated;
    }


    /**
     * Returns component name.
     */
    public function name(): string
    {
        return $this->name;
    }


    /**
     * Returns component class name.
     */
    public function class(): string
    {
        return $this->class;
    }


    /**
     * Returns component category.
     */
    public function category(): ?string
    {
        return $this->category;
    }


    /**
     * Returns component description.
     */
    public function description(): ?string
    {
        return $this->description;
    }


    /**
     * Returns component version.
     */
    public function version(): ?string
    {
        return $this->version;
    }


    /**
     * Determines whether the component is deprecated.
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated;
    }


    /**
     * Adds a documented method.
     *
     * If a method with the same name already exists,
     * it is replaced by the supplied method.
     */
    public function addMethod(Method $method): static
    {
        $this->methods[$method->name()] = $method;

        return $this;
    }


    /**
     * Returns a documented method by name.
     *
     * Returns null when the method is not documented.
     */
    public function method(string $name): ?Method
    {
        return $this->methods[$name] ?? null;
    }


    /**
     * Returns all documented methods.
     *
     * @return array<string, Method>
     */
    public function methods(): array
    {
        return $this->methods;
    }


    /**
     * Determines whether a method is documented.
     */
    public function hasMethod(string $name): bool
    {
        return isset($this->methods[$name]);
    }


    /**
     * Returns the number of documented methods.
     */
    public function methodCount(): int
    {
        return count($this->methods);
    }


    /**
     * Adds a documented property.
     *
     * If a property with the same name already exists,
     * it is replaced by the supplied property.
     */
    public function addProperty(Property $property): static
    {
        $this->properties[$property->name()] = $property;

        return $this;
    }


    /**
     * Returns a documented property by name.
     *
     * Returns null when the property is not documented.
     */
    public function property(string $name): ?Property
    {
        return $this->properties[$name] ?? null;
    }


    /**
     * Returns all documented properties.
     *
     * @return array<string, Property>
     */
    public function properties(): array
    {
        return $this->properties;
    }


    /**
     * Determines whether a property is documented.
     */
    public function hasProperty(string $name): bool
    {
        return isset($this->properties[$name]);
    }


    /**
     * Returns the number of documented properties.
     */
    public function propertyCount(): int
    {
        return count($this->properties);
    }


    /**
     * Adds a usage example.
     */
    public function addExample(Example $example): static
    {
        $this->examples[] = $example;

        return $this;
    }


    /**
     * Returns all usage examples.
     *
     * @return array<int, Example>
     */
    public function examples(): array
    {
        return $this->examples;
    }


    /**
     * Determines whether the component has usage examples.
     */
    public function hasExamples(): bool
    {
        return $this->examples !== [];
    }


    /**
     * Returns the number of usage examples.
     */
    public function exampleCount(): int
    {
        return count($this->examples);
    }


    /**
     * Converts documentation metadata to an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'class' => $this->class,
            'category' => $this->category,
            'description' => $this->description,
            'version' => $this->version,
            'deprecated' => $this->deprecated,
            'methods' => array_map(
                static fn (Method $method): array => $method->toArray(),
                $this->methods
            ),
            'properties' => array_map(
                static fn (Property $property): array => $property->toArray(),
                $this->properties
            ),
            'examples' => array_map(
                static fn (Example $example): array => $example->toArray(),
                $this->examples
            ),
        ];
    }


    /**
     * Converts documentation metadata to JSON.
     *
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode(
            $this->toArray(),
            JSON_THROW_ON_ERROR
        );
    }
}
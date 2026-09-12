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
     * @var array<string, Method>
     */
    protected array $methods = [];


    /**
     * Documented properties.
     *
     * @var array<string, Property>
     */
    protected array $properties = [];


    /**
     * Usage examples defined using metadata.
     *
     * This property is kept for backwards compatibility
     * with #[Example] attributes.
     *
     * @var array<int, Example>
     */
    protected array $examples = [];


    /**
     * Real PHP example files.
     *
     * These examples are stored as editable PHP files
     * under resources/views/components.
     *
     * @var array<int, ExampleFile>
     */
    protected array $exampleFiles = [];

    protected ?string $css = null;

    protected ?string $javascript = null;

    /**
     * Creates component documentation metadata.
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
     */
    public function addMethod(
        Method $method
    ): static {
        $this->methods[$method->name()] = $method;

        return $this;
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
     * Adds a documented property.
     */
    public function addProperty(
        Property $property
    ): static {
        $this->properties[$property->name()] = $property;

        return $this;
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
     * Adds a usage example.
     *
     * Legacy support for #[Example].
     */
    public function addExample(
        Example $example
    ): static {
        $this->examples[] = $example;

        return $this;
    }


    /**
     * Returns metadata examples.
     *
     * @return array<int, Example>
     */
    public function examples(): array
    {
        return $this->examples;
    }


    /**
     * Determines whether metadata examples exist.
     */
    public function hasExamples(): bool
    {
        return $this->examples !== [];
    }


    /**
     * Returns metadata example count.
     */
    public function exampleCount(): int
    {
        return count($this->examples);
    }


    /**
     * Adds a real PHP example file.
     */
    public function addExampleFile(
        ExampleFile $example
    ): static {
        $this->exampleFiles[] = $example;

        return $this;
    }


    /**
     * Returns real PHP example files.
     *
     * @return array<int, ExampleFile>
     */
    public function exampleFiles(): array
    {
        return $this->exampleFiles;
    }


    /**
     * Determines whether PHP example files exist.
     */
    public function hasExampleFiles(): bool
    {
        return $this->exampleFiles !== [];
    }


    /**
     * Returns PHP example file count.
     */
    public function exampleFileCount(): int
    {
        return count($this->exampleFiles);
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
                static fn (Method $method): array =>
                    $method->toArray(),
                $this->methods
            ),

            'properties' => array_map(
                static fn (Property $property): array =>
                    $property->toArray(),
                $this->properties
            ),

            'examples' => array_map(
                static fn (Example $example): array =>
                    $example->toArray(),
                $this->examples
            ),

            'example_files' => array_map(
                static function (
                    ExampleFile $example
                ): array {
                    return [
                        'file' => $example->file(),
                        'title' => $example->title(),
                        'source' => $example->source(),
                        'output' => $example->output(),
                        'description' => $example->description(),
                    ];
                },
                $this->exampleFiles
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

    /**
     * Sets component CSS source.
     */
    public function setCss(
        string $css
    ): static {
        $this->css = $css;

        return $this;
    }


    /**
     * Returns component CSS source.
     */
    public function css(): ?string
    {
        return $this->css;
    }


    /**
     * Sets component JavaScript source.
     */
    public function setJavascript(
        string $javascript
    ): static {
        $this->javascript = $javascript;

        return $this;
    }


    /**
     * Returns component JavaScript source.
     */
    public function javascript(): ?string
    {
        return $this->javascript;
    }


}
<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Represents documentation metadata for a component method.
 *
 * A method documentation object describes a component method,
 * including its purpose, parameters, return type, visibility,
 * declaring class, inheritance information, and modifiers.
 *
 * This allows the documentation system to distinguish between
 * methods declared directly by a component and methods inherited
 * from parent classes.
 *
 * Example:
 *
 * ```php
 * $method = new Method(
 *     'attribute',
 *     'Adds or retrieves an HTML attribute.',
 *     'self',
 *     declaringClass: HtmlComponent::class,
 *     inherited: true
 * );
 * ```
 */
class Method
{
    /**
     * Method name.
     */
    protected string $name;

    /**
     * Method description.
     */
    protected string $description;

    /**
     * Method return type.
     */
    protected string $returnType;

    /**
     * Method parameters.
     *
     * Parameters are indexed by their names.
     *
     * @var array<string, Parameter>
     */
    protected array $parameters = [];

    /**
     * Declaring class of the method.
     */
    protected ?string $declaringClass;

    /**
     * Indicates whether the method is inherited.
     */
    protected bool $inherited;

    /**
     * Method visibility.
     */
    protected string $visibility;

    /**
     * Indicates whether the method is static.
     */
    protected bool $static;

    /**
     * Indicates whether the method is final.
     */
    protected bool $final;

    /**
     * Indicates whether the method is abstract.
     */
    protected bool $abstract;

    /**
     * Creates method documentation metadata.
     *
     * @param string $name Method name.
     * @param string $description Method description.
     * @param string $returnType Method return type.
     * @param array<string, Parameter> $parameters Method parameters.
     * @param string|null $declaringClass Class that declares the method.
     * @param bool $inherited Whether the method is inherited.
     * @param string $visibility Method visibility.
     * @param bool $static Whether the method is static.
     * @param bool $final Whether the method is final.
     * @param bool $abstract Whether the method is abstract.
     */
    public function __construct(
        string $name,
        string $description,
        string $returnType = 'void',
        array $parameters = [],
        ?string $declaringClass = null,
        bool $inherited = false,
        string $visibility = 'public',
        bool $static = false,
        bool $final = false,
        bool $abstract = false
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->returnType = $returnType;
        $this->declaringClass = $declaringClass;
        $this->inherited = $inherited;
        $this->visibility = $visibility;
        $this->static = $static;
        $this->final = $final;
        $this->abstract = $abstract;

        foreach ($parameters as $parameter) {
            $this->addParameter($parameter);
        }
    }

    /**
     * Gets the method name.
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Gets the method description.
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Gets the method return type.
     */
    public function returnType(): string
    {
        return $this->returnType;
    }

    /**
     * Gets method parameters.
     *
     * @return array<string, Parameter>
     */
    public function parameters(): array
    {
        return $this->parameters;
    }

    /**
     * Adds a method parameter.
     *
     * If a parameter with the same name already exists,
     * it is replaced by the supplied parameter.
     */
    public function addParameter(Parameter $parameter): static
    {
        $this->parameters[$parameter->name()] = $parameter;

        return $this;
    }

    /**
     * Determines whether the method has documented parameters.
     */
    public function hasParameters(): bool
    {
        return $this->parameters !== [];
    }

    /**
     * Determines whether a parameter is documented.
     */
    public function hasParameter(string $name): bool
    {
        return isset($this->parameters[$name]);
    }

    /**
     * Gets a documented parameter.
     *
     * Returns null when the parameter is not documented.
     */
    public function parameter(string $name): ?Parameter
    {
        return $this->parameters[$name] ?? null;
    }

    /**
     * Returns the number of documented parameters.
     */
    public function parameterCount(): int
    {
        return count($this->parameters);
    }

    /**
     * Returns the class that declares the method.
     */
    public function declaringClass(): ?string
    {
        return $this->declaringClass;
    }

    /**
     * Determines whether the method is inherited.
     */
    public function isInherited(): bool
    {
        return $this->inherited;
    }

    /**
     * Returns the method visibility.
     */
    public function visibility(): string
    {
        return $this->visibility;
    }

    /**
     * Determines whether the method is public.
     */
    public function isPublic(): bool
    {
        return $this->visibility === 'public';
    }

    /**
     * Determines whether the method is protected.
     */
    public function isProtected(): bool
    {
        return $this->visibility === 'protected';
    }

    /**
     * Determines whether the method is private.
     */
    public function isPrivate(): bool
    {
        return $this->visibility === 'private';
    }

    /**
     * Determines whether the method is static.
     */
    public function isStatic(): bool
    {
        return $this->static;
    }

    /**
     * Determines whether the method is final.
     */
    public function isFinal(): bool
    {
        return $this->final;
    }

    /**
     * Determines whether the method is abstract.
     */
    public function isAbstract(): bool
    {
        return $this->abstract;
    }

    /**
     * Converts method documentation metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'returnType' => $this->returnType,
            'parameters' => array_map(
                static fn (Parameter $parameter): array =>
                    $parameter->toArray(),
                $this->parameters
            ),
            'declaringClass' => $this->declaringClass,
            'inherited' => $this->inherited,
            'visibility' => $this->visibility,
            'static' => $this->static,
            'final' => $this->final,
            'abstract' => $this->abstract,
        ];
    }

    /**
     * Converts method documentation metadata into JSON.
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
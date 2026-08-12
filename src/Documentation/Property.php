<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Represents documentation metadata for a component property.
 *
 * A property documentation object describes a component property,
 * including its name, type, description, default value, declaring
 * class, inheritance, visibility, static state, and readonly state.
 *
 * This allows the documentation system to distinguish between
 * properties declared directly by a component and properties
 * inherited from parent classes.
 *
 * Example:
 *
 * ```php
 * $property = new Property(
 *     'type',
 *     'string',
 *     'Defines the input type attribute.',
 *     'text',
 *     declaringClass: Input::class,
 *     inherited: true
 * );
 * ```
 */
class Property
{
    /**
     * Property name.
     */
    protected string $name;


    /**
     * Property type.
     */
    protected string $type;


    /**
     * Property description.
     */
    protected string $description;


    /**
     * Default property value.
     */
    protected mixed $default;


    /**
     * Indicates whether the property has a default value.
     */
    protected bool $hasDefault;


    /**
     * Declaring class of the property.
     */
    protected ?string $declaringClass;


    /**
     * Indicates whether the property is inherited.
     */
    protected bool $inherited;


    /**
     * Property visibility.
     */
    protected string $visibility;


    /**
     * Indicates whether the property is static.
     */
    protected bool $static;


    /**
     * Indicates whether the property is readonly.
     */
    protected bool $readonly;


    /**
     * Creates property documentation metadata.
     *
     * @param string $name Property name.
     * @param string $type Property type.
     * @param string $description Property description.
     * @param mixed $default Default value.
     * @param bool $hasDefault Whether the property has a default value.
     * @param string|null $declaringClass Class that declares the property.
     * @param bool $inherited Whether the property is inherited.
     * @param string $visibility Property visibility.
     * @param bool $static Whether the property is static.
     * @param bool $readonly Whether the property is readonly.
     */
    public function __construct(
        string $name,
        string $type,
        string $description,
        mixed $default = null,
        bool $hasDefault = false,
        ?string $declaringClass = null,
        bool $inherited = false,
        string $visibility = 'public',
        bool $static = false,
        bool $readonly = false
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->default = $default;
        $this->hasDefault = $hasDefault;
        $this->declaringClass = $declaringClass;
        $this->inherited = $inherited;
        $this->visibility = $visibility;
        $this->static = $static;
        $this->readonly = $readonly;
    }


    /**
     * Gets the property name.
     */
    public function name(): string
    {
        return $this->name;
    }


    /**
     * Gets the property type.
     */
    public function type(): string
    {
        return $this->type;
    }


    /**
     * Gets the property description.
     */
    public function description(): string
    {
        return $this->description;
    }


    /**
     * Gets the default value.
     */
    public function default(): mixed
    {
        return $this->default;
    }


    /**
     * Determines whether the property has a default value.
     */
    public function hasDefault(): bool
    {
        return $this->hasDefault;
    }


    /**
     * Returns the class that declares the property.
     */
    public function declaringClass(): ?string
    {
        return $this->declaringClass;
    }


    /**
     * Determines whether the property is inherited.
     */
    public function isInherited(): bool
    {
        return $this->inherited;
    }


    /**
     * Returns the property visibility.
     */
    public function visibility(): string
    {
        return $this->visibility;
    }


    /**
     * Determines whether the property is public.
     */
    public function isPublic(): bool
    {
        return $this->visibility === 'public';
    }


    /**
     * Determines whether the property is protected.
     */
    public function isProtected(): bool
    {
        return $this->visibility === 'protected';
    }


    /**
     * Determines whether the property is private.
     */
    public function isPrivate(): bool
    {
        return $this->visibility === 'private';
    }


    /**
     * Determines whether the property is static.
     */
    public function isStatic(): bool
    {
        return $this->static;
    }


    /**
     * Determines whether the property is readonly.
     */
    public function isReadonly(): bool
    {
        return $this->readonly;
    }


    /**
     * Converts property documentation metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'default' => $this->default,
            'hasDefault' => $this->hasDefault,
            'declaringClass' => $this->declaringClass,
            'inherited' => $this->inherited,
            'visibility' => $this->visibility,
            'static' => $this->static,
            'readonly' => $this->readonly,
        ];
    }


    /**
     * Converts property documentation metadata into JSON.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode(
            $this->toArray(),
            JSON_THROW_ON_ERROR
        );
    }
}
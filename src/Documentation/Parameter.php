<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Represents documentation metadata for a method parameter.
 *
 * A parameter documentation object describes a method parameter,
 * including its name, type, optional state, default value, and
 * variadic state.
 *
 * This object is used by the documentation system to provide
 * structured information about method parameters discovered
 * through reflection.
 *
 * Example:
 *
 * ```php
 * $parameter = new Parameter(
 *     'attributes',
 *     'array',
 *     true,
 *     []
 * );
 * ```
 */
class Parameter
{
    /**
     * Parameter name.
     */
    protected string $name;

    /**
     * Parameter type.
     */
    protected string $type;

    /**
     * Indicates whether the parameter is optional.
     */
    protected bool $optional;

    /**
     * Indicates whether the parameter has a default value.
     */
    protected bool $hasDefault;

    /**
     * Default parameter value.
     */
    protected mixed $default;

    /**
     * Indicates whether the parameter is variadic.
     */
    protected bool $variadic;

    /**
     * Creates parameter documentation metadata.
     *
     * @param string $name Parameter name.
     * @param string $type Parameter type.
     * @param bool $optional Whether the parameter is optional.
     * @param mixed $default Default parameter value.
     * @param bool $variadic Whether the parameter is variadic.
     * @param bool $hasDefault Whether the parameter has a default value.
     */
    public function __construct(
        string $name,
        string $type = 'mixed',
        bool $optional = false,
        mixed $default = null,
        bool $variadic = false,
        bool $hasDefault = false
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->optional = $optional;
        $this->default = $default;
        $this->variadic = $variadic;
        $this->hasDefault = $hasDefault;
    }

    /**
     * Gets the parameter name.
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Gets the parameter type.
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * Determines whether the parameter is optional.
     */
    public function isOptional(): bool
    {
        return $this->optional;
    }

    /**
     * Determines whether the parameter has a default value.
     */
    public function hasDefault(): bool
    {
        return $this->hasDefault;
    }

    /**
     * Gets the default parameter value.
     */
    public function default(): mixed
    {
        return $this->default;
    }

    /**
     * Determines whether the parameter is variadic.
     */
    public function isVariadic(): bool
    {
        return $this->variadic;
    }

    /**
     * Converts parameter documentation metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'optional' => $this->optional,
            'hasDefault' => $this->hasDefault,
            'default' => $this->default,
            'variadic' => $this->variadic,
        ];
    }

    /**
     * Converts parameter documentation metadata into JSON.
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
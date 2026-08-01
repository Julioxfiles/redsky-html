<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines metadata information for a method parameter.
 *
 * This attribute describes parameters used by component methods.
 * It provides additional information for documentation generation,
 * validation systems, IDE integrations, and future automatic
 * component API discovery.
 *
 * Example:
 *
 * #[Method(
 *     description: 'Adds a CSS class to the component.'
 * )]
 * public function class(
 *     #[Parameter(
 *         description: 'CSS class name.',
 *         type: 'string',
 *         required: true
 *     )]
 *     string $class
 * ): self
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_PARAMETER)]
final class Parameter
{
    /**
     * Creates parameter metadata information.
     *
     * @param string      $description Human-readable parameter description.
     * @param string|null $type        Expected parameter type.
     * @param bool        $required    Indicates whether the parameter is required.
     * @param mixed       $default     Default parameter value.
     * @param bool        $nullable    Indicates whether null is accepted.
     * @param bool        $variadic    Indicates whether the parameter accepts multiple values.
     */
    public function __construct(
        private readonly string $description,
        private readonly ?string $type = null,
        private readonly bool $required = false,
        private readonly mixed $default = null,
        private readonly bool $nullable = false,
        private readonly bool $variadic = false
    ) {
    }

    /**
     * Returns the parameter description.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Returns the declared parameter type.
     *
     * @return string|null
     */
    public function type(): ?string
    {
        return $this->type;
    }

    /**
     * Determines whether the parameter is required.
     *
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Returns the default value.
     *
     * @return mixed
     */
    public function default(): mixed
    {
        return $this->default;
    }

    /**
     * Determines whether the parameter accepts null.
     *
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Determines whether the parameter is variadic.
     *
     * @return bool
     */
    public function isVariadic(): bool
    {
        return $this->variadic;
    }

    /**
     * Determines whether a default value exists.
     *
     * @return bool
     */
    public function hasDefault(): bool
    {
        return $this->default !== null;
    }

    /**
     * Determines whether a type definition exists.
     *
     * @return bool
     */
    public function hasType(): bool
    {
        return $this->type !== null
            && $this->type !== '';
    }

    /**
     * Converts parameter metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'type' => $this->type,
            'required' => $this->required,
            'default' => $this->default,
            'nullable' => $this->nullable,
            'variadic' => $this->variadic,
        ];
    }

    /**
     * Converts parameter metadata into JSON format.
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

    /**
     * Returns a readable representation of the metadata.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->description;
    }
}
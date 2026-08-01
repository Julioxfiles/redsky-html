<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines metadata information for a component property.
 *
 * This attribute is used to describe public properties exposed by
 * RedSky HTML components. It provides information required for
 * automatic documentation generation, component inspection,
 * validation systems, IDE tooling, and future component builders.
 *
 * Example:
 *
 * #[Property(
 *     description: 'Defines the button text.',
 *     type: 'string',
 *     required: true,
 *     default: 'Submit'
 * )]
 * public string $label;
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class Property
{
    /**
     * Creates a property metadata definition.
     *
     * @param string      $description Human-readable property description.
     * @param string|null $type        Expected property type.
     * @param bool        $required    Indicates if the property is mandatory.
     * @param mixed       $default     Default property value.
     * @param bool        $nullable    Indicates if null is accepted.
     * @param bool        $readonly    Indicates if the property is immutable.
     */
    public function __construct(
        private readonly string $description,
        private readonly ?string $type = null,
        private readonly bool $required = false,
        private readonly mixed $default = null,
        private readonly bool $nullable = false,
        private readonly bool $readonly = false
    ) {
    }

    /**
     * Returns the property description.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Returns the declared property type.
     *
     * @return string|null
     */
    public function type(): ?string
    {
        return $this->type;
    }

    /**
     * Determines whether the property is required.
     *
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Returns the default property value.
     *
     * @return mixed
     */
    public function default(): mixed
    {
        return $this->default;
    }

    /**
     * Determines whether the property accepts null values.
     *
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Determines whether the property is readonly.
     *
     * @return bool
     */
    public function isReadonly(): bool
    {
        return $this->readonly;
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
     * Returns metadata as an associative array.
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
            'readonly' => $this->readonly,
        ];
    }

    /**
     * Converts metadata into JSON representation.
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
     * Returns a readable representation of this attribute.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->description;
    }
}
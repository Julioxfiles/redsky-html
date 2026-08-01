<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines metadata information for an enum value.
 *
 * This attribute documents individual values inside PHP enums used
 * by the RedSky HTML ecosystem.
 *
 * It allows future documentation generators, component explorers,
 * schema generators, and developer tooling to understand the purpose
 * and usage of enum cases.
 *
 * Example:
 *
 * enum ButtonVariant: string
 * {
 *     #[EnumValue(
 *         description: 'Primary action button style.',
 *         example: 'primary'
 *     )]
 *     case Primary = 'primary';
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
final class EnumValue
{
    /**
     * Creates enum value metadata information.
     *
     * @param string      $description Human-readable value description.
     * @param string|null $example     Example usage value.
     * @param string|null $deprecated  Deprecation message.
     * @param string|null $version     Version where the value was introduced.
     * @param bool        $hidden      Indicates whether the value is hidden from documentation.
     */
    public function __construct(
        private readonly string $description,
        private readonly ?string $example = null,
        private readonly ?string $deprecated = null,
        private readonly ?string $version = null,
        private readonly bool $hidden = false
    ) {
    }

    /**
     * Returns the enum value description.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Returns an example value.
     *
     * @return string|null
     */
    public function example(): ?string
    {
        return $this->example;
    }

    /**
     * Returns the deprecation message.
     *
     * @return string|null
     */
    public function deprecated(): ?string
    {
        return $this->deprecated;
    }

    /**
     * Returns the version where this value was introduced.
     *
     * @return string|null
     */
    public function version(): ?string
    {
        return $this->version;
    }

    /**
     * Determines whether the value is hidden.
     *
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * Determines whether the value is deprecated.
     *
     * @return bool
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated !== null
            && $this->deprecated !== '';
    }

    /**
     * Determines whether an example exists.
     *
     * @return bool
     */
    public function hasExample(): bool
    {
        return $this->example !== null
            && $this->example !== '';
    }

    /**
     * Determines whether a version exists.
     *
     * @return bool
     */
    public function hasVersion(): bool
    {
        return $this->version !== null
            && $this->version !== '';
    }

    /**
     * Converts enum value metadata into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'example' => $this->example,
            'deprecated' => $this->deprecated,
            'version' => $this->version,
            'hidden' => $this->hidden,
        ];
    }

    /**
     * Converts enum value metadata into JSON format.
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
     * Returns a readable representation of this metadata.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->description;
    }
}
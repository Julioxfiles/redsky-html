<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines metadata information for a RedSky HTML component.
 *
 * This attribute is applied to classes that represent reusable HTML
 * components. The metadata can later be consumed by documentation
 * generators, component registries, IDE integrations, or runtime
 * component inspection tools.
 *
 * Example:
 *
 * #[Component(
 *     name: 'Button',
 *     description: 'Represents an HTML button component.',
 *     category: 'Forms'
 * )]
 * class Button
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class Component
{
    /**
     * Creates a component metadata definition.
     *
     * @param string      $name        Component name.
     * @param string|null $description Component description.
     * @param string|null $category    Component category.
     * @param string|null $version     Component version.
     * @param bool        $deprecated  Indicates whether the component is deprecated.
     */
    public function __construct(
        private readonly string $name,
        private readonly ?string $description = null,
        private readonly ?string $category = null,
        private readonly ?string $version = null,
        private readonly bool $deprecated = false
    ) {
    }

    /**
     * Returns the component name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Returns the component description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the component category.
     *
     * @return string|null
     */
    public function category(): ?string
    {
        return $this->category;
    }

    /**
     * Returns the component version.
     *
     * @return string|null
     */
    public function version(): ?string
    {
        return $this->version;
    }

    /**
     * Determines whether the component is deprecated.
     *
     * @return bool
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated;
    }

    /**
     * Returns the component metadata as an array.
     *
     * This method is useful for documentation generators,
     * serialization processes, or debugging tools.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'version' => $this->version,
            'deprecated' => $this->deprecated,
        ];
    }

    /**
     * Returns a JSON representation of the component metadata.
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
     * Determines whether this component has a description.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }

    /**
     * Determines whether this component belongs to a category.
     *
     * @return bool
     */
    public function hasCategory(): bool
    {
        return $this->category !== null
            && $this->category !== '';
    }

    /**
     * Determines whether this component has a version.
     *
     * @return bool
     */
    public function hasVersion(): bool
    {
        return $this->version !== null
            && $this->version !== '';
    }

    /**
     * Returns a string representation of the component.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
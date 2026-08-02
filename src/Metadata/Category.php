<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines category metadata for RedSky HTML elements and components.
 *
 * This attribute allows grouping related components, elements, APIs,
 * or documentation entries into logical categories.
 *
 * It can be used by documentation generators, component catalogs,
 * UI explorers, and developer tools to organize the RedSky HTML
 * ecosystem in a structured way.
 *
 * Example:
 *
 * #[Category(
 *     name: 'Forms',
 *     description: 'Components used for user input and forms.'
 * )]
 * class Input
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final class Category
{
    /**
     * Creates category metadata information.
     *
     * @param string      $name        Category name.
     * @param string|null $description Category description.
     * @param string|null $group       Parent category group.
     * @param int         $priority    Display priority.
     * @param bool        $hidden      Indicates whether the category is hidden.
     */
    public function __construct(
        private readonly string $name,
        private readonly ?string $description = null,
        private readonly ?string $group = null,
        private readonly int $priority = 0,
        private readonly bool $hidden = false
    ) {
    }

    /**
     * Returns the category name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Returns the category description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the parent group.
     *
     * @return string|null
     */
    public function group(): ?string
    {
        return $this->group;
    }

    /**
     * Returns the category priority.
     *
     * Higher values can be displayed first by documentation systems.
     *
     * @return int
     */
    public function priority(): int
    {
        return $this->priority;
    }

    /**
     * Determines whether the category is hidden.
     *
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * Determines whether a description exists.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }

    /**
     * Determines whether a parent group exists.
     *
     * @return bool
     */
    public function hasGroup(): bool
    {
        return $this->group !== null
            && $this->group !== '';
    }

    /**
     * Converts category metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'group' => $this->group,
            'priority' => $this->priority,
            'hidden' => $this->hidden,
        ];
    }

    /**
     * Converts category metadata into JSON format.
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
     * Returns a readable representation of the category.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
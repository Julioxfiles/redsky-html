<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines grouping metadata for RedSky HTML APIs.
 *
 * This attribute allows classes, methods, properties, constants,
 * or other documented elements to be organized into logical groups.
 *
 * Groups can be consumed by documentation generators, component
 * catalogs, API explorers, IDE integrations, and future RedSky
 * developer tooling.
 *
 * Example:
 *
 * #[Group(
 *     name: 'Input Components',
 *     description: 'Components used to collect user information.',
 *     order: 10
 * )]
 * class TextInput
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(
    Attribute::TARGET_CLASS
    | Attribute::TARGET_METHOD
    | Attribute::TARGET_PROPERTY
    | Attribute::TARGET_CLASS_CONSTANT
)]
final class Group
{
    /**
     * Creates group metadata information.
     *
     * @param string      $name        Group name.
     * @param string|null $description Group description.
     * @param int         $order       Display ordering priority.
     * @param string|null $parent      Parent group identifier.
     * @param bool        $hidden      Indicates whether the group is hidden.
     */
    public function __construct(
        private readonly string $name,
        private readonly ?string $description = null,
        private readonly int $order = 0,
        private readonly ?string $parent = null,
        private readonly bool $hidden = false
    ) {
    }

    /**
     * Returns the group name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Returns the group description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the display ordering priority.
     *
     * @return int
     */
    public function order(): int
    {
        return $this->order;
    }

    /**
     * Returns the parent group identifier.
     *
     * @return string|null
     */
    public function parent(): ?string
    {
        return $this->parent;
    }

    /**
     * Determines whether the group is hidden.
     *
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * Determines whether the group has a description.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }

    /**
     * Determines whether the group has a parent.
     *
     * @return bool
     */
    public function hasParent(): bool
    {
        return $this->parent !== null
            && $this->parent !== '';
    }

    /**
     * Converts group metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'order' => $this->order,
            'parent' => $this->parent,
            'hidden' => $this->hidden,
        ];
    }

    /**
     * Converts group metadata into JSON format.
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
     * Returns a readable representation of the group.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
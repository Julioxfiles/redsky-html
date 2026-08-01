<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

use RedSky\Html\Contracts\AttributeCollection as AttributeCollectionContract;
use Stringable;

/**
 * Represents a collection of HTML attributes.
 *
 * @package RedSky\Html\Collections
 */
class AttributeCollection extends Collection implements AttributeCollectionContract, Stringable
{
    /**
     * Adds or replaces an attribute.
     *
     * @param string $name Attribute name.
     * @param mixed $value Attribute value.
     *
     * @return static
     */
    public function setAttribute(
        string $name,
        mixed $value
    ): static {
        $this->items[$name] = $value;

        return $this;
    }


    /**
     * Returns an attribute value.
     *
     * @param string $name Attribute name.
     *
     * @return mixed
     */
    public function getAttribute(
        string $name
    ): mixed {
        return $this->items[$name] ?? null;
    }


    /**
     * Determines whether an attribute exists.
     *
     * @param string $name Attribute name.
     *
     * @return bool
     */
    public function hasAttribute(
        string $name
    ): bool {
        return array_key_exists(
            $name,
            $this->items
        );
    }


    /**
     * Removes an attribute.
     *
     * @param string $name Attribute name.
     *
     * @return static
     */
    public function removeAttribute(
        string $name
    ): static {
        unset($this->items[$name]);

        return $this;
    }


    /**
     * Returns all attributes.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return $this->items;
    }


    /**
     * Clears attributes.
     *
     * @return static
     */
    public function clearAttributes(): static
    {
        $this->items = [];

        return $this;
    }


    /**
     * Renders attributes.
     *
     * @return string
     */
    public function renderAttributes(): string
    {
        $attributes = [];

        foreach ($this->items as $name => $value) {

            if ($value === null) {
                continue;
            }

            if (is_bool($value)) {
                if ($value) {
                    $attributes[] = $name;
                }

                continue;
            }

            $attributes[] = sprintf(
                '%s="%s"',
                $name,
                htmlspecialchars(
                    (string) $value,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        return implode(
            ' ',
            $attributes
        );
    }


    /**
     * Determines whether attributes can render.
     *
     * @return bool
     */
    public function canRenderAttributes(): bool
    {
        return !empty($this->items);
    }


    /**
     * Returns renderable attribute count.
     *
     * @return int
     */
    public function renderableAttributesCount(): int
    {
        return count($this->items);
    }


    /**
     * Converts attributes into array.
     *
     * @return array<string, mixed>
     */
    public function attributesToArray(): array
    {
        return $this->items;
    }


    /**
     * Converts attributes into JSON.
     *
     * @return string
     */
    public function attributesToJson(): string
    {
        return json_encode(
            $this->items,
            JSON_THROW_ON_ERROR
        );
    }


    /**
     * Creates collection from attributes.
     *
     * @param array<string, mixed> $attributes Attributes.
     *
     * @return static
     */
    public static function fromAttributes(
        array $attributes
    ): static {
        return new static($attributes);
    }


    /**
     * Determines whether serialized attributes exist.
     *
     * @return bool
     */
    public function hasSerializedAttributes(): bool
    {
        return !empty($this->items);
    }


    /**
     * Finds an attribute.
     *
     * @param string $name Attribute name.
     *
     * @return mixed
     */
    public function find(
        string $name
    ): mixed {
        return $this->getAttribute($name);
    }


    /**
     * Determines whether attribute exists.
     *
     * @param string $name Attribute name.
     *
     * @return bool
     */
    public function contains(
        string $name
    ): bool {
        return $this->hasAttribute($name);
    }


    /**
     * Returns attributes.
     *
     * @return array<string, mixed>
     */
    public function items(): array
    {
        return $this->items;
    }


    /**
     * Merges another attribute collection.
     *
     * @param AttributeCollectionContract $collection Collection.
     *
     * @return static
     */
    public function merge(
        AttributeCollectionContract $collection
    ): static {
        foreach ($collection->getAttributes() as $name => $value) {
            $this->setAttribute(
                $name,
                $value
            );
        }

        return $this;
    }


    /**
     * Converts attributes to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->renderAttributes();
    }
}
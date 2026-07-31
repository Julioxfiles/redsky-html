<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

/**
 * Base collection class for RedSky HTML objects.
 *
 * Provides a reusable collection implementation for managing
 * structured data inside the RedSky HTML ecosystem.
 *
 * This collection can be used as a foundation for:
 *
 * - Attribute collections.
 * - Child node collections.
 * - Component collections.
 * - Metadata collections.
 * - Element registries.
 *
 * Features:
 *
 * - Array access.
 * - Iteration support.
 * - Counting.
 * - JSON serialization.
 * - Filtering.
 * - Searching.
 * - Mapping.
 * - Merging.
 * - Immutable-style operations.
 *
 * @package RedSky\Html\Collections
 *
 * @template T
 */
class Collection implements
    ArrayAccess,
    Countable,
    IteratorAggregate,
    JsonSerializable
{
    /**
     * Internal collection items.
     *
     * @var array<int|string, mixed>
     */
    protected array $items = [];


    /**
     * Creates a collection.
     *
     * @param array<int|string, mixed> $items Initial items.
     */
    public function __construct(
        array $items = []
    ) {
        $this->items = $items;
    }


    /**
     * Returns all collection items.
     *
     * @return array<int|string, mixed>
     */
    public function all(): array
    {
        return $this->items;
    }


    /**
     * Adds an item.
     *
     * @param mixed $item Item value.
     *
     * @return static
     */
    public function add(
        mixed $item
    ): static {
        $this->items[] = $item;

        return $this;
    }


    /**
     * Adds an item using a specific key.
     *
     * @param string|int $key   Item key.
     * @param mixed      $value Item value.
     *
     * @return static
     */
    public function set(
        string|int $key,
        mixed $value
    ): static {
        $this->items[$key] = $value;

        return $this;
    }


    /**
     * Returns an item by key.
     *
     * @param string|int $key     Item key.
     * @param mixed      $default Default value.
     *
     * @return mixed
     */
    public function get(
        string|int $key,
        mixed $default = null
    ): mixed {
        return $this->items[$key] ?? $default;
    }


    /**
     * Determines whether a key exists.
     *
     * @param string|int $key Item key.
     *
     * @return bool
     */
    public function has(
        string|int $key
    ): bool {
        return array_key_exists($key, $this->items);
    }


    /**
     * Removes an item by key.
     *
     * @param string|int $key Item key.
     *
     * @return static
     */
    public function remove(
        string|int $key
    ): static {
        unset($this->items[$key]);

        return $this;
    }


    /**
     * Clears the collection.
     *
     * @return static
     */
    public function clear(): static
    {
        $this->items = [];

        return $this;
    }


    /**
     * Returns collection size.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }


    /**
     * Determines whether collection is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }


    /**
     * Returns first item.
     *
     * @param mixed $default Default value.
     *
     * @return mixed
     */
    public function first(
        mixed $default = null
    ): mixed {
        return $this->items[array_key_first($this->items)] ?? $default;
    }


    /**
     * Returns last item.
     *
     * @param mixed $default Default value.
     *
     * @return mixed
     */
    public function last(
        mixed $default = null
    ): mixed {
        return $this->items[array_key_last($this->items)] ?? $default;
    }


    /**
     * Filters collection items.
     *
     * @param callable $callback Filter callback.
     *
     * @return static
     */
    public function filter(
        callable $callback
    ): static {
        return new static(
            array_filter(
                $this->items,
                $callback,
                ARRAY_FILTER_USE_BOTH
            )
        );
    }


    /**
     * Maps collection items.
     *
     * @param callable $callback Mapping callback.
     *
     * @return static
     */
    public function map(
        callable $callback
    ): static {
        return new static(
            array_map(
                $callback,
                $this->items
            )
        );
    }


    /**
     * Merges another collection or array.
     *
     * @param array<int|string, mixed>|Collection $items Items to merge.
     *
     * @return static
     */
    public function mergeItems(
    array|Collection $items
    ): static {
        $values = $items instanceof Collection
            ? $items->all()
            : $items;

        $this->items = array_merge(
            $this->items,
            $values
        );

        return $this;
    }


    /**
     * Creates a copy of the collection.
     *
     * @return static
     */
    public function duplicate(): static
    {
        return new static(
            $this->items
        );
    }


    /**
     * Returns an iterator.
     *
     * @return Traversable<int|string, mixed>
     */
    public function getIterator(): Traversable
    {
        yield from $this->items;
    }


    /**
     * Returns JSON representation.
     *
     * @return array<int|string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->items;
    }


    /**
     * Checks whether an offset exists.
     *
     * @param mixed $offset Offset.
     *
     * @return bool
     */
    public function offsetExists(
        mixed $offset
    ): bool {
        return $this->has($offset);
    }


    /**
     * Returns an offset value.
     *
     * @param mixed $offset Offset.
     *
     * @return mixed
     */
    public function offsetGet(
        mixed $offset
    ): mixed {
        return $this->get($offset);
    }


    /**
     * Sets an offset value.
     *
     * @param mixed $offset Offset.
     * @param mixed $value  Value.
     *
     * @return void
     */
    public function offsetSet(
        mixed $offset,
        mixed $value
    ): void {
        if ($offset === null) {
            $this->add($value);

            return;
        }

        $this->set($offset, $value);
    }


    /**
     * Removes an offset.
     *
     * @param mixed $offset Offset.
     *
     * @return void
     */
    public function offsetUnset(
        mixed $offset
    ): void {
        $this->remove($offset);
    }
}
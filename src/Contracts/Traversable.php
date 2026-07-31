<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be traversed.
 *
 * Implementations of this interface represent objects containing
 * multiple internal items that can be iterated and inspected.
 *
 * This abstraction is useful for RedSky HTML collections such as:
 *
 * - Attribute collections.
 * - Child node collections.
 * - Component registries.
 * - Element trees.
 *
 * The contract provides a consistent traversal API independent from
 * the internal storage implementation.
 *
 * @package RedSky\Html\Contracts
 */
interface Traversable
{
    /**
     * Returns all items contained by the object.
     *
     * @return array<int|string, mixed>
     */
    public function all(): array;


    /**
     * Returns the number of contained items.
     *
     * @return int
     */
    public function count(): int;


    /**
     * Determines whether the collection is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool;


    /**
     * Determines whether an item exists.
     *
     * @param mixed $key Item identifier.
     *
     * @return bool
     */
    public function has(
        mixed $key
    ): bool;


    /**
     * Returns an item by key.
     *
     * @param mixed $key     Item identifier.
     * @param mixed $default Default value.
     *
     * @return mixed
     */
    public function get(
        mixed $key,
        mixed $default = null
    ): mixed;


    /**
     * Applies a callback to each item.
     *
     * @param callable $callback Callback receiving value and key.
     *
     * @return static
     */
    public function each(
        callable $callback
    ): static;
}
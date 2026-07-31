<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for mutable objects.
 *
 * Implementations of this interface represent objects whose internal
 * state can be modified after creation.
 *
 * This contract provides a common abstraction for RedSky HTML objects
 * that support fluent modification patterns.
 *
 * Common implementations:
 *
 * - Elements.
 * - Components.
 * - Attribute collections.
 * - Configuration objects.
 *
 * Example:
 *
 * $button
 *     ->setAttribute('type', 'button')
 *     ->addClass('btn');
 *
 * @package RedSky\Html\Contracts
 */
interface Mutable
{
    /**
     * Determines whether the object can be modified.
     *
     * @return bool
     */
    public function isMutable(): bool;


    /**
     * Locks the object and prevents further modifications.
     *
     * @return static
     */
    public function freeze(): static;


    /**
     * Determines whether the object is frozen.
     *
     * @return bool
     */
    public function isFrozen(): bool;


    /**
     * Creates a mutable copy of the object.
     *
     * @return static
     */
    public function mutableCopy(): static;
}
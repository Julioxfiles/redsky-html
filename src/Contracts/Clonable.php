<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support controlled cloning.
 *
 * Implementations of this interface provide an explicit cloning
 * mechanism instead of relying only on PHP's native clone behavior.
 *
 * This contract is useful for RedSky HTML objects that need to create
 * independent copies while preserving or resetting internal state.
 *
 * Common use cases:
 *
 * - Duplicating components.
 * - Creating element variations.
 * - Reusing component definitions.
 * - Generating component templates.
 *
 * @package RedSky\Html\Contracts
 */
interface Cloneable
{
    /**
     * Creates a cloned instance of the object.
     *
     * The returned object should be independent from the original
     * instance when internal mutable state exists.
     *
     * @return static
     */
    public function clone(): static;


    /**
     * Creates a clone with modified properties.
     *
     * Implementations may use this method for fluent duplication
     * patterns.
     *
     * @param array<string, mixed> $changes Properties to modify.
     *
     * @return static
     */
    public function cloneWith(
        array $changes
    ): static;
}
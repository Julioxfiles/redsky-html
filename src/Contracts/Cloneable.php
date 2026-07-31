<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support cloning.
 *
 * Cloneable objects can create independent copies of themselves while
 * preserving their configuration and internal state according to the
 * implementation rules.
 *
 * This abstraction is useful for:
 *
 * - HTML elements.
 * - Components.
 * - Attribute collections.
 * - Render trees.
 * - Reusable UI structures.
 *
 * Implementations should ensure that cloned objects do not share
 * mutable internal references unless explicitly intended.
 *
 * @package RedSky\Html\Contracts
 */
interface Cloneable
{
    /**
     * Creates an independent copy of the object.
     *
     * @return static
     */
    public function duplicate(): static;


    /**
     * Creates a copy with modified values.
     *
     * @param array<string, mixed> $changes Values to override.
     *
     * @return static
     */
    public function cloneWith(
        array $changes = []
    ): static;


    /**
     * Determines whether the object can be cloned safely.
     *
     * @return bool
     */
    public function isCloneable(): bool;


    /**
     * Returns the cloned object identifier.
     *
     * This can be used for debugging or tracking cloned instances.
     *
     * @return string|null
     */
    public function cloneIdentifier(): ?string;
}
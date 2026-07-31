<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support merging.
 *
 * Mergeable objects can combine their internal data or configuration
 * with another compatible object.
 *
 * This abstraction is useful for:
 *
 * - Attribute collections.
 * - Component properties.
 * - Configuration objects.
 * - Metadata containers.
 * - Rendering options.
 *
 * Implementations should define how conflicts between values are
 * resolved.
 *
 * @package RedSky\Html\Contracts
 */
interface Mergeable
{
    /**
     * Merges another object into the current object.
     *
     * @param object $object Object to merge.
     *
     * @return static
     */
    public function merge(
        object $object
    ): static;


    /**
     * Creates a merged copy without modifying the current object.
     *
     * @param object $object Object to merge.
     *
     * @return static
     */
    public function merged(
        object $object
    ): static;


    /**
     * Determines whether another object can be merged.
     *
     * @param object $object Object to check.
     *
     * @return bool
     */
    public function canMerge(
        object $object
    ): bool;


    /**
     * Returns mergeable data.
     *
     * @return array<string, mixed>
     */
    public function mergeData(): array;


    /**
     * Clears merged data.
     *
     * @return static
     */
    public function clearMerge(): static;
}
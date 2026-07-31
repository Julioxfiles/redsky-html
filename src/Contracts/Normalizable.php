<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be normalized.
 *
 * Normalizable objects can transform their internal representation
 * into a consistent and predictable format.
 *
 * Normalization is useful for:
 *
 * - Attribute names.
 * - Component identifiers.
 * - HTML tags.
 * - Configuration values.
 * - Documentation metadata.
 *
 * This abstraction allows different implementations to define their
 * own normalization rules.
 *
 * @package RedSky\Html\Contracts
 */
interface Normalizable
{
    /**
     * Returns the normalized representation.
     *
     * @return mixed
     */
    public function normalize(): mixed;


    /**
     * Determines whether the object is already normalized.
     *
     * @return bool
     */
    public function isNormalized(): bool;


    /**
     * Returns a normalized copy without modifying the object.
     *
     * @return static
     */
    public function normalized(): static;


    /**
     * Resets the normalized state.
     *
     * @return static
     */
    public function resetNormalization(): static;
}
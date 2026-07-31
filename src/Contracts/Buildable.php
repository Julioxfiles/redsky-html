<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects capable of being built.
 *
 * Implementations of this interface represent objects that can
 * transform their internal configuration into a final output.
 *
 * This contract is useful for objects such as:
 *
 * - HTML elements.
 * - Components.
 * - Attribute collections.
 * - Render builders.
 * - Template fragments.
 *
 * The build operation is intentionally separated from rendering,
 * allowing objects to prepare their final representation before
 * being converted into HTML.
 *
 * @package RedSky\Html\Contracts
 */
interface Buildable
{
    /**
     * Builds the final object representation.
     *
     * @return static
     */
    public function build(): static;


    /**
     * Determines whether the object has already been built.
     *
     * @return bool
     */
    public function isBuilt(): bool;


    /**
     * Resets the built state.
     *
     * @return static
     */
    public function rebuild(): static;


    /**
     * Returns the built representation.
     *
     * @return mixed
     */
    public function built(): mixed;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML tag information.
 *
 * Implementations of this interface represent objects that have an
 * associated HTML tag name.
 *
 * This abstraction allows RedSky HTML elements and components to
 * define, inspect, change, and validate their rendered HTML tag.
 *
 * Common implementations include:
 *
 * - Div elements.
 * - Buttons.
 * - Inputs.
 * - Custom components.
 * - Layout containers.
 *
 * @package RedSky\Html\Contracts
 */
interface HasTag
{
    /**
     * Returns the current HTML tag name.
     *
     * Example:
     *
     * div
     * button
     * input
     *
     * @return string
     */
    public function tag(): string;


    /**
     * Changes the HTML tag name.
     *
     * @param string $tag HTML tag name.
     *
     * @return static
     */
    public function setTag(
        string $tag
    ): static;


    /**
     * Determines whether the object has a tag assigned.
     *
     * @return bool
     */
    public function hasTag(): bool;


    /**
     * Determines whether the current tag matches
     * the given tag.
     *
     * @param string $tag HTML tag name.
     *
     * @return bool
     */
    public function isTag(
        string $tag
    ): bool;


    /**
     * Returns the normalized HTML tag name.
     *
     * Implementations should normalize the value according
     * to HTML naming rules.
     *
     * @return string
     */
    public function normalizedTag(): string;


    /**
     * Removes the current tag definition.
     *
     * @return static
     */
    public function removeTag(): static;
}
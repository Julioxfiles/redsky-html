<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support CSS classes.
 *
 * Implementations of this interface can manage CSS class names
 * independently from other HTML attributes.
 *
 * This abstraction allows RedSky HTML elements and components to
 * provide fluent class manipulation methods while keeping class
 * handling consistent across the ecosystem.
 *
 * Example:
 *
 * $button
 *     ->addClass('btn')
 *     ->addClass('btn-primary');
 *
 * @package RedSky\Html\Contracts
 */
interface HasClasses
{
    /**
     * Returns all CSS classes assigned to the object.
     *
     * @return array<int, string>
     */
    public function classes(): array;


    /**
     * Determines whether the object contains CSS classes.
     *
     * @return bool
     */
    public function hasClasses(): bool;


    /**
     * Adds a CSS class.
     *
     * Duplicate class names should not be added.
     *
     * @param string $class CSS class name.
     *
     * @return static
     */
    public function addClass(
        string $class
    ): static;


    /**
     * Removes a CSS class.
     *
     * @param string $class CSS class name.
     *
     * @return static
     */
    public function removeClass(
        string $class
    ): static;


    /**
     * Determines whether a CSS class exists.
     *
     * @param string $class CSS class name.
     *
     * @return bool
     */
    public function hasClass(
        string $class
    ): bool;


    /**
     * Clears all CSS classes.
     *
     * @return static
     */
    public function clearClasses(): static;


    /**
     * Returns all CSS classes as a single string.
     *
     * @return string
     */
    public function classString(): string;
}
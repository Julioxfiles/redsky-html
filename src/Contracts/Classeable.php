<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support CSS classes.
 *
 * Classable objects can manage CSS class names independently from
 * other HTML attributes.
 *
 * This abstraction allows RedSky HTML objects to manipulate CSS
 * classes without depending on a specific UI framework.
 *
 * Useful for:
 *
 * - Elements.
 * - Components.
 * - Bootstrap adapters.
 * - Tailwind adapters.
 * - Theme systems.
 *
 * Example:
 *
 * $button->addClass('btn');
 * $button->addClass('btn-primary');
 *
 * @package RedSky\Html\Contracts
 */
interface Classable
{
    /**
     * Returns all assigned classes.
     *
     * @return array<int, string>
     */
    public function classes(): array;


    /**
     * Adds one or more CSS classes.
     *
     * @param string ...$classes Classes to add.
     *
     * @return static
     */
    public function addClass(
        string ...$classes
    ): static;


    /**
     * Removes CSS classes.
     *
     * @param string ...$classes Classes to remove.
     *
     * @return static
     */
    public function removeClass(
        string ...$classes
    ): static;


    /**
     * Determines whether a class exists.
     *
     * @param string $class CSS class name.
     *
     * @return bool
     */
    public function hasClass(
        string $class
    ): bool;


    /**
     * Replaces all CSS classes.
     *
     * @param array<int, string> $classes Class names.
     *
     * @return static
     */
    public function setClasses(
        array $classes
    ): static;


    /**
     * Removes all CSS classes.
     *
     * @return static
     */
    public function clearClasses(): static;


    /**
     * Returns classes formatted for HTML output.
     *
     * @return string
     */
    public function renderClasses(): string;
}
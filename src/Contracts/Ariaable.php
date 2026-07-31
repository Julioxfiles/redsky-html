<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support ARIA attributes.
 *
 * Ariaable objects can manage accessibility attributes following the
 * WAI-ARIA specification.
 *
 * This abstraction allows RedSky HTML components and elements to
 * provide accessibility support without coupling to a specific
 * frontend framework.
 *
 * Examples:
 *
 * aria-label
 * aria-hidden
 * aria-expanded
 * aria-controls
 *
 * Useful for:
 *
 * - Accessible components.
 * - Interactive controls.
 * - Modals.
 * - Menus.
 * - Forms.
 *
 * @package RedSky\Html\Contracts
 */
interface Ariaable
{
    /**
     * Returns all ARIA attributes.
     *
     * @return array<string, mixed>
     */
    public function aria(): array;


    /**
     * Sets an ARIA attribute.
     *
     * @param string $name  ARIA attribute name.
     * @param mixed  $value ARIA attribute value.
     *
     * @return static
     */
    public function setAria(
        string $name,
        mixed $value
    ): static;


    /**
     * Returns an ARIA attribute value.
     *
     * @param string $name    ARIA attribute name.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getAria(
        string $name,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether an ARIA attribute exists.
     *
     * @param string $name ARIA attribute name.
     *
     * @return bool
     */
    public function hasAria(
        string $name
    ): bool;


    /**
     * Removes an ARIA attribute.
     *
     * @param string $name ARIA attribute name.
     *
     * @return static
     */
    public function removeAria(
        string $name
    ): static;


    /**
     * Clears all ARIA attributes.
     *
     * @return static
     */
    public function clearAria(): static;


    /**
     * Renders ARIA attributes as HTML.
     *
     * @return string
     */
    public function renderAria(): string;
}
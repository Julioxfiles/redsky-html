<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support inline styles.
 *
 * Styleable objects can manage CSS style declarations independently
 * from other HTML attributes.
 *
 * This abstraction allows RedSky HTML objects to provide a structured
 * API for styling without coupling to a specific CSS framework.
 *
 * Useful for:
 *
 * - Elements.
 * - Components.
 * - UI adapters.
 * - Theme systems.
 * - Dynamic styling.
 *
 * Example:
 *
 * $element->setStyle('color', 'red');
 *
 * @package RedSky\Html\Contracts
 */
interface Styleable
{
    /**
     * Returns all style declarations.
     *
     * @return array<string, string>
     */
    public function styles(): array;


    /**
     * Adds or replaces a style value.
     *
     * @param string $property CSS property name.
     * @param string $value    CSS value.
     *
     * @return static
     */
    public function setStyle(
        string $property,
        string $value
    ): static;


    /**
     * Returns a style value.
     *
     * @param string $property CSS property name.
     *
     * @return string|null
     */
    public function getStyle(
        string $property
    ): ?string;


    /**
     * Determines whether a style exists.
     *
     * @param string $property CSS property name.
     *
     * @return bool
     */
    public function hasStyle(
        string $property
    ): bool;


    /**
     * Removes a style declaration.
     *
     * @param string $property CSS property name.
     *
     * @return static
     */
    public function removeStyle(
        string $property
    ): static;


    /**
     * Clears all styles.
     *
     * @return static
     */
    public function clearStyles(): static;


    /**
     * Returns rendered style attribute content.
     *
     * @return string
     */
    public function renderStyles(): string;
}
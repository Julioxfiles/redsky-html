<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support inline CSS styles.
 *
 * Implementations of this interface can manage CSS style declarations
 * independently from regular HTML attributes.
 *
 * This abstraction allows RedSky HTML elements and components to
 * manipulate style declarations using a consistent API.
 *
 * Example:
 *
 * $element
 *     ->setStyle('color', 'red')
 *     ->setStyle('font-weight', 'bold');
 *
 * @package RedSky\Html\Contracts
 */
interface HasStyle
{
    /**
     * Returns all style declarations.
     *
     * @return array<string, string>
     */
    public function styles(): array;


    /**
     * Determines whether style declarations exist.
     *
     * @return bool
     */
    public function hasStyles(): bool;


    /**
     * Adds or updates a style declaration.
     *
     * @param string $property CSS property name.
     * @param string $value    CSS property value.
     *
     * @return static
     */
    public function setStyle(
        string $property,
        string $value
    ): static;


    /**
     * Returns a style declaration value.
     *
     * @param string $property CSS property name.
     *
     * @return string|null
     */
    public function getStyle(
        string $property
    ): ?string;


    /**
     * Determines whether a style declaration exists.
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
     * Removes all style declarations.
     *
     * @return static
     */
    public function clearStyles(): static;


    /**
     * Returns all styles formatted as an HTML style attribute value.
     *
     * Example:
     *
     * color:red;font-weight:bold
     *
     * @return string
     */
    public function styleString(): string;
}
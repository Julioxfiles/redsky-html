<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support a value.
 *
 * Implementations of this interface can manage values commonly used
 * by HTML elements and components such as:
 *
 * - Input elements.
 * - Select options.
 * - Form components.
 * - Data-bound components.
 * - Interactive controls.
 *
 * This abstraction provides a consistent API for reading, assigning,
 * validating, and removing values across the RedSky HTML ecosystem.
 *
 * @package RedSky\Html\Contracts
 */
interface HasValue
{
    /**
     * Returns the current value.
     *
     * @return mixed
     */
    public function value(): mixed;


    /**
     * Sets the value.
     *
     * @param mixed $value Value to assign.
     *
     * @return static
     */
    public function setValue(
        mixed $value
    ): static;


    /**
     * Determines whether a value exists.
     *
     * @return bool
     */
    public function hasValue(): bool;


    /**
     * Removes the current value.
     *
     * @return static
     */
    public function clearValue(): static;


    /**
     * Determines whether the current value matches
     * the given value.
     *
     * @param mixed $value Value to compare.
     *
     * @return bool
     */
    public function equalsValue(
        mixed $value
    ): bool;


    /**
     * Returns the value converted to string.
     *
     * @return string
     */
    public function valueString(): string;


    /**
     * Determines whether the value is empty.
     *
     * @return bool
     */
    public function isValueEmpty(): bool;
}
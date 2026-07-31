<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that expose a value.
 *
 * Valuable objects provide access to a primary value that represents
 * their current state or configuration.
 *
 * This abstraction is useful for:
 *
 * - Form elements.
 * - Input components.
 * - Select components.
 * - Attributes.
 * - Dynamic HTML nodes.
 *
 * The contract keeps value handling independent from rendering logic.
 *
 * @package RedSky\Html\Contracts
 */
interface Valuable
{
    /**
     * Returns the current value.
     *
     * @return mixed
     */
    public function value(): mixed;


    /**
     * Sets the current value.
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
     * Returns the value converted to string.
     *
     * @return string
     */
    public function valueAsString(): string;


    /**
     * Returns the value converted to array.
     *
     * @return array<int|string, mixed>
     */
    public function valueAsArray(): array;
}
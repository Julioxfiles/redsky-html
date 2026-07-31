<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be inspected.
 *
 * Inspectable objects expose information about their internal
 * structure and configuration for analysis purposes.
 *
 * This abstraction is useful for:
 *
 * - Development tools.
 * - Component explorers.
 * - Debugging systems.
 * - Documentation generators.
 * - Testing utilities.
 *
 * Inspection should not modify the object state.
 *
 * @package RedSky\Html\Contracts
 */
interface Inspectable
{
    /**
     * Returns an inspection snapshot.
     *
     * @return array<string, mixed>
     */
    public function inspect(): array;


    /**
     * Returns a specific inspection value.
     *
     * @param string $key     Inspection key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function inspectValue(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether an inspection value exists.
     *
     * @param string $key Inspection key.
     *
     * @return bool
     */
    public function hasInspectionValue(
        string $key
    ): bool;


    /**
     * Returns the object structure description.
     *
     * @return array<string, mixed>
     */
    public function structure(): array;


    /**
     * Returns the object summary.
     *
     * @return string
     */
    public function summary(): string;
}
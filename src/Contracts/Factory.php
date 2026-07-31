<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects capable of creating instances.
 *
 * Implementations of this interface provide a standardized way
 * to create objects dynamically.
 *
 * This abstraction is useful for:
 *
 * - Component factories.
 * - Element builders.
 * - Dependency injection systems.
 * - Object registries.
 * - Dynamic component resolution.
 *
 * @package RedSky\Html\Contracts
 */
interface Factory
{
    /**
     * Creates a new instance.
     *
     * @param array<string, mixed> $parameters Creation parameters.
     *
     * @return object
     */
    public static function make(
        array $parameters = []
    ): object;


    /**
     * Creates an instance using a named identifier.
     *
     * Implementations may use the identifier to resolve
     * different concrete implementations.
     *
     * @param string               $name       Instance identifier.
     * @param array<string, mixed> $parameters Creation parameters.
     *
     * @return object
     */
    public static function create(
        string $name,
        array $parameters = []
    ): object;
}
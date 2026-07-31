<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can resolve values or services.
 *
 * Resolvable objects are capable of transforming an identifier,
 * reference, or configuration value into a concrete result.
 *
 * This abstraction is useful for:
 *
 * - Component resolution.
 * - Element factories.
 * - Dependency injection integration.
 * - UI library adapters.
 * - Dynamic render systems.
 *
 * It allows RedSky HTML to resolve objects without coupling to a
 * specific container implementation.
 *
 * Examples:
 *
 * - Resolve a component by name.
 * - Resolve a renderer.
 * - Resolve an element type.
 *
 * @package RedSky\Html\Contracts
 */
interface Resolvable
{
    /**
     * Resolves a value.
     *
     * @param mixed $value Value to resolve.
     *
     * @return mixed
     */
    public function resolve(
        mixed $value
    ): mixed;


    /**
     * Determines whether a value can be resolved.
     *
     * @param mixed $value Value to inspect.
     *
     * @return bool
     */
    public function canResolve(
        mixed $value
    ): bool;


    /**
     * Returns the resolved value.
     *
     * @return mixed
     */
    public function resolved(): mixed;


    /**
     * Determines whether resolution has occurred.
     *
     * @return bool
     */
    public function isResolved(): bool;


    /**
     * Clears the resolved value.
     *
     * @return static
     */
    public function clearResolved(): static;
}
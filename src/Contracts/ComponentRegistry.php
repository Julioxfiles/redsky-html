<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for component registries.
 *
 * A component registry manages the discovery, storage, and retrieval
 * of reusable RedSky HTML components.
 *
 * Registries allow the ecosystem to dynamically resolve components
 * by name without requiring direct class references.
 *
 * This contract can be used by:
 *
 * - redsky-ui.
 * - Component factories.
 * - Documentation systems.
 * - Component explorers.
 * - Dependency containers.
 *
 * Example:
 *
 * $registry->register(
 *     'button',
 *     Button::class
 * );
 *
 * @package RedSky\Html\Contracts
 */
interface ComponentRegistry
{
    /**
     * Registers a component.
     *
     * @param string $name Component identifier.
     * @param string $class Component class name.
     *
     * @return static
     */
    public function register(
        string $name,
        string $class
    ): static;


    /**
     * Determines whether a component exists.
     *
     * @param string $name Component identifier.
     *
     * @return bool
     */
    public function has(
        string $name
    ): bool;


    /**
     * Returns a registered component class.
     *
     * @param string $name Component identifier.
     *
     * @return string|null
     */
    public function get(
        string $name
    ): ?string;


    /**
     * Removes a component registration.
     *
     * @param string $name Component identifier.
     *
     * @return static
     */
    public function remove(
        string $name
    ): static;


    /**
     * Returns all registered components.
     *
     * @return array<string, string>
     */
    public function all(): array;


    /**
     * Clears all component registrations.
     *
     * @return static
     */
    public function clear(): static;


    /**
     * Returns the number of registered components.
     *
     * @return int
     */
    public function count(): int;
}
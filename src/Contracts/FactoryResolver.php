<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects capable of resolving factories.
 *
 * A factory resolver is responsible for locating the correct factory
 * implementation required to create HTML objects dynamically.
 *
 * This abstraction allows RedSky HTML to support:
 *
 * - Component factories.
 * - Element factories.
 * - UI library adapters.
 * - Dependency injection integrations.
 * - Runtime object resolution.
 *
 * @package RedSky\Html\Contracts
 */
interface FactoryResolver
{
    /**
     * Resolves a factory by identifier.
     *
     * @param string $name Factory identifier.
     *
     * @return Factory|null
     */
    public function resolve(
        string $name
    ): ?Factory;


    /**
     * Determines whether a factory can be resolved.
     *
     * @param string $name Factory identifier.
     *
     * @return bool
     */
    public function canResolve(
        string $name
    ): bool;


    /**
     * Registers a factory resolver.
     *
     * @param string $name    Factory identifier.
     * @param Factory $factory Factory instance.
     *
     * @return static
     */
    public function register(
        string $name,
        Factory $factory
    ): static;


    /**
     * Removes a factory resolver.
     *
     * @param string $name Factory identifier.
     *
     * @return static
     */
    public function remove(
        string $name
    ): static;


    /**
     * Returns all registered factories.
     *
     * @return array<string, Factory>
     */
    public function all(): array;


    /**
     * Clears all registered factories.
     *
     * @return static
     */
    public function clear(): static;
}
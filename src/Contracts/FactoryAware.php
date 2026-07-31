<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that have access to a factory.
 *
 * Implementations of this interface can receive and use a factory
 * responsible for creating related objects dynamically.
 *
 * This abstraction allows RedSky HTML objects to delegate creation
 * responsibilities without depending on concrete implementations.
 *
 * Common use cases:
 *
 * - Component creation.
 * - Element generation.
 * - Renderer resolution.
 * - UI adapter creation.
 *
 * @package RedSky\Html\Contracts
 */
interface FactoryAware
{
    /**
     * Returns the assigned factory.
     *
     * @return Factory|null
     */
    public function factory(): ?Factory;


    /**
     * Assigns a factory instance.
     *
     * @param Factory $factory Factory instance.
     *
     * @return static
     */
    public function setFactory(
        Factory $factory
    ): static;


    /**
     * Determines whether a factory is assigned.
     *
     * @return bool
     */
    public function hasFactory(): bool;


    /**
     * Removes the current factory.
     *
     * @return static
     */
    public function removeFactory(): static;


    /**
     * Creates an object using the assigned factory.
     *
     * @param array<string, mixed> $parameters Creation parameters.
     *
     * @return object
     */
    public function make(
        array $parameters = []
    ): object;
}
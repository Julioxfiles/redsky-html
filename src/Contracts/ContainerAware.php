<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that have access to a container.
 *
 * Implementations of this interface can receive and expose a dependency
 * container responsible for resolving services, factories, renderers,
 * or other runtime dependencies.
 *
 * This abstraction keeps RedSky HTML objects compatible with different
 * dependency injection implementations without coupling them to a
 * specific container.
 *
 * Common usages:
 *
 * - Components requiring services.
 * - Renderers requiring configuration.
 * - Factories requiring dependencies.
 * - Dynamic component resolvers.
 *
 * @package RedSky\Html\Contracts
 */
interface ContainerAware
{
    /**
     * Returns the assigned container.
     *
     * @return object|null
     */
    public function container(): ?object;


    /**
     * Assigns a dependency container.
     *
     * @param object $container Dependency container instance.
     *
     * @return static
     */
    public function setContainer(
        object $container
    ): static;


    /**
     * Determines whether a container is assigned.
     *
     * @return bool
     */
    public function hasContainer(): bool;


    /**
     * Removes the current container reference.
     *
     * @return static
     */
    public function removeContainer(): static;


    /**
     * Resolves a dependency from the assigned container.
     *
     * @param string $id Service identifier.
     *
     * @return mixed
     */
    public function resolve(
        string $id
    ): mixed;
}
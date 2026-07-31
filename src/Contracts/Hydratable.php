<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be hydrated from data.
 *
 * Hydration allows an object to receive external data and transform
 * that data into its internal state.
 *
 * This abstraction is useful for:
 *
 * - Components receiving properties.
 * - Elements receiving configuration.
 * - Dynamic UI generation.
 * - Serialization workflows.
 *
 * Hydration is separated from construction to allow objects to be
 * created first and configured later.
 *
 * @package RedSky\Html\Contracts
 */
interface Hydratable
{
    /**
     * Hydrates the object using provided data.
     *
     * @param array<string, mixed> $data Data to hydrate.
     *
     * @return static
     */
    public function hydrate(
        array $data
    ): static;


    /**
     * Returns the hydrated state.
     *
     * @return array<string, mixed>
     */
    public function getHydratedData(): array;


    /**
     * Determines whether the object has been hydrated.
     *
     * @return bool
     */
    public function isHydrated(): bool;


    /**
     * Removes hydrated data.
     *
     * @return static
     */
    public function dehydrate(): static;


    /**
     * Returns a hydrated value.
     *
     * @param string $key     Data key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function hydratedValue(
        string $key,
        mixed $default = null
    ): mixed;
}
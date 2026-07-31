<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for named objects.
 *
 * Named objects expose a unique human-readable name that can be used
 * for identification, registration, debugging, documentation, or
 * dynamic resolution.
 *
 * This abstraction is useful for:
 *
 * - Components.
 * - Elements.
 * - Attributes.
 * - Renderers.
 * - Factories.
 * - Plugins.
 *
 * The name is independent from identifiers such as database keys or
 * HTML attributes.
 *
 * @package RedSky\Html\Contracts
 */
interface Named
{
    /**
     * Returns the object name.
     *
     * @return string
     */
    public function name(): string;


    /**
     * Changes the object name.
     *
     * @param string $name New object name.
     *
     * @return static
     */
    public function setName(
        string $name
    ): static;


    /**
     * Determines whether the object has a name.
     *
     * @return bool
     */
    public function hasName(): bool;


    /**
     * Returns a normalized version of the name.
     *
     * This can be used for comparisons, registries, or lookups.
     *
     * @return string
     */
    public function normalizedName(): string;


    /**
     * Compares the object name with another value.
     *
     * @param string $name Name to compare.
     *
     * @return bool
     */
    public function matchesName(
        string $name
    ): bool;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support a name identifier.
 *
 * Implementations of this interface can manage a logical name value
 * associated with an HTML element or component.
 *
 * The name value can be used for:
 *
 * - Form element naming.
 * - Component identification.
 * - Data binding.
 * - Serialization.
 * - Documentation metadata.
 *
 * @package RedSky\Html\Contracts
 */
interface HasName
{
    /**
     * Returns the current name value.
     *
     * @return string|null
     */
    public function name(): ?string;


    /**
     * Sets the name value.
     *
     * @param string $name Name value.
     *
     * @return static
     */
    public function setName(
        string $name
    ): static;


    /**
     * Determines whether a name exists.
     *
     * @return bool
     */
    public function hasName(): bool;


    /**
     * Removes the current name value.
     *
     * @return static
     */
    public function removeName(): static;


    /**
     * Returns the resolved name value.
     *
     * Implementations may generate a name when one does not exist.
     *
     * @return string
     */
    public function resolveName(): string;
}
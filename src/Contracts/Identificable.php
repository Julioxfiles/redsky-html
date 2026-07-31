<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for identifiable objects.
 *
 * Identifiable objects expose a unique identifier that can be used
 * to reference, locate, or distinguish instances.
 *
 * This abstraction is useful for:
 *
 * - HTML elements.
 * - Components.
 * - Registries.
 * - Render nodes.
 * - Documentation metadata.
 *
 * The identifier is intentionally abstract and does not require it
 * to represent an HTML id attribute.
 *
 * @package RedSky\Html\Contracts
 */
interface Identifiable
{
    /**
     * Returns the object identifier.
     *
     * @return string|null
     */
    public function identifier(): ?string;


    /**
     * Assigns an identifier.
     *
     * @param string $identifier Identifier value.
     *
     * @return static
     */
    public function setIdentifier(
        string $identifier
    ): static;


    /**
     * Determines whether an identifier exists.
     *
     * @return bool
     */
    public function hasIdentifier(): bool;


    /**
     * Removes the current identifier.
     *
     * @return static
     */
    public function removeIdentifier(): static;


    /**
     * Generates an identifier if one does not exist.
     *
     * @return string
     */
    public function generateIdentifier(): string;
}
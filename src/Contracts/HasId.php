<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML identifiers.
 *
 * Implementations of this interface can manage the unique HTML
 * id attribute of an element or component.
 *
 * The identifier can be used by:
 *
 * - Browser DOM operations.
 * - JavaScript integrations.
 * - Accessibility relationships.
 * - Component references.
 * - Automated testing tools.
 *
 * @package RedSky\Html\Contracts
 */
interface HasId
{
    /**
     * Returns the current HTML identifier.
     *
     * @return string|null
     */
    public function id(): ?string;


    /**
     * Sets the HTML identifier.
     *
     * @param string $id HTML identifier value.
     *
     * @return static
     */
    public function setId(
        string $id
    ): static;


    /**
     * Determines whether an identifier exists.
     *
     * @return bool
     */
    public function hasId(): bool;


    /**
     * Removes the current identifier.
     *
     * @return static
     */
    public function removeId(): static;


    /**
     * Returns the identifier or a generated value.
     *
     * Implementations may generate an identifier when none exists.
     *
     * @return string
     */
    public function resolveId(): string;
}
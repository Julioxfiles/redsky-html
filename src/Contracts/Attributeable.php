<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can receive HTML attributes.
 *
 * This contract represents the ability of an object to expose
 * attribute manipulation behavior.
 *
 * Implementations may include:
 *
 * - HTML elements.
 * - Components.
 * - Attribute containers.
 * - Renderable nodes.
 *
 * The purpose of this abstraction is to allow any object inside the
 * RedSky HTML ecosystem to support attributes without requiring a
 * specific implementation.
 *
 * @package RedSky\Html\Contracts
 */
interface Attributeable
{
    /**
     * Adds or replaces an attribute.
     *
     * @param string $name Attribute name.
     * @param mixed  $value Attribute value.
     *
     * @return static
     */
    public function setAttribute(
        string $name,
        mixed $value
    ): static;


    /**
     * Returns an attribute value.
     *
     * @param string $name Attribute name.
     *
     * @return mixed
     */
    public function getAttribute(
        string $name
    ): mixed;


    /**
     * Determines whether an attribute exists.
     *
     * @param string $name Attribute name.
     *
     * @return bool
     */
    public function hasAttribute(
        string $name
    ): bool;


    /**
     * Removes an attribute.
     *
     * @param string $name Attribute name.
     *
     * @return static
     */
    public function removeAttribute(
        string $name
    ): static;


    /**
     * Returns all attributes.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array;


    /**
     * Clears all attributes.
     *
     * @return static
     */
    public function clearAttributes(): static;
}
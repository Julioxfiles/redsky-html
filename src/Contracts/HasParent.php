<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can have a parent object.
 *
 * Parent relationships allow objects to participate in hierarchical
 * structures such as HTML trees, component trees, and document nodes.
 *
 * This abstraction is useful for:
 *
 * - Elements.
 * - Components.
 * - Fragments.
 * - Layout containers.
 * - Render nodes.
 *
 * The parent relationship allows traversal from a child object toward
 * its containing object.
 *
 * @package RedSky\Html\Contracts
 */
interface HasParent
{
    /**
     * Returns the parent object.
     *
     * @return object|null
     */
    public function parent(): ?object;


    /**
     * Assigns a parent object.
     *
     * @param object $parent Parent object.
     *
     * @return static
     */
    public function setParent(
        object $parent
    ): static;


    /**
     * Determines whether a parent exists.
     *
     * @return bool
     */
    public function hasParent(): bool;


    /**
     * Removes the current parent reference.
     *
     * @return static
     */
    public function removeParent(): static;


    /**
     * Returns the parent type.
     *
     * @return string|null
     */
    public function parentType(): ?string;


    /**
     * Determines whether the object belongs to a parent type.
     *
     * @param string $type Parent class or identifier.
     *
     * @return bool
     */
    public function isChildOf(
        string $type
    ): bool;
}
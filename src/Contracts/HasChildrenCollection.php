<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that manage child collections.
 *
 * This contract represents objects that contain multiple children
 * managed through a collection abstraction.
 *
 * It is more specialized than Childable because it assumes children
 * are handled as a structured collection instead of a simple array.
 *
 * Useful for:
 *
 * - HTML element trees.
 * - Component hierarchies.
 * - Document structures.
 * - Render nodes.
 *
 * @package RedSky\Html\Contracts
 */
interface HasChildrenCollection
{
    /**
     * Returns the children collection.
     *
     * @return object
     */
    public function childrenCollection(): object;


    /**
     * Assigns a children collection.
     *
     * @param object $collection Children collection.
     *
     * @return static
     */
    public function setChildrenCollection(
        object $collection
    ): static;


    /**
     * Adds a child to the collection.
     *
     * @param mixed $child Child object.
     *
     * @return static
     */
    public function addChild(
        mixed $child
    ): static;


    /**
     * Removes a child from the collection.
     *
     * @param mixed $child Child object.
     *
     * @return static
     */
    public function removeChild(
        mixed $child
    ): static;


    /**
     * Determines whether children exist.
     *
     * @return bool
     */
    public function hasChildren(): bool;


    /**
     * Returns the number of children.
     *
     * @return int
     */
    public function childrenCount(): int;


    /**
     * Clears all children.
     *
     * @return static
     */
    public function clearChildren(): static;
}
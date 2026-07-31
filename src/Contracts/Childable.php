<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can contain child nodes.
 *
 * This contract represents objects that participate in the RedSky HTML
 * tree structure and are capable of storing hierarchical children.
 *
 * Child objects may include:
 *
 * - Elements.
 * - Components.
 * - Text nodes.
 * - Fragments.
 * - Renderable objects.
 *
 * This abstraction is separated from HasChildren because it focuses
 * on the capability of receiving and managing children rather than
 * only exposing child information.
 *
 * @package RedSky\Html\Contracts
 */
interface Childable
{
    /**
     * Adds a child node.
     *
     * @param mixed $child Child node.
     *
     * @return static
     */
    public function appendChild(
        mixed $child
    ): static;


    /**
     * Adds a child node at the beginning.
     *
     * @param mixed $child Child node.
     *
     * @return static
     */
    public function prependChild(
        mixed $child
    ): static;


    /**
     * Removes a child node.
     *
     * @param mixed $child Child node.
     *
     * @return static
     */
    public function removeChild(
        mixed $child
    ): static;


    /**
     * Removes a child by index.
     *
     * @param int $index Child index.
     *
     * @return static
     */
    public function removeChildAt(
        int $index
    ): static;


    /**
     * Returns all children.
     *
     * @return array<int, mixed>
     */
    public function getChildren(): array;


    /**
     * Determines whether children exist.
     *
     * @return bool
     */
    public function hasChildNodes(): bool;


    /**
     * Removes all children.
     *
     * @return static
     */
    public function removeChildren(): static;


    /**
     * Returns the number of children.
     *
     * @return int
     */
    public function childrenLength(): int;
}
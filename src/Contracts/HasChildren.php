<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can contain child nodes.
 *
 * This contract is implemented by HTML elements and components
 * that support hierarchical structures.
 *
 * Child nodes may represent:
 *
 * - HTML elements.
 * - Components.
 * - Text nodes.
 * - Renderable objects.
 * - Document fragments.
 *
 * This allows RedSky HTML to build complex document trees while
 * maintaining a consistent rendering architecture.
 *
 * @package RedSky\Html\Contracts
 */
interface HasChildren
{
    /**
     * Returns all child nodes.
     *
     * @return array<int, mixed>
     */
    public function children(): array;


    /**
     * Determines whether the object contains child nodes.
     *
     * @return bool
     */
    public function hasChildren(): bool;


    /**
     * Adds a child node.
     *
     * @param mixed $child Child node.
     *
     * @return static
     */
    public function addChild(
        mixed $child
    ): static;


    /**
     * Adds multiple child nodes.
     *
     * @param array<int, mixed> $children Child nodes.
     *
     * @return static
     */
    public function addChildren(
        array $children
    ): static;


    /**
     * Removes a child node.
     *
     * @param mixed $child Child node to remove.
     *
     * @return static
     */
    public function removeChild(
        mixed $child
    ): static;


    /**
     * Removes all child nodes.
     *
     * @return static
     */
    public function clearChildren(): static;


    /**
     * Returns the number of child nodes.
     *
     * @return int
     */
    public function childrenCount(): int;
}
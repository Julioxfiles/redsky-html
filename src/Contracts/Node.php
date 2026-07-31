<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that represent HTML tree nodes.
 *
 * A node is any object that can participate in the RedSky HTML
 * document structure.
 *
 * Possible node implementations include:
 *
 * - Elements.
 * - Components.
 * - Text nodes.
 * - Comments.
 * - Fragments.
 *
 * This abstraction allows the renderer to work with different types
 * of HTML objects using a unified interface.
 *
 * @package RedSky\Html\Contracts
 */
interface Node extends Renderable
{
    /**
     * Returns the parent node.
     *
     * @return Node|null
     */
    public function parent(): ?Node;


    /**
     * Assigns a parent node.
     *
     * @param Node|null $parent Parent node.
     *
     * @return static
     */
    public function setParent(
        ?Node $parent
    ): static;


    /**
     * Determines whether the node has a parent.
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
     * Determines whether the node can contain children.
     *
     * @return bool
     */
    public function supportsChildren(): bool;


    /**
     * Returns the node type identifier.
     *
     * Example:
     *
     * element
     * component
     * text
     *
     * @return string
     */
    public function nodeType(): string;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML elements.
 *
 * An element represents a basic HTML node capable of defining:
 *
 * - A tag name.
 * - Attributes.
 * - Child nodes.
 * - Content.
 * - Rendering behavior.
 *
 * This contract establishes the foundation for the RedSky HTML
 * element tree system.
 *
 * Elements are lower-level building blocks that components may use
 * internally to generate their final HTML representation.
 *
 * Example:
 *
 * $div = new Element('div');
 *
 * @package RedSky\Html\Contracts
 */
interface Element extends Renderable
{
    /**
     * Returns the HTML tag name.
     *
     * @return string
     */
    public function tag(): string;


    /**
     * Returns the element children.
     *
     * @return array<int, mixed>
     */
    public function children(): array;


    /**
     * Returns the element content.
     *
     * @return mixed
     */
    public function content(): mixed;


    /**
     * Returns the element attributes.
     *
     * @return array<string, mixed>
     */
    public function attributes(): array;


    /**
     * Adds a child node.
     *
     * @param mixed $child Child element or content.
     *
     * @return static
     */
    public function addChild(
        mixed $child
    ): static;


    /**
     * Sets the element content.
     *
     * @param mixed $content Element content.
     *
     * @return static
     */
    public function setContent(
        mixed $content
    ): static;


    /**
     * Adds or replaces an attribute.
     *
     * @param string $name Attribute name.
     * @param mixed  $value Attribute value.
     *
     * @return static
     */
    public function attribute(
        string $name,
        mixed $value
    ): static;
}
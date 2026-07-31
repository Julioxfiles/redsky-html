<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that expose an HTML tag.
 *
 * Taggable objects represent structures that are associated with an
 * HTML element tag.
 *
 * This abstraction is useful for:
 *
 * - Elements.
 * - Components with root tags.
 * - Custom HTML nodes.
 * - Renderable wrappers.
 *
 * The contract allows tag manipulation without coupling consumers
 * to a concrete element implementation.
 *
 * Examples:
 *
 * div
 * span
 * button
 * section
 *
 * @package RedSky\Html\Contracts
 */
interface Taggable
{
    /**
     * Returns the HTML tag name.
     *
     * @return string
     */
    public function tag(): string;


    /**
     * Changes the HTML tag.
     *
     * @param string $tag HTML tag name.
     *
     * @return static
     */
    public function setTag(
        string $tag
    ): static;


    /**
     * Determines whether the object has a tag.
     *
     * @return bool
     */
    public function hasTag(): bool;


    /**
     * Returns the normalized tag name.
     *
     * @return string
     */
    public function normalizedTag(): string;


    /**
     * Determines whether the object uses a specific tag.
     *
     * @param string $tag Tag name.
     *
     * @return bool
     */
    public function isTag(
        string $tag
    ): bool;


    /**
     * Returns whether the tag is a void HTML element.
     *
     * Examples:
     *
     * input
     * img
     * br
     *
     * @return bool
     */
    public function isVoidTag(): bool;
}
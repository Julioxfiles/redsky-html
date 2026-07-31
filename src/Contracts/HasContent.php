<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support textual or HTML content.
 *
 * Implementations of this interface can store, retrieve, replace,
 * and determine the existence of content.
 *
 * This contract is used by HTML elements and components that may contain:
 *
 * - Plain text.
 * - HTML fragments.
 * - Renderable objects.
 * - Generated content.
 *
 * @package RedSky\Html\Contracts
 */
interface HasContent
{
    /**
     * Returns the current content.
     *
     * @return mixed
     */
    public function content(): mixed;


    /**
     * Sets the object content.
     *
     * @param mixed $content Content value.
     *
     * @return static
     */
    public function setContent(
        mixed $content
    ): static;


    /**
     * Determines whether content exists.
     *
     * @return bool
     */
    public function hasContent(): bool;


    /**
     * Clears the current content.
     *
     * @return static
     */
    public function clearContent(): static;


    /**
     * Appends additional content.
     *
     * @param mixed $content Content value.
     *
     * @return static
     */
    public function appendContent(
        mixed $content
    ): static;


    /**
     * Prepends content before the existing content.
     *
     * @param mixed $content Content value.
     *
     * @return static
     */
    public function prependContent(
        mixed $content
    ): static;
}
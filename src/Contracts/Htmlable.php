<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be converted into HTML.
 *
 * This contract represents objects that provide a safe HTML
 * representation of themselves.
 *
 * It is intentionally separated from Renderable because some objects
 * may only expose HTML output without participating in the complete
 * rendering lifecycle.
 *
 * Common implementations:
 *
 * - Elements.
 * - Components.
 * - HTML fragments.
 * - Attribute collections.
 * - Content nodes.
 *
 * Example:
 *
 * echo $button->toHtml();
 *
 * @package RedSky\Html\Contracts
 */
interface Htmlable
{
    /**
     * Returns the HTML representation of the object.
     *
     * @return string
     */
    public function toHtml(): string;


    /**
     * Determines whether the generated HTML is safe.
     *
     * Implementations may use this method to indicate that the
     * returned HTML should not be escaped.
     *
     * @return bool
     */
    public function isSafeHtml(): bool;


    /**
     * Returns the length of the generated HTML.
     *
     * @return int
     */
    public function htmlLength(): int;


    /**
     * Converts the object into a string representation.
     *
     * @return string
     */
    public function __toString(): string;
}
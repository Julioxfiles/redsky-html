<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects capable of rendering HTML output.
 *
 * Implementations of this interface represent any object that can
 * transform its internal state into a valid HTML string.
 *
 * This contract is the foundation for RedSky HTML elements, components,
 * templates, and future rendering pipelines.
 *
 * Objects implementing this interface can be consumed by:
 *
 * - HTML builders.
 * - Component renderers.
 * - View engines.
 * - Documentation generators.
 * - Testing utilities.
 *
 * Example:
 *
 * class Button implements Renderable
 * {
 *     public function render(): string
 *     {
 *         return '<button>Save</button>';
 *     }
 * }
 *
 * @package RedSky\Html\Contracts
 */
interface Renderable
{
    /**
     * Generates the HTML representation of the object.
     *
     * The returned string must contain valid HTML markup
     * according to the responsibility of the implementation.
     *
     * @return string Rendered HTML output.
     */
    public function render(): string;
}
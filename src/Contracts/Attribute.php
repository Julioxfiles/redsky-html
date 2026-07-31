<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML attribute objects.
 *
 * An attribute represents a single HTML attribute definition
 * containing a name and an associated value.
 *
 * This abstraction allows RedSky HTML to treat attributes as
 * independent objects instead of simple key-value pairs.
 *
 * Attributes can later support:
 *
 * - Validation.
 * - Type conversion.
 * - HTML escaping.
 * - Documentation metadata.
 * - Attribute merging.
 * - Dynamic rendering.
 *
 * Example:
 *
 * $attribute = new Attribute('class', 'btn');
 *
 * @package RedSky\Html\Contracts
 */
interface Attribute extends Htmlable
{
    /**
     * Returns the attribute name.
     *
     * Example:
     *
     * class
     * id
     * data-value
     *
     * @return string
     */
    public function name(): string;


    /**
     * Returns the attribute value.
     *
     * @return mixed
     */
    public function value(): mixed;


    /**
     * Sets the attribute value.
     *
     * @param mixed $value Attribute value.
     *
     * @return static
     */
    public function setValue(
        mixed $value
    ): static;


    /**
     * Determines whether the attribute has a value.
     *
     * @return bool
     */
    public function hasValue(): bool;


    /**
     * Determines whether the attribute is boolean.
     *
     * Boolean attributes are rendered without a value.
     *
     * Example:
     *
     * disabled
     *
     * @return bool
     */
    public function isBoolean(): bool;


    /**
     * Determines whether the attribute should be escaped.
     *
     * @return bool
     */
    public function shouldEscape(): bool;


    /**
     * Enables or disables escaping.
     *
     * @param bool $escape Escape state.
     *
     * @return static
     */
    public function escape(
        bool $escape = true
    ): static;


    /**
     * Returns the rendered HTML attribute.
     *
     * Example:
     *
     * class="btn"
     *
     * @return string
     */
    public function render(): string;
}
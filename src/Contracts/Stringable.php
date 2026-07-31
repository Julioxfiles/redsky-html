<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can provide a string representation.
 *
 * This interface is intended for RedSky HTML objects that can be converted
 * directly into a string representation.
 *
 * Implementations are commonly used by:
 *
 * - HTML elements.
 * - Components.
 * - Attribute collections.
 * - Renderable objects.
 *
 * The purpose of this contract is to provide an explicit internal
 * abstraction instead of relying only on PHP's native __toString()
 * behavior.
 *
 * Example:
 *
 * class Element implements Stringable
 * {
 *     public function toString(): string
 *     {
 *         return '<div></div>';
 *     }
 * }
 *
 * @package RedSky\Html\Contracts
 */
interface Stringable
{
    /**
     * Converts the object into its string representation.
     *
     * The returned value should represent the complete textual
     * representation of the object according to its responsibility.
     *
     * @return string
     */
    public function toString(): string;
}
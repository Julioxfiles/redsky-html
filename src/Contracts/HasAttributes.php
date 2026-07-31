<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML attributes.
 *
 * Implementations of this interface can store, manage, retrieve,
 * and render HTML attributes associated with an element or component.
 *
 * This contract allows RedSky HTML elements and components to share
 * a common attribute management system independently of their concrete
 * implementation.
 *
 * Example:
 *
 * class Element implements HasAttributes
 * {
 *     public function attributes(): array
 *     {
 *         return [
 *             'class' => 'button'
 *         ];
 *     }
 * }
 *
 * @package RedSky\Html\Contracts
 */
interface HasAttributes
{
    /**
     * Returns all attributes assigned to the object.
     *
     * @return array<string, mixed>
     */
    public function attributes(): array;


    /**
     * Determines whether the object contains attributes.
     *
     * @return bool
     */
    public function hasAttributes(): bool;


    /**
     * Adds or replaces an attribute value.
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


    /**
     * Removes an attribute by name.
     *
     * @param string $name Attribute name.
     *
     * @return static
     */
    public function removeAttribute(
        string $name
    ): static;


    /**
     * Determines whether an attribute exists.
     *
     * @param string $name Attribute name.
     *
     * @return bool
     */
    public function hasAttribute(
        string $name
    ): bool;


    /**
     * Returns an attribute value.
     *
     * @param string $name Attribute name.
     *
     * @return mixed
     */
    public function getAttribute(
        string $name
    ): mixed;
}
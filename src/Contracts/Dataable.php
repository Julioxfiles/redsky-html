<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support data attributes.
 *
 * Dataable objects can manage custom HTML data-* attributes in a
 * structured way.
 *
 * This abstraction allows components and elements to expose dynamic
 * metadata to the client side without depending on JavaScript
 * frameworks.
 *
 * Examples:
 *
 * data-id
 * data-state
 * data-action
 * data-component
 *
 * Useful for:
 *
 * - Interactive components.
 * - JavaScript integrations.
 * - UI state management.
 * - Client-side communication.
 *
 * @package RedSky\Html\Contracts
 */
interface Dataable
{
    /**
     * Returns all data attributes.
     *
     * @return array<string, mixed>
     */
    public function data(): array;


    /**
     * Sets a data attribute value.
     *
     * @param string $key   Data attribute name.
     * @param mixed  $value Data attribute value.
     *
     * @return static
     */
    public function setData(
        string $key,
        mixed $value
    ): static;


    /**
     * Returns a data attribute value.
     *
     * @param string $key     Data attribute name.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getData(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether a data attribute exists.
     *
     * @param string $key Data attribute name.
     *
     * @return bool
     */
    public function hasData(
        string $key
    ): bool;


    /**
     * Removes a data attribute.
     *
     * @param string $key Data attribute name.
     *
     * @return static
     */
    public function removeData(
        string $key
    ): static;


    /**
     * Clears all data attributes.
     *
     * @return static
     */
    public function clearData(): static;


    /**
     * Renders data attributes as HTML.
     *
     * @return string
     */
    public function renderData(): string;
}
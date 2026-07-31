<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML data attributes.
 *
 * Implementations of this interface can manage custom HTML5 data
 * attributes using a dedicated API.
 *
 * Data attributes are commonly used for:
 *
 * - JavaScript integrations.
 * - Frontend component communication.
 * - DOM state management.
 * - Custom metadata storage.
 *
 * Example:
 *
 * $element
 *     ->setData('toggle', 'modal')
 *     ->setData('target', '#dialog');
 *
 * @package RedSky\Html\Contracts
 */
interface HasData
{
    /**
     * Returns all data attributes.
     *
     * Keys should represent data attribute names without
     * the "data-" prefix.
     *
     * Example:
     *
     * [
     *     'toggle' => 'modal'
     * ]
     *
     * @return array<string, mixed>
     */
    public function data(): array;


    /**
     * Determines whether data attributes exist.
     *
     * @return bool
     */
    public function hasData(): bool;


    /**
     * Adds or replaces a data attribute.
     *
     * @param string $key   Data attribute key.
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
     * @param string $key Data attribute key.
     *
     * @return mixed
     */
    public function getData(
        string $key
    ): mixed;


    /**
     * Determines whether a data attribute exists.
     *
     * @param string $key Data attribute key.
     *
     * @return bool
     */
    public function hasDataKey(
        string $key
    ): bool;


    /**
     * Removes a data attribute.
     *
     * @param string $key Data attribute key.
     *
     * @return static
     */
    public function removeData(
        string $key
    ): static;


    /**
     * Removes all data attributes.
     *
     * @return static
     */
    public function clearData(): static;


    /**
     * Returns all data attributes formatted for HTML output.
     *
     * Example:
     *
     * data-toggle="modal" data-target="#dialog"
     *
     * @return string
     */
    public function dataString(): string;
}
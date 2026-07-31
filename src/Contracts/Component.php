<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for RedSky HTML components.
 *
 * Components are reusable UI building blocks responsible for
 * encapsulating structure, configuration, attributes, and rendering
 * behavior.
 *
 * This contract provides the minimum required behavior for any
 * component implementation regardless of the UI library being used.
 *
 * Components may later be consumed by:
 *
 * - redsky-view.
 * - redsky-ui.
 * - Bootstrap adapters.
 * - Tailwind adapters.
 * - Documentation generators.
 * - Component registries.
 *
 * Example:
 *
 * class Button implements Component
 * {
 *     public function render(): string
 *     {
 *         return '<button>Save</button>';
 *     }
 * }
 *
 * @package RedSky\Html\Contracts
 */
interface Component extends Renderable
{
    /**
     * Returns the component name.
     *
     * The name should uniquely identify the component inside
     * the RedSky HTML ecosystem.
     *
     * Example:
     *
     * Button
     * Card
     * Modal
     *
     * @return string
     */
    public function name(): string;


    /**
     * Returns component properties.
     *
     * Properties represent component configuration exposed
     * to consumers.
     *
     * @return array<string, mixed>
     */
    public function properties(): array;


    /**
     * Determines whether the component has properties.
     *
     * @return bool
     */
    public function hasProperties(): bool;


    /**
     * Sets a component property.
     *
     * @param string $name  Property name.
     * @param mixed  $value Property value.
     *
     * @return static
     */
    public function setProperty(
        string $name,
        mixed $value
    ): static;


    /**
     * Returns a component property value.
     *
     * @param string $name Property name.
     *
     * @return mixed
     */
    public function getProperty(
        string $name
    ): mixed;


    /**
     * Determines whether a component property exists.
     *
     * @param string $name Property name.
     *
     * @return bool
     */
    public function hasProperty(
        string $name
    ): bool;
}
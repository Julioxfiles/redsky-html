<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML events.
 *
 * Eventable objects can manage client-side event handlers associated
 * with HTML output.
 *
 * This abstraction allows RedSky HTML objects to define events without
 * coupling the implementation to a specific JavaScript framework.
 *
 * Supported future integrations:
 *
 * - Vanilla JavaScript.
 * - Alpine.js.
 * - Livewire-like systems.
 * - Custom reactive layers.
 *
 * Examples:
 *
 * click
 * submit
 * change
 * keydown
 *
 * @package RedSky\Html\Contracts
 */
interface Eventable
{
    /**
     * Adds an event handler.
     *
     * @param string $event    Event name.
     * @param string $handler  Event handler.
     *
     * @return static
     */
    public function on(
        string $event,
        string $handler
    ): static;


    /**
     * Removes an event handler.
     *
     * @param string $event Event name.
     *
     * @return static
     */
    public function off(
        string $event
    ): static;


    /**
     * Determines whether an event exists.
     *
     * @param string $event Event name.
     *
     * @return bool
     */
    public function hasEvent(
        string $event
    ): bool;


    /**
     * Returns all registered events.
     *
     * @return array<string, string>
     */
    public function events(): array;


    /**
     * Clears all events.
     *
     * @return static
     */
    public function clearEvents(): static;


    /**
     * Renders events as HTML attributes.
     *
     * @return string
     */
    public function renderEvents(): string;
}
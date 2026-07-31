<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML events.
 *
 * Implementations of this interface can manage client-side event
 * handlers associated with HTML elements or components.
 *
 * Event metadata can be used for:
 *
 * - JavaScript event bindings.
 * - Component interaction systems.
 * - Frontend integrations.
 * - Automatic documentation generation.
 *
 * Example:
 *
 * $button
 *     ->setEvent('click', 'submitForm');
 *
 * @package RedSky\Html\Contracts
 */
interface HasEvents
{
    /**
     * Returns all registered events.
     *
     * Keys represent event names and values represent handlers
     * or event definitions.
     *
     * @return array<string, mixed>
     */
    public function events(): array;


    /**
     * Determines whether events exist.
     *
     * @return bool
     */
    public function hasEvents(): bool;


    /**
     * Adds or replaces an event handler.
     *
     * @param string $event   Event name.
     * @param mixed  $handler Event handler definition.
     *
     * @return static
     */
    public function setEvent(
        string $event,
        mixed $handler
    ): static;


    /**
     * Returns an event handler.
     *
     * @param string $event Event name.
     *
     * @return mixed
     */
    public function getEvent(
        string $event
    ): mixed;


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
     * Removes an event handler.
     *
     * @param string $event Event name.
     *
     * @return static
     */
    public function removeEvent(
        string $event
    ): static;


    /**
     * Removes all event handlers.
     *
     * @return static
     */
    public function clearEvents(): static;


    /**
     * Returns all events formatted for HTML output.
     *
     * Example:
     *
     * onclick="save()"
     *
     * @return string
     */
    public function eventsString(): string;
}
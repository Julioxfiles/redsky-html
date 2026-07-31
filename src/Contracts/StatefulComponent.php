<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for stateful HTML components.
 *
 * Stateful components maintain internal data that can affect their
 * rendering output during their lifecycle.
 *
 * This abstraction prepares RedSky HTML for advanced component
 * architectures such as:
 *
 * - Reactive components.
 * - Live updates.
 * - Server-side component state.
 * - Partial rendering.
 * - Event-driven interfaces.
 *
 * Stateful components are intentionally independent from any specific
 * implementation such as Livewire or JavaScript frameworks.
 *
 * @package RedSky\Html\Contracts
 */
interface StatefulComponent extends Component, Stateful
{
    /**
     * Initializes the component state.
     *
     * @return static
     */
    public function initializeState(): static;


    /**
     * Updates component state.
     *
     * @param array<string, mixed> $state State changes.
     *
     * @return static
     */
    public function updateState(
        array $state
    ): static;


    /**
     * Determines whether the component state has changed.
     *
     * @return bool
     */
    public function hasStateChanges(): bool;


    /**
     * Returns the component state changes.
     *
     * @return array<string, mixed>
     */
    public function stateChanges(): array;


    /**
     * Clears tracked state changes.
     *
     * @return static
     */
    public function clearStateChanges(): static;
}
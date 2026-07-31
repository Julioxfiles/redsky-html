<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that maintain internal state.
 *
 * Stateful objects can store, retrieve, update, and remove runtime
 * information during their lifecycle.
 *
 * This abstraction is useful for future RedSky HTML capabilities such as:
 *
 * - Interactive components.
 * - Reactive rendering.
 * - Component lifecycle management.
 * - Server-side state handling.
 * - UI synchronization systems.
 *
 * The contract intentionally does not define where state is stored,
 * allowing different implementations.
 *
 * @package RedSky\Html\Contracts
 */
interface Stateful
{
    /**
     * Returns the complete state.
     *
     * @return array<string, mixed>
     */
    public function state(): array;


    /**
     * Sets multiple state values.
     *
     * @param array<string, mixed> $state State values.
     *
     * @return static
     */
    public function setState(
        array $state
    ): static;


    /**
     * Sets a single state value.
     *
     * @param string $key   State key.
     * @param mixed  $value State value.
     *
     * @return static
     */
    public function setStateValue(
        string $key,
        mixed $value
    ): static;


    /**
     * Returns a state value.
     *
     * @param string $key     State key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getStateValue(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether a state value exists.
     *
     * @param string $key State key.
     *
     * @return bool
     */
    public function hasStateValue(
        string $key
    ): bool;


    /**
     * Removes a state value.
     *
     * @param string $key State key.
     *
     * @return static
     */
    public function removeStateValue(
        string $key
    ): static;


    /**
     * Clears all state values.
     *
     * @return static
     */
    public function clearState(): static;
}
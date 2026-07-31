<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for rendering contexts.
 *
 * A render context contains information and configuration required
 * during the HTML rendering process.
 *
 * The context allows renderers, elements, and components to share
 * rendering-related information without creating direct dependencies.
 *
 * A render context may contain:
 *
 * - Rendering options.
 * - Escaping rules.
 * - Current component information.
 * - Active UI library information.
 * - Environment configuration.
 *
 * This abstraction prepares RedSky HTML for advanced rendering
 * pipelines and integrations with redsky-view.
 *
 * @package RedSky\Html\Contracts
 */
interface RenderContext
{
    /**
     * Returns a context value.
     *
     * @param string $key     Context key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function get(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Stores a context value.
     *
     * @param string $key   Context key.
     * @param mixed  $value Context value.
     *
     * @return static
     */
    public function set(
        string $key,
        mixed $value
    ): static;


    /**
     * Determines whether a context value exists.
     *
     * @param string $key Context key.
     *
     * @return bool
     */
    public function has(
        string $key
    ): bool;


    /**
     * Removes a context value.
     *
     * @param string $key Context key.
     *
     * @return static
     */
    public function remove(
        string $key
    ): static;


    /**
     * Returns all context values.
     *
     * @return array<string, mixed>
     */
    public function all(): array;


    /**
     * Clears all context values.
     *
     * @return static
     */
    public function clear(): static;


    /**
     * Creates a child context inheriting current values.
     *
     * @return static
     */
    public function child(): static;
}
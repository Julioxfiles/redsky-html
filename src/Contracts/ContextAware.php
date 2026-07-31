<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can receive rendering context.
 *
 * Context-aware objects can access contextual information provided
 * during the rendering lifecycle.
 *
 * This abstraction allows RedSky HTML objects to receive external
 * information without creating direct dependencies.
 *
 * Useful for:
 *
 * - Components.
 * - Elements.
 * - Renderers.
 * - Templates.
 * - UI adapters.
 *
 * Examples of context data:
 *
 * - Current theme.
 * - Active UI library.
 * - Locale.
 * - Rendering options.
 * - Environment configuration.
 *
 * @package RedSky\Html\Contracts
 */
interface ContextAware
{
    /**
     * Returns the current render context.
     *
     * @return RenderContext|null
     */
    public function context(): ?RenderContext;


    /**
     * Assigns a render context.
     *
     * @param RenderContext $context Render context instance.
     *
     * @return static
     */
    public function setContext(
        RenderContext $context
    ): static;


    /**
     * Determines whether a context exists.
     *
     * @return bool
     */
    public function hasContext(): bool;


    /**
     * Removes the current context.
     *
     * @return static
     */
    public function removeContext(): static;


    /**
     * Creates a child object context.
     *
     * @return RenderContext|null
     */
    public function childContext(): ?RenderContext;
}
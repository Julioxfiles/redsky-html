<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for renderable components.
 *
 * This contract extends the basic Component abstraction by adding
 * explicit lifecycle methods required by components that participate
 * in a rendering pipeline.
 *
 * A renderable component may:
 *
 * - Prepare internal state.
 * - Resolve dependencies.
 * - Build child elements.
 * - Generate final HTML output.
 *
 * This interface is intended as the foundation for future RedSky HTML
 * component systems and integrations with:
 *
 * - redsky-view.
 * - redsky-ui.
 * - UI libraries.
 * - Server-side rendering pipelines.
 *
 * @package RedSky\Html\Contracts
 */
interface RenderableComponent extends Component
{
    /**
     * Initializes the component before rendering.
     *
     * Implementations may use this phase to prepare data,
     * resolve dependencies, or build internal structures.
     *
     * @return static
     */
    public function mount(): static;


    /**
     * Builds the component internal structure.
     *
     * This phase should prepare all required elements before
     * the final HTML generation.
     *
     * @return static
     */
    public function compose(): static;


    /**
     * Determines whether the component has been initialized.
     *
     * @return bool
     */
    public function isMounted(): bool;


    /**
     * Determines whether the component has been composed.
     *
     * @return bool
     */
    public function isComposed(): bool;


    /**
     * Returns the component HTML representation.
     *
     * @return string
     */
    public function toHtml(): string;
}
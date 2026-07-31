<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML renderers.
 *
 * A renderer is responsible for transforming RedSky HTML objects
 * into their final string representation.
 *
 * This abstraction allows the rendering process to remain independent
 * from specific implementations such as:
 *
 * - Native PHP rendering.
 * - Template engines.
 * - UI library adapters.
 * - Server-side rendering systems.
 *
 * Renderers may be used by elements, components, fragments, and
 * future RedSky HTML rendering pipelines.
 *
 * @package RedSky\Html\Contracts
 */
interface Renderer
{
    /**
     * Renders an object into HTML output.
     *
     * @param Renderable $object Object to render.
     *
     * @return string
     */
    public function render(
        Renderable $object
    ): string;


    /**
     * Determines whether the renderer supports an object.
     *
     * @param Renderable $object Object to inspect.
     *
     * @return bool
     */
    public function supports(
        Renderable $object
    ): bool;


    /**
     * Returns the renderer identifier.
     *
     * Example:
     *
     * native
     * bootstrap
     * tailwind
     *
     * @return string
     */
    public function name(): string;


    /**
     * Returns renderer configuration.
     *
     * @return array<string, mixed>
     */
    public function config(): array;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML rendering strategies.
 *
 * A rendering strategy determines how a RedSky HTML object should
 * be transformed into its final output.
 *
 * Different strategies may be implemented depending on the execution
 * environment or UI requirements.
 *
 * Possible strategies:
 *
 * - Native server-side rendering.
 * - Pretty HTML rendering.
 * - Minified HTML rendering.
 * - Debug rendering.
 * - UI library specific rendering.
 *
 * This abstraction allows rendering behavior to change without
 * modifying elements or components.
 *
 * @package RedSky\Html\Contracts
 */
interface RenderStrategy
{
    /**
     * Executes the rendering strategy.
     *
     * @param Renderable $object Object to render.
     * @param RenderContext|null $context Rendering context.
     *
     * @return string
     */
    public function execute(
        Renderable $object,
        ?RenderContext $context = null
    ): string;


    /**
     * Returns the strategy name.
     *
     * Example:
     *
     * default
     * pretty
     * compact
     *
     * @return string
     */
    public function name(): string;


    /**
     * Determines whether the strategy supports an object.
     *
     * @param Renderable $object Object to inspect.
     *
     * @return bool
     */
    public function supports(
        Renderable $object
    ): bool;


    /**
     * Returns strategy configuration.
     *
     * @return array<string, mixed>
     */
    public function options(): array;


    /**
     * Updates strategy configuration.
     *
     * @param array<string, mixed> $options Strategy options.
     *
     * @return static
     */
    public function configure(
        array $options
    ): static;
}
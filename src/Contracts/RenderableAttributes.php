<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects capable of rendering HTML attributes.
 *
 * Implementations of this interface transform internal attribute
 * collections into valid HTML attribute strings.
 *
 * This abstraction separates attribute storage from attribute output,
 * allowing different rendering strategies while maintaining a common
 * API across the RedSky HTML ecosystem.
 *
 * Example output:
 *
 * class="btn btn-primary" id="save-button"
 *
 * This contract will be used by:
 *
 * - Attribute bags.
 * - Elements.
 * - Components.
 * - Render pipelines.
 *
 * @package RedSky\Html\Contracts
 */
interface RenderableAttributes
{
    /**
     * Renders all attributes as HTML.
     *
     * @return string
     */
    public function renderAttributes(): string;


    /**
     * Determines whether attributes can be rendered.
     *
     * @return bool
     */
    public function canRenderAttributes(): bool;


    /**
     * Returns the number of renderable attributes.
     *
     * @return int
     */
    public function renderableAttributesCount(): int;
}
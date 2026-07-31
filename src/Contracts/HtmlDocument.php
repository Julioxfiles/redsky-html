<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML documents.
 *
 * An HTML document represents a complete document structure composed
 * of elements, components, metadata, and rendering configuration.
 *
 * This abstraction allows RedSky HTML to support full document
 * generation independently from any specific framework.
 *
 * A document may contain:
 *
 * - HTML root structure.
 * - Head metadata.
 * - Body content.
 * - Assets.
 * - Scripts.
 * - Styles.
 * - Rendering configuration.
 *
 * Future integrations:
 *
 * - redsky-view.
 * - Server-side rendering.
 * - Layout engines.
 * - Documentation generators.
 *
 * @package RedSky\Html\Contracts
 */
interface HtmlDocument extends Renderable
{
    /**
     * Returns the document title.
     *
     * @return string|null
     */
    public function title(): ?string;


    /**
     * Sets the document title.
     *
     * @param string $title Document title.
     *
     * @return static
     */
    public function setTitle(
        string $title
    ): static;


    /**
     * Adds a document head element.
     *
     * @param mixed $element Head element.
     *
     * @return static
     */
    public function addHead(
        mixed $element
    ): static;


    /**
     * Adds a body element.
     *
     * @param mixed $element Body element.
     *
     * @return static
     */
    public function addBody(
        mixed $element
    ): static;


    /**
     * Returns head elements.
     *
     * @return array<int, mixed>
     */
    public function head(): array;


    /**
     * Returns body elements.
     *
     * @return array<int, mixed>
     */
    public function body(): array;


    /**
     * Adds a stylesheet reference.
     *
     * @param string $url Stylesheet URL.
     *
     * @return static
     */
    public function addStyleSheet(
        string $url
    ): static;


    /**
     * Adds a JavaScript reference.
     *
     * @param string $url Script URL.
     *
     * @return static
     */
    public function addScript(
        string $url
    ): static;


    /**
     * Returns document stylesheets.
     *
     * @return array<int, string>
     */
    public function stylesheets(): array;


    /**
     * Returns document scripts.
     *
     * @return array<int, string>
     */
    public function scripts(): array;


    /**
     * Returns the complete HTML document.
     *
     * @return string
     */
    public function html(): string;
}
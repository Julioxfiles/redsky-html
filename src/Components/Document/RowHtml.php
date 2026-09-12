<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Raw HTML component.
 *
 * Allows inserting custom HTML directly into the component tree.
 *
 * This component should be used when a piece of HTML does not
 * justify creating a dedicated RedSky component.
 *
 * Example:
 *
 * $html = new RawHtml(
 *     '<div class="message">Hello World</div>'
 * );
 *
 * echo $html;
 */
class RawHtml extends HtmlComponent
{
    /**
     * Raw HTML content.
     */
    protected string $html = '';


    /**
     * Creates a raw HTML component.
     *
     * @param string $html HTML content.
     */
    public function __construct(
        string $html = ''
    ) {
        $this->html = $html;
    }


    /**
     * Sets the raw HTML content.
     *
     * @param string $html HTML content.
     *
     * @return static
     */
    public function setHtml(
        string $html
    ): static {
        $this->html = $html;

        return $this;
    }


    /**
     * Renders the raw HTML content.
     *
     * @return string Rendered HTML.
     */
    public function render(): string
    {
        return $this->html;
    }
}
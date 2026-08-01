<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML link element.
 *
 * The link element defines relationships between
 * the current document and external resources.
 *
 * Common uses:
 *
 * - Stylesheets.
 * - Favicons.
 * - Preload resources.
 *
 * @package RedSky\Html\Elements
 */
class LinkElement extends HtmlElement
{
    /**
     * Creates a new link element.
     */
    public function __construct()
    {
        parent::__construct('link');
    }


    /**
     * Sets linked resource URL.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $this->setAttribute(
            'href',
            $href
        );

        return $this;
    }


    /**
     * Sets relationship type.
     *
     * @param string $rel
     *
     * @return static
     */
    public function rel(
        string $rel
    ): static {
        $this->setAttribute(
            'rel',
            $rel
        );

        return $this;
    }


    /**
     * Sets media target.
     *
     * @param string $media
     *
     * @return static
     */
    public function media(
        string $media
    ): static {
        $this->setAttribute(
            'media',
            $media
        );

        return $this;
    }


    /**
     * Sets MIME type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->setAttribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Renders link element.
     *
     * Link is an HTML void element.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '<' . $this->tag;

        if ($this->attributes()->canRenderAttributes()) {
            $html .= ' ' . $this->attributes()->renderAttributes();
        }

        $html .= '>';

        return $html;
    }
}
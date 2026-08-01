<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML image element.
 *
 * The img element embeds an image resource.
 *
 * @package RedSky\Html\Elements
 */
class ImageElement extends HtmlElement
{
    /**
     * Creates a new image element.
     */
    public function __construct()
    {
        parent::__construct('img');
    }


    /**
     * Sets image source.
     *
     * @param string $source
     *
     * @return static
     */
    public function src(
        string $source
    ): static {
        $this->setAttribute(
            'src',
            $source
        );

        return $this;
    }


    /**
     * Sets alternative text.
     *
     * @param string $alt
     *
     * @return static
     */
    public function alt(
        string $alt
    ): static {
        $this->setAttribute(
            'alt',
            $alt
        );

        return $this;
    }


    /**
     * Sets image width.
     *
     * @param int|string $width
     *
     * @return static
     */
    public function width(
        int|string $width
    ): static {
        $this->setAttribute(
            'width',
            $width
        );

        return $this;
    }


    /**
     * Sets image height.
     *
     * @param int|string $height
     *
     * @return static
     */
    public function height(
        int|string $height
    ): static {
        $this->setAttribute(
            'height',
            $height
        );

        return $this;
    }


    /**
     * Renders image element.
     *
     * Images are self-closing elements in HTML.
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
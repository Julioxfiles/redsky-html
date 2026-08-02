<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML svg element.
 *
 * The svg element defines a container for
 * Scalable Vector Graphics (SVG). It serves
 * as the root element of an SVG fragment
 * embedded within an HTML document.
 *
 * @package RedSky\Html\Elements
 */
class SvgElement extends HtmlElement
{
    /**
     * Creates a new svg element.
     */
    public function __construct()
    {
        parent::__construct('svg');
    }


    /**
     * Sets the width of the SVG viewport.
     *
     * @param string $width
     *
     * @return static
     */
    public function width(
        string $width
    ): static {
        $this->setAttribute(
            'width',
            $width
        );

        return $this;
    }


    /**
     * Sets the height of the SVG viewport.
     *
     * @param string $height
     *
     * @return static
     */
    public function height(
        string $height
    ): static {
        $this->setAttribute(
            'height',
            $height
        );

        return $this;
    }


    /**
     * Sets the SVG viewBox.
     *
     * @param string $viewBox
     *
     * @return static
     */
    public function viewBox(
        string $viewBox
    ): static {
        $this->setAttribute(
            'viewBox',
            $viewBox
        );

        return $this;
    }
}
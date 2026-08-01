<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML canvas element.
 *
 * The canvas element provides a drawable area
 * for graphics rendered with JavaScript.
 *
 * @package RedSky\Html\Elements
 */
class CanvasElement extends HtmlElement
{
    /**
     * Creates a new canvas element.
     */
    public function __construct()
    {
        parent::__construct('canvas');
    }


    /**
     * Sets canvas width.
     *
     * @param int $width
     *
     * @return static
     */
    public function width(
        int $width
    ): static {
        $this->setAttribute(
            'width',
            $width
        );

        return $this;
    }


    /**
     * Sets canvas height.
     *
     * @param int $height
     *
     * @return static
     */
    public function height(
        int $height
    ): static {
        $this->setAttribute(
            'height',
            $height
        );

        return $this;
    }
}
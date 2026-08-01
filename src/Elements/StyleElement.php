<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML style element.
 *
 * The style element contains CSS rules
 * or references stylesheet information.
 *
 * @package RedSky\Html\Elements
 */
class StyleElement extends HtmlElement
{
    /**
     * Creates a new style element.
     */
    public function __construct()
    {
        parent::__construct('style');
    }


    /**
     * Sets style media target.
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
     * Adds CSS content.
     *
     * @param string $css
     *
     * @return static
     */
    public function css(
        string $css
    ): static {
        $this->content($css);

        return $this;
    }
}
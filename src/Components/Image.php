<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML image component.
 *
 * The image component generates a semantic HTML
 * img element used to display images.
 *
 * This component is UI-library agnostic and does
 * not apply any default styling.
 *
 * @package RedSky\Html\Components
 */
class Image extends HtmlComponent
{
    /**
     * Creates a new image component.
     *
     * @param string|null $src Image source.
     * @param string|null $alt Alternative text.
     */
    public function __construct(
        ?string $src = null,
        ?string $alt = null
    ) {
        parent::__construct('img');

        $this->selfClosing = true;

        if ($src !== null) {
            $this->src($src);
        }

        if ($alt !== null) {
            $this->alt($alt);
        }
    }


    /**
     * Sets image source.
     *
     * @param string $src
     *
     * @return static
     */
    public function src(
        string $src
    ): static {
        $this->attribute(
            'src',
            $src
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
        $this->attribute(
            'alt',
            $alt
        );

        return $this;
    }


    /**
     * Sets image width.
     *
     * @param string $width
     *
     * @return static
     */
    public function width(
        string $width
    ): static {
        $this->attribute(
            'width',
            $width
        );

        return $this;
    }


    /**
     * Sets image height.
     *
     * @param string $height
     *
     * @return static
     */
    public function height(
        string $height
    ): static {
        $this->attribute(
            'height',
            $height
        );

        return $this;
    }
}
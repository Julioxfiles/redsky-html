<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML embed element.
 *
 * The embed element represents external content
 * or resources embedded into the document.
 *
 * Common uses:
 *
 * - PDF files.
 * - Plugins.
 * - External media.
 *
 * @package RedSky\Html\Elements
 */
class EmbedElement extends HtmlElement
{
    /**
     * Creates a new embed element.
     */
    public function __construct()
    {
        parent::__construct('embed');
    }


    /**
     * Sets embedded resource URL.
     *
     * @param string $src
     *
     * @return static
     */
    public function src(
        string $src
    ): static {
        $this->setAttribute(
            'src',
            $src
        );

        return $this;
    }


    /**
     * Sets embedded resource type.
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
     * Sets embed width.
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
     * Sets embed height.
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
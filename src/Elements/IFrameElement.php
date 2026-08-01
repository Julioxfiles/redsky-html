<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML iframe element.
 *
 * The iframe element embeds another HTML document
 * inside the current document.
 *
 * Common uses:
 *
 * - Embedded pages.
 * - Videos.
 * - Maps.
 * - External applications.
 *
 * @package RedSky\Html\Elements
 */
class IframeElement extends HtmlElement
{
    /**
     * Creates a new iframe element.
     */
    public function __construct()
    {
        parent::__construct('iframe');
    }


    /**
     * Sets embedded document URL.
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
     * Sets iframe name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->setAttribute(
            'name',
            $name
        );

        return $this;
    }


    /**
     * Sets iframe width.
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
     * Sets iframe height.
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


    /**
     * Sets iframe loading mode.
     *
     * @param string $loading
     *
     * @return static
     */
    public function loading(
        string $loading
    ): static {
        $this->setAttribute(
            'loading',
            $loading
        );

        return $this;
    }


    /**
     * Allows iframe permissions.
     *
     * @param string $allow
     *
     * @return static
     */
    public function allow(
        string $allow
    ): static {
        $this->setAttribute(
            'allow',
            $allow
        );

        return $this;
    }


    /**
     * Enables fullscreen mode.
     *
     * @param bool $fullscreen
     *
     * @return static
     */
    public function allowFullscreen(
        bool $fullscreen = true
    ): static {
        $this->setAttribute(
            'allowfullscreen',
            $fullscreen
        );

        return $this;
    }


    /**
     * Defines sandbox restrictions.
     *
     * @param string $sandbox
     *
     * @return static
     */
    public function sandbox(
        string $sandbox
    ): static {
        $this->setAttribute(
            'sandbox',
            $sandbox
        );

        return $this;
    }
}
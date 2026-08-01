<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML video element.
 *
 * The video element embeds video content
 * in a document.
 *
 * @package RedSky\Html\Elements
 */
class VideoElement extends HtmlElement
{
    /**
     * Creates a new video element.
     */
    public function __construct()
    {
        parent::__construct('video');
    }


    /**
     * Sets video source.
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
     * Sets video controls.
     *
     * @param bool $controls
     *
     * @return static
     */
    public function controls(
        bool $controls = true
    ): static {
        $this->setAttribute(
            'controls',
            $controls
        );

        return $this;
    }


    /**
     * Sets autoplay state.
     *
     * @param bool $autoplay
     *
     * @return static
     */
    public function autoplay(
        bool $autoplay = true
    ): static {
        $this->setAttribute(
            'autoplay',
            $autoplay
        );

        return $this;
    }


    /**
     * Sets loop state.
     *
     * @param bool $loop
     *
     * @return static
     */
    public function loop(
        bool $loop = true
    ): static {
        $this->setAttribute(
            'loop',
            $loop
        );

        return $this;
    }


    /**
     * Sets muted state.
     *
     * @param bool $muted
     *
     * @return static
     */
    public function muted(
        bool $muted = true
    ): static {
        $this->setAttribute(
            'muted',
            $muted
        );

        return $this;
    }


    /**
     * Sets video width.
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
     * Sets video height.
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
}
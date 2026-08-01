<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML audio element.
 *
 * The audio element embeds sound content
 * in a document.
 *
 * @package RedSky\Html\Elements
 */
class AudioElement extends HtmlElement
{
    /**
     * Creates a new audio element.
     */
    public function __construct()
    {
        parent::__construct('audio');
    }


    /**
     * Sets audio source.
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
     * Sets audio controls.
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
}
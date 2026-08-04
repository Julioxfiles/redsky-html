<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML audio component.
 *
 * The audio component generates a semantic HTML
 * audio element.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Audio extends HtmlComponent
{
    /**
     * Creates a new audio component.
     *
     * @param string|null $src Audio source.
     */
    public function __construct(
        ?string $src = null
    ) {
        parent::__construct('audio');

        if ($src !== null) {
            $this->src($src);
        }
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
        return $this->attribute(
            'src',
            $src
        );
    }


    /**
     * Shows playback controls.
     *
     * @param bool $controls
     *
     * @return static
     */
    public function controls(
        bool $controls = true
    ): static {
        return $this->attribute(
            'controls',
            $controls
        );
    }


    /**
     * Enables autoplay.
     *
     * @param bool $autoplay
     *
     * @return static
     */
    public function autoplay(
        bool $autoplay = true
    ): static {
        return $this->attribute(
            'autoplay',
            $autoplay
        );
    }


    /**
     * Mutes the audio.
     *
     * @param bool $muted
     *
     * @return static
     */
    public function muted(
        bool $muted = true
    ): static {
        return $this->attribute(
            'muted',
            $muted
        );
    }


    /**
     * Enables looping.
     *
     * @param bool $loop
     *
     * @return static
     */
    public function loop(
        bool $loop = true
    ): static {
        return $this->attribute(
            'loop',
            $loop
        );
    }


    /**
     * Sets preload behavior.
     *
     * Accepted values:
     * auto
     * metadata
     * none
     *
     * @param string $preload
     *
     * @return static
     */
    public function preload(
        string $preload
    ): static {
        return $this->attribute(
            'preload',
            $preload
        );
    }


    /**
     * Disables remote playback.
     *
     * @param bool $disabled
     *
     * @return static
     */
    public function disableRemotePlayback(
        bool $disabled = true
    ): static {
        return $this->attribute(
            'disableremoteplayback',
            $disabled
        );
    }

        /**
     * Adds a source element.
     *
     * @param Source $source
     *
     * @return static
     */
    public function addSource(
        Source $source
    ): static {
        return $this->addChild(
            $source
        );
    }


    /**
     * Adds multiple source elements.
     *
     * @param array<int, Source> $sources
     *
     * @return static
     */
    public function addSources(
        array $sources
    ): static {
        foreach ($sources as $source) {
            $this->addSource(
                $source
            );
        }

        return $this;
    }
}
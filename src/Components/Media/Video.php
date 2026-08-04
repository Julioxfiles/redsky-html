<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML video component.
 *
 * The video component generates a semantic HTML
 * video element.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Video extends HtmlComponent
{
    /**
     * Creates a new video component.
     *
     * @param string|null $src Video source.
     */
    public function __construct(
        ?string $src = null
    ) {
        parent::__construct('video');

        if ($src !== null) {
            $this->src($src);
        }
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
     * Mutes the video.
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
     * Sets poster image.
     *
     * @param string $poster
     *
     * @return static
     */
    public function poster(
        string $poster
    ): static {
        return $this->attribute(
            'poster',
            $poster
        );
    }


    /**
     * Sets video width.
     *
     * @param int $width
     *
     * @return static
     */
    public function width(
        int $width
    ): static {
        return $this->attribute(
            'width',
            $width
        );
    }


    /**
     * Sets video height.
     *
     * @param int $height
     *
     * @return static
     */
    public function height(
        int $height
    ): static {
        return $this->attribute(
            'height',
            $height
        );
    }


    /**
     * Allows picture-in-picture.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function pictureInPicture(
        bool $enabled = true
    ): static {
        return $this->attribute(
            'disablepictureinpicture',
            !$enabled
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
     * Plays inline on mobile devices.
     *
     * @param bool $playsInline
     *
     * @return static
     */
    public function playsInline(
        bool $playsInline = true
    ): static {
        return $this->attribute(
            'playsinline',
            $playsInline
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


    /**
     * Adds a text track.
     *
     * @param Track $track
     *
     * @return static
     */
    public function addTrack(
        Track $track
    ): static {
        return $this->addChild(
            $track
        );
    }


    /**
     * Adds multiple text tracks.
     *
     * @param array<int, Track> $tracks
     *
     * @return static
     */
    public function addTracks(
        array $tracks
    ): static {
        foreach ($tracks as $track) {
            $this->addTrack(
                $track
            );
        }

        return $this;
    }
}
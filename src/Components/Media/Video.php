<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML video component.
 *
 * The Video component generates a semantic HTML
 * <video> element for displaying video content.
 *
 * A video can use a direct source through the constructor
 * or through the src() method. Additional Source components
 * can be added when multiple video formats or sources are
 * required.
 *
 * Track components can be added to provide subtitles,
 * captions, descriptions, chapters, or other timed text.
 *
 * The component supports common HTML video attributes
 * such as playback controls, autoplay, muted playback,
 * looping, preload behavior, poster images, dimensions,
 * inline playback, picture-in-picture, and remote playback.
 *
 * Video is not a void HTML element, so it can contain
 * child elements such as Source and Track.
 *
 * This component is UI-library agnostic and does not
 * apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
#[Example(
    title: 'Video',
    code: <<<'PHP'
    echo (new Video('/media/demo.mp4'))
        ->controls()
        ->poster('/images/video-poster.jpg')
        ->width(640)
        ->height(360)
        ->attribute('id', 'demo-video')
        ->render();
    PHP,
    description: 'Creates a semantic HTML video element with a
                 video source, playback controls, poster image,
                 and explicit dimensions.',
    language: 'php',
    primary: true,
    output: '<video src="/media/demo.mp4" controls poster="/images/video-poster.jpg" width="640" height="360" id="demo-video"></video>'
)]
class Video extends HtmlComponent
{
    /**
     * Creates a new video component.
     *
     * When a source is provided, it is assigned to the
     * src attribute.
     *
     * @param string|null $src Video source URL.
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
     * Sets the video source URL.
     *
     * @param string $src Video source URL.
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
     * Enables or disables the browser's
     * built-in playback controls.
     *
     * @param bool $controls Whether controls should be displayed.
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
     * Enables or disables automatic playback.
     *
     * Browsers may restrict autoplay unless the
     * video is muted or other autoplay requirements
     * are satisfied.
     *
     * @param bool $autoplay Whether autoplay is enabled.
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
     * Enables or disables muted playback.
     *
     * @param bool $muted Whether the video is muted.
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
     * Enables or disables looping playback.
     *
     * When enabled, the video automatically starts
     * again after reaching the end.
     *
     * @param bool $loop Whether looping is enabled.
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
     * Sets the browser's preload behavior.
     *
     * Common values are "none", "metadata", and "auto".
     *
     * @param string $preload Preload behavior.
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
     * Sets the image displayed before video playback begins.
     *
     * @param string $poster Poster image URL.
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
     * Sets the rendered video width.
     *
     * @param int $width Width in CSS pixels.
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
     * Sets the rendered video height.
     *
     * @param int $height Height in CSS pixels.
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
     * Enables or disables picture-in-picture mode.
     *
     * When disabled, the disablepictureinpicture
     * attribute is added to the video element.
     *
     * @param bool $enabled Whether picture-in-picture is allowed.
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
     * Enables or disables remote playback.
     *
     * When enabled, the disableremoteplayback attribute
     * is added to the video element.
     *
     * @param bool $disabled Whether remote playback is disabled.
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
     * Enables or disables inline playback.
     *
     * The playsinline attribute allows video to play
     * within the element instead of automatically
     * switching to fullscreen on supported mobile browsers.
     *
     * @param bool $playsInline Whether inline playback is enabled.
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
     * Adds a video source.
     *
     * Source components can be used to provide
     * multiple video formats or alternative sources.
     *
     * @param Source $source Video source component.
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
     * Adds multiple video sources.
     *
     * Each Source component is added as a child
     * of the video element.
     *
     * @param array<int, Source> $sources Video source components.
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
     * Track components can provide subtitles,
     * captions, descriptions, chapters, or other
     * timed text information.
     *
     * @param Track $track Text track component.
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
     * @param array<int, Track> $tracks Text track components.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <audio> element.
 *
 * The Audio component generates a semantic HTML <audio>
 * element used to embed sound content in a document.
 *
 * An audio source can be provided through the constructor
 * or configured later using src(). Multiple audio sources
 * can also be added using Source components through addSource()
 * or addSources().
 *
 * Playback behavior can be configured using controls(),
 * autoplay(), muted(), loop(), and preload().
 *
 * The component also supports disabling remote playback
 * through disableRemotePlayback().
 *
 * Audio extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Audio('/media/intro.mp3'))
 *     ->controls()
 *     ->preload('metadata')
 *     ->attribute('id', 'intro-audio')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <audio src="/media/intro.mp3" controls preload="metadata" id="intro-audio"></audio>
 * ```
 *
 * @package RedSky\Html\Components\Media
 */
#[Example(
    title: 'Audio Player',
    code: <<<'PHP'
    echo (new Audio('/media/intro.mp3'))
        ->controls()
        ->preload('metadata')
        ->attribute('id', 'intro-audio')
        ->render();
    PHP,
    description: 'The Audio component generates a semantic HTML <audio> element for embedding sound content. Playback controls and loading behavior can be configured through the component API.',
    language: 'php',
    primary: true,
    output: '<audio src="/media/intro.mp3" controls preload="metadata" id="intro-audio"></audio>'
)]
class Audio extends HtmlComponent
{
    /**
     * Creates a new audio component.
     *
     * If a source is provided, it is assigned to the
     * src attribute.
     *
     * @param string|null $src Audio source URL.
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
     * Sets the audio source URL.
     *
     * @param string $src Audio source URL.
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
     * Shows the browser's playback controls.
     *
     * @param bool $controls Whether playback controls are enabled.
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
     * Enables automatic playback.
     *
     * Browsers may restrict autoplay depending on
     * their autoplay policies.
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
     * Mutes the audio.
     *
     * @param bool $muted Whether the audio is muted.
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
     * Enables continuous playback by restarting the
     * audio when it reaches the end.
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
     * Common values are:
     *
     * - auto
     * - metadata
     * - none
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
     * Disables the browser's remote playback functionality.
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
     * Adds an audio source element.
     *
     * This allows multiple source formats to be supplied
     * to the browser for compatibility.
     *
     * @param Source $source Audio source component.
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
     * Adds multiple audio source elements.
     *
     * @param array<int, Source> $sources Audio source components.
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
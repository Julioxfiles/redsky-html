<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media\Track;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <track> element.
 *
 * The Track component generates a semantic HTML <track>
 * element used to provide timed text tracks for audio and
 * video elements.
 *
 * Tracks can provide subtitles, captions, descriptions,
 * chapters, or metadata. The type of track is specified
 * through kind(), while srclang() and label() provide
 * language and user-facing identification information.
 *
 * A track can be marked as the default track using default().
 *
 * Track extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component is rendered as a self-closing HTML element
 * because <track> is a void element and cannot contain
 * child elements or content.
 *
 * Track is normally used as a child of Audio or Video
 * components.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Track('/media/subtitles-en.vtt'))
 *     ->kind('subtitles')
 *     ->srclang('en')
 *     ->label('English')
 *     ->default()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <track src="/media/subtitles-en.vtt" kind="subtitles" srclang="en" label="English" default />
 * ```
 *
 * @package RedSky\Html\Components\Media
 */
#[Example(
    title: 'Video Subtitles',
    code: <<<'PHP'
    echo (new Track('/media/subtitles-en.vtt'))
        ->kind('subtitles')
        ->srclang('en')
        ->label('English')
        ->default()
        ->render();
    PHP,
    description: 'The Track component generates a semantic HTML <track> element for timed text associated with audio or video content. This example defines an English subtitle track and marks it as the default track.',
    language: 'php',
    primary: true,
    output: '<track src="/media/subtitles-en.vtt" kind="subtitles" srclang="en" label="English" default />'
)]
class Track extends HtmlComponent
{
    /**
     * Creates a new track component.
     *
     * If a source is provided, it is assigned to the
     * src attribute.
     *
     * @param string|null $src Track source URL.
     */
    public function __construct(
        ?string $src = null
    ) {
        parent::__construct('track');

        $this->selfClosing = true;

        if ($src !== null) {
            $this->src($src);
        }
    }

    /**
     * Sets the track source URL.
     *
     * The source normally points to a WebVTT file
     * containing the timed text data.
     *
     * @param string $src Track source URL.
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
     * Sets the type of timed text track.
     *
     * Common values are:
     *
     * - subtitles
     * - captions
     * - descriptions
     * - chapters
     * - metadata
     *
     * @param string $kind Track type.
     *
     * @return static
     */
    public function kind(
        string $kind
    ): static {
        return $this->attribute(
            'kind',
            $kind
        );
    }

    /**
     * Sets the language of the track.
     *
     * The value should normally be a valid BCP 47
     * language tag such as "en", "es", or "en-US".
     *
     * @param string $language Track language.
     *
     * @return static
     */
    public function srclang(
        string $language
    ): static {
        return $this->attribute(
            'srclang',
            $language
        );
    }

    /**
     * Sets the human-readable label for the track.
     *
     * The label is typically displayed to users when
     * selecting among available tracks.
     *
     * @param string $label Track label.
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        return $this->attribute(
            'label',
            $label
        );
    }

    /**
     * Marks this track as the default track.
     *
     * @param bool $default Whether the track is the default.
     *
     * @return static
     */
    public function default(
        bool $default = true
    ): static {
        return $this->attribute(
            'default',
            $default
        );
    }
}
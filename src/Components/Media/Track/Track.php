<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media\Track;

use RedSky\Html\Components\HtmlComponent;


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
 * @package RedSky\Html\Components\Media
 */
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
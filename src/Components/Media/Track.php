<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML track component.
 *
 * The track component generates a semantic HTML
 * track element used to provide timed text tracks
 * such as subtitles, captions, descriptions,
 * chapters or metadata for audio and video elements.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Track extends HtmlComponent
{
    /**
     * Creates a new track component.
     *
     * @param string|null $src Track source.
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
     * Sets track source.
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
     * Sets track kind.
     *
     * Typical values:
     * subtitles
     * captions
     * descriptions
     * chapters
     * metadata
     *
     * @param string $kind
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
     * Sets track language.
     *
     * @param string $language
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
     * Sets track label.
     *
     * @param string $label
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
     * Marks this track as default.
     *
     * @param bool $default
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
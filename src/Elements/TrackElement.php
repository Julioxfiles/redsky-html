<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML track element.
 *
 * The track element specifies text tracks for
 * media elements such as video and audio.
 *
 * @package RedSky\Html\Elements
 */
class TrackElement extends HtmlElement
{
    /**
     * Creates a new track element.
     */
    public function __construct()
    {
        parent::__construct('track');
    }


    /**
     * Sets track source file.
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
     * Sets track kind.
     *
     * Available values:
     *
     * - subtitles
     * - captions
     * - descriptions
     * - chapters
     * - metadata
     *
     * @param string $kind
     *
     * @return static
     */
    public function kind(
        string $kind
    ): static {
        $this->setAttribute(
            'kind',
            $kind
        );

        return $this;
    }


    /**
     * Sets track language.
     *
     * @param string $srclang
     *
     * @return static
     */
    public function language(
        string $srclang
    ): static {
        $this->setAttribute(
            'srclang',
            $srclang
        );

        return $this;
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
        $this->setAttribute(
            'label',
            $label
        );

        return $this;
    }


    /**
     * Marks track as default.
     *
     * @param bool $default
     *
     * @return static
     */
    public function default(
        bool $default = true
    ): static {
        $this->setAttribute(
            'default',
            $default
        );

        return $this;
    }


    /**
     * Renders track element.
     *
     * Track is an HTML void element.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '<' . $this->tag;

        if ($this->attributes()->canRenderAttributes()) {
            $html .= ' ' . $this->attributes()->renderAttributes();
        }

        $html .= '>';

        return $html;
    }
}
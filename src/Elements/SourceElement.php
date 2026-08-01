<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML source element.
 *
 * The source element defines alternative media
 * resources for picture, audio, and video elements.
 *
 * @package RedSky\Html\Elements
 */
class SourceElement extends HtmlElement
{
    /**
     * Creates a new source element.
     */
    public function __construct()
    {
        parent::__construct('source');
    }


    /**
     * Sets source URL.
     *
     * @param string $srcset
     *
     * @return static
     */
    public function srcset(
        string $srcset
    ): static {
        $this->setAttribute(
            'srcset',
            $srcset
        );

        return $this;
    }


    /**
     * Sets media type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->setAttribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Sets media query.
     *
     * @param string $media
     *
     * @return static
     */
    public function media(
        string $media
    ): static {
        $this->setAttribute(
            'media',
            $media
        );

        return $this;
    }


    /**
     * Renders source element.
     *
     * Source is an HTML void element.
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
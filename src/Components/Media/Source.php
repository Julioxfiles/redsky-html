<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML source component.
 *
 * The source component generates a semantic HTML
 * source element used by audio, video and picture
 * elements to provide alternative media sources.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Source extends HtmlComponent
{
    /**
     * Creates a new source component.
     *
     * @param string|null $src Source URL.
     * @param string|null $type MIME type.
     */
    public function __construct(
        ?string $src = null,
        ?string $type = null
    ) {
        parent::__construct('source');

        $this->selfClosing = true;

        if ($src !== null) {
            $this->src($src);
        }

        if ($type !== null) {
            $this->type($type);
        }
    }


    /**
     * Sets the source URL.
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
     * Sets the MIME type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        return $this->attribute(
            'type',
            $type
        );
    }


    /**
     * Sets the media query.
     *
     * Used primarily inside the picture element.
     *
     * @param string $media
     *
     * @return static
     */
    public function media(
        string $media
    ): static {
        return $this->attribute(
            'media',
            $media
        );
    }


    /**
     * Sets responsive image source set.
     *
     * Used by picture elements.
     *
     * @param string $srcset
     *
     * @return static
     */
    public function srcset(
        string $srcset
    ): static {
        return $this->attribute(
            'srcset',
            $srcset
        );
    }


    /**
     * Sets image sizes.
     *
     * Used by responsive images.
     *
     * @param string $sizes
     *
     * @return static
     */
    public function sizes(
        string $sizes
    ): static {
        return $this->attribute(
            'sizes',
            $sizes
        );
    }


    /**
     * Sets image width descriptor.
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
     * Sets image height descriptor.
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
}
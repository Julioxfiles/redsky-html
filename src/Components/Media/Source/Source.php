<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media\Source;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <source> element.
 *
 * The Source component generates a semantic HTML <source>
 * element used to provide alternative media resources for
 * audio, video, and picture elements.
 *
 * A Source component can define a media URL, MIME type,
 * media query, responsive image source set, image sizes,
 * and optional width and height descriptors.
 *
 * @package RedSky\Html\Components\Media
 */
class Source extends HtmlComponent
{
    /**
     * Creates a new source component.
     *
     * If a source URL or MIME type is provided, the
     * corresponding attributes are configured automatically.
     *
     * @param string|null $src Source URL.
     * @param string|null $type MIME type of the resource.
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
     * @param string $src Source URL.
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
     * Sets the MIME type of the source.
     *
     * @param string $type MIME type.
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
     * Sets the media query that determines when
     * this source should be used.
     *
     * This is primarily useful when Source is used
     * inside a Picture component.
     *
     * @param string $media CSS media query.
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
     * Sets the responsive image source set.
     *
     * This attribute is primarily used when the Source
     * component is contained within a Picture component.
     *
     * @param string $srcset Responsive image source set.
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
     * Sets responsive image size information.
     *
     * This attribute is used together with srcset()
     * when defining responsive images.
     *
     * @param string $sizes Responsive image sizes.
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
     * Sets the width descriptor for the source.
     *
     * @param int $width Image width.
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
     * Sets the height descriptor for the source.
     *
     * @param int $height Image height.
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
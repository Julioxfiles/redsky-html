<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML image component.
 *
 * The image component generates a semantic HTML
 * img element.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Image extends HtmlComponent
{
    /**
     * Creates a new image component.
     *
     * @param string|null $src Image source.
     * @param string|null $alt Alternative text.
     */
    public function __construct(
        ?string $src = null,
        ?string $alt = null
    ) {
        parent::__construct('img');

        $this->selfClosing = true;

        if ($src !== null) {
            $this->src($src);
        }

        if ($alt !== null) {
            $this->alt($alt);
        }
    }


    /**
     * Sets image source.
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
     * Sets alternative text.
     *
     * @param string $alt
     *
     * @return static
     */
    public function alt(
        string $alt
    ): static {
        return $this->attribute(
            'alt',
            $alt
        );
    }


    /**
     * Sets image width.
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
     * Sets image height.
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
     * Sets responsive image source set.
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
     * Sets responsive image sizes.
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
     * Sets loading behavior.
     *
     * Typical values:
     * eager
     * lazy
     *
     * @param string $loading
     *
     * @return static
     */
    public function loading(
        string $loading
    ): static {
        return $this->attribute(
            'loading',
            $loading
        );
    }


    /**
     * Enables lazy loading.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function lazy(
        bool $enabled = true
    ): static {
        return $this->loading(
            $enabled
                ? 'lazy'
                : 'eager'
        );
    }


    /**
     * Sets decoding strategy.
     *
     * Typical values:
     * auto
     * async
     * sync
     *
     * @param string $decoding
     *
     * @return static
     */
    public function decoding(
        string $decoding
    ): static {
        return $this->attribute(
            'decoding',
            $decoding
        );
    }


    /**
     * Sets cross-origin policy.
     *
     * @param string $crossorigin
     *
     * @return static
     */
    public function crossorigin(
        string $crossorigin
    ): static {
        return $this->attribute(
            'crossorigin',
            $crossorigin
        );
    }


    /**
     * Sets referrer policy.
     *
     * @param string $policy
     *
     * @return static
     */
    public function referrerPolicy(
        string $policy
    ): static {
        return $this->attribute(
            'referrerpolicy',
            $policy
        );
    }


    /**
     * Indicates whether the image is part
     * of an image map.
     *
     * @param string $map
     *
     * @return static
     */
    public function useMap(
        string $map
    ): static {
        return $this->attribute(
            'usemap',
            $map
        );
    }


    /**
     * Indicates that the image
     * is a server-side image map.
     *
     * @param bool $ismap
     *
     * @return static
     */
    public function isMap(
        bool $ismap = true
    ): static {
        return $this->attribute(
            'ismap',
            $ismap
        );
    }
}
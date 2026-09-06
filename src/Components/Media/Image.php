<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <img> element.
 *
 * The Image component generates a semantic HTML <img>
 * element used to embed an image in a document.
 *
 * An image source and alternative text can be provided
 * through the constructor or configured later using src()
 * and alt().
 *
 * The component supports common image attributes including
 * dimensions, responsive image sources, loading behavior,
 * decoding strategy, cross-origin configuration, referrer
 * policy, and image maps.
 *
 * Image extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component is rendered as a self-closing HTML element
 * because <img> is a void element and cannot contain child
 * elements or content.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Image(
 *     '/images/redsky-logo.png',
 *     'RedSky logo'
 * ))
 *     ->width(200)
 *     ->height(80)
 *     ->loading('lazy')
 *     ->attribute('id', 'logo')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <img src="/images/redsky-logo.png" alt="RedSky logo" width="200" height="80" loading="lazy" id="logo" />
 * ```
 *
 * @package RedSky\Html\Components\Media
 */
#[Example(
    title: 'Image',
    code: <<<'PHP'
    echo (new Image(
        '/images/redsky-logo.png',
        'RedSky logo'
    ))
        ->width(200)
        ->height(80)
        ->loading('lazy')
        ->attribute('id', 'logo')
        ->render();
    PHP,
    description: 'The Image component generates a semantic HTML <img> element and provides methods for configuring its source, alternative text, dimensions, responsive sources, loading behavior, and other image-related attributes.',
    language: 'php',
    primary: true,
    output: '<img src="/images/redsky-logo.png" alt="RedSky logo" width="200" height="80" loading="lazy" id="logo" />'
)]
class Image extends HtmlComponent
{
    /**
     * Creates a new image component.
     *
     * If a source or alternative text is provided,
     * the corresponding attributes are configured
     * automatically.
     *
     * @param string|null $src Image source URL.
     * @param string|null $alt Alternative text describing the image.
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
     * Sets the image source URL.
     *
     * @param string $src Image source URL.
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
     * Sets the alternative text for the image.
     *
     * Alternative text is used by assistive technologies
     * and is displayed when the image cannot be loaded.
     *
     * @param string $alt Alternative text.
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
     * Sets the image width in pixels.
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
     * Sets the image height in pixels.
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

    /**
     * Sets the responsive image source set.
     *
     * The value should contain one or more image candidates
     * and their corresponding widths or pixel densities.
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
     * The value is used together with srcset() to help
     * the browser select an appropriate image resource.
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
     * Sets the image loading behavior.
     *
     * Common values are:
     *
     * - eager
     * - lazy
     *
     * @param string $loading Loading behavior.
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
     * Enables or disables lazy loading.
     *
     * When enabled, loading is set to "lazy".
     * When disabled, loading is set to "eager".
     *
     * @param bool $enabled Whether lazy loading is enabled.
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
     * Sets the image decoding strategy.
     *
     * Common values are:
     *
     * - auto
     * - async
     * - sync
     *
     * @param string $decoding Decoding strategy.
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
     * Sets the cross-origin policy for the image.
     *
     * @param string $crossorigin Cross-origin policy.
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
     * Sets the referrer policy for the image request.
     *
     * @param string $policy Referrer policy.
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
     * Associates the image with an image map.
     *
     * The value should identify the corresponding
     * map element.
     *
     * @param string $map Image map reference.
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
     * Marks the image as a server-side image map.
     *
     * This attribute is meaningful when the image is
     * used inside an appropriate link context.
     *
     * @param bool $ismap Whether the image is a server-side image map.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <link> element.
 *
 * The Link component generates a semantic HTML <link> element
 * used to define relationships between the current document
 * and external resources.
 *
 * Link can be used for stylesheets, icons, preloaded resources,
 * alternate documents, and other resources supported by the
 * HTML `link` element.
 *
 * The component provides fluent methods for configuring common
 * link attributes such as href, rel, media, type, sizes,
 * hreflang, crossorigin, and integrity.
 *
 * The stylesheet() method provides a convenient way to configure
 * a link as an external CSS stylesheet.
 *
 * Link is a void HTML element and therefore does not contain
 * child elements or text content.
 *
 * The component is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Link())
 *     ->stylesheet('/css/app.css')
 *     ->media('screen')
 *     ->attribute('id', 'app-styles')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <link rel="stylesheet"
 *       href="/css/app.css"
 *       media="screen"
 *       id="app-styles" />
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Stylesheet link',
    code: <<<'PHP'
    echo (new Link())
        ->stylesheet('/css/app.css')
        ->media('screen')
        ->attribute('id', 'app-styles')
        ->render();
    PHP,
    description: 'The Link component generates a semantic HTML
                 <link> element for defining relationships between
                 the current document and external resources. The
                 stylesheet() method provides a convenient way to
                 create a stylesheet link.',
    language: 'php',
    primary: true,
    output: '<link rel="stylesheet" href="/css/app.css" media="screen" id="app-styles" />'
)]
class Link extends HtmlComponent
{
    /**
     * Indicates that the element is self-closing.
     *
     * Link is a void HTML element and does not contain
     * child elements or text content.
     *
     * @var bool
     */
    protected bool $selfClosing = true;

    /**
     * Creates a new link component.
     */
    public function __construct()
    {
        parent::__construct('link');
    }

    /**
     * Sets the resource URL.
     *
     * Corresponds to the HTML `href` attribute.
     *
     * @param string $href Resource URL.
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        return $this->attribute(
            'href',
            $href
        );
    }

    /**
     * Sets the relationship between the current document
     * and the referenced resource.
     *
     * Corresponds to the HTML `rel` attribute.
     *
     * @param string $rel Relationship value.
     *
     * @return static
     */
    public function rel(
        string $rel
    ): static {
        return $this->attribute(
            'rel',
            $rel
        );
    }

    /**
     * Sets the media condition for the linked resource.
     *
     * Corresponds to the HTML `media` attribute.
     *
     * @param string $media Media query or condition.
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
     * Sets the MIME type of the linked resource.
     *
     * Corresponds to the HTML `type` attribute.
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
     * Sets the intrinsic sizes of the linked resource.
     *
     * Corresponds to the HTML `sizes` attribute.
     *
     * @param string $sizes Supported resource sizes.
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
     * Sets the language of the linked resource.
     *
     * Corresponds to the HTML `hreflang` attribute.
     *
     * @param string $language Language code.
     *
     * @return static
     */
    public function hreflang(
        string $language
    ): static {
        return $this->attribute(
            'hreflang',
            $language
        );
    }

    /**
     * Sets the cross-origin request mode.
     *
     * Corresponds to the HTML `crossorigin` attribute.
     *
     * @param string $value Cross-origin mode, such as `anonymous`.
     *
     * @return static
     */
    public function crossorigin(
        string $value = 'anonymous'
    ): static {
        return $this->attribute(
            'crossorigin',
            $value
        );
    }

    /**
     * Sets the Subresource Integrity hash.
     *
     * Corresponds to the HTML `integrity` attribute.
     *
     * @param string $hash Integrity metadata.
     *
     * @return static
     */
    public function integrity(
        string $hash
    ): static {
        return $this->attribute(
            'integrity',
            $hash
        );
    }

    /**
     * Configures the link as an external stylesheet.
     *
     * This sets the `rel` attribute to `stylesheet` and
     * assigns the provided URL to the `href` attribute.
     *
     * @param string $href Stylesheet URL.
     *
     * @return static
     */
    public function stylesheet(
        string $href
    ): static {
        return $this
            ->rel('stylesheet')
            ->href($href);
    }
}
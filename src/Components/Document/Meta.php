<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <meta> element.
 *
 * The Meta component generates a semantic HTML <meta> element
 * used to define metadata about an HTML document.
 *
 * It supports common metadata attributes such as character
 * encoding, viewport configuration, document description,
 * keywords, HTTP directives, media conditions, and other
 * metadata supported by the HTML meta element.
 *
 * Meta is a void HTML element and does not contain child
 * elements or text content.
 *
 * The component provides fluent methods for configuring
 * commonly used metadata attributes. Additional attributes
 * can be configured through the inherited HtmlComponent API.
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
 * echo (new Meta())
 *     ->name('viewport')
 *     ->AddContent('width=device-width, initial-scale=1')
 *     ->attribute('id', 'viewport-meta')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <meta name="viewport"
 *       content="width=device-width, initial-scale=1"
 *       id="viewport-meta" />
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Viewport metadata',
    code: <<<'PHP'
    echo (new Meta())
        ->name('viewport')
        ->AddContent('width=device-width, initial-scale=1')
        ->attribute('id', 'viewport-meta')
        ->render();
    PHP,
    description: 'The Meta component generates a semantic HTML
                 <meta> element for defining document metadata,
                 such as character encoding, viewport settings,
                 HTTP directives, and other metadata attributes.',
    language: 'php',
    primary: true,
    output: '<meta name="viewport" content="width=device-width, initial-scale=1" id="viewport-meta" />'
)]
class Meta extends HtmlComponent
{
    /**
     * Indicates that the element is self-closing.
     *
     * Meta is a void HTML element and does not contain
     * child elements or text content.
     *
     * @var bool
     */
    protected bool $selfClosing = true;

    /**
     * Creates a new meta component.
     */
    public function __construct()
    {
        parent::__construct('meta');
    }

    /**
     * Sets the character encoding.
     *
     * Corresponds to the HTML `charset` attribute.
     *
     * @param string $charset Character encoding, such as `UTF-8`.
     *
     * @return static
     */
    public function charset(
        string $charset
    ): static {
        return $this->attribute(
            'charset',
            $charset
        );
    }

    /**
     * Sets the metadata name.
     *
     * Corresponds to the HTML `name` attribute.
     *
     * @param string $name Metadata name, such as `viewport`
     * or `description`.
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        return $this->attribute(
            'name',
            $name
        );
    }

    /**
     * Sets the metadata content attribute.
     *
     * Corresponds to the HTML `content` attribute.
     *
     * The method is named AddContent() to distinguish setting
     * the HTML `content` attribute from the content-related
     * methods inherited from HtmlComponent.
     *
     * @param string $content Metadata content.
     *
     * @return static
     */
    public function AddContent(
        string $content
    ): static {
        return $this->attribute(
            'content',
            $content
        );
    }

    /**
     * Sets the HTTP response header directive.
     *
     * Corresponds to the HTML `http-equiv` attribute.
     *
     * @param string $value HTTP directive value.
     *
     * @return static
     */
    public function httpEquiv(
        string $value
    ): static {
        return $this->attribute(
            'http-equiv',
            $value
        );
    }

    /**
     * Sets the media condition for the metadata.
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
     * Sets the metadata scheme.
     *
     * Corresponds to the HTML `scheme` attribute.
     *
     * @param string $scheme Metadata scheme.
     *
     * @return static
     */
    public function scheme(
        string $scheme
    ): static {
        return $this->attribute(
            'scheme',
            $scheme
        );
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document\Meta;

use RedSky\Html\Components\HtmlComponent;


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
 * @package RedSky\Html\Components\Document
 */
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
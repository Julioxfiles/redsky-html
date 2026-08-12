<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <meta> element.
 *
 * The meta element defines document metadata such as character
 * encoding, viewport settings, description, keywords, author,
 * and other information.
 *
 * Example:
 *
 * ```php
 * $meta = (new Meta())
 *     ->charset('UTF-8');
 *
 * $viewport = (new Meta())
 *     ->name('viewport')
 *     ->content('width=device-width, initial-scale=1');
 * ```
 *
 * Renders:
 *
 * ```html
 * <meta charset="UTF-8" />
 *
 * <meta
 *     name="viewport"
 *     content="width=device-width, initial-scale=1"
 * />
 * ```
 */
class Meta extends HtmlComponent
{
    /**
     * Indicates that the element is self-closing.
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
     * Sets the charset attribute.
     */
    public function charset(string $charset): static
    {
        return $this->attribute('charset', $charset);
    }

    /**
     * Sets the name attribute.
     */
    public function name(string $name): static
    {
        return $this->attribute('name', $name);
    }

    /**
     * Sets the content attribute.
     */
    public function AddContent(string $content): static
    {
        return $this->attribute('content', $content);
    }

    /**
     * Sets the http-equiv attribute.
     */
    public function httpEquiv(string $value): static
    {
        return $this->attribute('http-equiv', $value);
    }

    /**
     * Sets the media attribute.
     */
    public function media(string $media): static
    {
        return $this->attribute('media', $media);
    }

    /**
     * Sets the scheme attribute.
     */
    public function scheme(string $scheme): static
    {
        return $this->attribute('scheme', $scheme);
    }
}
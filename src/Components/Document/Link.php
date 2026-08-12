<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <link> element.
 *
 * The link element defines relationships between the current
 * document and external resources, such as stylesheets,
 * icons, preloads, and alternate documents.
 *
 * Example:
 *
 * ```php
 * $link = (new Link())
 *     ->stylesheet('/css/app.css');
 * ```
 *
 * Renders:
 *
 * ```html
 * <link
 *     rel="stylesheet"
 *     href="/css/app.css"
 * />
 * ```
 */
class Link extends HtmlComponent
{
    /**
     * Indicates that the element is self-closing.
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
     * Sets the href attribute.
     */
    public function href(string $href): static
    {
        return $this->attribute('href', $href);
    }

    /**
     * Sets the rel attribute.
     */
    public function rel(string $rel): static
    {
        return $this->attribute('rel', $rel);
    }

    /**
     * Sets the media attribute.
     */
    public function media(string $media): static
    {
        return $this->attribute('media', $media);
    }

    /**
     * Sets the type attribute.
     */
    public function type(string $type): static
    {
        return $this->attribute('type', $type);
    }

    /**
     * Sets the sizes attribute.
     */
    public function sizes(string $sizes): static
    {
        return $this->attribute('sizes', $sizes);
    }

    /**
     * Sets the hreflang attribute.
     */
    public function hreflang(string $language): static
    {
        return $this->attribute('hreflang', $language);
    }

    /**
     * Sets the crossorigin attribute.
     */
    public function crossorigin(string $value = 'anonymous'): static
    {
        return $this->attribute('crossorigin', $value);
    }

    /**
     * Sets the integrity attribute.
     */
    public function integrity(string $hash): static
    {
        return $this->attribute('integrity', $hash);
    }

    /**
     * Configures the element as a stylesheet.
     */
    public function stylesheet(string $href): static
    {
        return $this
            ->rel('stylesheet')
            ->href($href);
    }
}
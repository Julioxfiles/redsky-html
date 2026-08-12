<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <style> element.
 *
 * The style element contains CSS rules that apply to the current
 * document.
 *
 * Example:
 *
 * ```php
 * $style = (new Style())
 *     ->css('body { margin: 0; }');
 * ```
 *
 * Renders:
 *
 * ```html
 * <style>
 * body { margin: 0; }
 * </style>
 * ```
 */
class Style extends HtmlComponent
{
    /**
     * Creates a new style component.
     */
    public function __construct()
    {
        parent::__construct('style');
    }

    /**
     * Sets the CSS content.
     */
    public function css(string $css): static
    {
        return $this->text($css);
    }

    /**
     * Sets the media attribute.
     */
    public function media(string $media): static
    {
        return $this->attribute('media', $media);
    }

    /**
     * Sets the nonce attribute.
     */
    public function nonce(string $nonce): static
    {
        return $this->attribute('nonce', $nonce);
    }

    /**
     * Sets the title attribute.
     */
    public function title(string $title): static
    {
        return $this->attribute('title', $title);
    }
}
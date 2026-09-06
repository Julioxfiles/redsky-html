<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <style> element.
 *
 * The Style component generates a semantic HTML <style>
 * element used to embed CSS rules directly within an HTML
 * document.
 *
 * The component provides the css() method for setting inline
 * CSS content and additional methods for configuring common
 * attributes such as media, nonce, and title.
 *
 * Style extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, and other
 * HTML component features.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS rules or styles.
 *
 * The component uses fluent methods, allowing multiple
 * configuration calls to be chained together.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Style())
 *     ->css('body { margin: 0; }')
 *     ->media('screen')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <style media="screen">body { margin: 0; }</style>
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Embedded CSS',
    code: <<<'PHP'
    echo (new Style())
        ->css('body { margin: 0; }')
        ->media('screen')
        ->render();
    PHP,
    description: 'The Style component generates a semantic HTML
                 <style> element for embedding CSS rules directly
                 in an HTML document. It also provides methods for
                 configuring media, nonce, and title attributes.',
    language: 'php',
    primary: true,
    output: '<style media="screen">body { margin: 0; }</style>'
)]
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
     *
     * The supplied CSS becomes the text content of the
     * style element.
     *
     * @param string $css CSS rules.
     *
     * @return static
     */
    public function css(
        string $css
    ): static {
        return $this->text(
            $css
        );
    }

    /**
     * Sets the media condition for the CSS rules.
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
     * Sets the Content Security Policy nonce.
     *
     * Corresponds to the HTML `nonce` attribute.
     *
     * @param string $nonce Cryptographic nonce value.
     *
     * @return static
     */
    public function nonce(
        string $nonce
    ): static {
        return $this->attribute(
            'nonce',
            $nonce
        );
    }

    /**
     * Sets the advisory title for the style sheet.
     *
     * Corresponds to the HTML `title` attribute.
     *
     * @param string $title Style sheet title.
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        return $this->attribute(
            'title',
            $title
        );
    }
}
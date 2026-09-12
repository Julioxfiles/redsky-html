<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document\Html;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Component;

use RedSky\Html\Components\Document\Head\Head;
use RedSky\Html\Components\Document\Body\Body;

/**
 * Represents the root HTML <html> element.
 *
 * The Html component represents the root element of an HTML
 * document. It contains the document head and body and can
 * define document-level attributes such as the language and
 * writing direction.
 *
 * The component provides dedicated methods for adding Head
 * and Body components, allowing the structure of an HTML
 * document to be expressed through a fluent PHP API.
 *
 * It extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, and
 * child components.
 *
 * @package RedSky\Html\Components\Document
 */
class Html extends HtmlComponent
{
    /**
     * Creates a new html component.
     */
    public function __construct()
    {
        parent::__construct('html');
    }

    /**
     * Sets the document language.
     *
     * Corresponds to the HTML `lang` attribute.
     *
     * @param string $language Language code, such as `en` or `es`.
     *
     * @return static
     */
    public function lang(
        string $language
    ): static {
        return $this->attribute(
            'lang',
            $language
        );
    }

    /**
     * Sets the document writing direction.
     *
     * Corresponds to the HTML `dir` attribute.
     *
     * @param string $direction Writing direction, such as `ltr` or `rtl`.
     *
     * @return static
     */
    public function dir(
        string $direction
    ): static {
        return $this->attribute(
            'dir',
            $direction
        );
    }

    /**
     * Adds the document head.
     *
     * @param Head $head Head component to add.
     *
     * @return static
     */
    public function head(
        Head $head
    ): static {
        return $this->addChild($head);
    }

    /**
     * Adds the document body.
     *
     * @param Body $body Body component to add.
     *
     * @return static
     */
    public function body(
        Body $body
    ): static {
        return $this->addChild($body);
    }
}
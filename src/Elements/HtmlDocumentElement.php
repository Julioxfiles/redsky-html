<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents the root HTML document element.
 *
 * The html element contains the document head
 * and body sections.
 *
 * @package RedSky\Html\Elements
 */
class HtmlDocumentElement extends HtmlElement
{
    /**
     * Creates a new HTML document element.
     */
    public function __construct()
    {
        parent::__construct('html');

        $this->setAttribute(
            'lang',
            'en'
        );
    }


    /**
     * Sets document language.
     *
     * @param string $language
     *
     * @return static
     */
    public function lang(
        string $language
    ): static {
        $this->setAttribute(
            'lang',
            $language
        );

        return $this;
    }
}
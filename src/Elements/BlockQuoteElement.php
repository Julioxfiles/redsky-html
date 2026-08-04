<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML blockquote element.
 *
 * The blockquote element represents a section
 * that is quoted from another source. It is
 * typically rendered as a block-level quotation
 * and may reference its original source through
 * the cite attribute.
 *
 * @package RedSky\Html\Elements
 */
class BlockQuoteElement extends HtmlElement
{
    /**
     * Creates a new blockquote element.
     */
    public function __construct()
    {
        parent::__construct('blockquote');
    }


    /**
     * Sets the URL of the quoted source.
     *
     * @param string $cite
     *
     * @return static
     */
    public function cite(
        string $cite
    ): static {
        $this->setAttribute(
            'cite',
            $cite
        );

        return $this;
    }
}
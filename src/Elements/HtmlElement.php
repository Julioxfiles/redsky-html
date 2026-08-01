<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents a generic HTML element.
 *
 * Allows creating any valid HTML tag dynamically.
 *
 * Examples:
 *
 * - div
 * - section
 * - article
 * - custom-element
 *
 * @package RedSky\Html\Elements
 */
class HtmlElement extends Element
{
    /**
     * Creates a new HTML element.
     *
     * @param string $tag HTML tag name.
     */
    public function __construct(
        string $tag
    ) {
        $this->tag = $tag;

        parent::__construct();
    }


    /**
     * Changes element tag name.
     *
     * @param string $tag HTML tag name.
     *
     * @return static
     */
    public function setTag(
        string $tag
    ): static {
        $this->tag = $tag;

        return $this;
    }
}
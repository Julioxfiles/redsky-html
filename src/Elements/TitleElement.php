<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML title element.
 *
 * The title element defines the title of an HTML document.
 *
 * @package RedSky\Html\Elements
 */
class TitleElement extends HtmlElement
{
    /**
     * Creates a new title element.
     */
    public function __construct()
    {
        parent::__construct('title');
    }


    /**
     * Sets document title.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        $this->content($title);

        return $this;
    }
}
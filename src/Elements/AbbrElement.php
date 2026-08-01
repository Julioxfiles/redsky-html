<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML abbreviation element.
 *
 * The abbr element represents an abbreviation
 * or acronym, optionally providing its full
 * description through the title attribute.
 *
 * @package RedSky\Html\Elements
 */
class AbbrElement extends HtmlElement
{
    /**
     * Creates a new abbr element.
     */
    public function __construct()
    {
        parent::__construct('abbr');
    }


    /**
     * Sets the full description of the abbreviation.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        $this->setAttribute(
            'title',
            $title
        );

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML details element.
 *
 * The details element creates a disclosure widget
 * that can be opened and closed by the user.
 *
 * @package RedSky\Html\Elements
 */
class DetailsElement extends HtmlElement
{
    /**
     * Creates a new details element.
     */
    public function __construct()
    {
        parent::__construct('details');
    }


    /**
     * Sets open state.
     *
     * @param bool $open
     *
     * @return static
     */
    public function open(
        bool $open = true
    ): static {
        $this->setAttribute(
            'open',
            $open
        );

        return $this;
    }
}
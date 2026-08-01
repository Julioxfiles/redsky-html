<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML list item element.
 *
 * The li element defines an item inside
 * an ordered or unordered list.
 *
 * @package RedSky\Html\Elements
 */
class ListItemElement extends HtmlElement
{
    /**
     * Creates a new list item element.
     */
    public function __construct()
    {
        parent::__construct('li');
    }


    /**
     * Sets list item value.
     *
     * This attribute is mainly used inside
     * ordered lists.
     *
     * @param int $value
     *
     * @return static
     */
    public function value(
        int $value
    ): static {
        $this->setAttribute(
            'value',
            $value
        );

        return $this;
    }
}
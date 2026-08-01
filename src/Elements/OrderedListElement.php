<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML ordered list element.
 *
 * The ol element defines an ordered sequence
 * of list items.
 *
 * @package RedSky\Html\Elements
 */
class OrderedListElement extends HtmlElement
{
    /**
     * Creates a new ordered list element.
     */
    public function __construct()
    {
        parent::__construct('ol');
    }


    /**
     * Sets ordered list starting number.
     *
     * @param int $start
     *
     * @return static
     */
    public function start(
        int $start
    ): static {
        $this->setAttribute(
            'start',
            $start
        );

        return $this;
    }


    /**
     * Reverses list ordering.
     *
     * @param bool $reversed
     *
     * @return static
     */
    public function reversed(
        bool $reversed = true
    ): static {
        $this->setAttribute(
            'reversed',
            $reversed
        );

        return $this;
    }


    /**
     * Sets numbering type.
     *
     * Values:
     *
     * - 1
     * - A
     * - a
     * - I
     * - i
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->setAttribute(
            'type',
            $type
        );

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML anchor element.
 *
 * The a element creates hyperanchors to other resources.
 *
 * @package RedSky\Html\Elements
 */
class AnchorElement extends HtmlElement
{
    /**
     * Creates a new anchor element.
     */
    public function __construct()
    {
        parent::__construct('a');
    }


    /**
     * Sets anchor URL.
     *
     * @param string $url
     *
     * @return static
     */
    public function href(
        string $url
    ): static {
        $this->setAttribute(
            'href',
            $url
        );

        return $this;
    }


    /**
     * Sets anchor target.
     *
     * @param string $target
     *
     * @return static
     */
    public function target(
        string $target
    ): static {
        $this->setAttribute(
            'target',
            $target
        );

        return $this;
    }


    /**
     * Sets anchor relationship.
     *
     * @param string $rel
     *
     * @return static
     */
    public function rel(
        string $rel
    ): static {
        $this->setAttribute(
            'rel',
            $rel
        );

        return $this;
    }
}
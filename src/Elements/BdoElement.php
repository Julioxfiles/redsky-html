<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML bdo element.
 *
 * The bdo element overrides the current text
 * direction for its content.
 *
 * Common uses:
 *
 * - Right-to-left languages.
 * - Text direction control.
 * - Internationalized applications.
 *
 * @package RedSky\Html\Elements
 */
class BdoElement extends HtmlElement
{
    /**
     * Creates a new bdo element.
     */
    public function __construct()
    {
        parent::__construct('bdo');
    }


    /**
     * Sets text direction.
     *
     * @param string $direction
     *
     * @return static
     */
    public function dir(
        string $direction
    ): static {
        $this->setAttribute(
            'dir',
            $direction
        );

        return $this;
    }
}
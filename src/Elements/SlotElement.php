<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML slot element.
 *
 * The slot element is used in Web Components
 * to define insertion points for custom content.
 *
 * Common uses:
 *
 * - Shadow DOM.
 * - Custom elements.
 * - Component composition.
 *
 * @package RedSky\Html\Elements
 */
class SlotElement extends HtmlElement
{
    /**
     * Creates a new slot element.
     */
    public function __construct()
    {
        parent::__construct('slot');
    }


    /**
     * Sets slot name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->setAttribute(
            'name',
            $name
        );

        return $this;
    }
}
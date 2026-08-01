<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML label element.
 *
 * The label element defines a caption for a form control.
 *
 * @package RedSky\Html\Elements
 */
class LabelElement extends HtmlElement
{
    /**
     * Creates a new label element.
     */
    public function __construct()
    {
        parent::__construct('label');
    }


    /**
     * Associates label with a form control.
     *
     * @param string $for
     *
     * @return static
     */
    public function for(
        string $for
    ): static {
        $this->setAttribute(
            'for',
            $for
        );

        return $this;
    }
}
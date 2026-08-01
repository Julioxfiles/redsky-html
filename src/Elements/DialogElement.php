<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML dialog element.
 *
 * The dialog element represents a dialog box
 * or interactive component such as a modal window.
 *
 * @package RedSky\Html\Elements
 */
class DialogElement extends HtmlElement
{
    /**
     * Creates a new dialog element.
     */
    public function __construct()
    {
        parent::__construct('dialog');
    }


    /**
     * Opens the dialog.
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
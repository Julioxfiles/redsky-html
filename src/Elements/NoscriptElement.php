<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML noscript element.
 *
 * The noscript element defines alternative
 * content to be displayed when scripting is
 * unavailable or has been disabled in the
 * user's browser.
 *
 * @package RedSky\Html\Elements
 */
class NoscriptElement extends HtmlElement
{
    /**
     * Creates a new noscript element.
     */
    public function __construct()
    {
        parent::__construct('noscript');
    }
}
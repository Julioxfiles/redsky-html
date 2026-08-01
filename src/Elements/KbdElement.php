<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML kbd element.
 *
 * The kbd element represents user input from
 * a keyboard, voice command, or other input device.
 *
 * Common uses:
 *
 * - Keyboard shortcuts.
 * - Software documentation.
 * - User instructions.
 *
 * @package RedSky\Html\Elements
 */
class KbdElement extends HtmlElement
{
    /**
     * Creates a new kbd element.
     */
    public function __construct()
    {
        parent::__construct('kbd');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML small element.
 *
 * The small element represents side comments,
 * fine print, or secondary information.
 *
 * Common uses:
 *
 * - Legal notices.
 * - Copyright information.
 * - Additional details.
 *
 * @package RedSky\Html\Elements
 */
class SmallElement extends HtmlElement
{
    /**
     * Creates a new small element.
     */
    public function __construct()
    {
        parent::__construct('small');
    }
}
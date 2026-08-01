<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML bdi element.
 *
 * The bdi element isolates a portion of text
 * that might have different text direction
 * from the surrounding content.
 *
 * Common uses:
 *
 * - User generated content.
 * - Multilingual interfaces.
 * - Right-to-left languages.
 *
 * @package RedSky\Html\Elements
 */
class BdiElement extends HtmlElement
{
    /**
     * Creates a new bdi element.
     */
    public function __construct()
    {
        parent::__construct('bdi');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML rt element.
 *
 * The rt element represents the pronunciation
 * or annotation text of a ruby annotation.
 *
 * Common uses:
 *
 * - Japanese furigana.
 * - East Asian typography.
 * - Language learning applications.
 *
 * @package RedSky\Html\Elements
 */
class RtElement extends HtmlElement
{
    /**
     * Creates a new rt element.
     */
    public function __construct()
    {
        parent::__construct('rt');
    }
}
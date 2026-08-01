<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML ruby element.
 *
 * The ruby element represents a ruby annotation,
 * commonly used to show pronunciation or additional
 * information above or beside East Asian characters.
 *
 * Common uses:
 *
 * - Japanese furigana.
 * - Chinese pronunciation guides.
 * - Language learning interfaces.
 *
 * @package RedSky\Html\Elements
 */
class RubyElement extends HtmlElement
{
    /**
     * Creates a new ruby element.
     */
    public function __construct()
    {
        parent::__construct('ruby');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML mark element.
 *
 * The mark element represents text that is
 * highlighted or marked for reference.
 *
 * Common uses:
 *
 * - Search results.
 * - Highlighted terms.
 * - Important references.
 *
 * @package RedSky\Html\Elements
 */
class MarkElement extends HtmlElement
{
    /**
     * Creates a new mark element.
     */
    public function __construct()
    {
        parent::__construct('mark');
    }
}
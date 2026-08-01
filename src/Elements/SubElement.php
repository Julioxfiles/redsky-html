<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML sub element.
 *
 * The sub element represents text displayed
 * as subscript.
 *
 * Common uses:
 *
 * - Chemical formulas.
 * - Mathematical notation.
 * - Footnote references.
 *
 * @package RedSky\Html\Elements
 */
class SubElement extends HtmlElement
{
    /**
     * Creates a new sub element.
     */
    public function __construct()
    {
        parent::__construct('sub');
    }
}
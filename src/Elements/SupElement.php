<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML superscript element.
 *
 * The sup element represents inline text
 * that should be displayed as superscript.
 *
 * It is commonly used for mathematical
 * exponents, ordinal indicators, and
 * annotations that require elevated text.
 *
 * Example:
 *
 * <code>
 * x<sup>2</sup>
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class SupElement extends HtmlElement
{
    /**
     * Creates a new sup element.
     */
    public function __construct()
    {
        parent::__construct('sup');
    }
}
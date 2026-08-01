<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML variable element.
 *
 * The var element represents the name of a
 * variable in a mathematical expression,
 * programming context, or scientific notation.
 *
 * Browsers commonly render var elements using
 * italic text, but its purpose is semantic
 * identification of variable names.
 *
 * Example:
 *
 * <code>
 * <var>x</var> + <var>y</var> = 10
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class VarElement extends HtmlElement
{
    /**
     * Creates a new var element.
     */
    public function __construct()
    {
        parent::__construct('var');
    }
}
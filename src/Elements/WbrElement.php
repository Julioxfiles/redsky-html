<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML word break opportunity element.
 *
 * The wbr element represents a position within
 * text where the browser may insert a line break
 * when necessary due to limited available space.
 *
 * Unlike the br element, wbr does not force a line
 * break. It only provides a possible breaking point
 * for long words or strings.
 *
 * Example:
 *
 * <code>
 * verylongword<wbr>withbreakpoint
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class WbrElement extends HtmlElement
{
    /**
     * Creates a new wbr element.
     */
    public function __construct()
    {
        parent::__construct('wbr');
    }
}
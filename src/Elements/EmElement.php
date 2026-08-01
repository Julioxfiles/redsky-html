<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML emphasized text element.
 *
 * The em element represents stress emphasis
 * of its contents. It is used to indicate that
 * certain words or phrases should receive
 * special importance when interpreted.
 *
 * Browsers commonly render em elements using
 * italic text, but its primary purpose is
 * semantic meaning rather than visual styling.
 *
 * Example:
 *
 * <code>
 * <em>This word is emphasized.</em>
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class EmElement extends HtmlElement
{
    /**
     * Creates a new em element.
     */
    public function __construct()
    {
        parent::__construct('em');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML unarticulated annotation element.
 *
 * The u element represents text with a non-textual
 * annotation. Historically it was used to underline
 * text, but modern HTML defines it as a semantic
 * annotation rather than a presentation element.
 *
 * Common uses include marking spelling mistakes,
 * annotations, or text requiring special distinction.
 *
 * Example:
 *
 * <code>
 * <u>misspelled</u>
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class UElement extends HtmlElement
{
    /**
     * Creates a new u element.
     */
    public function __construct()
    {
        parent::__construct('u');
    }
}
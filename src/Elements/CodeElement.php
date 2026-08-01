<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML code element.
 *
 * The code element represents a fragment of
 * computer code or programming syntax.
 *
 * Common uses:
 *
 * - Documentation.
 * - Tutorials.
 * - Code examples.
 * - Technical content.
 *
 * @package RedSky\Html\Elements
 */
class CodeElement extends HtmlElement
{
    /**
     * Creates a new code element.
     */
    public function __construct()
    {
        parent::__construct('code');
    }
}
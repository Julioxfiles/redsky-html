<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML dfn element.
 *
 * The dfn element represents the defining instance
 * of a term.
 *
 * Common uses:
 *
 * - Technical documentation.
 * - Glossaries.
 * - Tutorials.
 *
 * @package RedSky\Html\Elements
 */
class DfnElement extends HtmlElement
{
    /**
     * Creates a new dfn element.
     */
    public function __construct()
    {
        parent::__construct('dfn');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML template element.
 *
 * The template element contains HTML fragments
 * that are not rendered immediately, but can be
 * cloned and inserted into the document later.
 *
 * Common uses:
 *
 * - JavaScript templates.
 * - Dynamic components.
 * - Client-side rendering.
 *
 * @package RedSky\Html\Elements
 */
class TemplateElement extends HtmlElement
{
    /**
     * Creates a new template element.
     */
    public function __construct()
    {
        parent::__construct('template');
    }
}
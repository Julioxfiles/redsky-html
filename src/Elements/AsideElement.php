<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML aside element.
 *
 * The aside element represents content that is
 * indirectly related to the main content.
 *
 * Common uses:
 *
 * - Sidebars.
 * - Related links.
 * - Additional information.
 *
 * @package RedSky\Html\Elements
 */
class AsideElement extends HtmlElement
{
    /**
     * Creates a new aside element.
     */
    public function __construct()
    {
        parent::__construct('aside');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <footer> element.
 *
 * A footer represents the closing content for a page or section.
 * It commonly contains copyright information, author details,
 * contact information, related links, or legal notices.
 *
 * Example:
 *
 * ```php
 * $footer = (new Footer())
 *     ->addChild(
 *         (new Paragraph())->text('© 2026 RedSky. All rights reserved.')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <footer>
 *     <p>© 2026 RedSky. All rights reserved.</p>
 * </footer>
 * ```
 */
class Footer extends HtmlComponent
{
    /**
     * Creates a new footer component.
     */
    public function __construct()
    {
        parent::__construct('footer');
    }
}
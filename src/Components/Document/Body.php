<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <body> element.
 *
 * The body element contains all the visible content of an HTML
 * document, including headings, paragraphs, images, forms,
 * navigation, and other user-facing components.
 *
 * Example:
 *
 * ```php
 * $body = (new Body())
 *     ->addChild(
 *         (new Header()),
 *         (new Main()),
 *         (new Footer())
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <body>
 *     <header></header>
 *     <main></main>
 *     <footer></footer>
 * </body>
 * ```
 */
class Body extends HtmlComponent
{
    /**
     * Creates a new body component.
     */
    public function __construct()
    {
        parent::__construct('body');
    }
}
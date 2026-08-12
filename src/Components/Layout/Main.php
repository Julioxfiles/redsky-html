<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <main> element.
 *
 * The main element represents the primary content of the
 * document. It should contain the central topic or functionality
 * of the page and should not include repeated content such as
 * headers, footers, or navigation.
 *
 * A document should contain only one <main> element.
 *
 * Example:
 *
 * ```php
 * $main = (new Main())
 *     ->addChild(
 *         (new Heading(1))->text('Welcome'),
 *         (new Paragraph())->text('This is the main content.')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <main>
 *     <h1>Welcome</h1>
 *     <p>This is the main content.</p>
 * </main>
 * ```
 */
class Main extends HtmlComponent
{
    /**
     * Creates a new main component.
     */
    public function __construct()
    {
        parent::__construct('main');
    }
}
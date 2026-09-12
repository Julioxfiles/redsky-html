<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Main;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <main> element.
 *
 * The Main component generates a semantic HTML <main>
 * element used to contain the primary content of a document.
 *
 * The main content should represent the central topic or
 * functionality of the page and should not contain content
 * that is repeated across documents, such as site navigation,
 * headers, or footers.
 *
 * A document should normally contain only one <main> element.
 *
 * @package RedSky\Html\Components\Layout
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
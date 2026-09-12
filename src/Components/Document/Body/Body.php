<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document\Body;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <body> element.
 *
 * The Body component represents the main container for all
 * visible content of an HTML document.
 *
 * It can contain document-level content such as headers,
 * navigation, main content, footers, sections, forms,
 * paragraphs, and other HTML components.
 *
 * Body extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, and child
 * components.
 *
 * Child components can be added using addChild(), allowing
 * complete document structures to be assembled through fluent
 * PHP code.
 *
 * @package RedSky\Html\Components\Document
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

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
 * The component is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Body())
 *     ->addChild(
 *         new Header(),
 *         new Main(),
 *         new Footer()
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <body>
 *     <header></header>
 *     <main></main>
 *     <footer></footer>
 * </body>
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Document body',
    code: <<<'PHP'
    echo (new Body())
        ->addChild(
            new Header(),
            new Main(),
            new Footer()
        )
        ->render();
    PHP,
    description: 'The Body component represents the HTML <body>
                 element and provides a container for the visible
                 content of an HTML document, including headers,
                 main content, footers, and other components.',
    language: 'php',
    primary: true,
    output: '<body><header></header><main></main><footer></footer></body>'
)]
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
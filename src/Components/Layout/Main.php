<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

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
 * Main extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing the main element to contain headings,
 * paragraphs, sections, articles, and other HTML components.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Main())
 *     ->addChild(
 *         (new Heading(1))->text('Welcome'),
 *         (new Paragraph())->text('This is the main content.')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <main><h1>Welcome</h1><p>This is the main content.</p></main>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Main Content',
    code: <<<'PHP'
    echo (new Main())
        ->addChild(
            (new Heading(1))->text('Welcome'),
            (new Paragraph())->text('This is the main content.')
        )
        ->render();
    PHP,
    description: 'The Main component generates a semantic HTML
                 <main> element for the primary content of a
                 document. It is intended to contain the central
                 topic or functionality of the page.',
    language: 'php',
    primary: true,
    output: '<main><h1>Welcome</h1><p>This is the main content.</p></main>'
)]
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
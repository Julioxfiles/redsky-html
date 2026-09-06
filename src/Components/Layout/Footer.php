<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <footer> element.
 *
 * The Footer component generates a semantic HTML <footer>
 * element used to represent closing or supplementary content
 * for a document, page, section, article, or other content
 * grouping.
 *
 * Common uses include copyright information, author details,
 * contact information, related links, navigation, and legal
 * notices.
 *
 * A footer can belong to the overall document or to a specific
 * sectioning element such as Article or Section.
 *
 * Footer extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing a footer to contain paragraphs, links,
 * navigation elements, and other HTML components.
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
 * echo (new Footer())
 *     ->addChild(
 *         (new Paragraph())->text('© 2026 RedSky. All rights reserved.')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <footer><p>© 2026 RedSky. All rights reserved.</p></footer>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Page Footer',
    code: <<<'PHP'
    echo (new Footer())
        ->addChild(
            (new Paragraph())->text('© 2026 RedSky. All rights reserved.')
        )
        ->render();
    PHP,
    description: 'The Footer component generates a semantic
                 HTML <footer> element for closing or supplementary
                 content belonging to a document, page, section,
                 or article.',
    language: 'php',
    primary: true,
    output: '<footer><p>© 2026 RedSky. All rights reserved.</p></footer>'
)]
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
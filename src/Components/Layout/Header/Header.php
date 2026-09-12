<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Header;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <header> element.
 *
 * The Header component generates a semantic HTML <header>
 * element used to represent introductory or navigational
 * content for a document, page, section, or article.
 *
 * Common uses include page headings, logos, navigation menus,
 * search forms, introductory information, and other content
 * associated with the beginning of a section.
 *
 * A header can belong to the overall document or to a specific
 * sectioning element such as Article or Section.
 *
 * Header extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing a header to contain headings, paragraphs,
 * navigation elements, images, and other HTML components.
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
 * echo (new Header())
 *     ->addChild(
 *         (new Heading(1))->text('RedSky Framework'),
 *         (new Paragraph())->text('Modern PHP Components')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <header><h1>RedSky Framework</h1><p>Modern PHP Components</p></header>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Page Header',
    code: <<<'PHP'
    echo (new Header())
        ->addChild(
            (new Heading(1))->text('RedSky Framework'),
            (new Paragraph())->text('Modern PHP Components')
        )
        ->render();
    PHP,
    description: 'The Header component generates a semantic
                 HTML <header> element for introductory or
                 navigational content belonging to a document,
                 page, section, or article.',
    language: 'php',
    primary: true,
    output: '<header><h1>RedSky Framework</h1><p>Modern PHP Components</p></header>'
)]
class Header extends HtmlComponent
{
    /**
     * Creates a new header component.
     */
    public function __construct()
    {
        parent::__construct('header');
    }
}
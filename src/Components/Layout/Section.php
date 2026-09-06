<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <section> element.
 *
 * The Section component generates a semantic HTML <section>
 * element used to represent a thematic grouping of related
 * content within a document.
 *
 * A section commonly represents a distinct topic or subject
 * and will typically contain its own heading. It can be used
 * to organize the primary content of a page into meaningful
 * structural groups.
 *
 * Section extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method. Attributes such as id can also be configured through
 * inherited methods.
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
 * echo (new Section())
 *     ->id('about')
 *     ->addChild(
 *         (new Heading(2))->text('About Us'),
 *         (new Paragraph())->text('Company information...')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <section id="about"><h2>About Us</h2><p>Company information...</p></section>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Content Section',
    code: <<<'PHP'
    echo (new Section())
        ->id('about')
        ->addChild(
            (new Heading(2))->text('About Us'),
            (new Paragraph())->text('Company information...')
        )
        ->render();
    PHP,
    description: 'The Section component generates a semantic
                 HTML <section> element for grouping related
                 content around a specific topic or theme.
                 Sections commonly contain their own heading.',
    language: 'php',
    primary: true,
    output: '<section id="about"><h2>About Us</h2><p>Company information...</p></section>'
)]
class Section extends HtmlComponent
{
    /**
     * Creates a new section component.
     */
    public function __construct()
    {
        parent::__construct('section');
    }
}
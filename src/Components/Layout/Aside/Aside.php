<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Aside;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <aside> element.
 *
 * The Aside component generates a semantic HTML <aside>
 * element used for content that is indirectly related to
 * the surrounding content.
 *
 * Common uses include sidebars, related articles, notes,
 * advertisements, navigation links, supplementary information,
 * and other complementary content.
 *
 * Aside extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing an aside to contain headings, lists,
 * paragraphs, links, and other HTML components.
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
 * echo (new Aside())
 *     ->addChild(
 *         (new Heading(3))->text('Related Articles'),
 *         (new UnorderedList())
 *             ->addChild(new ListItem('Getting Started'))
 *             ->addChild(new ListItem('Advanced Topics'))
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <aside><h3>Related Articles</h3><ul><li>Getting Started</li><li>Advanced Topics</li></ul></aside>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Related Content',
    code: <<<'PHP'
    echo (new Aside())
        ->addChild(
            (new Heading(3))->text('Related Articles'),
            (new UnorderedList())
                ->addChild(new ListItem('Getting Started'))
                ->addChild(new ListItem('Advanced Topics'))
        )
        ->render();
    PHP,
    description: 'The Aside component generates a semantic HTML
                 <aside> element for complementary content that
                 is indirectly related to the surrounding content.
                 Child components can be added using the inherited
                 addChild() method.',
    language: 'php',
    primary: true,
    output: '<aside><h3>Related Articles</h3><ul><li>Getting Started</li><li>Advanced Topics</li></ul></aside>'
)]
class Aside extends HtmlComponent
{
    /**
     * Creates a new aside component.
     */
    public function __construct()
    {
        parent::__construct('aside');
    }
}
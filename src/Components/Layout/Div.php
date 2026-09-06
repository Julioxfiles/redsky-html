<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <div> element.
 *
 * The Div component generates a generic HTML <div> element
 * used as a block-level container for grouping and organizing
 * other HTML components.
 *
 * Unlike semantic layout elements such as Article or Aside,
 * the <div> element does not convey any specific semantic
 * meaning. It is intended for generic structural purposes.
 *
 * Div extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing the div to contain paragraphs, headings,
 * sections, other containers, and other HTML components.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * UI framework-specific classes and styling can be applied
 * explicitly or handled by higher-level layers such as redsky-ui.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Div())
 *     ->class('container')
 *     ->addChild(
 *         (new Paragraph())->text('Hello World')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <div class="container"><p>Hello World</p></div>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Generic Container',
    code: <<<'PHP'
    echo (new Div())
        ->class('container')
        ->addChild(
            (new Paragraph())->text('Hello World')
        )
        ->render();
    PHP,
    description: 'The Div component generates a generic HTML
                 <div> element for grouping and organizing
                 other HTML components. Unlike semantic layout
                 elements, it does not impose a specific meaning
                 on its content.',
    language: 'php',
    primary: true,
    output: '<div class="container"><p>Hello World</p></div>'
)]
class Div extends HtmlComponent
{
    /**
     * Creates a new div component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }
}
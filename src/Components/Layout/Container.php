<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents a generic HTML container component.
 *
 * The Container component generates a neutral HTML <div>
 * element that can be used as a reusable structural container
 * for grouping other HTML components.
 *
 * Container extends HtmlComponent and inherits common
 * functionality for managing attributes, classes, styles,
 * content, children, rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing the container to group any compatible HTML
 * components.
 *
 * The component does not impose any semantic meaning beyond
 * the generic <div> element and does not apply default CSS
 * classes or styles.
 *
 * Container is UI-library agnostic. UI framework-specific
 * classes and styling are handled by higher-level layers
 * such as redsky-ui.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Container())
 *     ->addChild(
 *         (new Heading(2))->text('Welcome'),
 *         (new Paragraph())->text('Welcome to RedSky.')
 *     )
 *     ->attribute('id', 'welcome')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <div id="welcome"><h2>Welcome</h2><p>Welcome to RedSky.</p></div>
 * ```
 *
 * @package RedSky\Html\Components\Container
 */
#[Example(
    title: 'Content Container',
    code: <<<'PHP'
    echo (new Container())
        ->addChild(
            (new Heading(2))->text('Welcome'),
            (new Paragraph())->text('Welcome to RedSky.')
        )
        ->attribute('id', 'welcome')
        ->render();
    PHP,
    description: 'The Container component generates a generic
                 <div> element for grouping other HTML components.
                 It provides a neutral structural container without
                 imposing semantic meaning or UI framework styling.',
    language: 'php',
    primary: true,
    output: '<div id="welcome"><h2>Welcome</h2><p>Welcome to RedSky.</p></div>'
)]
class Container extends HtmlComponent
{
    /**
     * Creates a new container component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }
}
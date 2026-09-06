<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML navigation component.
 *
 * The Nav component generates a semantic HTML <nav>
 * element used to contain navigation links and other
 * navigation-related content.
 *
 * Navigation content can be added using the child-management
 * methods inherited from HtmlComponent, such as addChild().
 *
 * Common attributes and rendering methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Navigation
 */
#[Example(
    title: 'Navigation',
    code: <<<'PHP'
    echo (new Nav())
        ->addChild(
            (new Link('/home', 'Home')),
            (new Link('/about', 'About')),
            (new Link('/contact', 'Contact'))
        )
        ->attribute('aria-label', 'Main navigation')
        ->render();
    PHP,
    description: 'Creates a semantic navigation region containing
                 links to different sections of an application.',
    language: 'php',
    primary: true,
    output: '<nav aria-label="Main navigation"><a href="/home">Home</a><a href="/about">About</a><a href="/contact">Contact</a></nav>'
)]
class Nav extends HtmlComponent
{
    /**
     * Creates a new navigation component.
     *
     * The component generates an HTML <nav> element
     * that can contain navigation links or other
     * navigation-related components.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }
}
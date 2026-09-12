<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document\Head;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <head> element.
 *
 * The Head component represents the metadata section of an HTML
 * document. It contains information and resources that describe
 * or support the document but are not displayed as its main
 * visible content.
 *
 * Head can contain elements such as Title, Meta, Link, Style,
 * and Script components. Dedicated methods are provided for
 * adding each of these component types.
 *
 * The component extends HtmlComponent and inherits common
 * functionality for managing attributes, styles, classes,
 * content, and child components.
 *
 * Child components are added in document order, allowing the
 * head section to be assembled programmatically using fluent
 * method chaining.
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
 * echo (new Head())
 *     ->addTitle(new Title('RedSky'))
 *     ->addMeta(
 *         (new Meta())->charset('UTF-8')
 *     )
 *     ->addLink(
 *         (new Link())->stylesheet('/css/app.css')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <head>
 *     <title>RedSky</title>
 *     <meta charset="UTF-8" />
 *     <link rel="stylesheet" href="/css/app.css" />
 * </head>
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Document head',
    code: <<<'PHP'
    echo (new Head())
        ->addTitle(new Title('RedSky'))
        ->addMeta(
            (new Meta())->charset('UTF-8')
        )
        ->addLink(
            (new Link())->stylesheet('/css/app.css')
        )
        ->render();
    PHP,
    description: 'The Head component represents the HTML <head>
                 element and provides dedicated methods for adding
                 document metadata and resources such as titles,
                 meta elements, stylesheets, styles, and scripts.',
    language: 'php',
    primary: true,
    output: '<head><title>RedSky</title><meta charset="UTF-8" /><link rel="stylesheet" href="/css/app.css" /></head>'
)]
class Head extends HtmlComponent
{
    /**
     * Creates a new head component.
     */
    public function __construct()
    {
        parent::__construct('head');
    }

    /**
     * Adds a title element to the document head.
     *
     * @param Title $title Title component to add.
     *
     * @return static
     */
    public function addTitle(Title $title): static
    {
        return $this->addChild($title);
    }

    /**
     * Adds a meta element to the document head.
     *
     * @param Meta $meta Meta component to add.
     *
     * @return static
     */
    public function addMeta(Meta $meta): static
    {
        return $this->addChild($meta);
    }

    /**
     * Adds a link element to the document head.
     *
     * @param Link $link Link component to add.
     *
     * @return static
     */
    public function addLink(Link $link): static
    {
        return $this->addChild($link);
    }

    /**
     * Adds a style element to the document head.
     *
     * @param Style $style Style component to add.
     *
     * @return static
     */
    public function addStyle(Style $style): static
    {
        return $this->addChild($style);
    }

    /**
     * Adds a script element to the document head.
     *
     * @param Script $script Script component to add.
     *
     * @return static
     */
    public function addScript(Script $script): static
    {
        return $this->addChild($script);
    }
}
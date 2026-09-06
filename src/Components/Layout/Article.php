<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <article> element.
 *
 * The Article component generates a semantic HTML <article>
 * element used to represent an independent, self-contained
 * piece of content.
 *
 * Typical uses include blog posts, news articles, forum posts,
 * comments, product entries, or other content that could be
 * distributed or reused independently from the surrounding page.
 *
 * Article extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Child components can be added using the inherited addChild()
 * method, allowing an article to contain headings, paragraphs,
 * images, sections, and other HTML components.
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
 * echo (new Article())
 *     ->addChild(
 *         (new Heading(2))->text('Introducing RedSky'),
 *         (new Paragraph())->text('RedSky is a PHP ecosystem...')
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <article><h2>Introducing RedSky</h2><p>RedSky is a PHP ecosystem...</p></article>
 * ```
 *
 * @package RedSky\Html\Components\Layout
 */
#[Example(
    title: 'Article Content',
    code: <<<'PHP'
    echo (new Article())
        ->addChild(
            (new Heading(2))->text('Introducing RedSky'),
            (new Paragraph())->text('RedSky is a PHP ecosystem...')
        )
        ->render();
    PHP,
    description: 'The Article component generates a semantic HTML
                 <article> element for independent, self-contained
                 content. Child components can be added using the
                 inherited addChild() method.',
    language: 'php',
    primary: true,
    output: '<article><h2>Introducing RedSky</h2><p>RedSky is a PHP ecosystem...</p></article>'
)]
class Article extends HtmlComponent
{
    /**
     * Creates a new article component.
     */
    public function __construct()
    {
        parent::__construct('article');
    }
}
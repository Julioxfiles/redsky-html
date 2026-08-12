<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <article> element.
 *
 * An independent, self-contained piece of content that can be
 * distributed or reused separately, such as a blog post,
 * news article, forum post, or comment.
 *
 * Example:
 *
 * ```php
 * $article = (new Article())
 *     ->addChild(
 *         (new Heading(2))->text('Introducing RedSky'),
 *         (new Paragraph())->text('RedSky is a PHP ecosystem...')
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <article>
 *     <h2>Introducing RedSky</h2>
 *     <p>RedSky is a PHP ecosystem...</p>
 * </article>
 * ```
 */
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
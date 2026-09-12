<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Article;

use RedSky\Html\Components\HtmlComponent;


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
 * @package RedSky\Html\Components\Layout
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
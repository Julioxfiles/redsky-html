<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML article element.
 *
 * The article element represents independent,
 * self-contained content.
 *
 * @package RedSky\Html\Elements
 */
class ArticleElement extends HtmlElement
{
    /**
     * Creates a new article element.
     */
    public function __construct()
    {
        parent::__construct('article');
    }
}
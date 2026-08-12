<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <title> element.
 *
 * The title element defines the title of the HTML document.
 * It is displayed in the browser tab and used by search
 * engines and bookmarks.
 *
 * Example:
 *
 * ```php
 * $title = new Title('RedSky Framework');
 * ```
 *
 * Renders:
 *
 * ```html
 * <title>RedSky Framework</title>
 * ```
 */
class Title extends HtmlComponent
{
    /**
     * Creates a new title component.
     *
     * @param string|null $title
     */
    public function __construct(?string $title = null)
    {
        parent::__construct('title');

        if ($title !== null) {
            $this->text($title);
        }
    }
}
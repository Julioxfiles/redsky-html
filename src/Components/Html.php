<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

use RedSky\Html\Components\HtmlComponent;

/**
 * Provides factory methods for creating HTML elements.
 *
 * @package RedSky\Html
 */
class Html
{
    /**
     * Creates a generic HTML element.
     */
    public static function make(string $tag): HtmlComponent
    {
        return new HtmlComponent($tag);
    }
}
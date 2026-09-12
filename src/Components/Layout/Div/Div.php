<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Div;

use RedSky\Html\Components\HtmlComponent;


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
 * @package RedSky\Html\Components\Layout
 */
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
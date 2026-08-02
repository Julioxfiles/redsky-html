<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML map element.
 *
 * The map element defines an image map that
 * contains one or more clickable area elements.
 * It is associated with an img element through
 * the usemap attribute.
 *
 * @package RedSky\Html\Elements
 */
class MapElement extends HtmlElement
{
    /**
     * Creates a new map element.
     */
    public function __construct()
    {
        parent::__construct('map');
    }


    /**
     * Sets the name of the image map.
     *
     * The value is referenced by an img element
     * through its usemap attribute.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->setAttribute(
            'name',
            $name
        );

        return $this;
    }
}
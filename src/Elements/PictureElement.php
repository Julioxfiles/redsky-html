<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML picture element.
 *
 * The picture element provides multiple image sources
 * for responsive image rendering.
 *
 * @package RedSky\Html\Elements
 */
class PictureElement extends HtmlElement
{
    /**
     * Creates a new picture element.
     */
    public function __construct()
    {
        parent::__construct('picture');
    }
}
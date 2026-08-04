<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML picture component.
 *
 * The picture component generates a semantic HTML
 * picture element used for responsive images.
 *
 * A picture element typically contains one or more
 * Source components followed by a single Image component.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Media
 */
class Picture extends HtmlComponent
{
    /**
     * Creates a new picture component.
     */
    public function __construct()
    {
        parent::__construct('picture');
    }


    /**
     * Adds a source element.
     *
     * @param Source $source
     *
     * @return static
     */
    public function addSource(
        Source $source
    ): static {
        return $this->addChild($source);
    }


    /**
     * Adds multiple source elements.
     *
     * @param array<int, Source> $sources
     *
     * @return static
     */
    public function addSources(
        array $sources
    ): static {
        foreach ($sources as $source) {
            $this->addSource($source);
        }

        return $this;
    }


    /**
     * Sets the fallback image.
     *
     * Only one img element should exist
     * inside a picture element.
     *
     * @param Image $image
     *
     * @return static
     */
    public function image(
        Image $image
    ): static {
        return $this->addChild($image);
    }
}
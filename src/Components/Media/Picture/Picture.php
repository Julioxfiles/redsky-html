<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media\Picture;

use RedSky\Html\Components\HtmlComponent;

use RedSky\Html\Components\Media\Source\Source;
use RedSky\Html\Components\Media\Image\Image;

/**
 * Represents an HTML <picture> element.
 *
 * The Picture component generates a semantic HTML <picture>
 * element used to provide responsive or art-directed images.
 *
 * A picture element typically contains one or more Source
 * components that define alternative image resources, followed
 * by a single Image component that acts as the fallback image.
 *
 * Sources can be added individually using addSource() or
 * in groups using addSources(). The fallback image is added
 * using image().
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
     * Adds a source element to the picture.
     *
     * Source elements define alternative image resources
     * that the browser can select based on the source
     * configuration.
     *
     * @param Source $source Image source component.
     *
     * @return static
     */
    public function addSource(
        Source $source
    ): static {
        return $this->addChild($source);
    }

    /**
     * Adds multiple source elements to the picture.
     *
     * @param array<int, Source> $sources Image source components.
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
     * Sets the fallback image for the picture.
     *
     * The Image component should normally be placed after
     * all Source components and provides the image used when
     * none of the specified sources is selected.
     *
     * @param Image $image Fallback image component.
     *
     * @return static
     */
    public function image(
        Image $image
    ): static {
        return $this->addChild($image);
    }
}
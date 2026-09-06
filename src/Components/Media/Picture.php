<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Media;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

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
 * Picture extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Picture())
 *     ->addSource(
 *         (new Source('/images/photo.webp'))
 *             ->type('image/webp')
 *     )
 *     ->image(
 *         new Image(
 *             '/images/photo.jpg',
 *             'RedSky example'
 *         )
 *     )
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <picture><source src="/images/photo.webp" type="image/webp" /><img src="/images/photo.jpg" alt="RedSky example" /></picture>
 * ```
 *
 * @package RedSky\Html\Components\Media
 */
#[Example(
    title: 'Responsive Picture',
    code: <<<'PHP'
    echo (new Picture())
        ->addSource(
            (new Source('/images/photo.webp'))
                ->type('image/webp')
        )
        ->image(
            new Image(
                '/images/photo.jpg',
                'RedSky example'
            )
        )
        ->render();
    PHP,
    description: 'The Picture component generates a semantic HTML <picture> element for responsive or art-directed images. One or more Source components can provide alternative image resources, while an Image component provides the fallback image.',
    language: 'php',
    primary: true,
    output: '<picture><source src="/images/photo.webp" type="image/webp" /><img src="/images/photo.jpg" alt="RedSky example" /></picture>'
)]
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
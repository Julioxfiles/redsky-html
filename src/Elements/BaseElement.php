<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML document base URL element.
 *
 * The base element specifies the base URL and
 * default browsing context for all relative URLs
 * within a document.
 *
 * A document should contain no more than one
 * base element, and it is usually placed inside
 * the head element.
 *
 * Example:
 *
 * <code>
 * <base href="https://example.com/">
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class BaseElement extends HtmlElement
{
    /**
     * Creates a new base element.
     */
    public function __construct()
    {
        parent::__construct('base');
    }


    /**
     * Sets the base URL for the document.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $this->setAttribute(
            'href',
            $href
        );

        return $this;
    }


    /**
     * Sets the default browsing context.
     *
     * @param string $target
     *
     * @return static
     */
    public function target(
        string $target
    ): static {
        $this->setAttribute(
            'target',
            $target
        );

        return $this;
    }
}
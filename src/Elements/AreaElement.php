<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML area element.
 *
 * The area element defines a clickable region inside
 * an image map. It is always associated with a map
 * element and is typically used together with an img
 * element that references the map through the usemap
 * attribute.
 *
 * @package RedSky\Html\Elements
 */
class AreaElement extends HtmlElement
{
    /**
     * Creates a new area element.
     */
    public function __construct()
    {
        parent::__construct('area');
    }


    /**
     * Sets the alternative text for the area.
     *
     * @param string $alt
     *
     * @return static
     */
    public function alt(
        string $alt
    ): static {
        $this->setAttribute(
            'alt',
            $alt
        );

        return $this;
    }


    /**
     * Sets the coordinates that define the area.
     *
     * @param string $coords
     *
     * @return static
     */
    public function coords(
        string $coords
    ): static {
        $this->setAttribute(
            'coords',
            $coords
        );

        return $this;
    }


    /**
     * Sets the hyperlink target for the area.
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
     * Sets the relationship between the linked resource
     * and the current document.
     *
     * @param string $rel
     *
     * @return static
     */
    public function rel(
        string $rel
    ): static {
        $this->setAttribute(
            'rel',
            $rel
        );

        return $this;
    }


    /**
     * Sets the shape of the clickable region.
     *
     * @param string $shape
     *
     * @return static
     */
    public function shape(
        string $shape
    ): static {
        $this->setAttribute(
            'shape',
            $shape
        );

        return $this;
    }


    /**
     * Sets the browsing context used to open the link.
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


    /**
     * Specifies the download filename for the linked resource.
     *
     * @param string $download
     *
     * @return static
     */
    public function download(
        string $download
    ): static {
        $this->setAttribute(
            'download',
            $download
        );

        return $this;
    }


    /**
     * Sets the referrer policy for the request.
     *
     * @param string $policy
     *
     * @return static
     */
    public function referrerPolicy(
        string $policy
    ): static {
        $this->setAttribute(
            'referrerpolicy',
            $policy
        );

        return $this;
    }
}
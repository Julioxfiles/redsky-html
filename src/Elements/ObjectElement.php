<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML object element.
 *
 * The object element represents an external resource
 * embedded in an HTML document.
 *
 * Common uses:
 *
 * - PDF documents.
 * - External applications.
 * - Multimedia resources.
 *
 * @package RedSky\Html\Elements
 */
class ObjectElement extends HtmlElement
{
    /**
     * Creates a new object element.
     */
    public function __construct()
    {
        parent::__construct('object');
    }


    /**
     * Sets external resource URL.
     *
     * @param string $data
     *
     * @return static
     */
    public function data(
        string $data
    ): static {
        $this->setAttribute(
            'data',
            $data
        );

        return $this;
    }


    /**
     * Sets resource type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->setAttribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Sets object width.
     *
     * @param int $width
     *
     * @return static
     */
    public function width(
        int $width
    ): static {
        $this->setAttribute(
            'width',
            $width
        );

        return $this;
    }


    /**
     * Sets object height.
     *
     * @param int $height
     *
     * @return static
     */
    public function height(
        int $height
    ): static {
        $this->setAttribute(
            'height',
            $height
        );

        return $this;
    }
}
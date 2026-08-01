<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML meta element.
 *
 * The meta element provides metadata about an HTML document,
 * such as charset, viewport configuration, and descriptions.
 *
 * @package RedSky\Html\Elements
 */
class MetaElement extends HtmlElement
{
    /**
     * Creates a new meta element.
     */
    public function __construct()
    {
        parent::__construct('meta');
    }


    /**
     * Sets meta name attribute.
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


    /**
     * Sets meta content attribute.
     *
     * @param string $value
     *
     * @return static
     */
    public function contentValue(
        string $value
    ): static {
        $this->setAttribute(
            'content',
            $value
        );

        return $this;
    }


    /**
     * Sets charset attribute.
     *
     * @param string $charset
     *
     * @return static
     */
    public function charset(
        string $charset
    ): static {
        $this->setAttribute(
            'charset',
            $charset
        );

        return $this;
    }


    /**
     * Sets HTTP equivalent attribute.
     *
     * @param string $value
     *
     * @return static
     */
    public function httpEquiv(
        string $value
    ): static {
        $this->setAttribute(
            'http-equiv',
            $value
        );

        return $this;
    }


    /**
     * Renders meta element.
     *
     * Meta is an HTML void element.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '<' . $this->tag;

        if ($this->attributes()->canRenderAttributes()) {
            $html .= ' ' . $this->attributes()->renderAttributes();
        }

        $html .= '>';

        return $html;
    }
}
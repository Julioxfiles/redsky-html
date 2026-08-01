<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML script element.
 *
 * The script element embeds executable code
 * or references an external script file.
 *
 * @package RedSky\Html\Elements
 */
class ScriptElement extends HtmlElement
{
    /**
     * Creates a new script element.
     */
    public function __construct()
    {
        parent::__construct('script');
    }


    /**
     * Sets script source.
     *
     * @param string $src
     *
     * @return static
     */
    public function src(
        string $src
    ): static {
        $this->setAttribute(
            'src',
            $src
        );

        return $this;
    }


    /**
     * Sets script type.
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
     * Sets async loading.
     *
     * @param bool $async
     *
     * @return static
     */
    public function async(
        bool $async = true
    ): static {
        $this->setAttribute(
            'async',
            $async
        );

        return $this;
    }


    /**
     * Sets defer loading.
     *
     * @param bool $defer
     *
     * @return static
     */
    public function defer(
        bool $defer = true
    ): static {
        $this->setAttribute(
            'defer',
            $defer
        );

        return $this;
    }


    /**
     * Adds inline JavaScript content.
     *
     * @param string $script
     *
     * @return static
     */
    public function script(
        string $script
    ): static {
        $this->content($script);

        return $this;
    }
}
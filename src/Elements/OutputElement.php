<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML output element.
 *
 * The output element represents the result of
 * a calculation or user action.
 *
 * @package RedSky\Html\Elements
 */
class OutputElement extends HtmlElement
{
    /**
     * Creates a new output element.
     */
    public function __construct()
    {
        parent::__construct('output');
    }


    /**
     * Sets output name.
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
     * Sets associated form.
     *
     * @param string $form
     *
     * @return static
     */
    public function form(
        string $form
    ): static {
        $this->setAttribute(
            'form',
            $form
        );

        return $this;
    }


    /**
     * Sets output relationship.
     *
     * @param string $for
     *
     * @return static
     */
    public function for(
        string $for
    ): static {
        $this->setAttribute(
            'for',
            $for
        );

        return $this;
    }
}
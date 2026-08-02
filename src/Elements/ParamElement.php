<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML param element.
 *
 * The param element defines a parameter for an
 * object element. Although it is deprecated in
 * modern HTML, it is included for compatibility
 * with legacy documents.
 *
 * @package RedSky\Html\Elements
 */
class ParamElement extends HtmlElement
{
    /**
     * Creates a new param element.
     */
    public function __construct()
    {
        parent::__construct('param');
    }


    /**
     * Sets the name of the parameter.
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
     * Sets the value of the parameter.
     *
     * @param string $value
     *
     * @return static
     */
    public function value(
        string $value
    ): static {
        $this->setAttribute(
            'value',
            $value
        );

        return $this;
    }
}
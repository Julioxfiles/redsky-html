<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML color input component.
 *
 * The color input component generates
 * an input element with type="color".
 *
 * @package RedSky\Html\Components\Form
 */
class ColorInput extends Input
{
    /**
     * Creates a new color input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'color',
            $name
        );
    }

        /**
     * Sets hexadecimal color value.
     *
     * @param string $color
     *
     * @return static
     */
    public function color(
        string $color
    ): static {
        $this->value($color);

        return $this;
    }


    /**
     * Sets black color.
     *
     * @return static
     */
    public function black(): static
    {
        return $this->color('#000000');
    }


    /**
     * Sets white color.
     *
     * @return static
     */
    public function white(): static
    {
        return $this->color('#ffffff');
    }


    /**
     * Sets red color.
     *
     * @return static
     */
    public function red(): static
    {
        return $this->color('#ff0000');
    }


    /**
     * Sets green color.
     *
     * @return static
     */
    public function green(): static
    {
        return $this->color('#00ff00');
    }


    /**
     * Sets blue color.
     *
     * @return static
     */
    public function blue(): static
    {
        return $this->color('#0000ff');
    }
}
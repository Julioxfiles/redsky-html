<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\ColorInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * The ColorInput component generates a native HTML
 * <input type="color"> element that allows users to
 * select a color.
 *
 * The selected color is submitted by the browser as a
 * hexadecimal color value.
 *
 * ColorInput provides methods for setting the selected color
 * using a custom hexadecimal value or predefined colors.
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
     * Sets the selected hexadecimal color value.
     *
     * @param string $color Hexadecimal color value.
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
     * Sets the selected color to black.
     *
     * @return static
     */
    public function black(): static
    {
        return $this->color('#000000');
    }


    /**
     * Sets the selected color to white.
     *
     * @return static
     */
    public function white(): static
    {
        return $this->color('#ffffff');
    }


    /**
     * Sets the selected color to red.
     *
     * @return static
     */
    public function red(): static
    {
        return $this->color('#ff0000');
    }


    /**
     * Sets the selected color to green.
     *
     * @return static
     */
    public function green(): static
    {
        return $this->color('#00ff00');
    }


    /**
     * Sets the selected color to blue.
     *
     * @return static
     */
    public function blue(): static
    {
        return $this->color('#0000ff');
    }
}
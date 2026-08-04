<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML select component.
 *
 * The select component generates a semantic HTML
 * select element used to provide selectable options.
 *
 * Options should be added as child components
 * using Option components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Select extends HtmlComponent
{
    /**
     * Creates a new select component.
     */
    public function __construct()
    {
        parent::__construct('select');
    }


    /**
     * Sets select name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        return $this->attribute(
            'name',
            $name
        );
    }


    /**
     * Enables multiple selection.
     *
     * @param bool $multiple
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {
        return $this->attribute(
            'multiple',
            $multiple
        );
    }


    /**
     * Marks select as required.
     *
     * @param bool $required
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        return $this->attribute(
            'required',
            $required
        );
    }

    /**
     * Adds a single option.
     *
     * @param string $text
     * @param mixed $value
     *
     * @return static
     */
    public function addOption(
        string $text,
        mixed $value
    ): static {
        $this->addChild(
            new Option(
                $text,
                $value
            )
        );

        return $this;
    }

    /**
 * Adds multiple options from an associative array.
 *
 * @param array<string, mixed> $options
 *
 * @return static
 */
    public function addOptions(
        array $options
    ): static {
        foreach ($options as $text => $value) {

            $this->addOption(
                $text,
                $value
            );
        }

        return $this;
    }

        /**
     * Sets selected option value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function selected(
        mixed $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }


    /**
     * Adds a single option.
     *
     * Alias of addOption().
     *
     * @param string $text
     * @param mixed $value
     *
     * @return static
     */
    public function option(
        string $text,
        mixed $value
    ): static {
        return $this->addOption(
            $text,
            $value
        );
    }


    /**
     * Adds multiple options.
     *
     * Alias of addOptions().
     *
     * @param array<string, mixed> $options
     *
     * @return static
     */
    public function options(
        array $options
    ): static {
        return $this->addOptions(
            $options
        );
    }


    /**
     * Sets disabled state.
     *
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        return $this->attribute(
            'disabled',
            $disabled
        );
    }


    /**
     * Sets visible option count.
     *
     * @param int $size
     *
     * @return static
     */
    public function size(
        int $size
    ): static {
        return $this->attribute(
            'size',
            $size
        );
    }

}
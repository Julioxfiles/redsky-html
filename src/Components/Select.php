<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

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
 * @package RedSky\Html\Components
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

}
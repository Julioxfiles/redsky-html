<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML fieldset element.
 *
 * The fieldset element groups related controls
 * inside an HTML form.
 *
 * Common uses:
 *
 * - Grouping form sections.
 * - Organizing related inputs.
 * - Improving accessibility.
 *
 * @package RedSky\Html\Elements
 */
class FieldSetElement extends HtmlElement
{
    /**
     * Creates a new fieldset element.
     */
    public function __construct()
    {
        parent::__construct('fieldset');
    }


    /**
     * Disables all controls inside the fieldset.
     *
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        $this->setAttribute(
            'disabled',
            $disabled
        );

        return $this;
    }


    /**
     * Sets fieldset name.
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
}
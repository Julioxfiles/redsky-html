<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\Option;

use RedSky\Html\Components\HtmlComponent;


/**
 * The Option component generates a native HTML
 * <option> element for use inside select components.
 *
 * An option can define a display text, value, selected state,
 * disabled state, and optional label.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Option extends HtmlComponent
{
    /**
     * Creates a new option component.
     *
     * The text is used as the visible option label,
     * while the value is submitted when the containing
     * select element is submitted.
     *
     * @param string|null $text Option text displayed to the user.
     * @param mixed|null $value Option value submitted with the form.
     */
    public function __construct(
        ?string $text = null,
        mixed $value = null
    ) {
        parent::__construct('option');

        if ($value !== null) {
            $this->value($value);
        }

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets the option value.
     *
     * The value is assigned to the HTML value attribute.
     * This is the value submitted by the browser when the
     * containing select element is submitted.
     *
     * @param mixed $value Option value.
     *
     * @return static
     */
    public function value(
        mixed $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }


    /**
     * Marks the option as selected.
     *
     * When enabled, the selected attribute is added to
     * the generated option element.
     *
     * Passing false removes or disables the selected state,
     * depending on the attribute rendering behavior.
     *
     * @param bool $selected Whether the option is selected.
     *
     * @return static
     */
    public function selected(
        bool $selected = true
    ): static {
        return $this->attribute(
            'selected',
            $selected
        );
    }


    /**
     * Sets the disabled state of the option.
     *
     * A disabled option cannot be selected by the user.
     *
     * @param bool $disabled Whether the option is disabled.
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
     * Sets the option label.
     *
     * The label attribute provides an alternative label
     * for the option and can be used by the browser when
     * displaying the option.
     *
     * @param string $label Option label.
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        return $this->attribute(
            'label',
            $label
        );
    }
}
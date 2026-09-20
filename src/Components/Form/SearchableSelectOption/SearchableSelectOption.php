<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\SearchableSelectOption;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an option within a SearchableSelect component.
 *
 * The SearchableSelectOption component generates a semantic
 * HTML element used to represent an individual selectable
 * option in a SearchableSelect.
 *
 * An option can define display text, value, selected state,
 * disabled state, and an optional label.
 *
 * This component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form\SearchableSelect
 */
class SearchableSelectOption extends HtmlComponent
{
    /**
     * Creates a new searchable select option.
     *
     * @param string|null $text Option text displayed to the user.
     * @param mixed|null $value Option value.
     */
    public function __construct(
        ?string $text = null,
        mixed $value = null
    ) {
        parent::__construct('div');

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
     * The value is stored in a data attribute because this
     * component is not a native HTML <option> element.
     *
     * @param mixed $value Option value.
     *
     * @return static
     */
    public function value(
        mixed $value
    ): static {
        return $this->data(
            'value',
            $value
        );
    }


    /**
     * Marks the option as selected.
     *
     * @param bool $selected Whether the option is selected.
     *
     * @return static
     */
    public function selected(
        bool $selected = true
    ): static {
        return $this->attribute(
            'aria-selected',
            $selected ? 'true' : 'false'
        );
    }


    /**
     * Sets the disabled state of the option.
     *
     * @param bool $disabled Whether the option is disabled.
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        return $this->attribute(
            'aria-disabled',
            $disabled ? 'true' : 'false'
        );
    }


    /**
     * Sets an alternative label for the option.
     *
     * The label is stored as a data attribute and can be
     * used by the SearchableSelect filtering behavior.
     *
     * @param string $label Option label.
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        return $this->data(
            'label',
            $label
        );
    }
}
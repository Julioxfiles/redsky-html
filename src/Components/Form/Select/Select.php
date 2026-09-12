<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\Select;

use RedSky\Html\Components\HtmlComponent;

use RedSky\Html\Components\Form\Input\Input;
use RedSky\Html\Components\Form\Option\Option;

/**
 * Represents an HTML select component.
 *
 * The select component generates a semantic HTML
 * select element used to present a list of options
 * from which the user can make a selection.
 *
 * The component supports both fluent configuration
 * and associative-array configuration.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 */
class Select extends HtmlComponent
{
    /**
     * Creates a new select component.
     *
     * The configuration array is optional. When provided,
     * its values are applied through the same fluent methods
     * used to configure the component manually.
     *
     * Supported configuration keys include:
     *
     * - name
     * - options
     * - selected
     * - multiple
     * - required
     * - disabled
     * - size
     * - attributes
     *
     * @param array $config Optional component configuration.
     */
    public function __construct(array $config = [])
    {
        parent::__construct('select');

        if (isset($config['name'])) {
            $this->name($config['name']);
        }

        if (isset($config['options'])) {
            $this->options($config['options']);
        }

        if (isset($config['selected'])) {
            $this->selected($config['selected']);
        }

        if (isset($config['multiple'])) {
            $this->multiple($config['multiple']);
        }

        if (isset($config['required'])) {
            $this->required($config['required']);
        }

        if (isset($config['disabled'])) {
            $this->disabled($config['disabled']);
        }

        if (isset($config['size'])) {
            $this->size($config['size']);
        }

        if (isset($config['attributes'])) {
            foreach ($config['attributes'] as $name => $value) {
                $this->attribute($name, $value);
            }
        }
    }

    /**
     * Sets the name attribute.
     *
     * @param string $name The form field name.
     * @return static
     */
    public function name(string $name): static
    {
        return $this->attribute('name', $name);
    }

    /**
     * Sets whether multiple options can be selected.
     *
     * @param bool $multiple Whether multiple selection is enabled.
     * @return static
     */
    public function multiple(bool $multiple = true): static
    {
        return $this->attribute('multiple', $multiple);
    }

    /**
     * Sets whether the select field is required.
     *
     * @param bool $required Whether the field is required.
     * @return static
     */
    public function required(bool $required = true): static
    {
        return $this->attribute('required', $required);
    }

    /**
     * Adds an option to the select.
     *
     * @param string $text The option display text.
     * @param mixed $value The option value.
     * @return static
     */
    public function addOption(string $text, mixed $value): static
    {
        $this->addChild(new Option($text, $value));

        return $this;
    }

    /**
     * Adds multiple options to the select.
     *
     * The array keys are used as option labels and
     * the array values are used as option values.
     *
     * @param array $options The options to add.
     * @return static
     */
    public function addOptions(array $options): static
    {
        foreach ($options as $text => $value) {
            $this->addOption($text, $value);
        }

        return $this;
    }

    /**
     * Marks an option as selected.
     *
     * The selected attribute is applied to the option
     * whose value matches the supplied value.
     *
     * @param mixed $value The value of the option to select.
     * @return static
     */
    public function selected(mixed $value): static
    {
        foreach ($this->children() as $child) {
            if (!$child instanceof Option) {
                continue;
            }

            if ($child->getAttribute('value') == $value) {
                $child->selected();
            }
        }

        return $this;
    }

    /**
     * Adds a single option to the select.
     *
     * This is an alias of addOption().
     *
     * @param string $text The option display text.
     * @param mixed $value The option value.
     * @return static
     */
    public function option(string $text, mixed $value): static
    {
        return $this->addOption($text, $value);
    }

    /**
     * Adds multiple options to the select.
     *
     * This is an alias of addOptions().
     *
     * @param array $options The options to add.
     * @return static
     */
    public function options(array $options): static
    {
        return $this->addOptions($options);
    }

    /**
     * Sets whether the select is disabled.
     *
     * @param bool $disabled Whether the select is disabled.
     * @return static
     */
    public function disabled(bool $disabled = true): static
    {
        return $this->attribute('disabled', $disabled);
    }

    /**
     * Sets the number of visible options.
     *
     * @param int $size The number of visible options.
     * @return static
     */
    public function size(int $size): static
    {
        return $this->attribute('size', $size);
    }
}
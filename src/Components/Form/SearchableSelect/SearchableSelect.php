<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\SearchableSelect;

use RedSky\Html\Components\Form\HiddenInput\HiddenInput;
use RedSky\Html\Components\Form\TextInput\TextInput;
use RedSky\Html\Components\Layout\Div\Div;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Form\SearchableSelectOption\SearchableSelectOption;

/**
 * Represents a searchable select component.
 *
 * The SearchableSelect component provides a searchable list
 * of options from which the user can make a single selection.
 *
 * The visible search field is represented by a TextInput.
 * The selected value is stored in a hidden input.
 * Individual options are represented by SearchableSelectOption
 * components inside a dedicated menu container.
 *
 * This component is UI-library agnostic and does not depend
 * on a specific CSS or JavaScript framework.
 *
 * @package RedSky\Html\Components\Form\SearchableSelect
 */
class SearchableSelect extends HtmlComponent
{
    /**
     * Creates a new searchable select component.
     *
     * Supported configuration keys include:
     *
     * - name
     * - options
     * - selected
     * - placeholder
     * - required
     * - disabled
     * - attributes
     *
     * @param array $config Optional component configuration.
     */
    public function __construct(
        array $config = []
    ) {
        parent::__construct('div');

        $this->class('searchable-select');

        $this->addChild(
            (new TextInput())
                ->class('form-control')
        );

        $this->addChild(
            new HiddenInput()
        );

        $this->addChild(
            (new Div())
                ->class('searchable-select-menu')
        );

        if (isset($config['name'])) {
            $this->name($config['name']);
        }

        if (isset($config['placeholder'])) {
            $this->placeholder($config['placeholder']);
        }

        if (isset($config['options'])) {
            $this->options($config['options']);
        }

        if (isset($config['selected'])) {
            $this->selected($config['selected']);
        }

        if (isset($config['required'])) {
            $this->required($config['required']);
        }

        if (isset($config['disabled'])) {
            $this->disabled($config['disabled']);
        }

        if (isset($config['attributes'])) {
            foreach ($config['attributes'] as $name => $value) {
                $this->attribute($name, $value);
            }
        }
    }

    /**
     * Sets the name of the real form field.
     *
     * The name is assigned to the hidden input rather than
     * the visible search field.
     *
     * @param string $name Form field name.
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        foreach ($this->children() as $child) {
            if ($child instanceof HiddenInput) {
                $child->name($name);
                break;
            }
        }

        return $this;
    }

    /**
     * Adds a searchable option.
     *
     * @param string $text Option text.
     * @param mixed $value Option value.
     *
     * @return static
     */
    public function option(
        string $text,
        mixed $value
    ): static {
        foreach ($this->children() as $child) {
            if (
                $child instanceof Div &&
                $child->getAttribute('class') ===
                'searchable-select-menu'
            ) {
                $option = (new SearchableSelectOption(
                    $text,
                    $value
                ))->class('searchable-select-option');

                $child->addChild($option);

                break;
            }
        }

        return $this;
    }

    /**
     * Adds multiple searchable options.
     *
     * @param array $options Associative array of text => value pairs.
     *
     * @return static
     */
    public function options(
        array $options
    ): static {
        foreach ($options as $text => $value) {
            $this->option(
                (string) $text,
                $value
            );
        }

        return $this;
    }

    /**
     * Selects an option by value.
     *
     * @param mixed $value Option value.
     *
     * @return static
     */
    public function selected(
        mixed $value
    ): static {
        foreach ($this->children() as $child) {
            if (!$child instanceof Div) {
                continue;
            }

            if (
                $child->getAttribute('class') !==
                'searchable-select-menu'
            ) {
                continue;
            }

            foreach ($child->children() as $option) {
                if (!$option instanceof SearchableSelectOption) {
                    continue;
                }

                if (
                    $option->getAttribute('data-value') == $value
                ) {
                    $option->selected();

                    foreach ($this->children() as $input) {
                        if ($input instanceof HiddenInput) {
                            $input->value($value);
                            break;
                        }
                    }

                    break;
                }
            }
        }

        return $this;
    }

    /**
     * Sets the search field placeholder.
     *
     * @param string $placeholder Placeholder text.
     *
     * @return static
     */
    public function placeholder(
        string $placeholder
    ): static {
        foreach ($this->children() as $child) {
            if ($child instanceof TextInput) {
                $child->placeholder($placeholder);
                break;
            }
        }

        return $this;
    }

    /**
     * Sets the required state.
     *
     * @param bool $required Whether the field is required.
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        foreach ($this->children() as $child) {
            if ($child instanceof HiddenInput) {
                $child->required($required);
                break;
            }
        }

        return $this;
    }

    /**
     * Sets the disabled state.
     *
     * @param bool $disabled Whether the component is disabled.
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        foreach ($this->children() as $child) {
            if ($child instanceof TextInput) {
                $child->disabled($disabled);
            }

            if ($child instanceof HiddenInput) {
                $child->disabled($disabled);
            }
        }

        $this->attribute(
            'data-disabled',
            $disabled ? 'true' : 'false'
        );

        return $this;
    }

    /**
     * Sets the remote URI used to search for options.
     *
     * The URI may contain the `{query}` placeholder, which is replaced
     * by the current search text before the request is sent.
     *
     * @param string $url Remote search URI.
     *
     * @return static
     */
    public function searchUrl(string $url): static
    {
        return $this->attribute(
            'data-search-url',
            $url
        );
    }

    /**
     * Sets the minimum number of characters required before
     * a remote search is performed.
     *
     * @param int $length Minimum number of characters.
     *
     * @return static
     */
    public function minimumInputLength(int $length): static
    {
        return $this->attribute(
            'data-minimum-input-length',
            (string) $length
        );
    }

    /**
     * Sets the delay before a remote search request is sent.
     *
     * This value is used to debounce user input and avoid
     * sending a request for every keystroke.
     *
     * @param int $milliseconds Delay in milliseconds.
     *
     * @return static
     */
    public function delay(int $milliseconds): static
    {
        return $this->attribute(
            'data-delay',
            (string) $milliseconds
        );
    }

    /**
     * Sets the maximum number of options requested from
     * the remote search endpoint.
     *
     * @param int $limit Maximum number of results.
     *
     * @return static
     */
    public function limit(int $limit): static
    {
        return $this->attribute(
            'data-limit',
            (string) $limit
        );
    }
    
}
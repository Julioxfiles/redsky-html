<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\Textarea;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML textarea component.
 *
 * The Textarea component generates a semantic HTML
 * <textarea> element for multiline text input.
 *
 * Textarea supports common textarea attributes such as
 * name, rows, cols, wrap, placeholder, readonly,
 * disabled, and required.
 *
 * The component also provides fluent methods for configuring
 * its dimensions and state. Common methods inherited from
 * HtmlComponent can be used to set attributes, classes,
 * styles, content, and child elements where applicable.
 *
 * The component is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component can be rendered explicitly using render()
 * or converted to its HTML representation automatically
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo new Textarea('Enter your message here...')
 *     ->name('message')
 *     ->rows(6)
 *     ->cols(50)
 *     ->placeholder('Write your message...')
 *     ->attribute('id', 'message')
 *     ->required()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <textarea name="message"
 *           rows="6"
 *           cols="50"
 *           placeholder="Write your message..."
 *           id="message"
 *           required>Enter your message here...</textarea>
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete textarea',
    code: <<<'PHP'
    echo new Textarea('Enter your message here...')
        ->name('message')
        ->rows(6)
        ->cols(50)
        ->placeholder('Write your message...')
        ->attribute('id', 'message')
        ->required()
        ->render();
    PHP,
    description: 'The Textarea component generates a semantic HTML
                 <textarea> element for multiline text input and
                 provides fluent methods for configuring its name,
                 dimensions, placeholder, and state.',
    language: 'php',
    primary: true,
    output: '<textarea name="message" rows="6" cols="50" placeholder="Write your message..." id="message" required>Enter your message here...</textarea>'
)]
class Textarea extends HtmlComponent
{
    /**
     * Creates a new textarea component.
     *
     * The optional content is used as the initial text content
     * of the textarea element.
     *
     * @param string|null $content Initial textarea content.
     */
    public function __construct(
        ?string $content = null
    ) {
        parent::__construct('textarea');

        if ($content !== null) {
            $this->text($content);
        }
    }

    /**
     * Sets the number of visible rows.
     *
     * Corresponds to the HTML `rows` attribute.
     *
     * @param int $rows Number of visible text rows.
     *
     * @return static
     */
    public function rows(
        int $rows
    ): static {
        $this->attribute(
            'rows',
            $rows
        );

        return $this;
    }

    /**
     * Sets the number of visible columns.
     *
     * Corresponds to the HTML `cols` attribute.
     *
     * @param int $cols Number of visible text columns.
     *
     * @return static
     */
    public function cols(
        int $cols
    ): static {
        $this->attribute(
            'cols',
            $cols
        );

        return $this;
    }

    /**
     * Sets the text wrapping behavior.
     *
     * Corresponds to the HTML `wrap` attribute.
     *
     * @param string $wrap Wrapping behavior, such as `soft` or `hard`.
     *
     * @return static
     */
    public function wrap(
        string $wrap
    ): static {
        $this->attribute(
            'wrap',
            $wrap
        );

        return $this;
    }

    /**
     * Sets placeholder text.
     *
     * Corresponds to the HTML `placeholder` attribute.
     *
     * @param string $placeholder Placeholder text displayed when empty.
     *
     * @return static
     */
    public function placeholder(
        string $placeholder
    ): static {
        $this->attribute(
            'placeholder',
            $placeholder
        );

        return $this;
    }

    /**
     * Sets the textarea name.
     *
     * Corresponds to the HTML `name` attribute.
     *
     * @param string $name Form field name.
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->attribute(
            'name',
            $name
        );

        return $this;
    }

    /**
     * Sets the readonly state.
     *
     * When enabled, the textarea can be read but its value
     * cannot be edited by the user.
     *
     * @param bool $readonly Whether the textarea is readonly.
     *
     * @return static
     */
    public function readonly(
        bool $readonly = true
    ): static {
        $this->attribute(
            'readonly',
            $readonly
        );

        return $this;
    }

    /**
     * Sets the disabled state.
     *
     * When enabled, the textarea is disabled and cannot be
     * edited or submitted as a form control.
     *
     * @param bool $disabled Whether the textarea is disabled.
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        $this->attribute(
            'disabled',
            $disabled
        );

        return $this;
    }

    /**
     * Sets the required state.
     *
     * When enabled, the textarea must contain a value before
     * its associated form can be submitted.
     *
     * @param bool $required Whether the textarea is required.
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        $this->attribute(
            'required',
            $required
        );

        return $this;
    }

    /**
     * Sets the number of visible rows and columns.
     *
     * This is a convenience method equivalent to calling
     * rows() and cols() separately.
     *
     * @param int $rows Number of visible text rows.
     * @param int $cols Number of visible text columns.
     *
     * @return static
     */
    public function size(
        int $rows,
        int $cols
    ): static {
        return $this
            ->rows($rows)
            ->cols($cols);
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\Input;

use RedSky\Html\Components\HtmlComponent;

/**
 * The Input component generates a native HTML
 * <input> element for user data entry.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Input extends HtmlComponent
{
    /**
     * Creates a new input component.
     *
     * @param string $type Input type.
     */
    public function __construct(
        string $type = 'text',
        ?string $name = null
    )
    {
        parent::__construct('input');

        $this->selfClosing = true;

        $this->type($type);

        if ($name !== null) {
            $this->name($name);
        }

        $this->addAttribute('data-component', 'input');
    }


    /**
     * Sets input type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->addAttribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Sets input name.
     *
     * @param string $name
     *
     * @return static
     */
    public function name(
        string $name
    ): static {
        $this->addAttribute(
            'name',
            $name
        );

        return $this;
    }


    /**
     * Sets input value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function value(
        mixed $value
    ): static {
        $this->addAttribute(
            'value',
            $value
        );

        return $this;
    }


    /**
     * Sets placeholder text.
     *
     * @param string $placeholder
     *
     * @return static
     */
    public function placeholder(
        string $placeholder
    ): static {
        $this->addAttribute(
            'placeholder',
            $placeholder
        );

        return $this;
    }


    /**
     * Marks input as required.
     *
     * @param bool $required
     *
     * @return static
     */
    public function required(
        bool $required = true
    ): static {
        $this->addAttribute(
            'required',
            $required
        );

        return $this;
    }


    /**
     * Sets readonly state.
     *
     * @param bool $readonly
     *
     * @return static
     */
    public function readonly(
        bool $readonly = true
    ): static {
        $this->addAttribute(
            'readonly',
            $readonly
        );

        return $this;
    }


    /**
     * Sets input title.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        $this->addAttribute(
            'title',
            $title
        );

        return $this;
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
        $this->addAttribute(
            'disabled',
            $disabled
        );

        return $this;
    }


    /**
     * Sets autofocus state.
     *
     * @param bool $autofocus
     *
     * @return static
     */
    public function autofocus(
        bool $autofocus = true
    ): static {
        $this->addAttribute(
            'autofocus',
            $autofocus
        );

        return $this;
    }


    /**
     * Sets checked state.
     *
     * @param bool $checked
     *
     * @return static
     */
    public function checked(
        bool $checked = true
    ): static {
        $this->addAttribute(
            'checked',
            $checked
        );

        return $this;
    }


    /**
     * Sets multiple state.
     *
     * @param bool $multiple
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {
        $this->addAttribute(
            'multiple',
            $multiple
        );

        return $this;
    }


    /**
     * Sets autocomplete attribute.
     *
     * @param string $autocomplete
     *
     * @return static
     */
    public function autocomplete(
        string $autocomplete
    ): static {
        $this->addAttribute(
            'autocomplete',
            $autocomplete
        );

        return $this;
    }


    /**
     * Sets minimum value.
     *
     * @param mixed $min
     *
     * @return static
     */
    public function min(
        mixed $min
    ): static {
        $this->addAttribute(
            'min',
            $min
        );

        return $this;
    }


    /**
     * Sets maximum value.
     *
     * @param mixed $max
     *
     * @return static
     */
    public function max(
        mixed $max
    ): static {
        $this->addAttribute(
            'max',
            $max
        );

        return $this;
    }


    /**
     * Sets step value.
     *
     * @param mixed $step
     *
     * @return static
     */
    public function step(
        mixed $step
    ): static {
        $this->addAttribute(
            'step',
            $step
        );

        return $this;
    }


    /**
     * Sets minimum length.
     *
     * @param int $length
     *
     * @return static
     */
    public function minlength(
        int $length
    ): static {
        $this->addAttribute(
            'minlength',
            $length
        );

        return $this;
    }


    /**
     * Sets maximum length.
     *
     * @param int $length
     *
     * @return static
     */
    public function maxlength(
        int $length
    ): static {
        $this->addAttribute(
            'maxlength',
            $length
        );

        return $this;
    }


    /**
     * Sets validation pattern.
     *
     * @param string $pattern
     *
     * @return static
     */
    public function pattern(
        string $pattern
    ): static {
        $this->addAttribute(
            'pattern',
            $pattern
        );

        return $this;
    }


    /**
     * Sets accepted file types.
     *
     * @param string $accept
     *
     * @return static
     */
    public function accept(
        string $accept
    ): static {
        $this->addAttribute(
            'accept',
            $accept
        );

        return $this;
    }


    /**
     * Sets file capture mode.
     *
     * @param string|bool $capture
     *
     * @return static
     */
    public function capture(
        string|bool $capture = true
    ): static {
        $this->addAttribute(
            'capture',
            $capture
        );

        return $this;
    }


    /**
     * Sets datalist reference.
     *
     * @param string $list
     *
     * @return static
     */
    public function list(
        string $list
    ): static {
        $this->addAttribute(
            'list',
            $list
        );

        return $this;
    }


    /**
     * Sets input mode.
     *
     * @param string $inputmode
     *
     * @return static
     */
    public function inputmode(
        string $inputmode
    ): static {
        $this->addAttribute(
            'inputmode',
            $inputmode
        );

        return $this;
    }


    /**
     * Sets mobile keyboard action.
     *
     * @param string $enterkeyhint
     *
     * @return static
     */
    public function enterkeyhint(
        string $enterkeyhint
    ): static {
        $this->addAttribute(
            'enterkeyhint',
            $enterkeyhint
        );

        return $this;
    }


    /**
     * Associates input with form.
     *
     * @param string $form
     *
     * @return static
     */
    public function form(
        string $form
    ): static {
        $this->addAttribute(
            'form',
            $form
        );

        return $this;
    }


    /**
     * Sets form action.
     *
     * @param string $action
     *
     * @return static
     */
    public function formaction(
        string $action
    ): static {
        $this->addAttribute(
            'formaction',
            $action
        );

        return $this;
    }


    /**
     * Sets form encoding type.
     *
     * @param string $enctype
     *
     * @return static
     */
    public function formenctype(
        string $enctype
    ): static {
        $this->addAttribute(
            'formenctype',
            $enctype
        );

        return $this;
    }


    /**
     * Sets form method.
     *
     * @param string $method
     *
     * @return static
     */
    public function formmethod(
        string $method
    ): static {
        $this->addAttribute(
            'formmethod',
            $method
        );

        return $this;
    }


    /**
     * Sets form novalidate state.
     *
     * @param bool $novalidate
     *
     * @return static
     */
    public function formnovalidate(
        bool $novalidate = true
    ): static {
        $this->addAttribute(
            'formnovalidate',
            $novalidate
        );

        return $this;
    }


    /**
     * Sets form target.
     *
     * @param string $target
     *
     * @return static
     */
    public function formtarget(
        string $target
    ): static {
        $this->addAttribute(
            'formtarget',
            $target
        );

        return $this;
    }

    /**
     * Sets input visible width.
     *
     * @param int $size
     *
     * @return static
     */
    public function size(
        int $size
    ): static {
        $this->addAttribute(
            'size',
            $size
        );

        return $this;
    }

    /**
     * Sets spellcheck state.
     *
     * @param bool $spellcheck
     *
     * @return static
     */
    public function spellcheck(
        bool $spellcheck = true
    ): static {
        $this->addAttribute(
            'spellcheck',
            $spellcheck
        );

        return $this;
    }

    /**
     * Sets text direction field.
     *
     * @param string $dirname
     *
     * @return static
     */
    public function dirname(
        string $dirname
    ): static {
        $this->addAttribute(
            'dirname',
            $dirname
        );

        return $this;
    }

    /**
     * Sets default input value.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function default(
        mixed $value
    ): static {
        return $this->value($value);
    }
}
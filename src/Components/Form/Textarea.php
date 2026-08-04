<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML textarea component.
 *
 * The textarea component generates a semantic HTML
 * textarea element used for multiline text input.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Textarea extends HtmlComponent
{
    /**
     * Creates a new textarea component.
     *
     * @param string|null $content Initial content.
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
     * Sets number of visible rows.
     *
     * @param int $rows
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
     * Sets number of visible columns.
     *
     * @param int $cols
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
     * Sets wrapping behavior.
     *
     * @param string $wrap
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
     * @param string $placeholder
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
     * Sets textarea name.
     *
     * @param string $name
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
     * Sets textarea readonly state.
     *
     * @param bool $readonly
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
     * Sets textarea disabled state.
     *
     * @param bool $disabled
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
     * Sets required state.
     *
     * @param bool $required
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
     * Sets textarea dimensions.
     *
     * @param int $rows
     * @param int $cols
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
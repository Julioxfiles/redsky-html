<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML textarea component.
 *
 * The textarea component generates a semantic HTML
 * textarea element used for multiline text input.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components
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
     * Sets textarea content.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {
        $this->setContent($text);

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
        return $this->attribute(
            'name',
            $name
        );
    }


    /**
     * Sets textarea placeholder.
     *
     * @param string $placeholder
     *
     * @return static
     */
    public function placeholder(
        string $placeholder
    ): static {
        return $this->attribute(
            'placeholder',
            $placeholder
        );
    }


    /**
     * Sets textarea rows.
     *
     * @param int $rows
     *
     * @return static
     */
    public function rows(
        int $rows
    ): static {
        return $this->attribute(
            'rows',
            $rows
        );
    }


    /**
     * Sets textarea columns.
     *
     * @param int $cols
     *
     * @return static
     */
    public function cols(
        int $cols
    ): static {
        return $this->attribute(
            'cols',
            $cols
        );
    }


    /**
     * Marks textarea as required.
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
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML button component.
 *
 * The button component generates a semantic HTML
 * button element.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * UI frameworks such as Bootstrap or Tailwind are
 * handled by higher level layers like redsky-ui.
 *
 * @package RedSky\Html\Components
 */
class Button extends HtmlComponent
{
    /**
     * Creates a new button component.
     *
     * @param string|null $text Button text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('button');

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets button text.
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
     * Sets button type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        $this->attribute(
            'type',
            $type
        );

        return $this;
    }


    /**
     * Disables the button.
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
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML file input component.
 *
 * The file input component generates
 * an input element with type="file".
 *
 * This component provides helpers for
 * file uploads.
 *
 * @package RedSky\Html\Components\Form
 */
class FileInput extends Input
{
    /**
     * Creates a new file input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'file',
            $name
        );
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
        $this->attribute(
            'accept',
            $accept
        );

        return $this;
    }


    /**
     * Allows multiple file selection.
     *
     * @param bool $multiple
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {
        $this->attribute(
            'multiple',
            $multiple
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
        $this->attribute(
            'capture',
            $capture
        );

        return $this;
    }

    /**
     * Restricts input to images.
     *
     * @return static
     */
    public function images(): static
    {
        return $this->accept('image/*');
    }

    /**
     * Restricts input to common documents.
     *
     * @return static
     */
    public function documents(): static
    {
        return $this->accept(
            '.pdf,.doc,.docx,.txt'
        );
    }

    /**
     * Restricts input to common documents.
     *
     * @return static
     */
    public function videos(): static
    {
        return $this->accept(
            'video/*'
        );
    }

    /**
     * Restricts input to common documents.
     *
     * @return static
     */
    public function audios(): static
    {
        return $this->accept(
            'audio/*'
        );
     
    }
}
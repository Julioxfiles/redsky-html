<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\FileInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * The FileInput component generates a native HTML
 * <input type="file"> element for selecting files.
 *
 * FileInput provides methods for configuring accepted file
 * types, multiple file selection, and file capture behavior.
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
     * @param string $accept Accepted file types.
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
     * Sets the file capture mode.
     *
     * Accepted values: user, environment
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
     * Restricts file selection to images.
     *
     * @return static
     */
    public function images(): static
    {
        return $this->accept('image/*');
    }


    /**
     * Restricts file selection to common document types.
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
     * Restricts file selection to videos.
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
     * Restricts file selection to audio files.
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
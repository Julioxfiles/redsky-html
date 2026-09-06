<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * The FileInput component generates a native HTML
 * <input type="file"> element that allows users to
 * select files for upload.
 *
 * The component is UI-library agnostic and does not apply
 * any default CSS classes or styles.
 *
 * A name can optionally be supplied to identify the uploaded
 * file when the containing form is submitted.
 *
 * FileInput provides convenient methods for configuring
 * file selection, including:
 *
 * - Setting accepted file types.
 * - Allowing multiple file selection.
 * - Setting the file capture mode.
 * - Restricting selection to images.
 * - Restricting selection to common documents.
 * - Restricting selection to videos.
 * - Restricting selection to audio files.
 *
 * Because FileInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, and other
 * component properties.
 *
 * Component methods support fluent method chaining, allowing
 * multiple configuration methods to be combined before the
 * component is rendered.
 *
 * Calling render() returns the generated HTML as a string.
 * The component can also be converted directly to a string
 * through HtmlComponent::__toString().
 *
 * Example:
 *
 * ```php
 * echo new FileInput('documents')
 *     ->class('file-input')
 *     ->style('color:cornflowerblue')
 *     ->attribute('id', 'documents')
 *     ->documents()
 *     ->multiple()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="file"
 *        name="documents"
 *        class="file-input"
 *        style="color:cornflowerblue"
 *        id="documents"
 *        accept=".pdf,.doc,.docx,.txt"
 *        multiple />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete file input',
    code: <<<'PHP'
echo new FileInput('documents')
    ->class('file-input')
    ->style('color:cornflowerblue')
    ->attribute('id', 'documents')
    ->documents()
    ->multiple()
    ->render();
PHP,
    description: 'The FileInput component generates a native HTML
                 <input type="file"> element for selecting files
                 and provides convenient methods for configuring
                 accepted file types and multiple file selection.',
    language: 'php',
    primary: true,
    output: '<input type="file" name="documents" class="file-input" style="color:cornflowerblue" id="documents" accept=".pdf,.doc,.docx,.txt" multiple />'
)]
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
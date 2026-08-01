<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML formaction attribute.
 *
 * Specifies the URL where form data should be submitted when
 * a submit button or input overrides the form action.
 *
 * Examples:
 *
 * - formaction="/users/save"
 * - formaction="https://example.com/process"
 */
class FormactionAttribute extends Attribute
{
    /**
     * Creates a new formaction attribute instance.
     *
     * @param string|null $value The submission URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('formaction', $value);
    }

    /**
     * Returns the submission URL.
     *
     * @return string|null
     */
    public function getFormaction(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the submission URL.
     *
     * @param string|null $value The submission URL.
     *
     * @return static
     */
    public function setFormaction(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
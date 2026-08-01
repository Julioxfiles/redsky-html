<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML lang attribute.
 *
 * Specifies the language of an element's content.
 *
 * Examples:
 *
 * - lang="en"
 * - lang="es"
 * - lang="fr-FR"
 */
class LangAttribute extends Attribute
{
    /**
     * Creates a new lang attribute instance.
     *
     * @param string|null $value The language code.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('lang', $value);
    }

    /**
     * Returns the language code.
     *
     * @return string|null
     */
    public function getLang(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the language code.
     *
     * @param string|null $value The language code.
     *
     * @return static
     */
    public function setLang(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
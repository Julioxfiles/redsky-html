<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML spellcheck attribute.
 *
 * Specifies whether the browser should check the element
 * for spelling and grammar mistakes.
 *
 * Examples:
 *
 * - spellcheck="true"
 * - spellcheck="false"
 */
class SpellcheckAttribute extends Attribute
{
    /**
     * Creates a new spellcheck attribute instance.
     *
     * @param string|null $value The spellcheck value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('spellcheck', $this->normalize($value));
    }

    /**
     * Returns the spellcheck value.
     *
     * @return string|null
     */
    public function getSpellcheck(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the spellcheck value.
     *
     * @param string|null $value The spellcheck value.
     *
     * @return static
     */
    public function setSpellcheck(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the spellcheck value.
     *
     * @param string|null $value The spellcheck value.
     *
     * @return string|null
     */
    protected function normalize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return strtolower(trim($value));
    }
}
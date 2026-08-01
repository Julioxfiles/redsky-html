<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML translate attribute.
 *
 * Specifies whether the content of an element should be
 * translated by translation tools.
 *
 * Examples:
 *
 * - translate="yes"
 * - translate="no"
 */
class TranslateAttribute extends Attribute
{
    /**
     * Creates a new translate attribute instance.
     *
     * @param string|null $value The translation behavior.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('translate', $this->normalize($value));
    }

    /**
     * Returns the translation behavior.
     *
     * @return string|null
     */
    public function getTranslate(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the translation behavior.
     *
     * @param string|null $value The translation behavior.
     *
     * @return static
     */
    public function setTranslate(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the translate value.
     *
     * Allowed values:
     *
     * - yes
     * - no
     *
     * @param string|null $value The translation behavior.
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
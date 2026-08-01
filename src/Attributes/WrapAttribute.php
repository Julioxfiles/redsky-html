<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML wrap attribute.
 *
 * Specifies how text inside a textarea should be wrapped
 * when submitted with a form.
 *
 * Examples:
 *
 * - wrap="soft"
 * - wrap="hard"
 */
class WrapAttribute extends Attribute
{
    /**
     * Creates a new wrap attribute instance.
     *
     * @param string|null $value The wrapping behavior.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('wrap', $this->normalize($value));
    }

    /**
     * Returns the wrap behavior.
     *
     * @return string|null
     */
    public function getWrap(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the wrap behavior.
     *
     * @param string|null $value The wrapping behavior.
     *
     * @return static
     */
    public function setWrap(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the wrap value.
     *
     * Allowed values:
     *
     * - soft
     * - hard
     *
     * @param string|null $value The wrapping behavior.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML enterkeyhint attribute.
 *
 * Specifies the action label or hint displayed on a virtual
 * keyboard enter key.
 *
 * Examples:
 *
 * - enterkeyhint="enter"
 * - enterkeyhint="done"
 * - enterkeyhint="search"
 * - enterkeyhint="send"
 */
class EnterkeyhintAttribute extends Attribute
{
    /**
     * Creates a new enterkeyhint attribute instance.
     *
     * @param string|null $value The enter key hint value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('enterkeyhint', $this->normalize($value));
    }

    /**
     * Returns the enter key hint value.
     *
     * @return string|null
     */
    public function getEnterkeyhint(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the enter key hint value.
     *
     * @param string|null $value The enter key hint value.
     *
     * @return static
     */
    public function setEnterkeyhint(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the enter key hint value.
     *
     * @param string|null $value The enter key hint value.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML maxlength attribute.
 *
 * Specifies the maximum number of characters that the user
 * may enter into an input or textarea element.
 *
 * Examples:
 *
 * - maxlength="50"
 * - maxlength="255"
 */
class MaxlengthAttribute extends Attribute
{
    /**
     * Creates a new maxlength attribute instance.
     *
     * @param int|null $value The maximum number of characters.
     */
    public function __construct(?int $value = null)
    {
        parent::__construct('maxlength', $value);
    }

    /**
     * Returns the maximum length.
     *
     * @return int|null
     */
    public function getMaxlength(): ?int
    {
        $value = $this->getValue();

        return $value === null ? null : (int) $value;
    }

    /**
     * Sets the maximum length.
     *
     * @param int|null $value The maximum number of characters.
     *
     * @return static
     */
    public function setMaxlength(?int $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
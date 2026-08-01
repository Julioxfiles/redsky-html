<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML datetime attribute.
 *
 * Specifies a machine-readable date or time value for elements
 * such as time and del/ins.
 *
 * Examples:
 *
 * - datetime="2026-08-01"
 * - datetime="2026-08-01T10:30:00"
 */
class DatetimeAttribute extends Attribute
{
    /**
     * Creates a new datetime attribute instance.
     *
     * @param string|null $value The date/time value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('datetime', $value);
    }

    /**
     * Returns the date/time value.
     *
     * @return string|null
     */
    public function getDatetime(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the date/time value.
     *
     * @param string|null $value The date/time value.
     *
     * @return static
     */
    public function setDatetime(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
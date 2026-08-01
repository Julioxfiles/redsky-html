<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML headers attribute.
 *
 * Specifies one or more header cells that apply to a table
 * data cell.
 *
 * Examples:
 *
 * - headers="name"
 * - headers="name price"
 */
class HeadersAttribute extends Attribute
{
    /**
     * Creates a new headers attribute instance.
     *
     * @param string|null $value The referenced header ids.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('headers', $value);
    }

    /**
     * Returns the referenced header ids.
     *
     * @return string|null
     */
    public function getHeaders(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the referenced header ids.
     *
     * @param string|null $value The referenced header ids.
     *
     * @return static
     */
    public function setHeaders(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
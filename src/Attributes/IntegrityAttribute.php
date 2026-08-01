<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML integrity attribute.
 *
 * Specifies a cryptographic hash that allows browsers to verify
 * that a fetched resource has not been modified unexpectedly.
 *
 * Examples:
 *
 * - integrity="sha256-AbCdEf123456"
 * - integrity="sha384-AbCdEf123456"
 */
class IntegrityAttribute extends Attribute
{
    /**
     * Creates a new integrity attribute instance.
     *
     * @param string|null $value The integrity hash value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('integrity', $value);
    }

    /**
     * Returns the integrity hash value.
     *
     * @return string|null
     */
    public function getIntegrity(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the integrity hash value.
     *
     * @param string|null $value The integrity hash value.
     *
     * @return static
     */
    public function setIntegrity(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
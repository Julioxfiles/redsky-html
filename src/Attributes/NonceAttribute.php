<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML nonce attribute.
 *
 * Specifies a cryptographic nonce value used by Content
 * Security Policy (CSP) to allow execution of specific
 * inline scripts or styles.
 *
 * Examples:
 *
 * - nonce="abc123"
 */
class NonceAttribute extends Attribute
{
    /**
     * Creates a new nonce attribute instance.
     *
     * @param string|null $value The nonce value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('nonce', $value);
    }

    /**
     * Returns the nonce value.
     *
     * @return string|null
     */
    public function getNonce(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the nonce value.
     *
     * @param string|null $value The nonce value.
     *
     * @return static
     */
    public function setNonce(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
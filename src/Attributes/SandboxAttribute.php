<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML sandbox attribute.
 *
 * Specifies security restrictions for iframe content.
 *
 * Examples:
 *
 * - sandbox
 * - sandbox="allow-scripts"
 * - sandbox="allow-forms allow-popups"
 */
class SandboxAttribute extends Attribute
{
    /**
     * Creates a new sandbox attribute instance.
     *
     * @param string|null $value The sandbox permissions.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('sandbox', $value);
    }

    /**
     * Returns the sandbox value.
     *
     * @return string|null
     */
    public function getSandbox(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the sandbox value.
     *
     * @param string|null $value The sandbox permissions.
     *
     * @return static
     */
    public function setSandbox(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
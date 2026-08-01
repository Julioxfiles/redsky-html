<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML role attribute.
 *
 * Examples:
 *
 * - role="button"
 * - role="dialog"
 * - role="navigation"
 * - role="alert"
 */
class RoleAttribute extends Attribute
{
    /**
     * Creates a new role attribute instance.
     *
     * @param string|null $value The role value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('role', $value);
    }

    /**
     * Returns the role value.
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the role value.
     *
     * @param string|null $value The role value.
     *
     * @return static
     */
    public function setRole(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
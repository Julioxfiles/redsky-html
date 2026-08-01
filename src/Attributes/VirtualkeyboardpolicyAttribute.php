<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML virtualkeyboardpolicy attribute.
 *
 * Controls how the virtual keyboard behaves for editable
 * elements.
 *
 * Examples:
 *
 * - virtualkeyboardpolicy="auto"
 * - virtualkeyboardpolicy="manual"
 */
class VirtualkeyboardpolicyAttribute extends Attribute
{
    /**
     * Creates a new virtualkeyboardpolicy attribute instance.
     *
     * @param string|null $value The virtual keyboard policy.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('virtualkeyboardpolicy', $this->normalize($value));
    }

    /**
     * Returns the virtual keyboard policy.
     *
     * @return string|null
     */
    public function getVirtualkeyboardpolicy(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the virtual keyboard policy.
     *
     * @param string|null $value The virtual keyboard policy.
     *
     * @return static
     */
    public function setVirtualkeyboardpolicy(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the virtual keyboard policy.
     *
     * Allowed values:
     *
     * - auto
     * - manual
     *
     * @param string|null $value The virtual keyboard policy.
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
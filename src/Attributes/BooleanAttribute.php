<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents a boolean HTML attribute.
 *
 * Boolean attributes are rendered only when their value is true.
 *
 * Examples:
 *
 * - disabled
 * - readonly
 * - required
 * - checked
 * - autofocus
 */
class BooleanAttribute extends Attribute
{
    /**
     * Creates a new boolean attribute instance.
     *
     * @param string $name    The attribute name.
     * @param bool   $enabled Whether the attribute is enabled.
     */
    public function __construct(string $name, bool $enabled = true)
    {
        parent::__construct($name, $enabled);
    }

    /**
     * Enables the attribute.
     *
     * @return static
     */
    public function enable(): static
    {
        $this->setValue(true);

        return $this;
    }

    /**
     * Disables the attribute.
     *
     * @return static
     */
    public function disable(): static
    {
        $this->setValue(false);

        return $this;
    }

    /**
     * Determines whether the attribute is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool) $this->getValue();
    }

    /**
     * Determines whether the attribute is disabled.
     *
     * @return bool
     */
    public function isDisabled(): bool
    {
        return ! $this->isEnabled();
    }
}
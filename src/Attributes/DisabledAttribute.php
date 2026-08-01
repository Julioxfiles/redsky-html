<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML disabled boolean attribute.
 *
 * Used by form controls and interactive elements that
 * should not be available for user interaction.
 *
 * Examples:
 *
 * - disabled
 * - disabled="disabled"
 */
class DisabledAttribute extends BooleanAttribute
{
    /**
     * Creates a new disabled attribute instance.
     *
     * @param bool $disabled Whether the attribute is enabled.
     */
    public function __construct(bool $disabled = true)
    {
        parent::__construct('disabled', $disabled);
    }
}
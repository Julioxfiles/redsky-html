<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML required boolean attribute.
 *
 * Used by form controls that must contain a value before
 * the form can be submitted.
 *
 * Examples:
 *
 * - required
 * - required="required"
 */
class RequiredAttribute extends BooleanAttribute
{
    /**
     * Creates a new required attribute instance.
     *
     * @param bool $required Whether the attribute is enabled.
     */
    public function __construct(bool $required = true)
    {
        parent::__construct('required', $required);
    }
}
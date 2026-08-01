<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML readonly boolean attribute.
 *
 * Used by form controls whose value cannot be modified by the user,
 * but can still be submitted with the form.
 *
 * Examples:
 *
 * - readonly
 * - readonly="readonly"
 */
class ReadonlyAttribute extends BooleanAttribute
{
    /**
     * Creates a new readonly attribute instance.
     *
     * @param bool $readonly Whether the attribute is enabled.
     */
    public function __construct(bool $readonly = true)
    {
        parent::__construct('readonly', $readonly);
    }
}
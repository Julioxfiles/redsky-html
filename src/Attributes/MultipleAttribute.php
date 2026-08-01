<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML multiple boolean attribute.
 *
 * Used by form controls such as select elements that allow
 * selecting more than one value.
 *
 * Examples:
 *
 * - multiple
 * - multiple="multiple"
 */
class MultipleAttribute extends BooleanAttribute
{
    /**
     * Creates a new multiple attribute instance.
     *
     * @param bool $multiple Whether the attribute is enabled.
     */
    public function __construct(bool $multiple = true)
    {
        parent::__construct('multiple', $multiple);
    }
}
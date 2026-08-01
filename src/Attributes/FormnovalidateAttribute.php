<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML formnovalidate boolean attribute.
 *
 * Specifies that form validation should be bypassed when a
 * submit button or input element is used to submit a form.
 *
 * Examples:
 *
 * - formnovalidate
 * - formnovalidate="formnovalidate"
 */
class FormnovalidateAttribute extends BooleanAttribute
{
    /**
     * Creates a new formnovalidate attribute instance.
     *
     * @param bool $formnovalidate Whether the attribute is enabled.
     */
    public function __construct(bool $formnovalidate = true)
    {
        parent::__construct('formnovalidate', $formnovalidate);
    }
}
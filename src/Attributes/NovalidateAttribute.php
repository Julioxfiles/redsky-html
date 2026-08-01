<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML novalidate boolean attribute.
 *
 * Used by form elements to disable the browser's built-in
 * validation when submitting the form.
 *
 * Examples:
 *
 * - novalidate
 * - novalidate="novalidate"
 */
class NovalidateAttribute extends BooleanAttribute
{
    /**
     * Creates a new novalidate attribute instance.
     *
     * @param bool $novalidate Whether the attribute is enabled.
     */
    public function __construct(bool $novalidate = true)
    {
        parent::__construct('novalidate', $novalidate);
    }
}
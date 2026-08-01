<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML autofocus boolean attribute.
 *
 * Used by form controls that should automatically receive focus
 * when the page loads.
 *
 * Examples:
 *
 * - autofocus
 * - autofocus="autofocus"
 */
class AutofocusAttribute extends BooleanAttribute
{
    /**
     * Creates a new autofocus attribute instance.
     *
     * @param bool $autofocus Whether the attribute is enabled.
     */
    public function __construct(bool $autofocus = true)
    {
        parent::__construct('autofocus', $autofocus);
    }
}
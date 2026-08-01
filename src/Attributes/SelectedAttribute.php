<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML selected boolean attribute.
 *
 * Used by option elements inside select controls to indicate
 * the currently selected option.
 *
 * Examples:
 *
 * - selected
 * - selected="selected"
 */
class SelectedAttribute extends BooleanAttribute
{
    /**
     * Creates a new selected attribute instance.
     *
     * @param bool $selected Whether the attribute is enabled.
     */
    public function __construct(bool $selected = true)
    {
        parent::__construct('selected', $selected);
    }
}
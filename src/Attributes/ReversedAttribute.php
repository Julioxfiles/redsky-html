<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML reversed boolean attribute.
 *
 * Specifies that an ordered list should be displayed in
 * descending order.
 *
 * Examples:
 *
 * - reversed
 * - reversed="reversed"
 */
class ReversedAttribute extends BooleanAttribute
{
    /**
     * Creates a new reversed attribute instance.
     *
     * @param bool $reversed Whether the attribute is enabled.
     */
    public function __construct(bool $reversed = true)
    {
        parent::__construct('reversed', $reversed);
    }
}
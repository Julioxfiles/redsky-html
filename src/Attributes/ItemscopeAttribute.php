<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML itemscope boolean attribute.
 *
 * Indicates that an element defines a microdata item.
 *
 * Examples:
 *
 * - itemscope
 * - itemscope="itemscope"
 */
class ItemscopeAttribute extends BooleanAttribute
{
    /**
     * Creates a new itemscope attribute instance.
     *
     * @param bool $itemscope Whether the attribute is enabled.
     */
    public function __construct(bool $itemscope = true)
    {
        parent::__construct('itemscope', $itemscope);
    }
}
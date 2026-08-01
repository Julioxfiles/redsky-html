<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML hidden boolean attribute.
 *
 * Indicates that the element is not yet, or is no longer,
 * relevant and should not be rendered visibly to the user.
 *
 * Examples:
 *
 * - hidden
 * - hidden="hidden"
 */
class HiddenAttribute extends BooleanAttribute
{
    /**
     * Creates a new hidden attribute instance.
     *
     * @param bool $hidden Whether the attribute is enabled.
     */
    public function __construct(bool $hidden = true)
    {
        parent::__construct('hidden', $hidden);
    }
}
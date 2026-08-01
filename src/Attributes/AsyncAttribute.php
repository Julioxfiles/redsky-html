<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML async boolean attribute.
 *
 * Specifies that an external script should be executed
 * asynchronously as soon as it becomes available.
 *
 * Examples:
 *
 * - async
 * - async="async"
 */
class AsyncAttribute extends BooleanAttribute
{
    /**
     * Creates a new async attribute instance.
     *
     * @param bool $value Whether the attribute is enabled.
     */
    public function __construct(bool $value = true)
    {
        parent::__construct('async', $value);
    }
}
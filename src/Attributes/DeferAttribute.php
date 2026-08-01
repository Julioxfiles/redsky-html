<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML defer boolean attribute.
 *
 * Specifies that an external script should be executed after
 * the document has been parsed.
 *
 * Examples:
 *
 * - defer
 * - defer="defer"
 */
class DeferAttribute extends BooleanAttribute
{
    /**
     * Creates a new defer attribute instance.
     *
     * @param bool $defer Whether the attribute is enabled.
     */
    public function __construct(bool $defer = true)
    {
        parent::__construct('defer', $defer);
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML muted boolean attribute.
 *
 * Indicates that audio output of a media element should be
 * initially muted.
 *
 * Examples:
 *
 * - muted
 * - muted="muted"
 */
class MutedAttribute extends BooleanAttribute
{
    /**
     * Creates a new muted attribute instance.
     *
     * @param bool $muted Whether the attribute is enabled.
     */
    public function __construct(bool $muted = true)
    {
        parent::__construct('muted', $muted);
    }
}
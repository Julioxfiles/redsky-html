<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML loop boolean attribute.
 *
 * Indicates that audio or video content should restart
 * automatically after reaching the end.
 *
 * Examples:
 *
 * - loop
 * - loop="loop"
 */
class LoopAttribute extends BooleanAttribute
{
    /**
     * Creates a new loop attribute instance.
     *
     * @param bool $loop Whether the attribute is enabled.
     */
    public function __construct(bool $loop = true)
    {
        parent::__construct('loop', $loop);
    }
}
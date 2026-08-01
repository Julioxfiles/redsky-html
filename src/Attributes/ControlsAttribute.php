<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML controls boolean attribute.
 *
 * Indicates that browser controls should be displayed for
 * audio and video elements.
 *
 * Examples:
 *
 * - controls
 * - controls="controls"
 */
class ControlsAttribute extends BooleanAttribute
{
    /**
     * Creates a new controls attribute instance.
     *
     * @param bool $controls Whether the attribute is enabled.
     */
    public function __construct(bool $controls = true)
    {
        parent::__construct('controls', $controls);
    }
}
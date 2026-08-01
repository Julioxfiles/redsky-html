<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML autoplay boolean attribute.
 *
 * Indicates that audio or video content should start playing
 * automatically when it is ready.
 *
 * Examples:
 *
 * - autoplay
 * - autoplay="autoplay"
 */
class AutoplayAttribute extends BooleanAttribute
{
    /**
     * Creates a new autoplay attribute instance.
     *
     * @param bool $autoplay Whether the attribute is enabled.
     */
    public function __construct(bool $autoplay = true)
    {
        parent::__construct('autoplay', $autoplay);
    }
}
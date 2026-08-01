<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML playsinline boolean attribute.
 *
 * Indicates that video playback should occur inline rather
 * than switching to a fullscreen mode on supported devices.
 *
 * Examples:
 *
 * - playsinline
 * - playsinline="playsinline"
 */
class PlaysinlineAttribute extends BooleanAttribute
{
    /**
     * Creates a new playsinline attribute instance.
     *
     * @param bool $playsinline Whether the attribute is enabled.
     */
    public function __construct(bool $playsinline = true)
    {
        parent::__construct('playsinline', $playsinline);
    }
}
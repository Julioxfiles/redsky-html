<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML time element.
 *
 * The time element represents a specific
 * period in time or a date. It allows
 * human-readable content while optionally
 * providing a machine-readable value through
 * the datetime attribute.
 *
 * Example:
 *
 * <code>
 * <time datetime="2026-08-01">
 *     August 1, 2026
 * </time>
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class TimeElement extends HtmlElement
{
    /**
     * Creates a new time element.
     */
    public function __construct()
    {
        parent::__construct('time');
    }


    /**
     * Sets the machine-readable date or time value.
     *
     * @param string $datetime
     *
     * @return static
     */
    public function datetime(
        string $datetime
    ): static {
        $this->setAttribute(
            'datetime',
            $datetime
        );

        return $this;
    }
}
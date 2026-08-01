<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML open boolean attribute.
 *
 * Used by elements such as <details> and <dialog> to indicate
 * that they are displayed in the open state.
 *
 * Examples:
 *
 * - open
 * - open="open"
 */
class OpenAttribute extends BooleanAttribute
{
    /**
     * Creates a new open attribute instance.
     *
     * @param bool $open Whether the attribute is enabled.
     */
    public function __construct(bool $open = true)
    {
        parent::__construct('open', $open);
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML nomodule boolean attribute.
 *
 * Specifies that a script should not be executed in browsers
 * that support JavaScript modules.
 *
 * Examples:
 *
 * - nomodule
 * - nomodule="nomodule"
 */
class NoModuleAttribute extends BooleanAttribute
{
    /**
     * Creates a new nomodule attribute instance.
     *
     * @param bool $nomodule Whether the attribute is enabled.
     */
    public function __construct(bool $nomodule = true)
    {
        parent::__construct('nomodule', $nomodule);
    }
}
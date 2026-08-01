<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML rp element.
 *
 * The rp element provides fallback parentheses
 * for browsers that do not support ruby annotations.
 *
 * Common uses:
 *
 * - Japanese text annotations.
 * - East Asian typography.
 * - Language learning content.
 *
 * @package RedSky\Html\Elements
 */
class RpElement extends HtmlElement
{
    /**
     * Creates a new rp element.
     */
    public function __construct()
    {
        parent::__construct('rp');
    }
}
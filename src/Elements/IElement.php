<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML i element.
 *
 * The i element represents text in an alternate
 * voice or mood, such as technical terms,
 * foreign words, or special terminology.
 *
 * Note:
 * It is not only for italic styling. For styling
 * purposes, CSS should be preferred.
 *
 * @package RedSky\Html\Elements
 */
class IElement extends HtmlElement
{
    /**
     * Creates a new i element.
     */
    public function __construct()
    {
        parent::__construct('i');
    }
}
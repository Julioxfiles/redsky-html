<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML strong importance element.
 *
 * The strong element indicates that its contents
 * have strong importance, seriousness, or urgency.
 *
 * Browsers commonly render strong elements using
 * bold text, but its primary purpose is semantic
 * meaning rather than visual styling.
 *
 * Example:
 *
 * <code>
 * <strong>Warning:</strong> This action cannot be undone.
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class StrongElement extends HtmlElement
{
    /**
     * Creates a new strong element.
     */
    public function __construct()
    {
        parent::__construct('strong');
    }
}
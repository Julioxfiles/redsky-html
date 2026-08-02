<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML hr element.
 *
 * The hr element represents a thematic break
 * between sections of content. It is commonly
 * used to separate paragraphs or groups of
 * related information within a document.
 *
 * @package RedSky\Html\Elements
 */
class HrElement extends HtmlElement
{
    /**
     * Creates a new hr element.
     */
    public function __construct()
    {
        parent::__construct('hr');
    }
}

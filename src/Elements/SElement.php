<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML s element.
 *
 * The s element represents text that is no longer
 * accurate, relevant, or applicable.
 *
 * It should not be used for document revisions;
 * use DelElement when content was actually removed.
 *
 * Common uses:
 *
 * - Outdated information.
 * - Discontinued products.
 * - Incorrect values.
 *
 * @package RedSky\Html\Elements
 */
class SElement extends HtmlElement
{
    /**
     * Creates a new s element.
     */
    public function __construct()
    {
        parent::__construct('s');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML table caption component.
 *
 * The table caption component generates a semantic
 * HTML caption element used to provide a title or
 * description for a table.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableCaption extends HtmlComponent
{
    /**
     * Creates a new table caption component.
     *
     * @param string|null $text Caption text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('caption');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
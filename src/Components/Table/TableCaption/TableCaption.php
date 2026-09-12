<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table\TableCaption;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML table caption component.
 *
 * The TableCaption component generates a semantic HTML
 * <caption> element used to provide a title or descriptive
 * text for a table.
 *
 * Caption text can be provided through the constructor.
 * Additional content and common HTML attributes can be
 * configured using the methods inherited from HtmlComponent.
 *
 * A TableCaption is normally added to a Table using the
 * Table::caption() method.
 *
 * Common methods inherited from HtmlComponent include
 * class(), style(), attribute(), addChild(), text(),
 * html(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class TableCaption extends HtmlComponent
{
    /**
     * Creates a new table caption component.
     *
     * When text is provided, it is assigned as the
     * content of the caption element.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Lists\DescriptionDetails;

/**
 * Represents an HTML table component.
 *
 * The table component generates a semantic HTML
 * table element used to organize tabular data.
 *
 * Tables can contain captions, headers, bodies,
 * and footers using their corresponding components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
class Table extends HtmlComponent
{
    /**
     * Creates a new table component.
     */
    public function __construct()
    {
        parent::__construct('table');
    }


    /**
     * Adds a table caption.
     *
     * @param TableCaption $caption
     *
     * @return static
     */
    public function caption(
        TableCaption $caption
    ): static {
        return $this->addChild(
            $caption
        );
    }


    /**
     * Adds a table head section.
     *
     * @param TableHead $head
     *
     * @return static
     */
    public function head(
        TableHead $head
    ): static {
        return $this->addChild(
            $head
        );
    }


    /**
     * Adds a table body section.
     *
     * @param TableBody $body
     *
     * @return static
     */
    public function body(
        TableBody $body
    ): static {
        return $this->addChild(
            $body
        );
    }


    /**
     * Adds a table footer section.
     *
     * @param TableFooter $footer
     *
     * @return static
     */
    public function footer(
        TableFooter $footer
    ): static {
        return $this->addChild(
            $footer
        );
    }
}
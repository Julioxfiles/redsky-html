<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table component.
 *
 * The Table component generates a semantic HTML <table>
 * element used to organize and present tabular data.
 *
 * A table can contain a caption, header section, body
 * section, and footer section through the corresponding
 * TableCaption, TableHead, TableBody, and TableFooter
 * components.
 *
 * Sections are added using caption(), head(), body(), and
 * footer(), allowing a table structure to be built through
 * fluent method chaining.
 *
 * Common attributes and child-management methods inherited
 * from HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), render(), and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
#[Example(
    title: 'Table',
    code: <<<'PHP'
    echo (new Table())
        ->caption(
            new TableCaption('Users')
        )
        ->head(
            (new TableHead())
                ->addRow(
                    (new TableRow())
                        ->addHeader(new TableHeader('Name'))
                        ->addHeader(new TableHeader('Email'))
                )
        )
        ->body(
            (new TableBody())
                ->addRow(
                    (new TableRow())
                        ->addCell(new TableCell('John Doe'))
                        ->addCell(new TableCell('john@example.com'))
                )
        )
        ->render();
    PHP,
    description: 'Creates a semantic HTML table with a caption,
                 header section, and body section. Table content
                 is composed using the corresponding table
                 components.',
    language: 'php',
    primary: true,
    output: '<table><caption>Users</caption><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>John Doe</td><td>john@example.com</td></tr></tbody></table>'
)]
class Table extends HtmlComponent
{
    /**
     * Creates a new table component.
     *
     * The component generates an HTML <table> element
     * that can contain the different semantic sections
     * of a tabular data structure.
     */
    public function __construct()
    {
        parent::__construct('table');
    }


    /**
     * Adds a table caption.
     *
     * The caption describes the purpose or subject
     * of the table.
     *
     * @param TableCaption $caption Table caption component.
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
     * The table head normally contains column headers
     * represented by TableHeader components.
     *
     * @param TableHead $head Table head component.
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
     * The table body contains the primary data rows
     * of the table.
     *
     * @param TableBody $body Table body component.
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
     * The table footer can contain summary rows or
     * other information associated with the table data.
     *
     * @param TableFooter $footer Table footer component.
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
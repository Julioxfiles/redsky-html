<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Table;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML table header cell component.
 *
 * The TableHeaderCell component generates a semantic
 * HTML <th> element used to represent header information
 * inside a table.
 *
 * Header cells can define the scope of the information
 * they describe using scope(). They can also span multiple
 * columns or rows using colspan() and rowspan().
 *
 * Content can be provided through the constructor, while
 * common attributes and content methods inherited from
 * HtmlComponent can also be used.
 *
 * Common inherited methods include class(), style(),
 * attribute(), addChild(), text(), html(), render(),
 * and __toString().
 *
 * This component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Table
 */
#[Example(
    title: 'Table Header Cell',
    code: <<<'PHP'
    echo (new TableHeaderCell('Name'))
        ->scope('col')
        ->attribute('id', 'name-header')
        ->render();
    PHP,
    description: 'Creates a semantic table header cell for a
                 column heading. The scope attribute indicates
                 that the header applies to a column.',
    language: 'php',
    primary: true,
    output: '<th scope="col" id="name-header">Name</th>'
)]
class TableHeaderCell extends HtmlComponent
{
    /**
     * Creates a new table header cell component.
     *
     * When content is provided, it is assigned as the
     * content of the header cell.
     *
     * @param mixed|null $content Header cell content.
     */
    public function __construct(
        mixed $content = null
    ) {
        parent::__construct('th');

        if ($content !== null) {
            $this->setContent($content);
        }
    }


    /**
     * Sets the header scope.
     *
     * The scope attribute defines which table cells
     * the header applies to.
     *
     * Common values include:
     *
     * - col
     * - row
     * - colgroup
     * - rowgroup
     *
     * @param string $scope Header scope.
     *
     * @return static
     */
    public function scope(
        string $scope
    ): static {
        return $this->attribute(
            'scope',
            $scope
        );
    }


    /**
     * Sets the number of columns this header cell
     * should span.
     *
     * @param int $columns Number of columns to span.
     *
     * @return static
     */
    public function colspan(
        int $columns
    ): static {
        return $this->attribute(
            'colspan',
            $columns
        );
    }


    /**
     * Sets the number of rows this header cell
     * should span.
     *
     * @param int $rows Number of rows to span.
     *
     * @return static
     */
    public function rowspan(
        int $rows
    ): static {
        return $this->attribute(
            'rowspan',
            $rows
        );
    }
}
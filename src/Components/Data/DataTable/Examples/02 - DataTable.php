<?php

declare(strict_types=1);

use RedSky\Html\Components\Data\DataTable\DataTable;
use RedSky\Html\Components\Table\TableBody\TableBody;
use RedSky\Html\Components\Table\TableCell\TableCell;
use RedSky\Html\Components\Table\TableHead\TableHead;
use RedSky\Html\Components\Table\TableHeaderCell\TableHeaderCell;
use RedSky\Html\Components\Table\TableRow\TableRow;

$table = new DataTable();

$table
    ->class('dark-table')
    ->caption('Products');

$head = new TableHead();

$header = new TableRow();

$header
    ->addChild(new TableHeaderCell('ID'))
    ->addChild(new TableHeaderCell('Product'))
    ->addChild(new TableHeaderCell('Price'))
    ->addChild(new TableHeaderCell('Stock'));

$head->addChild($header);

$body = new TableBody();

$body
    ->addChild(
        (new TableRow())
            ->addChild(new TableCell('1'))
            ->addChild(new TableCell('Keyboard'))
            ->addChild(new TableCell('$45.00'))
            ->addChild(new TableCell('25'))
    )
    ->addChild(
        (new TableRow())
            ->addChild(new TableCell('2'))
            ->addChild(new TableCell('Mouse'))
            ->addChild(new TableCell('$25.00'))
            ->addChild(new TableCell('42'))
    )
    ->addChild(
        (new TableRow())
            ->addChild(new TableCell('3'))
            ->addChild(new TableCell('Monitor'))
            ->addChild(new TableCell('$280.00'))
            ->addChild(new TableCell('8'))
    );

$table
    ->addChild($head)
    ->addChild($body);

echo $table->render();
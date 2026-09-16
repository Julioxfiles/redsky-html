<?php

declare(strict_types=1);

use RedSky\Html\Components\Data\DataTable\DataTable;
use RedSky\Html\Components\Table\TableBody\TableBody;
use RedSky\Html\Components\Table\TableCell\TableCell;
use RedSky\Html\Components\Table\TableHead\TableHead;
use RedSky\Html\Components\Table\TableHeaderCell\TableHeaderCell;
use RedSky\Html\Components\Table\TableRow\TableRow;

class User
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $status
    ) {
    }
}


/*
 * Simulate database results.
 *
 * In a real application, these objects could come
 * directly from a repository or database query.
 */

$users = [
    new User(1, 'John Smith', 'john@example.com', 'Active'),
    new User(2, 'Jane Doe', 'jane@example.com', 'Active'),
    new User(3, 'Robert Johnson', 'robert@example.com', 'Inactive'),
    new User(4, 'Emily Davis', 'emily@example.com', 'Active'),
];


$table = new DataTable();

$table
    ->class('dark-table')
    ->caption('Users');


$head = new TableHead();

$head->addChild(
    (new TableRow())
        ->addChild(new TableHeaderCell('ID'))
        ->addChild(new TableHeaderCell('Name'))
        ->addChild(new TableHeaderCell('Email'))
        ->addChild(new TableHeaderCell('Status'))
);

$table->addChild($head);


$body = new TableBody();


foreach ($users as $user) {

    $row = new TableRow();

    $row
        ->addChild(new TableCell((string) $user->id))
        ->addChild(new TableCell($user->name))
        ->addChild(new TableCell($user->email))
        ->addChild(new TableCell($user->status));

    $body->addChild($row);
}


$table->addChild($body);


echo $table->render();
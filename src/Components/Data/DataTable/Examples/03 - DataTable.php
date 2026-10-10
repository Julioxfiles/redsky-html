<?php

declare(strict_types=1);

use RedSky\Html\Components\Data\DataTable\DataTable;

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

/*
 * Convert the User objects into associative arrays
 * because DataTable::rows() expects row data.
 */

$rows = [];

foreach ($users as $user) {
    $rows[] = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'status' => $user->status,
    ];
}

/*
 * Build the data table.
 */

$table = new DataTable();

$table
    ->class('datatable')
    ->addClass('datatable-bordered')
    ->caption('Users')
    ->columns([
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'status' => 'Status',
    ])
    ->rows($rows);

echo $table->render();

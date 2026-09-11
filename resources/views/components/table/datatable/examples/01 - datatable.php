<?php

declare(strict_types=1);

/**
 * Title: DataTable
 * Description: Creates a simple DataTable.
 */

use RedSky\Html\Components\Table\DataTable;
use RedSky\Html\Components\Table\TableCaption;

$table = new DataTable();

$table
    ->id('users-table')
    ->class('table table-striped table-bordered')
    ->style('width', '100%')
    ->title('Users management table')
    ->role('table')
    ->data('component', 'users')
    ->data('source', 'database')
    ->aria('label', 'Users information');


$tableCaption = new TableCaption('Registered Users');

$tableCaption
    ->class('table-caption')
    ->style('font-weight', 'bold')
    ->style('font-size', '1.2em')
    ->style('color', 'var(--text-color)')
    ->style('margin-bottom', '10px');

$table->caption($tableCaption);

$table
    ->columns([
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'role' => 'Role',
        'status' => 'Status',
    ]);


$table
    ->rows([
        [
            'id' => 1,
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'role' => 'Administrator',
            'status' => 'Active',
        ],
        [
            'id' => 2,
            'name' => 'Mary Johnson',
            'email' => 'mary@example.com',
            'role' => 'User',
            'status' => 'Inactive',
        ],
        [
            'id' => 3,
            'name' => 'Robert Brown',
            'email' => 'robert@example.com',
            'role' => 'Editor',
            'status' => 'Active',
        ],
    ]);


echo $table;
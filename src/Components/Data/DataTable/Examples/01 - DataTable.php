<?php

declare(strict_types=1);

use RedSky\Html\Components\Data\DataTable\DataTable;

$dataTable = new DataTable();

$dataTable
    ->class('dark-table')
    ->caption('Users')
    ->columns([
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'status' => 'Status',
    ])
    ->rows([
        [
            'id' => 1,
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'status' => 'Active',
        ],
        [
            'id' => 2,
            'name' => 'Maria Garcia',
            'email' => 'maria@example.com',
            'status' => 'Active',
        ],
        [
            'id' => 3,
            'name' => 'Robert Johnson',
            'email' => 'robert@example.com',
            'status' => 'Inactive',
        ],
        [
            'id' => 4,
            'name' => 'Anna Williams',
            'email' => 'anna@example.com',
            'status' => 'Active',
        ],
    ]);

echo $dataTable;

<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Table from an Array',
    code: <<<'PHP'
    $columns = [
        'name'  => 'Name',
        'email' => 'Email',
    ];

    $data = [
        [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
        ],
        [
            'name'  => 'Jane Smith',
            'email' => 'jane@example.com',
        ],
    ];

    echo (new Table())
        ->caption(new TableCaption('Users'))
        ->fromArray($columns, $data)
        ->render();
    PHP,
    description: 'Creates a table directly from column definitions and an array of data.',
    language: 'php',
    output: '<table><caption>Users</caption><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>John Doe</td><td>john@example.com</td></tr><tr><td>Jane Smith</td><td>jane@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table from a SQL Query',
    code: <<<'PHP'
    $statement = $pdo->query(
        'SELECT id, name, email FROM users ORDER BY name'
    );

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo (new Table())
        ->caption(new TableCaption('Users'))
        ->fromArray(
            [
                'id'    => 'ID',
                'name'  => 'Name',
                'email' => 'Email',
            ],
            $data
        )
        ->render();
    PHP,
    description: 'Creates a table using records returned from a SQL query.',
    language: 'php',
    output: '<table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td></tr><tr><td>3</td><td>Robert Brown</td><td>robert@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table from a Prepared Query',
    code: <<<'PHP'
    $statement = $pdo->prepare(
        'SELECT id, name, email
         FROM users
         WHERE active = :active
         ORDER BY name'
    );

    $statement->execute([
        'active' => 1,
    ]);

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo (new Table())
        ->caption(new TableCaption('Active Users'))
        ->fromArray(
            [
                'id'    => 'ID',
                'name'  => 'Name',
                'email' => 'Email',
            ],
            $data
        )
        ->render();
    PHP,
    description: 'Creates a table from data returned by a parameterized SQL query.',
    language: 'php',
    output: '<table><caption>Active Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td></tr><tr><td>3</td><td>Robert Brown</td><td>robert@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table from Objects',
    code: <<<'PHP'
    $users = [
        new User(1, 'John Doe', 'john@example.com'),
        new User(2, 'Jane Smith', 'jane@example.com'),
    ];

    $data = array_map(
        static fn (User $user): array => [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
        ],
        $users
    );

    echo (new Table())
        ->caption(new TableCaption('Users'))
        ->fromArray(
            [
                'id'    => 'ID',
                'name'  => 'Name',
                'email' => 'Email',
            ],
            $data
        )
        ->render();
    PHP,
    description: 'Creates a table from a collection of objects by transforming each object into an associative array.',
    language: 'php',
    output: '<table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table from a Repository',
    code: <<<'PHP'
    $users = $userRepository->findAll();

    $data = array_map(
        static fn (User $user): array => [
            'id'    => $user->getId(),
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
        ],
        $users
    );

    echo (new Table())
        ->caption(new TableCaption('Users'))
        ->fromArray(
            [
                'id'    => 'ID',
                'name'  => 'Name',
                'email' => 'Email',
            ],
            $data
        )
        ->render();
    PHP,
    description: 'Creates a table from objects returned by a repository, demonstrating a typical Clean Architecture use case.',
    language: 'php',
    output: '<table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table from an API Response',
    code: <<<'PHP'
    $response = [
        [
            'id'    => 1,
            'name'  => 'John Doe',
            'email' => 'john@example.com',
        ],
        [
            'id'    => 2,
            'name'  => 'Jane Smith',
            'email' => 'jane@example.com',
        ],
    ];

    echo (new Table())
        ->caption(new TableCaption('API Users'))
        ->fromArray(
            [
                'id'    => 'ID',
                'name'  => 'Name',
                'email' => 'Email',
            ],
            $response
        )
        ->render();
    PHP,
    description: 'Creates a table from data received from an API or other external data source.',
    language: 'php',
    output: '<table><caption>API Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td></tr></tbody></table>'
)]


#[Example(
    title: 'Table with Dynamic Columns',
    code: <<<'PHP'
    $columns = [
        'id'      => 'ID',
        'name'    => 'Name',
        'email'   => 'Email',
        'country' => 'Country',
    ];

    $data = [
        [
            'id'      => 1,
            'name'    => 'John Doe',
            'email'   => 'john@example.com',
            'country' => 'Mexico',
        ],
        [
            'id'      => 2,
            'name'    => 'Jane Smith',
            'email'   => 'jane@example.com',
            'country' => 'United States',
        ],
    ];

    echo (new Table())
        ->caption(new TableCaption('Customers'))
        ->columns($columns)
        ->rows($data)
        ->render();
    PHP,
    description: 'Creates a table dynamically by defining the columns and data separately.',
    language: 'php',
    output: '<table><caption>Customers</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Country</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td><td>Mexico</td></tr><tr><td>2</td><td>Jane Smith</td><td>jane@example.com</td><td>United States</td></tr></tbody></table>'
)]
final class TableExamples
{
}

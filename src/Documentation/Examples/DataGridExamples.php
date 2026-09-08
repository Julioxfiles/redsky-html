<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
    title: 'PHP — Fluent Builder Pattern',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Users')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Creates a DataGrid using the fluent builder API with columns, a caption, and row data.',
    language: 'php',
    primary: true,
    output: '<div data-redsky-component="datagrid"><table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Array Configuration',
    code: <<<'PHP'
    $grid = new DataGrid([
        'caption' => 'Users',

        'columns' => [
            [
                'field' => 'id',
                'label' => 'ID',
            ],
            [
                'field' => 'name',
                'label' => 'Name',
            ],
            [
                'field' => 'email',
                'label' => 'Email',
            ],
        ],

        'data' => [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ],
    ]);

    echo $grid->render();
    PHP,
    description: 'Creates a DataGrid using array configuration instead of the fluent API.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Column Configuration',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Products')
        ->column(
            (new DataGridColumn('id', 'ID'))
                ->width(80)
                ->align('center')
        )
        ->column(
            (new DataGridColumn('name', 'Product'))
                ->description('Product name')
                ->sortable()
                ->resizable()
                ->reorderable()
        )
        ->column(
            (new DataGridColumn('price', 'Price'))
                ->width(120)
                ->align('right')
        )
        ->gridData([
            [
                'id' => 1,
                'name' => 'Keyboard',
                'price' => 79.99,
            ],
            [
                'id' => 2,
                'name' => 'Mouse',
                'price' => 39.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Configures individual DataGrid columns with width, alignment, descriptions, sorting, resizing, and reordering options.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Products</caption><thead><tr><th style="width:80px;text-align:center">ID</th><th title="Product name">Product</th><th style="width:120px;text-align:right">Price</th></tr></thead><tbody><tr><td style="width:80px;text-align:center">1</td><td>Keyboard</td><td style="width:120px;text-align:right">79.99</td></tr><tr><td style="width:80px;text-align:center">2</td><td>Mouse</td><td style="width:120px;text-align:right">39.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Sorting',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Products')
        ->column('id', 'ID')
        ->column('name', 'Product')
        ->column('price', 'Price')
        ->sortable()
        ->sort('name', 'asc')
        ->gridData([
            [
                'id' => 1,
                'name' => 'Keyboard',
                'price' => 79.99,
            ],
            [
                'id' => 2,
                'name' => 'Monitor',
                'price' => 249.99,
            ],
            [
                'id' => 3,
                'name' => 'Mouse',
                'price' => 39.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Enables column sorting and defines an initial ascending sort order.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Products</caption><thead><tr><th>ID</th><th>Product</th><th>Price</th></tr></thead><tbody><tr><td>1</td><td>Keyboard</td><td>79.99</td></tr><tr><td>2</td><td>Monitor</td><td>249.99</td></tr><tr><td>3</td><td>Mouse</td><td>39.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Multiple Sorting',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Employees')
        ->column('department', 'Department')
        ->column('name', 'Name')
        ->column('salary', 'Salary')
        ->sortable()
        ->sort('department', 'asc')
        ->sort('salary', 'desc')
        ->gridData([
            [
                'department' => 'Sales',
                'name' => 'John Doe',
                'salary' => 65000,
            ],
            [
                'department' => 'Sales',
                'name' => 'Jane Doe',
                'salary' => 72000,
            ],
            [
                'department' => 'Support',
                'name' => 'Mark Smith',
                'salary' => 58000,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Defines more than one sorting rule so rows can be ordered by multiple columns.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Employees</caption><thead><tr><th>Department</th><th>Name</th><th>Salary</th></tr></thead><tbody><tr><td>Sales</td><td>Jane Doe</td><td>72000</td></tr><tr><td>Sales</td><td>John Doe</td><td>65000</td></tr><tr><td>Support</td><td>Mark Smith</td><td>58000</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Pagination',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customers')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->pagination(true)
        ->perPage(10)
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Enables pagination and configures the number of rows displayed per page.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Customers</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table><div data-datagrid-pagination data-page="1" data-per-page="10" data-total="2"></div></div>'
)]
#[Example(
    title: 'PHP — Multiple Row Selection',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customers')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->selectable(true)
        ->selectionMode('multiple')
        ->checkable(true)
        ->selectAll(true)
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Creates a selectable DataGrid with multiple row selection, checkboxes, and select-all support.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Customers</caption><thead><tr><th><input type="checkbox"></th><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td><input type="checkbox"></td><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td><input type="checkbox"></td><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Column Visibility',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Users')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->column('phone', 'Phone')
        ->columnVisible('phone', false)
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '555-1000',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'phone' => '555-2000',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Controls whether individual DataGrid columns are visible.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Frozen Columns',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Orders')
        ->column(
            (new DataGridColumn('id', 'ID'))
                ->frozen(true)
        )
        ->column('customer', 'Customer')
        ->column('product', 'Product')
        ->column('quantity', 'Quantity')
        ->column('total', 'Total')
        ->gridData([
            [
                'id' => 1001,
                'customer' => 'John Doe',
                'product' => 'Keyboard',
                'quantity' => 2,
                'total' => 159.98,
            ],
            [
                'id' => 1002,
                'customer' => 'Jane Doe',
                'product' => 'Monitor',
                'quantity' => 1,
                'total' => 249.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Marks a column as frozen so it can remain visible while the grid is horizontally scrolled.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Orders</caption><thead><tr><th data-frozen="true">ID</th><th>Customer</th><th>Product</th><th>Quantity</th><th>Total</th></tr></thead><tbody><tr><td data-frozen="true">1001</td><td>John Doe</td><td>Keyboard</td><td>2</td><td>159.98</td></tr><tr><td data-frozen="true">1002</td><td>Jane Doe</td><td>Monitor</td><td>1</td><td>249.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Editable Grid',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Products')
        ->column(
            (new DataGridColumn('name', 'Product'))
                ->editable(true)
                ->editor('text')
        )
        ->column(
            (new DataGridColumn('price', 'Price'))
                ->editable(true)
                ->editor('number')
                ->editorOptions([
                    'min' => 0,
                    'step' => 0.01,
                ])
        )
        ->editable(true)
        ->editMode('cell')
        ->gridData([
            [
                'name' => 'Keyboard',
                'price' => 79.99,
            ],
            [
                'name' => 'Mouse',
                'price' => 39.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Enables cell editing and configures different editors for individual columns.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Products</caption><thead><tr><th>Product</th><th>Price</th></tr></thead><tbody><tr><td data-editable="true">Keyboard</td><td data-editable="true">79.99</td></tr><tr><td data-editable="true">Mouse</td><td data-editable="true">39.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Row Editing',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Employees')
        ->column(
            (new DataGridColumn('name', 'Name'))
                ->editable(true)
                ->editor('text')
        )
        ->column(
            (new DataGridColumn('email', 'Email'))
                ->editable(true)
                ->editor('text')
        )
        ->column(
            (new DataGridColumn('salary', 'Salary'))
                ->editable(true)
                ->editor('number')
        )
        ->editable(true)
        ->editMode('row')
        ->gridData([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'salary' => 65000,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'salary' => 72000,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Enables row editing so the complete row can be edited as a unit.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Employees</caption><thead><tr><th>Name</th><th>Email</th><th>Salary</th></tr></thead><tbody><tr><td data-editable="true">John Doe</td><td data-editable="true">john@example.com</td><td data-editable="true">65000</td></tr><tr><td data-editable="true">Jane Doe</td><td data-editable="true">jane@example.com</td><td data-editable="true">72000</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Row Actions',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customers')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->rowAction(
            (new DataGridAction('edit', 'Edit'))
                ->url('/customers/edit')
        )
        ->rowAction(
            (new DataGridAction('delete', 'Delete'))
                ->url('/customers/delete')
                ->method('DELETE')
                ->confirm(true)
                ->confirmMessage('Delete this customer?')
        )
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Adds actions that operate on individual DataGrid rows.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Customers</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td><td><button type="button">Edit</button> <button type="button">Delete</button></td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td><td><button type="button">Edit</button> <button type="button">Delete</button></td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Global Actions',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customers')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->action(
            (new DataGridAction('create', 'New Customer'))
                ->url('/customers/create')
        )
        ->action(
            (new DataGridAction('export', 'Export'))
                ->event('export')
        )
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Adds global toolbar actions that operate on the DataGrid rather than on a single row.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><div data-datagrid-toolbar><button type="button">New Customer</button> <button type="button">Export</button></div><table><caption>Customers</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — AJAX Data',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Users')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->ajax([
            'url' => '/api/users',
            'method' => 'GET',
            'params' => [
                'active' => 1,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Configures the DataGrid to retrieve its data from a remote HTTP endpoint.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td colspan="3">No records found.</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Preference Persistence',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Users')
        ->column('id', 'ID')
        ->column('name', 'Name')
        ->column('email', 'Email')
        ->persistPreferences(true)
        ->persistenceKey('users-grid')
        ->persistenceOptions([
            'columnOrder' => true,
            'columnWidths' => true,
            'visibleColumns' => true,
            'sorting' => true,
            'pageSize' => true,
        ])
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Persists user preferences such as column order, widths, visibility, sorting, and page size.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Users</caption><thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody><tr><td>1</td><td>John Doe</td><td>john@example.com</td></tr><tr><td>2</td><td>Jane Doe</td><td>jane@example.com</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Totals',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Sales')
        ->column('product', 'Product')
        ->column('quantity', 'Quantity')
        ->column('price', 'Price')
        ->totals(
            (new DataGridTotals())
                ->sum('quantity', 'Total Quantity')
                ->sum('price', 'Total Sales')
                ->count('product', 'Products')
        )
        ->gridData([
            [
                'product' => 'Keyboard',
                'quantity' => 2,
                'price' => 159.98,
            ],
            [
                'product' => 'Mouse',
                'quantity' => 3,
                'price' => 119.97,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Adds footer totals using SUM and COUNT calculations.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Sales</caption><thead><tr><th>Product</th><th>Quantity</th><th>Price</th></tr></thead><tbody><tr><td>Keyboard</td><td>2</td><td>159.98</td></tr><tr><td>Mouse</td><td>3</td><td>119.97</td></tr></tbody><tfoot><tr><td>Products: 2</td><td>Total Quantity: 5</td><td>Total Sales: 279.95</td></tr></tfoot></table></div>'
)]
#[Example(
    title: 'PHP — Different Total Operations',
    code: <<<'PHP'
    $totals = new DataGridTotals();

    $totals
        ->sum('amount', 'Total')
        ->count('amount', 'Count')
        ->average('amount', 'Average')
        ->min('amount', 'Minimum')
        ->max('amount', 'Maximum');

    $grid = new DataGrid();

    $grid
        ->caption('Payments')
        ->column('customer', 'Customer')
        ->column('amount', 'Amount')
        ->totals($totals)
        ->gridData([
            [
                'customer' => 'John Doe',
                'amount' => 100,
            ],
            [
                'customer' => 'Jane Doe',
                'amount' => 250,
            ],
            [
                'customer' => 'Mark Smith',
                'amount' => 150,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Configures SUM, COUNT, AVG, MIN, and MAX calculations for DataGrid totals.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Payments</caption><thead><tr><th>Customer</th><th>Amount</th></tr></thead><tbody><tr><td>John Doe</td><td>100</td></tr><tr><td>Jane Doe</td><td>250</td></tr><tr><td>Mark Smith</td><td>150</td></tr></tbody><tfoot><tr><td>Totals</td><td>Total: 500 | Count: 3 | Average: 166.67 | Minimum: 100 | Maximum: 250</td></tr></tfoot></table></div>'
)]
#[Example(
    title: 'PHP — Calculated Column',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Order Items')
        ->column('product', 'Product')
        ->column('quantity', 'Quantity')
        ->column('price', 'Price')
        ->column(
            (new DataGridColumn('total', 'Total'))
                ->calculator(
                    static function (array $row): float {
                        return $row['quantity'] * $row['price'];
                    }
                )
        )
        ->gridData([
            [
                'product' => 'Keyboard',
                'quantity' => 2,
                'price' => 79.99,
            ],
            [
                'product' => 'Mouse',
                'quantity' => 3,
                'price' => 39.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Creates a calculated column whose value is derived from other fields in the current row.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Order Items</caption><thead><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead><tbody><tr><td>Keyboard</td><td>2</td><td>79.99</td><td>159.98</td></tr><tr><td>Mouse</td><td>3</td><td>39.99</td><td>119.97</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Column Formatter',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Products')
        ->column('name', 'Product')
        ->column(
            (new DataGridColumn('price', 'Price'))
                ->formatter(
                    static function (mixed $value): string {
                        return '$' . number_format(
                            (float) $value,
                            2
                        );
                    }
                )
        )
        ->gridData([
            [
                'name' => 'Keyboard',
                'price' => 79.99,
            ],
            [
                'name' => 'Mouse',
                'price' => 39.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Formats column values before they are displayed.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Products</caption><thead><tr><th>Product</th><th>Price</th></tr></thead><tbody><tr><td>Keyboard</td><td>$79.99</td></tr><tr><td>Mouse</td><td>$39.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Row Expansion',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Orders')
        ->column('id', 'ID')
        ->column('customer', 'Customer')
        ->column('total', 'Total')
        ->rowExpansion(true)
        ->gridData([
            [
                'id' => 1001,
                'customer' => 'John Doe',
                'total' => 159.98,
            ],
            [
                'id' => 1002,
                'customer' => 'Jane Doe',
                'total' => 249.99,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Enables expandable rows so additional row information can be displayed interactively.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Orders</caption><thead><tr><th></th><th>ID</th><th>Customer</th><th>Total</th></tr></thead><tbody><tr data-expandable="true"><td><button type="button">+</button></td><td>1001</td><td>John Doe</td><td>159.98</td></tr><tr data-expandable="true"><td><button type="button">+</button></td><td>1002</td><td>Jane Doe</td><td>249.99</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Grouped Headers',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Employee Information')
        ->headerGroups([
            [
                'label' => 'Personal Information',
                'columns' => [
                    'first_name',
                    'last_name',
                ],
            ],
            [
                'label' => 'Employment',
                'columns' => [
                    'department',
                    'salary',
                ],
            ],
        ])
        ->column('first_name', 'First Name')
        ->column('last_name', 'Last Name')
        ->column('department', 'Department')
        ->column('salary', 'Salary')
        ->gridData([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'department' => 'Sales',
                'salary' => 65000,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'department' => 'Support',
                'salary' => 72000,
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Creates multi-level column headers by grouping related columns.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Employee Information</caption><thead><tr><th colspan="2">Personal Information</th><th colspan="2">Employment</th></tr><tr><th>First Name</th><th>Last Name</th><th>Department</th><th>Salary</th></tr></thead><tbody><tr><td>John</td><td>Doe</td><td>Sales</td><td>65000</td></tr><tr><td>Jane</td><td>Doe</td><td>Support</td><td>72000</td></tr></tbody></table></div>'
)]
#[Example(
    title: 'PHP — Complete DataGrid',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customer Management')
        ->column(
            (new DataGridColumn('id', 'ID'))
                ->width(80)
                ->frozen(true)
                ->sortable()
        )
        ->column(
            (new DataGridColumn('name', 'Name'))
                ->sortable()
                ->resizable()
                ->reorderable()
                ->description('Customer full name')
                ->editable(true)
                ->editor('text')
        )
        ->column(
            (new DataGridColumn('email', 'Email'))
                ->sortable()
                ->editable(true)
                ->editor('text')
        )
        ->column(
            (new DataGridColumn('status', 'Status'))
                ->editable(true)
                ->editor(
                    'select'
                )
                ->editorOptions([
                    'choices' => [
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ],
                ])
        )
        ->sortable()
        ->sort('name', 'asc')
        ->selectable(true)
        ->selectionMode('multiple')
        ->checkable(true)
        ->selectAll(true)
        ->editable(true)
        ->editMode('cell')
        ->pagination(true)
        ->perPage(20)
        ->persistPreferences(true)
        ->persistenceKey('customer-grid')
        ->rowAction(
            (new DataGridAction('edit', 'Edit'))
                ->url('/customers/edit')
        )
        ->rowAction(
            (new DataGridAction('delete', 'Delete'))
                ->url('/customers/delete')
                ->method('DELETE')
                ->confirm(true)
        )
        ->gridData([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'status' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'status' => 'inactive',
            ],
        ]);

    echo $grid->render();
    PHP,
    description: 'Combines columns, frozen columns, sorting, selection, editing, pagination, persistence, and row actions in a single DataGrid.',
    language: 'php',
    output: '<div data-redsky-component="datagrid"><table><caption>Customer Management</caption><thead><tr><th><input type="checkbox"></th><th data-frozen="true">ID</th><th title="Customer full name">Name</th><th>Email</th><th>Status</th><th>Actions</th></tr></thead><tbody><tr data-expandable="false"><td><input type="checkbox"></td><td data-frozen="true">1</td><td data-editable="true">John Doe</td><td data-editable="true">john@example.com</td><td data-editable="true">active</td><td><button type="button">Edit</button> <button type="button">Delete</button></td></tr><tr data-expandable="false"><td><input type="checkbox"></td><td data-frozen="true">2</td><td data-editable="true">Jane Doe</td><td data-editable="true">jane@example.com</td><td data-editable="true">inactive</td><td><button type="button">Edit</button> <button type="button">Delete</button></td></tr></tbody></table><div data-datagrid-pagination data-page="1" data-per-page="20" data-total="2"></div></div>'
)]
class DataGridExamples
{
}
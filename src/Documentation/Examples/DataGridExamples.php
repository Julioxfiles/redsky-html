<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Components\DataGrid\DataGrid;
use RedSky\Html\Components\DataGrid\DataGridAction;
use RedSky\Html\Components\DataGrid\DataGridColumn;
use RedSky\Html\Components\DataGrid\DataGridTotals;


#[Example(
    title: 'PHP — Complete DataGrid with Links and Icons',
    code: <<<'PHP'
    $grid = new DataGrid();

    $grid
        ->caption('Customer Management')

        // Grouped headers.
        ->headerGroups([
            [
                'label' => 'Customer Information',
                'columns' => ['id', 'name', 'email'],
            ],
            [
                'label' => 'Account',
                'columns' => ['status', 'orders', 'total'],
            ],
        ])

        // Frozen, sortable column.
        ->column(
            (new DataGridColumn('id', 'ID'))
                ->width(80)
                ->align('center')
                ->frozen(true)
                ->sortable()
        )

        // Resizable, reorderable, editable column.
        ->column(
            (new DataGridColumn('name', 'Name'))
                ->description('Customer full name')
                ->sortable()
                ->resizable()
                ->reorderable()
                ->editable(true)
                ->editor('text')
        )

        // Editable column.
        ->column(
            (new DataGridColumn('email', 'Email'))
                ->sortable()
                ->editable(true)
                ->editor('text')
        )

        // Select editor with choices.
        ->column(
            (new DataGridColumn('status', 'Status'))
                ->sortable()
                ->editable(true)
                ->editor('select')
                ->editorOptions([
                    'choices' => [
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'blocked' => 'Blocked',
                    ],
                ])
        )

        // Calculated column.
        ->column(
            (new DataGridColumn('total', 'Total'))
                ->calculator(
                    static function (array $row): float {
                        return $row['orders']
                            * $row['average_order'];
                    }
                )
                ->formatter(
                    static function (mixed $value): string {
                        return '$' . number_format(
                            (float) $value,
                            2
                        );
                    }
                )
        )

        // Formatted numeric column.
        ->column(
            (new DataGridColumn('average_order', 'Average Order'))
                ->formatter(
                    static function (mixed $value): string {
                        return '$' . number_format(
                            (float) $value,
                            2
                        );
                    }
                )
        )

        ->column('orders', 'Orders')

        // Multiple sorting.
        ->sortable()
        ->sort('status', 'asc')
        ->sort('name', 'asc')

        // Multiple selection with checkboxes and select-all.
        ->selectable(true)
        ->selectionMode('multiple')
        ->checkable(true)
        ->selectAll(true)

        // Cell editing.
        ->editable(true)
        ->editMode('cell')

        // Pagination: 15 total records, 5 per page.
        ->pagination(true)
        ->perPage(5)
        ->total(15)

        // Row expansion.
        ->rowExpansion(true)

        // Persistent user preferences.
        ->persistPreferences(true)
        ->persistenceKey('customer-grid')
        ->persistenceOptions([
            'columnOrder' => true,
            'columnWidths' => true,
            'visibleColumns' => true,
            'sorting' => true,
            'pageSize' => true,
        ])

        // Row actions.
        ->rowAction(
            (new DataGridAction('edit', 'Edit'))
                ->type('icon')
                ->icon('fa-solid fa-pen')
                ->url('/customers/edit')
        )

        ->rowAction(
            (new DataGridAction('delete', 'Delete'))
                ->type('link')
                ->url('/customers/delete')
                ->method('DELETE')
                ->confirm(true)
                ->confirmMessage('Delete this customer?')
        )

        // Global action as a link.
        ->action(
            (new DataGridAction('create', 'New Customer'))
                ->type('link')
                ->url('/customers/create')
        )

        // Global action as a button because it triggers an event.
        ->action(
            (new DataGridAction('export', 'Export'))
                ->type('button')
                ->event('export')
        )

        // Remote/AJAX data configuration.
        ->ajax([
            'url' => '/api/customers',
            'method' => 'GET',
            'params' => [
                'active' => 1,
            ],
        ])

        // Footer calculations.
        ->totals(
            (new DataGridTotals())
                ->sum('orders', 'Total Orders')
                ->sum('total', 'Total Sales')
                ->count('id', 'Customers')
                ->average('total', 'Average Sale')
                ->min('total', 'Minimum Sale')
                ->max('total', 'Maximum Sale')
        )

        ->gridData(
            array_map(
                static function (int $id): array {
                    $names = [
                        'John Doe',
                        'Jane Doe',
                        'Mark Smith',
                        'Sarah Johnson',
                        'Robert Brown',
                        'Michael Wilson',
                        'Emily Davis',
                        'David Miller',
                        'Jessica Moore',
                        'Daniel Taylor',
                    ];

                    $statuses = [
                        'active',
                        'inactive',
                        'blocked',
                    ];

                    $name = $names[
                        ($id - 1) % count($names)
                    ];

                    return [
                        'id' => $id,
                        'name' => $name . ' ' . $id,
                        'email' =>
                            'customer' . $id
                            . '@example.com',
                        'status' =>
                            $statuses[
                                ($id - 1)
                                % count($statuses)
                            ],
                        'orders' => ($id % 20) + 1,
                        'average_order' =>
                            49.99
                            + (($id % 10) * 15),
                    ];
                },
                range(1, 15)
            )
        );

    echo $grid->render();
    PHP,

    description: 'Demonstrates the complete DataGrid API, including grouped headers, frozen columns, sorting, multiple selection, checkbox selection, cell editing, editors, validation-ready configuration, row expansion, link, icon, and button actions, pagination with multiple pages, AJAX data loading, persistent preferences, calculated columns, formatters, and footer totals.',

    language: 'php',

    primary: true,

    output: <<<'HTML'
<div data-redsky-component="datagrid">
    <div data-datagrid-toolbar="">
        <a data-datagrid-action="true" href="/customers/create" aria-label="New Customer">New Customer</a>
        <button data-datagrid-action="true" type="button" data-action-event="export" aria-label="Export">Export</button>
    </div>

    <table>
        <caption>Customer Management</caption>

        <thead>
            <tr>
                <th colspan="3">Customer Information</th>
                <th colspan="3">Account</th>
                <th>Actions</th>
            </tr>

            <tr>
                <th>
                    <input type="checkbox">
                </th>
                <th data-frozen="true">ID</th>
                <th title="Customer full name">Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Orders</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr data-expandable="true">
                <td><input type="checkbox"></td>
                <td data-frozen="true">1</td>
                <td data-editable="true">John Doe 1</td>
                <td data-editable="true">customer1@example.com</td>
                <td data-editable="true">active</td>
                <td>2</td>
                <td>$129.98</td>
                <td>
                    <a data-datagrid-action="true" href="/customers/edit" aria-label="Edit">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </a>
                    <a data-datagrid-action="true" href="/customers/delete" data-action-url="/customers/delete" aria-label="Delete">Delete</a>
                </td>
            </tr>

            <tr data-expandable="true">
                <td><input type="checkbox"></td>
                <td data-frozen="true">2</td>
                <td data-editable="true">Jane Doe 2</td>
                <td data-editable="true">customer2@example.com</td>
                <td data-editable="true">inactive</td>
                <td>3</td>
                <td>$239.97</td>
                <td>
                    <a data-datagrid-action="true" href="/customers/edit" aria-label="Edit">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </a>
                    <a data-datagrid-action="true" href="/customers/delete" data-action-url="/customers/delete" aria-label="Delete">Delete</a>
                </td>
            </tr>

            <tr data-expandable="true">
                <td><input type="checkbox"></td>
                <td data-frozen="true">3</td>
                <td data-editable="true">Mark Smith 3</td>
                <td data-editable="true">customer3@example.com</td>
                <td data-editable="true">blocked</td>
                <td>4</td>
                <td>$379.96</td>
                <td>
                    <a data-datagrid-action="true" href="/customers/edit" aria-label="Edit">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </a>
                    <a data-datagrid-action="true" href="/customers/delete" data-action-url="/customers/delete" aria-label="Delete">Delete</a>
                </td>
            </tr>

            <tr data-expandable="true">
                <td><input type="checkbox"></td>
                <td data-frozen="true">4</td>
                <td data-editable="true">Sarah Johnson 4</td>
                <td data-editable="true">customer4@example.com</td>
                <td data-editable="true">active</td>
                <td>5</td>
                <td>$549.95</td>
                <td>
                    <a data-datagrid-action="true" href="/customers/edit" aria-label="Edit">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </a>
                    <a data-datagrid-action="true" href="/customers/delete" data-action-url="/customers/delete" aria-label="Delete">Delete</a>
                </td>
            </tr>

            <tr data-expandable="true">
                <td><input type="checkbox"></td>
                <td data-frozen="true">5</td>
                <td data-editable="true">Robert Brown 5</td>
                <td data-editable="true">customer5@example.com</td>
                <td data-editable="true">inactive</td>
                <td>6</td>
                <td>$749.94</td>
                <td>
                    <a data-datagrid-action="true" href="/customers/edit" aria-label="Edit">
                        <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    </a>
                    <a data-datagrid-action="true" href="/customers/delete" data-action-url="/customers/delete" aria-label="Delete">Delete</a>
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2">Customers: 15</td>
                <td colspan="2">Total Orders: 135</td>
                <td colspan="2">Total Sales: $14,998.65</td>
                <td>Average Sale: $999.91</td>
                <td>Min: $129.98 | Max: $1,999.84</td>
            </tr>
        </tfoot>
    </table>

    <div
        data-datagrid-pagination=""
        data-page="1"
        data-per-page="5"
        data-total="15">
    </div>
</div>
HTML
)]
class DataGridExamples
{
}
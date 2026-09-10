<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Basic Column',
    description: 'A basic RedSky column with custom dimensions and a blue border.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;

$column = new Column();

$column->attribute(
    'style',
    'border:2px solid #3b82f6;width:300px;height:150px;padding:1rem;box-sizing:border-box;'
);

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:2px solid #3b82f6;width:300px;height:150px;padding:1rem;box-sizing:border-box;"
></div>
HTML
)]
#[Example(
    title: 'Column with Content',
    description: 'A column containing a heading and paragraph with a green border.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Paragraph;

$column = new Column();

$column
    ->attribute(
        'style',
        'border:2px solid #22c55e;width:400px;height:200px;padding:1rem;box-sizing:border-box;'
    )
    ->addChild(
        (new Heading(2))->text('Customer')
    )
    ->addChild(
        (new Paragraph())->text('Customer information.')
    );

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:2px solid #22c55e;width:400px;height:200px;padding:1rem;box-sizing:border-box;"
>
    <h2>Customer</h2>
    <p>Customer information.</p>
</div>
HTML
)]
#[Example(
    title: 'Column with Multiple Children',
    description: 'A column containing multiple child components with an orange border.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Paragraph;

$column = new Column();

$column
    ->attribute(
        'style',
        'border:2px solid #f97316;width:350px;height:220px;padding:1rem;box-sizing:border-box;'
    )
    ->addChild(
        (new Heading(2))->text('Orders')
    )
    ->addChild(
        (new Paragraph())->text('View customer orders.')
    )
    ->addChild(
        (new Paragraph())->text('Manage order history.')
    );

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:2px solid #f97316;width:350px;height:220px;padding:1rem;box-sizing:border-box;"
>
    <h2>Orders</h2>
    <p>View customer orders.</p>
    <p>Manage order history.</p>
</div>
HTML
)]
#[Example(
    title: 'Column with Array of Children',
    description: 'A column populated from an array of child components using addChildren().',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Paragraph;

$children = [
    (new Heading(2))->text('Reports'),
    (new Paragraph())->text('Sales report.'),
    (new Paragraph())->text('Customer report.'),
    (new Paragraph())->text('Inventory report.'),
];

$column = new Column();

$column
    ->attribute(
        'style',
        'border:2px solid #a855f7;width:450px;height:250px;padding:1rem;box-sizing:border-box;'
    )
    ->addChildren($children);

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:2px solid #a855f7;width:450px;height:250px;padding:1rem;box-sizing:border-box;"
>
    <h2>Reports</h2>
    <p>Sales report.</p>
    <p>Customer report.</p>
    <p>Inventory report.</p>
</div>
HTML
)]
#[Example(
    title: 'Column from Component Array',
    description: 'A column built from an array of different RedSky components.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Paragraph;

$components = [
    (new Heading(2))->text('Customer Dashboard'),
    (new Paragraph())->text('Welcome to the customer dashboard.'),
    (new Paragraph())->text('Manage customers, orders, and reports.'),
];

$column = new Column();

$column
    ->attribute(
        'style',
        'border:3px solid #ef4444;width:500px;height:260px;padding:1rem;box-sizing:border-box;'
    )
    ->addChildren($components);

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:3px solid #ef4444;width:500px;height:260px;padding:1rem;box-sizing:border-box;"
>
    <h2>Customer Dashboard</h2>
    <p>Welcome to the customer dashboard.</p>
    <p>Manage customers, orders, and reports.</p>
</div>
HTML
)]
#[Example(
    title: 'Bootstrap Column',
    description: 'A RedSky column using Bootstrap responsive column classes and custom dimensions.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;

$column = new Column();

$column
    ->class('col-md-6')
    ->attribute(
        'style',
        'border:2px solid #0d6efd;width:300px;height:150px;padding:1rem;box-sizing:border-box;'
    );

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    class="col-md-6"
    style="border:2px solid #0d6efd;width:300px;height:150px;padding:1rem;box-sizing:border-box;"
></div>
HTML
)]
#[Example(
    title: 'Materialize Column',
    description: 'A RedSky column using Materialize responsive column classes and custom dimensions.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;

$column = new Column();

$column
    ->class('col s12 m6')
    ->attribute(
        'style',
        'border:2px solid #26a69a;width:400px;height:180px;padding:1rem;box-sizing:border-box;'
    );

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    class="col s12 m6"
    style="border:2px solid #26a69a;width:400px;height:180px;padding:1rem;box-sizing:border-box;"
></div>
HTML
)]
#[Example(
    title: 'Styled Column',
    description: 'A RedSky column with custom border color, width, height, and padding.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Paragraph;

$column = new Column();

$column
    ->attribute(
        'style',
        'border:3px solid #ef4444;width:250px;height:180px;padding:1rem;box-sizing:border-box;'
    )
    ->addChild(
        (new Heading(2))->text('Profile')
    )
    ->addChild(
        (new Paragraph())->text('User profile information.')
    );

echo $column;
PHP,
    output: <<<'HTML'
<div
    data-redsky-component="column"
    style="border:3px solid #ef4444;width:250px;height:180px;padding:1rem;box-sizing:border-box;"
>
    <h2>Profile</h2>
    <p>User profile information.</p>
</div>
HTML
)]
final class ColumnExamples
{
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Components\Layout\Column;
use RedSky\Html\Components\Layout\Row;
use RedSky\Html\Components\Typography\Heading;
use RedSky\Html\Components\Typography\Text;
use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Basic Row',
    code: <<<'PHP'
    echo (new Row())
        ->style(
            border: '1px solid #333',
            width: '500px',
            height: '100px',
            padding: '20px',
            boxSizing: 'border-box'
        )
        ->addChild(
            new Text('Content inside the row.')
        )
        ->render();
    PHP,
    description: 'Creates a basic row with explicit dimensions and a visible border to make the layout area easier to identify.',
    language: 'php',
    output: '<div data-redsky-component="row" style="border:1px solid #333;width:500px;height:100px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">Content inside the row.</span></div>'
)]

#[Example(
    title: 'Row with Columns',
    code: <<<'PHP'
    echo (new Row())
        ->style(
            border: '1px solid #333',
            width: '600px',
            height: '160px',
            padding: '10px',
            boxSizing: 'border-box'
        )
        ->addColumn(
            (new Column(
                new Heading('First Column')
            ))
                ->style(
                    border: '1px solid #0d6efd',
                    width: '280px',
                    height: '120px',
                    padding: '15px',
                    boxSizing: 'border-box'
                )
        )
        ->addColumn(
            (new Column(
                new Heading('Second Column')
            ))
                ->style(
                    border: '1px solid #198754',
                    width: '280px',
                    height: '120px',
                    padding: '15px',
                    boxSizing: 'border-box'
                )
        )
        ->render();
    PHP,
    description: 'Creates a row containing two explicitly sized columns so the relationship between the row and its children is clearly visible.',
    language: 'php',
    output: '<div data-redsky-component="row" style="border:1px solid #333;width:600px;height:160px;padding:10px;box-sizing:border-box"><div data-redsky-component="column" style="border:1px solid #0d6efd;width:280px;height:120px;padding:15px;box-sizing:border-box"><h2 data-redsky-component="heading">First Column</h2></div><div data-redsky-component="column" style="border:1px solid #198754;width:280px;height:120px;padding:15px;box-sizing:border-box"><h2 data-redsky-component="heading">Second Column</h2></div></div>'
)]

#[Example(
    title: 'Row from an Array',
    code: <<<'PHP'
    $columns = [
        (new Column(new Text('First column')))
            ->style(
                border: '1px solid #dc3545',
                width: '180px',
                height: '100px',
                padding: '15px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Second column')))
            ->style(
                border: '1px solid #0d6efd',
                width: '180px',
                height: '100px',
                padding: '15px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Third column')))
            ->style(
                border: '1px solid #198754',
                width: '180px',
                height: '100px',
                padding: '15px',
                boxSizing: 'border-box'
            ),
    ];

    echo (new Row())
        ->style(
            border: '1px solid #333',
            width: '600px',
            height: '130px',
            padding: '10px',
            boxSizing: 'border-box'
        )
        ->columns($columns)
        ->render();
    PHP,
    description: 'Creates a row from an array of column components, with visible dimensions and borders for each column.',
    language: 'php',
    output: '<div data-redsky-component="row" style="border:1px solid #333;width:600px;height:130px;padding:10px;box-sizing:border-box"><div data-redsky-component="column" style="border:1px solid #dc3545;width:180px;height:100px;padding:15px;box-sizing:border-box"><span data-redsky-component="text">First column</span></div><div data-redsky-component="column" style="border:1px solid #0d6efd;width:180px;height:100px;padding:15px;box-sizing:border-box"><span data-redsky-component="text">Second column</span></div><div data-redsky-component="column" style="border:1px solid #198754;width:180px;height:100px;padding:15px;box-sizing:border-box"><span data-redsky-component="text">Third column</span></div></div>'
)]

#[Example(
    title: 'Bootstrap Row',
    code: <<<'PHP'
    $columns = [
        (new Column(new Text('First column')))
            ->class('col-md-4')
            ->style(
                border: '1px solid #0d6efd',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Second column')))
            ->class('col-md-4')
            ->style(
                border: '1px solid #198754',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Third column')))
            ->class('col-md-4')
            ->style(
                border: '1px solid #dc3545',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),
    ];

    echo (new Row())
        ->class('row')
        ->style(
            border: '2px solid #333',
            width: '100%',
            minHeight: '150px',
            padding: '10px',
            boxSizing: 'border-box'
        )
        ->columns($columns)
        ->render();
    PHP,
    description: 'Creates a Bootstrap row with three columns. Visible borders and height make the Bootstrap grid structure easy to identify.',
    language: 'php',
    output: '<div data-redsky-component="row" class="row" style="border:2px solid #333;width:100%;min-height:150px;padding:10px;box-sizing:border-box"><div data-redsky-component="column" class="col-md-4" style="border:1px solid #0d6efd;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">First column</span></div><div data-redsky-component="column" class="col-md-4" style="border:1px solid #198754;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">Second column</span></div><div data-redsky-component="column" class="col-md-4" style="border:1px solid #dc3545;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">Third column</span></div></div>'
)]

#[Example(
    title: 'Materialize Row',
    code: <<<'PHP'
    $columns = [
        (new Column(new Text('First column')))
            ->class('col s4')
            ->style(
                border: '1px solid #2196f3',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Second column')))
            ->class('col s4')
            ->style(
                border: '1px solid #4caf50',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),

        (new Column(new Text('Third column')))
            ->class('col s4')
            ->style(
                border: '1px solid #f44336',
                height: '120px',
                padding: '20px',
                boxSizing: 'border-box'
            ),
    ];

    echo (new Row())
        ->class('row')
        ->style(
            border: '2px solid #333',
            width: '100%',
            minHeight: '150px',
            padding: '10px',
            boxSizing: 'border-box'
        )
        ->columns($columns)
        ->render();
    PHP,
    description: 'Creates a Materialize row with three columns. Visible borders and dimensions make the 12-column grid structure easier to understand.',
    language: 'php',
    output: '<div data-redsky-component="row" class="row" style="border:2px solid #333;width:100%;min-height:150px;padding:10px;box-sizing:border-box"><div data-redsky-component="column" class="col s4" style="border:1px solid #2196f3;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">First column</span></div><div data-redsky-component="column" class="col s4" style="border:1px solid #4caf50;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">Second column</span></div><div data-redsky-component="column" class="col s4" style="border:1px solid #f44336;height:120px;padding:20px;box-sizing:border-box"><span data-redsky-component="text">Third column</span></div></div>'
)]

final class RowExamples
{
}

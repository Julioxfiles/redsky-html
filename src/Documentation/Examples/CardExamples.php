<?php   
declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;



#[Example(
    title: 'PHP — Fluent Builder Pattern',
    code: <<<'PHP'
    $card = new Card();

    $card
        ->image(
            (new Image(
                'https://picsum.photos/400/300',
                'John Smith'
            ))
                ->width(200)
                ->height(200)
                ->class('card-img-top')
                ->style('object-fit', 'cover')
                ->style('object-position', 'center')
                ->attribute(
                    'onclick',
                    'zoomImage(this)'
                )
        )
        ->title('John Smith')
        ->bodyContent(
            '<p>Customer #1025</p>
             <p>john.smith@example.com</p>
             <p>Active</p>'
        )
        ->action(
            (new A('View'))
                ->href('/customers/1025')
                ->class('btn btn-primary')
        )
        ->action(
            (new A('Edit'))
                ->href('/customers/1025/edit')
                ->class('btn btn-secondary')
        )
        ->class('card')
        ->style('width', '300px')
        ->attribute(
            'onclick',
            'openCustomer(1025)'
        );

    $card->titleComponent()
        ->class('card-title')
        ->style('margin-bottom', '1rem');

    $card->bodyComponent()
        ->class('card-body')
        ->style('padding', '1.5rem')
        ->style('background-color', '#f8f9fa')
        ->attribute(
            'onclick',
            'openCustomerDetails(event)'
        );

    $card->footerComponent()
        ->class('card-footer')
        ->style('display', 'flex')
        ->style('gap', '0.5rem');

    echo $card->render();
    PHP,
    description: 'Creates a semantic card using the fluent builder API and configures its child components directly through their existing Component API.',
    language: 'php',
    primary: true,
    output: '<article class="card" style="width: 300px" onclick="openCustomer(1025)"><header><img src="https://picsum.photos/400/300" alt="John Smith" width="200" height="200" class="card-img-top" style="object-fit: cover; object-position: center" onclick="zoomImage(this)" /><h2 class="card-title" style="margin-bottom: 1rem">John Smith</h2></header><section class="card-body" style="padding: 1.5rem; background-color: #f8f9fa" onclick="openCustomerDetails(event)"><p>Customer #1025</p><p>john.smith@example.com</p><p>Active</p></section><footer class="card-footer" style="display: flex; gap: 0.5rem"><a href="/customers/1025" class="btn btn-primary">View</a><a href="/customers/1025/edit" class="btn btn-secondary">Edit</a></footer></article>'
)]
#[Example(
    title: 'PHP — Array Configuration',
    code: <<<'PHP'
    $card = new Card([
        'image' => (new Image(
            'https://picsum.photos/400/300',
            'John Smith'
        ))
            ->width(200)
            ->height(200)
            ->class('card-img-top')
            ->style('object-fit', 'cover')
            ->style('object-position', 'center'),

        'title' => 'John Smith',

        'content' =>
            '<p>Customer #1025</p>
             <p>john.smith@example.com</p>
             <p>Active</p>',

        'actions' => [
            (new A('View'))
                ->href('/customers/1025')
                ->class('btn btn-primary'),

            (new A('Edit'))
                ->href('/customers/1025/edit')
                ->class('btn btn-secondary'),
        ],

        'attributes' => [
            'class' => 'card',
            'style' => 'width: 300px',
            'onclick' => 'openCustomer(1025)',
        ],
    ]);

    $card->titleComponent()
        ->class('card-title')
        ->style('margin-bottom', '1rem');

    $card->bodyComponent()
        ->class('card-body')
        ->style('padding', '1.5rem')
        ->style('background-color', '#f8f9fa')
        ->attribute(
            'onclick',
            'openCustomerDetails(event)'
        );

    $card->footerComponent()
        ->class('card-footer')
        ->style('display', 'flex')
        ->style('gap', '0.5rem');

    echo $card->render();
    PHP,
    description: 'Creates the same semantic card using array configuration and configures its child components directly through their existing Component API.',
    language: 'php',
    output: '<article class="card" style="width: 300px" onclick="openCustomer(1025)"><header><img src="https://picsum.photos/400/300" alt="John Smith" width="200" height="200" class="card-img-top" style="object-fit: cover; object-position: center" /><h2 class="card-title" style="margin-bottom: 1rem">John Smith</h2></header><section class="card-body" style="padding: 1.5rem; background-color: #f8f9fa" onclick="openCustomerDetails(event)"><p>Customer #1025</p><p>john.smith@example.com</p><p>Active</p></section><footer class="card-footer" style="display: flex; gap: 0.5rem"><a href="/customers/1025" class="btn btn-primary">View</a><a href="/customers/1025/edit" class="btn btn-secondary">Edit</a></footer></article>'
)]
class CardExamples
{
}
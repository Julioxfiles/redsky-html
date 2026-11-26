<?php
declare(strict_types=1);

use RedSky\Html\Components\Layout\BootstrapCard\BootstrapCard;
use RedSky\Html\Components\Media\Image\Image;
use RedSky\Html\Components\Navigation\Link\Link;

/**
 * BootstrapCard component example.
 *
 * Demonstrates how to create multiple Bootstrap-style cards
 * with images, titles, body content, and action links.
 *
 * @package RedSky\Html\Components\Layout\BootstrapCard
 */

$cards = $cards ?? [
    [
        'image' => 'https://picsum.photos/seed/product-one/400/180',
        'image_alt' => 'Producto uno',
        'title' => 'Producto uno',
        'content' => 'Este es el primer producto. Una descripción para comprobar cómo se distribuye el contenido dentro de la tarjeta.',
        'links' => [
            [
                'label' => 'Ver detalles',
                'url' => '/products/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Editar',
                'url' => '/products/1/edit',
                'class' => 'btn btn-secondary',
            ],
            [
                'label' => 'Eliminar',
                'url' => '/products/1/delete',
                'class' => 'btn btn-danger',
            ],
        ],
    ],
    [
        'image' => 'https://picsum.photos/seed/product-two/400/180',
        'image_alt' => 'Producto dos',
        'title' => 'Producto dos',
        'content' => 'Segundo producto de prueba. Esta descripción tiene una longitud diferente para comprobar el comportamiento de las tarjetas.',
        'links' => [
            [
                'label' => 'Ver detalles',
                'url' => '/products/2',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Editar',
                'url' => '/products/2/edit',
                'class' => 'btn btn-secondary',
            ],
        ],
    ],
    [
        'image' => 'https://picsum.photos/seed/product-three/400/180',
        'image_alt' => 'Producto tres',
        'title' => 'Producto tres',
        'content' => 'Descripción breve del tercer producto.',
        'links' => [
            [
                'label' => 'Ver detalles',
                'url' => '/products/3',
                'class' => 'btn btn-primary',
            ],
        ],
    ],
];

?>

<div class="cards-container">

    <div class="card-grid">

        <?php foreach ($cards as $item): ?>

            <?php

            $card = new BootstrapCard();

            $card
                ->class('bootstrap-card')
                ->image(
                    (new Image(
                        $item['image'],
                        $item['image_alt'] ?? ''
                    ))
                    ->lazy()
                )
                ->title(
                    htmlspecialchars(
                        $item['title'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->bodyContent(
                    htmlspecialchars(
                        $item['content'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                );

            foreach ($item['links'] ?? [] as $linkData) {

                $link = new Link(
                    $linkData['url'],
                    htmlspecialchars(
                        $linkData['label'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                );

                $link->class(
                    $linkData['class'] ?? 'btn btn-primary'
                );

                $card->action($link);
            }

            ?>

            <?= $card->render() ?>

        <?php endforeach; ?>

    </div>

</div>

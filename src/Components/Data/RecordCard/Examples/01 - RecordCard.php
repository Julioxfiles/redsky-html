<?php
declare(strict_types=1);

use RedSky\Html\Components\Data\RecordCard\RecordCard;

/**
 * RecordCard component example.
 *
 * Demonstrates how to represent different types of system
 * records using a single reusable card component.
 *
 * Includes products, users, services, categories, and suppliers,
 * with optional images, metadata, details, and action links.
 *
 * @package RedSky\Html\Components\Data\RecordCard
 */

$records = $records ?? [
    [
        'name' => 'Wireless Headphones',
        'description' => 'Premium Bluetooth headphones with noise cancellation.',
        'image' => 'https://picsum.photos/seed/headphones/120/120',
        'image_alt' => 'Wireless Headphones',
        'created_at' => '2026-11-20',
        'status' => 'Active',
        'details' => [
            'SKU' => 'WH-1042',
            'Price' => '$129.99',
            'Stock' => '25',
        ],
        'links' => [
            [
                'label' => 'View',
                'url' => '/products/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Edit',
                'url' => '/products/1/edit',
                'class' => 'btn btn-secondary',
            ],
            [
                'label' => 'Delete',
                'url' => '/products/1/delete',
                'class' => 'btn btn-danger',
            ],
        ],
    ],
    [
        'name' => 'John Smith',
        'description' => 'Senior PHP Developer',
        'image' => 'https://i.pravatar.cc/120?img=12',
        'image_alt' => 'John Smith',
        'created_at' => '2026-10-15',
        'status' => 'Active',
        'details' => [
            'Email' => 'john@example.com',
            'Role' => 'Administrator',
        ],
        'links' => [
            [
                'label' => 'View',
                'url' => '/users/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Edit',
                'url' => '/users/1/edit',
                'class' => 'btn btn-secondary',
            ],
        ],
    ],
    [
        'name' => 'Technical Support',
        'description' => 'Professional technical support for businesses and individuals.',
        'image' => null,
        'image_alt' => null,
        'created_at' => '2026-09-12',
        'status' => 'Active',
        'details' => [
            'Category' => 'Technology',
            'Price' => '$49.99 / hour',
        ],
        'links' => [
            [
                'label' => 'View',
                'url' => '/services/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Edit',
                'url' => '/services/1/edit',
                'class' => 'btn btn-secondary',
            ],
        ],
    ],
    [
        'name' => 'Electronics',
        'description' => 'Electronic devices, accessories and computer equipment.',
        'image' => 'https://picsum.photos/seed/electronics/120/120',
        'image_alt' => 'Electronics category',
        'created_at' => '2026-08-05',
        'status' => 'Inactive',
        'details' => [
            'Products' => '125',
            'Parent' => 'Technology',
        ],
        'links' => [
            [
                'label' => 'View',
                'url' => '/categories/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Edit',
                'url' => '/categories/1/edit',
                'class' => 'btn btn-secondary',
            ],
        ],
    ],
    [
        'name' => 'Global Supplies Inc.',
        'description' => 'International supplier of office equipment and business materials.',
        'image' => null,
        'image_alt' => null,
        'created_at' => '2026-07-18',
        'status' => 'Pending',
        'details' => [
            'Email' => 'sales@globalsupplies.com',
            'Country' => 'United States',
            'Orders' => '48',
        ],
        'links' => [
            [
                'label' => 'View',
                'url' => '/suppliers/1',
                'class' => 'btn btn-primary',
            ],
            [
                'label' => 'Edit',
                'url' => '/suppliers/1/edit',
                'class' => 'btn btn-secondary',
            ],
        ],
    ],
];

?>

<div class="records-page">

    <div class="records-header">
        <h2>System Records</h2>
        <p>Manage your products, users, services and other resources.</p>
    </div>

    <div class="records-list" style="width: 100%; max-width: 400px;">

        <?php foreach ($records as $record): ?>

            <?php

            $card = (new RecordCard())
                ->name(
                    htmlspecialchars(
                        $record['name'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->description(
                    htmlspecialchars(
                        $record['description'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->createdAt(
                    htmlspecialchars(
                        $record['created_at'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->status(
                    htmlspecialchars(
                        $record['status'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                );

            if (!empty($record['image'])) {
                $card
                    ->image($record['image'])
                    ->imageAlt($record['image_alt'] ?? '');
            }

            foreach ($record['details'] ?? [] as $label => $value) {
                $card->addDetail(
                    htmlspecialchars(
                        (string) $label,
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    ),
                    htmlspecialchars(
                        (string) $value,
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                );
            }

            foreach ($record['links'] ?? [] as $link) {
                $card->addLink(
                    htmlspecialchars(
                        $link['label'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    ),
                    $link['url'],
                    $link['class'] ?? ''
                );
            }

            ?>

            <?= $card->render() ?>

        <?php endforeach; ?>

    </div>

</div>

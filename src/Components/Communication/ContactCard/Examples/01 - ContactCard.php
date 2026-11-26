<?php
declare(strict_types=1);

use RedSky\Html\Components\Communication\ContactCard\ContactCard;

/**
 * ContactCard component example.
 *
 * Demonstrates how to create a contact list with avatars,
 * recent messages, timestamps, unread message counts,
 * and online status indicators.
 *
 * @package RedSky\Html\Components\Communication\ContactCard
 */

$contacts = $contacts ?? [
    [
        'name' => 'John Smith',
        'avatar' => 'https://i.pravatar.cc/120?img=12',
        'message' => 'Hello! How are you doing?',
        'time' => '10:45 AM',
        'unread' => 3,
        'online' => true,
    ],
    [
        'name' => 'Sarah Johnson',
        'avatar' => 'https://i.pravatar.cc/120?img=47',
        'message' => 'See you tomorrow!',
        'time' => '9:30 AM',
        'unread' => 0,
        'online' => true,
    ],
    [
        'name' => 'Michael Brown',
        'avatar' => 'https://i.pravatar.cc/120?img=13',
        'message' => 'Thank you very much.',
        'time' => 'Yesterday',
        'unread' => 1,
        'online' => false,
    ],
    [
        'name' => 'Emily Davis',
        'avatar' => null,
        'message' => 'Can you send me the documents?',
        'time' => 'Yesterday',
        'unread' => 5,
        'online' => false,
    ],
    [
        'name' => 'Robert Wilson',
        'avatar' => 'https://i.pravatar.cc/120?img=60',
        'message' => 'Perfect! Talk to you later.',
        'time' => 'Monday',
        'unread' => 0,
        'online' => false,
    ],
];

?>

<div class="contacts-page">

    <div class="contacts-header">
        <h2>My Contacts</h2>
        <p>Recent conversations and messages</p>
    </div>

    <div class="contacts-list">

        <?php foreach ($contacts as $contact): ?>

            <?php

            $card = (new ContactCard())
                ->name(
                    htmlspecialchars(
                        $contact['name'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->message(
                    htmlspecialchars(
                        $contact['message'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->time(
                    htmlspecialchars(
                        $contact['time'],
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    )
                )
                ->unread((int) $contact['unread'])
                ->online((bool) $contact['online']);

            if (!empty($contact['avatar'])) {
                $card->avatar($contact['avatar']);
            }

            ?>

            <?= $card->render() ?>

        <?php endforeach; ?>

    </div>

</div>

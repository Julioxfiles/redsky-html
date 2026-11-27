<?php
declare(strict_types=1);

use RedSky\Html\Components\Widgets\PostStick\PostStick;

/**
 * PostStick dark theme example.
 *
 * Demonstrates a dark sticky note with a colored
 * title area and a neutral dark toolbar/header.
 *
 * @package App\Examples\Components
 */

$postStick = new PostStick();

$postStick
    ->noteTitle('My RedSky Notes')
    ->noteContent(
        'Welcome to PostStick!

This is an example of a dark sticky note.

You can move, resize and edit this note.
Your changes will be saved automatically.'
    )
    ->theme('dark')
    ->color('purple')
    ->size(340, 380)
    ->position(80, 80)
    ->addClass('post-stick-example');

echo $postStick->render();
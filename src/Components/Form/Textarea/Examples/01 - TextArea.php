<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\TextArea\TextArea;

/**
 * TextArea component examples.
 *
 * Demonstrates basic multiline text input, placeholder text,
 * initial content, sizing, required, readonly, and disabled states.
 */
?>

<section>
    <h2>Basic TextArea</h2>

    <?php
    echo (new TextArea())
        ->name('description')
        ->placeholder('Enter a description...');
    ?>
</section>

<section>
    <h2>TextArea with Initial Content</h2>

    <?php
    echo (new TextArea('This is the initial content of the textarea.'))
        ->name('initial_content')
        ->rows(4);
    ?>
</section>

<section>
    <h2>Required TextArea</h2>

    <?php
    echo (new TextArea())
        ->name('message')
        ->placeholder('Enter your message...')
        ->required();
    ?>
</section>

<section>
    <h2>Custom Size</h2>

    <?php
    echo (new TextArea())
        ->name('comments')
        ->size(6, 50)
        ->placeholder('Write your comments here...');
    ?>
</section>

<section>
    <h2>Readonly TextArea</h2>

    <?php
    echo (new TextArea('This content can be read but not edited.'))
        ->name('readonly_content')
        ->rows(3)
        ->readonly();
    ?>
</section>

<section>
    <h2>Disabled TextArea</h2>

    <?php
    echo (new TextArea('This textarea is disabled.'))
        ->name('disabled_content')
        ->rows(3)
        ->disabled();
    ?>
</section>

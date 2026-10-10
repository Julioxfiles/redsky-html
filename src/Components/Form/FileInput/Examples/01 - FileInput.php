<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\FileInput\FileInput;
?>

<section>
    <h2>Basic File Input</h2>

    <?php
    echo new FileInput('document');
    ?>
</section>

<section>
    <h2>Required File</h2>

    <?php
    echo (new FileInput('required_file'))
        ->required();
    ?>
</section>

<section>
    <h2>Multiple Files</h2>

    <?php
    echo (new FileInput('attachments'))
        ->multiple();
    ?>
</section>

<section>
    <h2>Image Files</h2>

    <?php
    echo (new FileInput('images'))
        ->images();
    ?>
</section>

<section>
    <h2>Document Files</h2>

    <?php
    echo (new FileInput('documents'))
        ->documents();
    ?>
</section>

<section>
    <h2>Video Files</h2>

    <?php
    echo (new FileInput('videos'))
        ->videos();
    ?>
</section>

<section>
    <h2>Audio Files</h2>

    <?php
    echo (new FileInput('audio_files'))
        ->audios();
    ?>
</section>

<section>
    <h2>PDF Files</h2>

    <?php
    echo (new FileInput('pdf_files'))
        ->accept('.pdf');
    ?>
</section>

<section>
    <h2>Multiple Images</h2>

    <?php
    echo (new FileInput('gallery'))
        ->images()
        ->multiple();
    ?>
</section>

<section>
    <h2>Disabled File Input</h2>

    <?php
    echo (new FileInput('disabled_file'))
        ->disabled();
    ?>
</section>

<?php

declare(strict_types=1);

use RedSky\Html\Components\Media\Audio\Audio;
use RedSky\Html\Components\Media\Source\Source;

/**
 * Audio component examples.
 *
 * Demonstrates native audio playback with controls,
 * playback configuration, and multiple audio sources.
 *
 * @package RedSky\Html\Components\Media\Audio
 */

?>

<h2>Basic Audio Player</h2>

<?php
echo (new Audio('/assets/audio/sample.mp3'))
    ->controls();
?>

<h2>Audio with Playback Options</h2>

<?php
echo (new Audio('/assets/audio/sample.mp3'))
    ->controls()
    ->preload('metadata')
    ->loop();
?>

<h2>Muted Audio Player</h2>

<?php
echo (new Audio('/assets/audio/sample.mp3'))
    ->controls()
    ->muted();
?>

<h2>Audio with Multiple Sources</h2>

<?php
echo (new Audio())
    ->controls()
    ->preload('metadata')
    ->addSource(
        (new Source('/assets/audio/sample.mp3'))
            ->type('audio/mpeg')
    )
    ->addSource(
        (new Source('/assets/audio/sample.ogg'))
            ->type('audio/ogg')
    );
?>
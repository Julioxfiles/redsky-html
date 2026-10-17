<?php

declare(strict_types=1);

use RedSky\Html\Components\Media\Video\Video;
use RedSky\Html\Components\Media\Source\Source;
use RedSky\Html\Components\Media\Track\Track;

/**
 * Video component examples.
 *
 * Demonstrates native video playback, playback options,
 * multiple sources, and subtitles.
 *
 * @package RedSky\Html\Components\Media\Track
 */

?>

<h2>Basic Video Player</h2>

<?php
echo (new Video('/assets/videos/sample.mp4'))
    ->controls()
    ->playsInline();
?>

<h2>Video with Poster</h2>

<?php
echo (new Video('/assets/videos/sample.mp4'))
    ->controls()
    ->poster('/assets/images/video-poster.jpg')
    ->preload('metadata')
    ->playsInline();
?>

<h2>Muted Looping Video</h2>

<?php
echo (new Video('/assets/videos/sample.mp4'))
    ->controls()
    ->muted()
    ->loop()
    ->playsInline();
?>

<h2>Video with Custom Dimensions</h2>

<?php
echo (new Video('/assets/videos/sample.mp4'))
    ->controls()
    ->width(640)
    ->height(360)
    ->playsInline();
?>

<h2>Video with Multiple Sources</h2>

<?php
echo (new Video())
    ->controls()
    ->preload('metadata')
    ->playsInline()
    ->addSource(
        (new Source('/assets/videos/sample.mp4'))
            ->type('video/mp4')
    )
    ->addSource(
        (new Source('/assets/videos/sample.webm'))
            ->type('video/webm')
    );
?>

<h2>Video with Subtitles</h2>

<?php
echo (new Video('/assets/videos/sample.mp4'))
    ->controls()
    ->playsInline()
    ->addTrack(
        (new Track('/assets/videos/subtitles-en.vtt'))
            ->kind('subtitles')
            ->srclang('en')
            ->label('English')
    );
?>
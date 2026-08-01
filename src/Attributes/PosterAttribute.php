<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML poster attribute.
 *
 * Specifies an image to be shown while a video is downloading
 * or before the video starts playing.
 *
 * Examples:
 *
 * - poster="/images/video-preview.jpg"
 */
class PosterAttribute extends Attribute
{
    /**
     * Creates a new poster attribute instance.
     *
     * @param string|null $value The poster image URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('poster', $value);
    }

    /**
     * Returns the poster image URL.
     *
     * @return string|null
     */
    public function getPoster(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the poster image URL.
     *
     * @param string|null $value The poster image URL.
     *
     * @return static
     */
    public function setPoster(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
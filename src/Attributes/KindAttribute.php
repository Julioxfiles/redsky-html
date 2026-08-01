<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML kind attribute.
 *
 * Specifies the type of text track for a track element.
 *
 * Examples:
 *
 * - kind="subtitles"
 * - kind="captions"
 * - kind="chapters"
 * - kind="metadata"
 */
class KindAttribute extends Attribute
{
    /**
     * Creates a new kind attribute instance.
     *
     * @param string|null $value The track kind.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('kind', $this->normalize($value));
    }

    /**
     * Returns the track kind.
     *
     * @return string|null
     */
    public function getKind(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the track kind.
     *
     * @param string|null $value The track kind.
     *
     * @return static
     */
    public function setKind(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the track kind value.
     *
     * @param string|null $value The track kind.
     *
     * @return string|null
     */
    protected function normalize(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return strtolower(trim($value));
    }
}
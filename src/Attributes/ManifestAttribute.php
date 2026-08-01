<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML manifest attribute.
 *
 * Specifies the URL of a web application manifest file.
 *
 * Examples:
 *
 * - manifest="/manifest.json"
 */
class ManifestAttribute extends Attribute
{
    /**
     * Creates a new manifest attribute instance.
     *
     * @param string|null $value The manifest URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('manifest', $value);
    }

    /**
     * Returns the manifest URL.
     *
     * @return string|null
     */
    public function getManifest(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the manifest URL.
     *
     * @param string|null $value The manifest URL.
     *
     * @return static
     */
    public function setManifest(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
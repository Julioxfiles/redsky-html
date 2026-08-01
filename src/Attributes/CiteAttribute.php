<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML cite attribute.
 *
 * Specifies a URL that explains the reference or source
 * of a quotation, citation, or creative work.
 *
 * Examples:
 *
 * - cite="https://example.com/source"
 */
class CiteAttribute extends Attribute
{
    /**
     * Creates a new cite attribute instance.
     *
     * @param string|null $value The citation URL.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('cite', $value);
    }

    /**
     * Returns the citation URL.
     *
     * @return string|null
     */
    public function getCite(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the citation URL.
     *
     * @param string|null $value The citation URL.
     *
     * @return static
     */
    public function setCite(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
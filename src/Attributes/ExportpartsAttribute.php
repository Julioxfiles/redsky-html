<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML exportparts attribute.
 *
 * Specifies shadow tree parts that should be exported from a
 * nested shadow DOM tree.
 *
 * Examples:
 *
 * - exportparts="button"
 * - exportparts="header:main-header"
 */
class ExportpartsAttribute extends Attribute
{
    /**
     * Creates a new exportparts attribute instance.
     *
     * @param string|null $value The exported parts mapping.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('exportparts', $value);
    }

    /**
     * Returns the exported parts mapping.
     *
     * @return string|null
     */
    public function getExportparts(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the exported parts mapping.
     *
     * @param string|null $value The exported parts mapping.
     *
     * @return static
     */
    public function setExportparts(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
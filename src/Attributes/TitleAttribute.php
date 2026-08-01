<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML title attribute.
 *
 * Examples:
 *
 * - title="Save changes"
 * - title="User profile"
 * - title="Close dialog"
 */
class TitleAttribute extends Attribute
{
    /**
     * Creates a new title attribute instance.
     *
     * @param string|null $value The title value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('title', $value);
    }

    /**
     * Returns the title value.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the title value.
     *
     * @param string|null $value The title value.
     *
     * @return static
     */
    public function setTitle(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML src attribute.
 *
 * Examples:
 *
 * - src="/images/logo.png"
 * - src="https://example.com/image.jpg"
 * * - src="/js/app.js"
 */
class SrcAttribute extends Attribute
{
    /**
     * Creates a new src attribute instance.
     *
     * @param string|null $value The src value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('src', $value);
    }

    /**
     * Returns the src value.
     *
     * @return string|null
     */
    public function getSrc(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the src value.
     *
     * @param string|null $value The src value.
     *
     * @return static
     */
    public function setSrc(?string $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
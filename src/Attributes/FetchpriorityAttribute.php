<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML fetchpriority attribute.
 *
 * Specifies the priority hint for fetching a resource.
 *
 * Examples:
 *
 * - fetchpriority="high"
 * - fetchpriority="low"
 * - fetchpriority="auto"
 */
class FetchpriorityAttribute extends Attribute
{
    /**
     * Creates a new fetchpriority attribute instance.
     *
     * @param string|null $value The fetch priority value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('fetchpriority', $this->normalize($value));
    }

    /**
     * Returns the fetch priority value.
     *
     * @return string|null
     */
    public function getFetchpriority(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the fetch priority value.
     *
     * @param string|null $value The fetch priority value.
     *
     * @return static
     */
    public function setFetchpriority(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the fetch priority value.
     *
     * @param string|null $value The fetch priority value.
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
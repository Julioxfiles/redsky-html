<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML crossorigin attribute.
 *
 * Specifies how an element handles cross-origin requests.
 *
 * Examples:
 *
 * - crossorigin="anonymous"
 * - crossorigin="use-credentials"
 */
class CrossoriginAttribute extends Attribute
{
    /**
     * Creates a new crossorigin attribute instance.
     *
     * @param string|null $value The cross-origin policy.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('crossorigin', $this->normalize($value));
    }

    /**
     * Returns the cross-origin policy.
     *
     * @return string|null
     */
    public function getCrossorigin(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the cross-origin policy.
     *
     * @param string|null $value The cross-origin policy.
     *
     * @return static
     */
    public function setCrossorigin(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the cross-origin value.
     *
     * @param string|null $value The cross-origin policy.
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
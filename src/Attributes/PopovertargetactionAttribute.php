<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML popovertargetaction attribute.
 *
 * Specifies the action to perform on a popover element
 * controlled by another element.
 *
 * Examples:
 *
 * - popovertargetaction="show"
 * - popovertargetaction="hide"
 * - popovertargetaction="toggle"
 */
class PopovertargetactionAttribute extends Attribute
{
    /**
     * Creates a new popovertargetaction attribute instance.
     *
     * @param string|null $value The popover action.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('popovertargetaction', $this->normalize($value));
    }

    /**
     * Returns the popover action.
     *
     * @return string|null
     */
    public function getPopovertargetaction(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the popover action.
     *
     * @param string|null $value The popover action.
     *
     * @return static
     */
    public function setPopovertargetaction(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the popover action.
     *
     * Allowed values:
     *
     * - show
     * - hide
     * - toggle
     *
     * @param string|null $value The popover action.
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
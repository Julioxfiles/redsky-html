<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML ARIA attribute.
 *
 * Examples:
 *
 * - aria-label="Close"
 * - aria-hidden="true"
 * - aria-expanded="false"
 */
class AriaAttribute extends Attribute
{
    /**
     * Creates a new ARIA attribute instance.
     *
     * @param string $name  The ARIA attribute name without the "aria-" prefix.
     * @param mixed  $value The attribute value.
     */
    public function __construct(string $name, mixed $value = null)
    {
        parent::__construct(
            $this->normalizeName($name),
            $value
        );
    }

    /**
     * Returns the ARIA attribute key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return substr($this->getName(), 5);
    }

    /**
     * Sets the ARIA attribute key.
     *
     * @param string $name The ARIA attribute key without the "aria-" prefix.
     *
     * @return static
     */
    public function setKey(string $name): static
    {
        $this->setName(
            $this->normalizeName($name)
        );

        return $this;
    }

    /**
     * Normalizes the attribute name.
     *
     * Ensures the attribute name starts with the "aria-" prefix.
     *
     * @param string $name The attribute name.
     *
     * @return string
     */
    protected function normalizeName(string $name): string
    {
        $name = trim($name);

        if (str_starts_with($name, 'aria-')) {
            return $name;
        }

        return 'aria-' . $name;
    }
}
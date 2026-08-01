<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML data-* attribute.
 *
 * Examples:
 *
 * - data-id="15"
 * - data-toggle="modal"
 * - data-user="john"
 */
class DataAttribute extends Attribute
{
    /**
     * Creates a new data attribute instance.
     *
     * @param string $name  The data attribute name without the "data-" prefix.
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
     * Returns the data attribute key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return substr($this->getName(), 5);
    }

    /**
     * Sets the data attribute key.
     *
     * @param string $name The data attribute key without the "data-" prefix.
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
     * Ensures the attribute name starts with the "data-" prefix.
     *
     * @param string $name The attribute name.
     *
     * @return string
     */
    protected function normalizeName(string $name): string
    {
        $name = trim($name);

        if (str_starts_with($name, 'data-')) {
            return $name;
        }

        return 'data-' . $name;
    }
}
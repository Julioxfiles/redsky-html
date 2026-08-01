<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML scope attribute.
 *
 * Specifies the cells that a table header cell applies to.
 *
 * Examples:
 *
 * - scope="col"
 * - scope="row"
 * - scope="colgroup"
 * - scope="rowgroup"
 */
class ScopeAttribute extends Attribute
{
    /**
     * Creates a new scope attribute instance.
     *
     * @param string|null $value The scope value.
     */
    public function __construct(?string $value = null)
    {
        parent::__construct('scope', $this->normalize($value));
    }

    /**
     * Returns the scope value.
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        $value = $this->getValue();

        return $value === null ? null : (string) $value;
    }

    /**
     * Sets the scope value.
     *
     * @param string|null $value The scope value.
     *
     * @return static
     */
    public function setScope(?string $value): static
    {
        $this->setValue($this->normalize($value));

        return $this;
    }

    /**
     * Normalizes the scope value.
     *
     * Allowed values:
     *
     * - row
     * - col
     * - rowgroup
     * - colgroup
     *
     * @param string|null $value The scope value.
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
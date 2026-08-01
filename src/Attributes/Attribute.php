<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

use RedSky\Html\Contracts\Renderable;
use Stringable;

/**
 * Represents a single HTML attribute.
 *
 * Examples:
 *
 * - class="btn btn-primary"
 * - id="submit-button"
 * - disabled
 * - data-id="15"
 */
class Attribute implements Renderable, Stringable
{
    /**
     * Creates a new attribute instance.
     *
     * @param string $name  The attribute name.
     * @param mixed  $value The attribute value.
     */
    public function __construct(
        protected string $name,
        protected mixed $value = null
    ) {
    }

    /**
     * Returns the attribute name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the attribute name.
     *
     * @param string $name The attribute name.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the attribute value.
     *
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Sets the attribute value.
     *
     * @param mixed $value The attribute value.
     *
     * @return static
     */
    public function setValue(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Determines whether the attribute is boolean.
     *
     * @return bool
     */
    public function isBoolean(): bool
    {
        return is_bool($this->value);
    }

    /**
     * Renders the attribute as HTML.
     *
     * @return string
     */
    public function render(): string
    {
        if ($this->value === false || $this->value === null) {
            return '';
        }

        if ($this->value === true) {
            return $this->name;
        }

        return sprintf(
            '%s="%s"',
            $this->name,
            htmlspecialchars((string) $this->value, ENT_QUOTES, 'UTF-8')
        );
    }

    /**
     * Returns the rendered attribute.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
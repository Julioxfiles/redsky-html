<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML style attribute.
 */
class StyleAttribute extends Attribute
{
    /**
     * Creates a new style attribute instance.
     *
     * @param string|array<string, string> $styles The CSS styles.
     */
    public function __construct(string|array $styles = [])
    {
        parent::__construct('style', $this->normalize($styles));
    }

    /**
     * Adds or replaces a CSS declaration.
     *
     * @param string $property The CSS property.
     * @param string $value    The CSS value.
     *
     * @return static
     */
    public function set(string $property, string $value): static
    {
        $styles = $this->toArray();

        $styles[$property] = $value;

        $this->setValue($this->toString($styles));

        return $this;
    }

    /**
     * Removes a CSS declaration.
     *
     * @param string $property The CSS property.
     *
     * @return static
     */
    public function remove(string $property): static
    {
        $styles = $this->toArray();

        unset($styles[$property]);

        $this->setValue($this->toString($styles));

        return $this;
    }

    /**
     * Determines whether the attribute contains a CSS property.
     *
     * @param string $property The CSS property.
     *
     * @return bool
     */
    public function has(string $property): bool
    {
        return array_key_exists($property, $this->toArray());
    }

    /**
     * Returns the CSS declarations as an associative array.
     *
     * @return array<string, string>
     */
    protected function toArray(): array
    {
        $styles = [];

        $value = trim((string) $this->getValue());

        if ($value === '') {
            return $styles;
        }

        foreach (explode(';', $value) as $style) {
            $style = trim($style);

            if ($style === '') {
                continue;
            }

            [$property, $cssValue] = array_map(
                'trim',
                explode(':', $style, 2)
            );

            $styles[$property] = $cssValue;
        }

        return $styles;
    }

    /**
     * Converts CSS declarations into a string.
     *
     * @param array<string, string> $styles The CSS declarations.
     *
     * @return string
     */
    protected function toString(array $styles): string
    {
        $result = [];

        foreach ($styles as $property => $value) {
            $result[] = sprintf('%s: %s', $property, $value);
        }

        return implode('; ', $result);
    }

    /**
     * Normalizes the style value.
     *
     * @param string|array<string, string> $styles The CSS styles.
     *
     * @return string
     */
    protected function normalize(string|array $styles): string
    {
        if (is_string($styles)) {
            return trim($styles);
        }

        return $this->toString($styles);
    }
}
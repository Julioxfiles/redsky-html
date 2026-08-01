<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML class attribute.
 */
class ClassAttribute extends Attribute
{
    /**
     * Creates a new class attribute instance.
     *
     * @param string|array<int, string> $classes One or more CSS classes.
     */
    public function __construct(string|array $classes = [])
    {
        parent::__construct('class', $this->normalize($classes));
    }

    /**
     * Adds one or more CSS classes.
     *
     * @param string|array<int, string> $classes One or more CSS classes.
     *
     * @return static
     */
    public function add(string|array $classes): static
    {
        $current = $this->normalizeToArray((string) $this->getValue());
        $new = $this->normalizeToArray($classes);

        $this->setValue(implode(' ', array_unique(array_merge($current, $new))));

        return $this;
    }

    /**
     * Removes one or more CSS classes.
     *
     * @param string|array<int, string> $classes One or more CSS classes.
     *
     * @return static
     */
    public function remove(string|array $classes): static
    {
        $current = $this->normalizeToArray((string) $this->getValue());
        $remove = $this->normalizeToArray($classes);

        $this->setValue(
            implode(
                ' ',
                array_values(array_diff($current, $remove))
            )
        );

        return $this;
    }

    /**
     * Determines whether the attribute contains a CSS class.
     *
     * @param string $class The CSS class.
     *
     * @return bool
     */
    public function has(string $class): bool
    {
        return in_array($class, $this->normalizeToArray((string) $this->getValue()), true);
    }

    /**
     * Normalizes the classes into a string.
     *
     * @param string|array<int, string> $classes The classes.
     *
     * @return string
     */
    protected function normalize(string|array $classes): string
    {
        return implode(' ', $this->normalizeToArray($classes));
    }

    /**
     * Normalizes the classes into an array.
     *
     * @param string|array<int, string> $classes The classes.
     *
     * @return array<int, string>
     */
    protected function normalizeToArray(string|array $classes): array
    {
        if (is_string($classes)) {
            $classes = preg_split('/\s+/', trim($classes)) ?: [];
        }

        $classes = array_filter($classes, static fn (string $class): bool => $class !== '');

        return array_values(array_unique($classes));
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support HTML escaping.
 *
 * Implementations of this interface can control how values are escaped
 * before being included in generated HTML output.
 *
 * Escaping is essential to prevent invalid markup and security issues
 * when rendering dynamic content.
 *
 * This abstraction allows RedSky HTML to support different escaping
 * strategies without coupling objects to a specific implementation.
 *
 * Common implementations:
 *
 * - Attributes.
 * - Text nodes.
 * - Components.
 * - Content renderers.
 *
 * @package RedSky\Html\Contracts
 */
interface Escapable
{
    /**
     * Determines whether escaping is enabled.
     *
     * @return bool
     */
    public function isEscaped(): bool;


    /**
     * Enables or disables escaping.
     *
     * @param bool $escape Escaping state.
     *
     * @return static
     */
    public function setEscaped(
        bool $escape
    ): static;


    /**
     * Escapes a value.
     *
     * @param mixed $value Value to escape.
     *
     * @return string
     */
    public function escapeValue(
        mixed $value
    ): string;


    /**
     * Returns the escaping character set.
     *
     * Example:
     *
     * UTF-8
     *
     * @return string
     */
    public function encoding(): string;


    /**
     * Changes the escaping character set.
     *
     * @param string $encoding Character encoding.
     *
     * @return static
     */
    public function setEncoding(
        string $encoding
    ): static;
}
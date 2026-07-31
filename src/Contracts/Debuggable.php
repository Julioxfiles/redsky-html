<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that expose debugging information.
 *
 * Implementations of this interface can provide structured information
 * about their internal state for development and troubleshooting.
 *
 * This abstraction is useful for:
 *
 * - Component inspection.
 * - HTML tree debugging.
 * - Renderer diagnostics.
 * - Development tools.
 * - Automated testing.
 *
 * Debug information should describe the object without affecting its
 * normal rendering behavior.
 *
 * @package RedSky\Html\Contracts
 */
interface Debuggable
{
    /**
     * Returns debugging information.
     *
     * @return array<string, mixed>
     */
    public function debug(): array;


    /**
     * Returns a human-readable debug representation.
     *
     * @return string
     */
    public function debugString(): string;


    /**
     * Determines whether debug information is available.
     *
     * @return bool
     */
    public function hasDebugInformation(): bool;


    /**
     * Returns the object class identifier.
     *
     * @return string
     */
    public function debugClass(): string;


    /**
     * Returns the object state snapshot.
     *
     * @return array<string, mixed>
     */
    public function debugState(): array;
}
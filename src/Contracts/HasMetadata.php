<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support metadata.
 *
 * Metadata represents additional information attached to an object
 * that does not directly affect its primary behavior but provides
 * useful contextual information.
 *
 * Metadata can be used for:
 *
 * - Documentation generation.
 * - Component inspection.
 * - Debugging.
 * - Runtime configuration.
 * - Extension systems.
 *
 * Examples:
 *
 * - Component author.
 * - Version information.
 * - Category.
 * - Deprecation information.
 * - Custom annotations.
 *
 * @package RedSky\Html\Contracts
 */
interface HasMetadata
{
    /**
     * Returns all metadata.
     *
     * @return array<string, mixed>
     */
    public function metadata(): array;


    /**
     * Sets metadata values.
     *
     * @param array<string, mixed> $metadata Metadata values.
     *
     * @return static
     */
    public function setMetadata(
        array $metadata
    ): static;


    /**
     * Adds a metadata value.
     *
     * @param string $key   Metadata key.
     * @param mixed  $value Metadata value.
     *
     * @return static
     */
    public function addMetadata(
        string $key,
        mixed $value
    ): static;


    /**
     * Returns a metadata value.
     *
     * @param string $key     Metadata key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getMetadata(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether metadata exists.
     *
     * @param string $key Metadata key.
     *
     * @return bool
     */
    public function hasMetadata(
        string $key
    ): bool;


    /**
     * Removes a metadata value.
     *
     * @param string $key Metadata key.
     *
     * @return static
     */
    public function removeMetadata(
        string $key
    ): static;


    /**
     * Clears all metadata.
     *
     * @return static
     */
    public function clearMetadata(): static;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

/**
 * Represents a collection of metadata values.
 *
 * This collection provides specialized handling for metadata used by
 * RedSky HTML objects.
 *
 * Metadata can contain information such as:
 *
 * - Component information.
 * - Documentation data.
 * - Version details.
 * - Categories.
 * - Runtime configuration.
 *
 * The collection provides a structured API while keeping metadata
 * independent from concrete implementations.
 *
 * @package RedSky\Html\Collections
 */
class MetadataCollection extends Collection
{
    /**
     * Adds metadata.
     *
     * @param string $key   Metadata key.
     * @param mixed  $value Metadata value.
     *
     * @return static
     */
    public function addMetadata(
        string $key,
        mixed $value
    ): static {
        return $this->set(
            $key,
            $value
        );
    }


    /**
     * Returns metadata value.
     *
     * @param string $key     Metadata key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getMetadata(
        string $key,
        mixed $default = null
    ): mixed {
        return $this->get(
            $key,
            $default
        );
    }


    /**
     * Determines whether metadata exists.
     *
     * @param string $key Metadata key.
     *
     * @return bool
     */
    public function hasMetadata(
        string $key
    ): bool {
        return $this->has($key);
    }


    /**
     * Removes metadata.
     *
     * @param string $key Metadata key.
     *
     * @return static
     */
    public function removeMetadata(
        string $key
    ): static {
        return $this->remove($key);
    }


    /**
     * Returns all metadata.
     *
     * @return array<string, mixed>
     */
    public function metadata(): array
    {
        return $this->all();
    }


    /**
     * Merges metadata values.
     *
     * Existing keys are overwritten.
     *
     * @param array<string, mixed> $metadata Metadata values.
     *
     * @return static
     */
    public function mergeMetadata(
        array $metadata
    ): static {
        foreach ($metadata as $key => $value) {
            $this->set(
                $key,
                $value
            );
        }

        return $this;
    }


    /**
     * Clears metadata.
     *
     * @return static
     */
    public function clearMetadata(): static
    {
        return $this->clear();
    }
}
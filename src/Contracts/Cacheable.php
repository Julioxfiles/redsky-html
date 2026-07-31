<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support caching.
 *
 * Implementations of this interface can store and retrieve generated
 * data to improve performance during repeated operations.
 *
 * This abstraction is useful for:
 *
 * - Rendered HTML caching.
 * - Component output caching.
 * - Documentation metadata caching.
 * - Computed attributes.
 *
 * The contract does not define the storage mechanism, allowing
 * different cache implementations.
 *
 * @package RedSky\Html\Contracts
 */
interface Cacheable
{
    /**
     * Determines whether cached data exists.
     *
     * @return bool
     */
    public function hasCache(): bool;


    /**
     * Returns cached data.
     *
     * @return mixed
     */
    public function getCache(): mixed;


    /**
     * Stores cached data.
     *
     * @param mixed $value Cache value.
     *
     * @return static
     */
    public function setCache(
        mixed $value
    ): static;


    /**
     * Removes cached data.
     *
     * @return static
     */
    public function clearCache(): static;


    /**
     * Generates a cache identifier.
     *
     * @return string
     */
    public function cacheKey(): string;


    /**
     * Determines whether the cache is valid.
     *
     * @return bool
     */
    public function isCacheValid(): bool;
}
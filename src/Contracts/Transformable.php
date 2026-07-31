<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can transform data.
 *
 * Implementations of this interface can convert their internal
 * representation into another form while preserving the original
 * object responsibility.
 *
 * This abstraction is useful for:
 *
 * - HTML transformations.
 * - Component conversions.
 * - Attribute normalization.
 * - Renderer pipelines.
 * - UI library adaptations.
 *
 * Transformations should return a new representation or a modified
 * version according to the implementation rules.
 *
 * @package RedSky\Html\Contracts
 */
interface Transformable
{
    /**
     * Transforms the object.
     *
     * @param callable|null $transformer Optional transformation callback.
     *
     * @return mixed
     */
    public function transform(
        ?callable $transformer = null
    ): mixed;


    /**
     * Returns the transformed representation.
     *
     * @return mixed
     */
    public function transformed(): mixed;


    /**
     * Determines whether transformation has been applied.
     *
     * @return bool
     */
    public function isTransformed(): bool;


    /**
     * Resets the transformation state.
     *
     * @return static
     */
    public function resetTransformation(): static;
}
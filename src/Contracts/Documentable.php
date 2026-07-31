<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can provide documentation metadata.
 *
 * This abstraction allows RedSky HTML objects to expose information
 * required for automatic documentation generation.
 *
 * It is designed to work with future PHP Attributes such as:
 *
 * - Component.
 * - Property.
 * - Method.
 * - Example.
 * - Category.
 * - Deprecated.
 *
 * Possible consumers:
 *
 * - Component documentation generators.
 * - UI explorers.
 * - API documentation tools.
 * - Development assistants.
 *
 * @package RedSky\Html\Contracts
 */
interface Documentable
{
    /**
     * Returns documentation metadata.
     *
     * @return array<string, mixed>
     */
    public function documentation(): array;


    /**
     * Sets documentation metadata.
     *
     * @param array<string, mixed> $documentation Documentation data.
     *
     * @return static
     */
    public function setDocumentation(
        array $documentation
    ): static;


    /**
     * Determines whether documentation metadata exists.
     *
     * @return bool
     */
    public function hasDocumentation(): bool;


    /**
     * Returns a documentation value.
     *
     * @param string $key     Metadata key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function documentationValue(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Clears documentation metadata.
     *
     * @return static
     */
    public function clearDocumentation(): static;
}
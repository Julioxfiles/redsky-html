<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that expose version information.
 *
 * This abstraction allows RedSky HTML objects to provide version
 * metadata for compatibility checks, documentation generation,
 * and component lifecycle management.
 *
 * Useful for:
 *
 * - Components.
 * - UI libraries.
 * - Plugins.
 * - Extensions.
 * - Generated documentation.
 *
 * @package RedSky\Html\Contracts
 */
interface Versionable
{
    /**
     * Returns the current version.
     *
     * Example:
     *
     * 1.0.0
     *
     * @return string
     */
    public function version(): string;


    /**
     * Sets the object version.
     *
     * @param string $version Version value.
     *
     * @return static
     */
    public function setVersion(
        string $version
    ): static;


    /**
     * Returns the version introduction date.
     *
     * @return string|null
     */
    public function introducedAt(): ?string;


    /**
     * Returns whether the object supports a specific version.
     *
     * @param string $version Version to check.
     *
     * @return bool
     */
    public function supportsVersion(
        string $version
    ): bool;


    /**
     * Determines whether the object is deprecated.
     *
     * @return bool
     */
    public function isDeprecated(): bool;


    /**
     * Returns deprecation information.
     *
     * @return string|null
     */
    public function deprecationMessage(): ?string;
}
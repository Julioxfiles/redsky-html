<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support configuration.
 *
 * Implementations of this interface can receive and manage dynamic
 * configuration values.
 *
 * This abstraction is useful for RedSky HTML objects that need to
 * accept flexible options while maintaining a consistent API.
 *
 * Common use cases:
 *
 * - Component configuration.
 * - Element options.
 * - Rendering settings.
 * - UI library adaptations.
 * - Component factories.
 *
 * Example:
 *
 * $button->configure([
 *     'variant' => 'primary',
 *     'size' => 'large',
 * ]);
 *
 * @package RedSky\Html\Contracts
 */
interface Configurable
{
    /**
     * Returns all configuration values.
     *
     * @return array<string, mixed>
     */
    public function config(): array;


    /**
     * Sets multiple configuration values.
     *
     * @param array<string, mixed> $config Configuration values.
     *
     * @return static
     */
    public function configure(
        array $config
    ): static;


    /**
     * Sets a single configuration value.
     *
     * @param string $key   Configuration key.
     * @param mixed  $value Configuration value.
     *
     * @return static
     */
    public function setConfig(
        string $key,
        mixed $value
    ): static;


    /**
     * Returns a configuration value.
     *
     * @param string $key Configuration key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public function getConfig(
        string $key,
        mixed $default = null
    ): mixed;


    /**
     * Determines whether a configuration value exists.
     *
     * @param string $key Configuration key.
     *
     * @return bool
     */
    public function hasConfig(
        string $key
    ): bool;


    /**
     * Removes a configuration value.
     *
     * @param string $key Configuration key.
     *
     * @return static
     */
    public function removeConfig(
        string $key
    ): static;


    /**
     * Clears all configuration values.
     *
     * @return static
     */
    public function clearConfig(): static;
}
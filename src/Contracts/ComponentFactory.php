<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for component factories.
 *
 * A component factory is responsible for creating RedSky HTML
 * components dynamically.
 *
 * This abstraction allows the ecosystem to resolve components by
 * identifier instead of depending directly on concrete classes.
 *
 * Component factories are useful for:
 *
 * - Component registries.
 * - Dependency injection containers.
 * - Dynamic UI generation.
 * - Documentation tools.
 * - Component explorers.
 *
 * Example:
 *
 * $factory->createComponent(
 *     'button',
 *     ['variant' => 'primary']
 * );
 *
 * @package RedSky\Html\Contracts
 */
interface ComponentFactory extends Factory
{
    /**
     * Creates a component by name.
     *
     * @param string               $name       Component identifier.
     * @param array<string, mixed> $properties Component properties.
     *
     * @return Component
     */
    public function createComponent(
        string $name,
        array $properties = []
    ): Component;


    /**
     * Determines whether a component is supported.
     *
     * @param string $name Component identifier.
     *
     * @return bool
     */
    public function supportsComponent(
        string $name
    ): bool;


    /**
     * Returns all supported components.
     *
     * @return array<int, string>
     */
    public function supportedComponents(): array;


    /**
     * Registers a component class.
     *
     * @param string $name  Component identifier.
     * @param string $class Component class name.
     *
     * @return static
     */
    public function registerComponent(
        string $name,
        string $class
    ): static;
}
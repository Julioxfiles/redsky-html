<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that contain or reference components.
 *
 * Implementations of this interface can manage relationships with
 * RedSky HTML components.
 *
 * This abstraction is useful for objects such as:
 *
 * - Layout containers.
 * - Component registries.
 * - Parent components.
 * - Rendering pipelines.
 * - UI composition systems.
 *
 * It allows objects to interact with components without depending on
 * concrete component implementations.
 *
 * @package RedSky\Html\Contracts
 */
interface ComponentAware
{
    /**
     * Returns the assigned component.
     *
     * @return Component|null
     */
    public function component(): ?Component;


    /**
     * Assigns a component.
     *
     * @param Component $component Component instance.
     *
     * @return static
     */
    public function setComponent(
        Component $component
    ): static;


    /**
     * Determines whether a component exists.
     *
     * @return bool
     */
    public function hasComponent(): bool;


    /**
     * Removes the current component.
     *
     * @return static
     */
    public function removeComponent(): static;


    /**
     * Returns the component name.
     *
     * @return string|null
     */
    public function componentName(): ?string;


    /**
     * Creates a component child.
     *
     * @param string               $name       Component name.
     * @param array<string, mixed> $properties Component properties.
     *
     * @return Component
     */
    public function createComponent(
        string $name,
        array $properties = []
    ): Component;
}
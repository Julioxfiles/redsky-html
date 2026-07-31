<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

use RedSky\Html\Contracts\Component;

/**
 * Represents a collection of HTML components.
 *
 * This collection provides specialized management for RedSky HTML
 * components.
 *
 * It is designed for:
 *
 * - Component registries.
 * - Component trees.
 * - Layout composition.
 * - Dynamic component resolution.
 * - Documentation explorers.
 *
 * Components are indexed by their name when possible, allowing
 * efficient lookup.
 *
 * @package RedSky\Html\Collections
 */
class ComponentCollection extends Collection
{
    /**
     * Adds a component.
     *
     * @param Component $component Component instance.
     *
     * @return static
     */
    public function addComponent(
        Component $component
    ): static {
        $this->items[$this->key($component)] = $component;

        return $this;
    }


    /**
     * Finds a component by name.
     *
     * @param string $name Component name.
     *
     * @return Component|null
     */
    public function find(
        string $name
    ): ?Component {
        $component = $this->items[$name] ?? null;

        return $component instanceof Component
            ? $component
            : null;
    }


    /**
     * Determines whether a component exists.
     *
     * @param string $name Component name.
     *
     * @return bool
     */
    public function contains(
        string $name
    ): bool {
        return isset($this->items[$name]);
    }


    /**
     * Removes a component by name.
     *
     * @param string $name Component name.
     *
     * @return static
     */
    public function removeComponent(
        string $name
    ): static {
        unset($this->items[$name]);

        return $this;
    }


    /**
     * Returns all components.
     *
     * @return array<int, Component>
     */
    public function components(): array
    {
        return array_values(
            array_filter(
                $this->items,
                static function (mixed $item): bool {
                    return $item instanceof Component;
                }
            )
        );
    }


    /**
     * Returns component names.
     *
     * @return array<int, string>
     */
    public function names(): array
    {
        return array_keys($this->items);
    }


    /**
     * Determines whether a component exists by instance.
     *
     * @param Component $component Component instance.
     *
     * @return bool
     */
    public function hasComponent(
        Component $component
    ): bool {
        return in_array(
            $component,
            $this->items,
            true
        );
    }


    /**
     * Generates component collection key.
     *
     * @param Component $component Component instance.
     *
     * @return string|int
     */
    protected function key(
        Component $component
    ): string|int {
        if (method_exists($component, 'name')) {
            return $component->name();
        }

        return spl_object_id($component);
    }
}
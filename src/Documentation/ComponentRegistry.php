<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Provides access to registered component documentation.
 *
 * The component registry stores and retrieves documentation
 * metadata for available HTML components.
 *
 * Components are indexed by their fully qualified class name.
 *
 * Example:
 *
 * ```php
 * $registry = new ComponentRegistry();
 *
 * $registry->register(
 *     new Component(
 *         'Button',
 *         Button::class
 *     )
 * );
 *
 * $components = $registry->all();
 * ```
 */
class ComponentRegistry
{
    /**
     * Registered components.
     *
     * Components are indexed by their fully qualified class name.
     *
     * @var array<string, Component>
     */
    protected array $components = [];


    /**
     * Registers a component documentation object.
     *
     * If a component with the same class name is already registered,
     * it is replaced by the supplied component.
     */
    public function register(Component $component): static
    {
        $this->components[$component->class()] = $component;

        return $this;
    }


    /**
     * Gets all registered components.
     *
     * @return array<string, Component>
     */
    public function all(): array
    {
        return $this->components;
    }


    /**
     * Finds a component by its fully qualified class name.
     *
     * Returns null when the component is not registered.
     */
    public function get(string $class): ?Component
    {
        return $this->components[$class] ?? null;
    }


    /**
     * Finds a registered component by its documentation name.
     *
     * Returns null when no component with the given name exists.
     */
    public function findByName(string $name): ?Component
    {
        foreach ($this->components as $component) {
            if ($component->name() === $name) {
                return $component;
            }
        }

        return null;
    }


    /**
     * Checks whether a component is registered.
     */
    public function has(string $class): bool
    {
        return isset($this->components[$class]);
    }


    /**
     * Removes a registered component by class name.
     *
     * Returns true when a component was removed.
     */
    public function remove(string $class): bool
    {
        if (!isset($this->components[$class])) {
            return false;
        }

        unset($this->components[$class]);

        return true;
    }


    /**
     * Returns all registered component class names.
     *
     * @return array<int, string>
     */
    public function classes(): array
    {
        return array_keys($this->components);
    }


    /**
     * Returns all registered component names.
     *
     * @return array<int, string>
     */
    public function names(): array
    {
        return array_map(
            static fn (Component $component): string =>
                $component->name(),
            $this->components
        );
    }


    /**
     * Returns the number of registered components.
     */
    public function count(): int
    {
        return count($this->components);
    }


    /**
     * Determines whether the registry contains no components.
     */
    public function isEmpty(): bool
    {
        return $this->components === [];
    }


    /**
     * Converts all registered component documentation
     * into an associative array.
     *
     * @return array<string, array<string, mixed>>
     */
    public function toArray(): array
    {
        return array_map(
            static fn (Component $component): array =>
                $component->toArray(),
            $this->components
        );
    }


    /**
     * Converts all registered component documentation
     * into JSON.
     *
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode(
            $this->toArray(),
            JSON_THROW_ON_ERROR
        );
    }


    /**
     * Removes all registered components.
     */
    public function clear(): static
    {
        $this->components = [];

        return $this;
    }
}
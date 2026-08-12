<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Provides the public documentation API for redsky-html.
 *
 * This class acts as the main entry point for discovering and
 * accessing HTML component documentation.
 *
 * The consumer does not need to know how components are scanned,
 * registered, or documented internally.
 *
 * The documentation registry is created lazily on the first
 * request and reused for subsequent requests.
 *
 * Example:
 *
 * ```php
 * $documentation = new Documentation();
 *
 * $components = $documentation->components();
 * ```
 */
class Documentation
{
    /**
     * Component scanner.
     */
    protected Scanner $scanner;


    /**
     * Component catalog.
     */
    protected ComponentCatalog $catalog;


    /**
     * Component documentation registry.
     *
     * This value is created lazily when the documentation
     * registry is first requested.
     */
    protected ?ComponentRegistry $registry = null;


    /**
     * Creates the documentation service.
     *
     * @param Scanner|null          $scanner Component scanner.
     * @param ComponentCatalog|null $catalog Component catalog.
     */
    public function __construct(
        ?Scanner $scanner = null,
        ?ComponentCatalog $catalog = null
    ) {
        $this->scanner = $scanner ?? new Scanner();

        $this->catalog = $catalog ?? new ComponentCatalog();
    }


    /**
     * Returns all documented components.
     *
     * @return array<string, Component>
     */
    public function components(): array
    {
        return $this->registry()->all();
    }


    /**
     * Returns the component documentation registry.
     *
     * The registry is created lazily and reused for subsequent
     * requests.
     */
    public function registry(): ComponentRegistry
    {
        if ($this->registry === null) {
            $this->registry = $this->scanner->scan(
                $this->catalog->all()
            );
        }

        return $this->registry;
    }


    /**
     * Returns documentation for a specific component.
     *
     * The component is identified by its fully qualified
     * class name.
     *
     * Returns null when the component is not registered.
     */
    public function component(string $class): ?Component
    {
        return $this->registry()->get($class);
    }


    /**
     * Determines whether a component is documented.
     *
     * The component is identified by its fully qualified
     * class name.
     */
    public function hasComponent(string $class): bool
    {
        return $this->registry()->has($class);
    }


    /**
     * Returns the number of documented components.
     */
    public function count(): int
    {
        return $this->registry()->count();
    }


    /**
     * Determines whether any components are documented.
     */
    public function isEmpty(): bool
    {
        return $this->registry()->isEmpty();
    }


    /**
     * Finds a component by its documentation name.
     *
     * Returns null when no component with the given name exists.
     */
    public function findByName(string $name): ?Component
    {
        return $this->registry()->findByName($name);
    }


    /**
     * Returns all documented component class names.
     *
     * @return array<int, string>
     */
    public function classes(): array
    {
        return $this->registry()->classes();
    }


    /**
     * Returns all documented component names.
     *
     * @return array<int, string>
     */
    public function names(): array
    {
        return $this->registry()->names();
    }


    /**
     * Forces the documentation registry to be rebuilt.
     *
     * This is useful when the component catalog changes
     * after the documentation service has been created.
     */
    public function refresh(): static
    {
        $this->registry = $this->scanner->scan(
            $this->catalog->all()
        );

        return $this;
    }
}
<?php
declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Provides the list of available HTML component classes.
 *
 * The catalog uses ComponentScanner to discover component classes
 * automatically from the Components directory.
 *
 * Example:
 *
 * ```php
 * $catalog = new ComponentCatalog();
 *
 * $components = $catalog->all();
 * ```
 */
class ComponentCatalog
{
    /**
     * Registered component classes.
     *
     * @var array<int, string>
     */
    protected array $components = [];


    /**
     * Creates a component catalog.
     *
     * If no components are provided, they are discovered
     * automatically using ComponentScanner.
     *
     * @param array<int, string>|null $components
     */
    public function __construct(?array $components = null)
    {
        if ($components !== null) {
            $this->components = $components;

            return;
        }


        $this->components = (new ComponentScanner())->scan();
    }


    /**
     * Returns all component classes.
     *
     * @return array<int, string>
     */
    public function all(): array
    {
        return $this->components;
    }


    /**
     * Adds a component class.
     */
    public function add(string $component): static
    {
        if (!$this->has($component)) {
            $this->components[] = $component;
        }


        return $this;
    }


    /**
     * Checks whether a component exists.
     */
    public function has(string $component): bool
    {
        return in_array(
            $component,
            $this->components,
            true
        );
    }


    /**
     * Removes all components.
     */
    public function clear(): static
    {
        $this->components = [];


        return $this;
    }


    /**
     * Refreshes the catalog by scanning the Components directory again.
     */
    public function refresh(): static
    {
        $this->components = (new ComponentScanner())->scan();


        return $this;
    }


    /**
     * Returns the number of registered components.
     */
    public function count(): int
    {
        return count($this->components);
    }
}

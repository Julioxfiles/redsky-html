<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for HTML element factories.
 *
 * An element factory is responsible for creating HTML elements
 * dynamically without requiring direct dependencies on concrete
 * element implementations.
 *
 * This abstraction allows RedSky HTML to support:
 *
 * - Dynamic element creation.
 * - Custom element implementations.
 * - Element registries.
 * - Dependency injection.
 * - UI library adapters.
 *
 * Example:
 *
 * $factory->create('button');
 *
 * @package RedSky\Html\Contracts
 */
interface ElementFactory extends Factory
{
    /**
     * Creates an HTML element by tag name.
     *
     * @param string               $tag        HTML tag name.
     * @param array<string, mixed> $attributes Element attributes.
     *
     * @return Element
     */
    public function createElement(
        string $tag,
        array $attributes = []
    ): Element;


    /**
     * Determines whether an element type is supported.
     *
     * @param string $tag HTML tag name.
     *
     * @return bool
     */
    public function supportsElement(
        string $tag
    ): bool;


    /**
     * Returns all supported element tags.
     *
     * @return array<int, string>
     */
    public function supportedElements(): array;
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that expose an attribute collection.
 *
 * This contract represents objects that internally manage a complete
 * collection of HTML attributes through a dedicated attribute bag.
 *
 * It differs from HasAttributes by exposing the attribute container
 * itself, allowing advanced operations such as merging, cloning,
 * filtering, and bulk manipulation.
 *
 * This abstraction will be used by future RedSky HTML classes such as:
 *
 * - Element.
 * - Component.
 * - Attribute collections.
 * - Render pipelines.
 *
 * Example:
 *
 * $element->attributesBag()
 *     ->add('class', 'button');
 *
 * @package RedSky\Html\Contracts
 */
interface HasAttributesBag
{
    /**
     * Returns the internal attribute collection.
     *
     * The concrete implementation should return the attribute
     * collection object responsible for managing attributes.
     *
     * @return object
     */
    public function attributesBag(): object;


    /**
     * Replaces the current attribute collection.
     *
     * @param object $attributes Attribute collection instance.
     *
     * @return static
     */
    public function setAttributesBag(
        object $attributes
    ): static;


    /**
     * Determines whether an attribute collection exists.
     *
     * @return bool
     */
    public function hasAttributesBag(): bool;


    /**
     * Clears all attributes from the collection.
     *
     * @return static
     */
    public function clearAttributes(): static;


    /**
     * Merges attributes into the current collection.
     *
     * Existing values may be replaced according to the
     * implementation rules.
     *
     * @param array<string, mixed> $attributes Attributes to merge.
     *
     * @return static
     */
    public function mergeAttributes(
        array $attributes
    ): static;


    /**
     * Returns the number of stored attributes.
     *
     * @return int
     */
    public function attributesCount(): int;
}
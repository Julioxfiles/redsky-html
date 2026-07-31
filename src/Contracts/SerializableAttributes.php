<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can serialize HTML attributes.
 *
 * Implementations of this interface provide a structured way to
 * transform attribute data into different representations.
 *
 * This contract is intended for:
 *
 * - Attribute bags.
 * - HTML elements.
 * - Components.
 * - Documentation generators.
 * - Debugging and inspection tools.
 *
 * Unlike RenderableAttributes, which focuses on generating HTML output,
 * this contract focuses on exporting attribute data.
 *
 * @package RedSky\Html\Contracts
 */
interface SerializableAttributes
{
    /**
     * Converts attributes into an array representation.
     *
     * @return array<string, mixed>
     */
    public function attributesToArray(): array;


    /**
     * Converts attributes into JSON representation.
     *
     * @return string
     */
    public function attributesToJson(): string;


    /**
     * Creates attributes from an array representation.
     *
     * @param array<string, mixed> $attributes Attributes data.
     *
     * @return static
     */
    public static function fromAttributes(
        array $attributes
    ): static;


    /**
     * Determines whether serialized attributes exist.
     *
     * @return bool
     */
    public function hasSerializedAttributes(): bool;
}
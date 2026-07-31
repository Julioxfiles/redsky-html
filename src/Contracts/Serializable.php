<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be serialized.
 *
 * Implementations of this interface can transform their internal
 * state into a structured representation suitable for:
 *
 * - JSON responses.
 * - Component metadata.
 * - Debugging tools.
 * - Documentation generators.
 * - Storage systems.
 *
 * This contract is intentionally independent from PHP's native
 * Serializable interface to provide a modern typed abstraction
 * compatible with PHP 8+ practices.
 *
 * @package RedSky\Html\Contracts
 */
interface Serializable
{
    /**
     * Converts the object into an array representation.
     *
     * The returned array should contain only data necessary
     * to represent the current object state.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;


    /**
     * Converts the object into JSON representation.
     *
     * Implementations should return valid JSON output.
     *
     * @return string
     */
    public function toJson(): string;


    /**
     * Creates an instance from serialized data.
     *
     * @param array<string, mixed> $data Serialized data.
     *
     * @return static
     */
    public static function fromArray(
        array $data
    ): static;
}
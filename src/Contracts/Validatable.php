<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support validation.
 *
 * Implementations of this interface can verify whether their internal
 * state satisfies required rules before being rendered or processed.
 *
 * This contract allows RedSky HTML objects to validate:
 *
 * - Required properties.
 * - Component configuration.
 * - Attribute definitions.
 * - Element states.
 * - User supplied values.
 *
 * Validation is intentionally separated from rendering so that objects
 * can be checked independently before generating HTML output.
 *
 * @package RedSky\Html\Contracts
 */
interface Validatable
{
    /**
     * Determines whether the object is valid.
     *
     * @return bool
     */
    public function isValid(): bool;


    /**
     * Validates the object and returns validation errors.
     *
     * An empty array indicates successful validation.
     *
     * @return array<int, string>
     */
    public function validate(): array;


    /**
     * Returns the first validation error.
     *
     * @return string|null
     */
    public function firstError(): ?string;


    /**
     * Determines whether validation errors exist.
     *
     * @return bool
     */
    public function hasErrors(): bool;


    /**
     * Clears validation errors.
     *
     * @return static
     */
    public function clearErrors(): static;
}
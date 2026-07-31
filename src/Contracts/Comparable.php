<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that can be compared.
 *
 * Comparable objects can determine relationships with other objects
 * based on their internal state or identity.
 *
 * This abstraction is useful for:
 *
 * - Component comparison.
 * - Element equality checks.
 * - Attribute collections.
 * - Cached rendering validation.
 * - Testing utilities.
 *
 * Implementations should define comparison rules appropriate for
 * their own domain.
 *
 * @package RedSky\Html\Contracts
 */
interface Comparable
{
    /**
     * Determines whether this object is equal to another object.
     *
     * @param object $object Object to compare.
     *
     * @return bool
     */
    public function equals(
        object $object
    ): bool;


    /**
     * Determines whether this object differs from another object.
     *
     * @param object $object Object to compare.
     *
     * @return bool
     */
    public function differs(
        object $object
    ): bool;


    /**
     * Returns a comparison hash.
     *
     * The hash can be used for fast comparison operations.
     *
     * @return string
     */
    public function hash(): string;


    /**
     * Compares the object with another value.
     *
     * @param mixed $value Value to compare.
     *
     * @return bool
     */
    public function sameAs(
        mixed $value
    ): bool;
}
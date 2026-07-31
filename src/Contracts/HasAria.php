<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for objects that support ARIA attributes.
 *
 * Implementations of this interface can manage accessibility-related
 * attributes following the WAI-ARIA specification.
 *
 * ARIA attributes are commonly used to improve:
 *
 * - Screen reader compatibility.
 * - Keyboard navigation.
 * - Assistive technology integration.
 * - Accessible component behavior.
 *
 * Example:
 *
 * $button
 *     ->setAria('label', 'Close dialog')
 *     ->setAria('expanded', 'false');
 *
 * @package RedSky\Html\Contracts
 */
interface HasAria
{
    /**
     * Returns all ARIA attributes.
     *
     * Keys should be stored without the "aria-" prefix.
     *
     * Example:
     *
     * [
     *     'label' => 'Submit'
     * ]
     *
     * @return array<string, mixed>
     */
    public function aria(): array;


    /**
     * Determines whether ARIA attributes exist.
     *
     * @return bool
     */
    public function hasAria(): bool;


    /**
     * Adds or replaces an ARIA attribute.
     *
     * @param string $name  ARIA attribute name without prefix.
     * @param mixed  $value ARIA attribute value.
     *
     * @return static
     */
    public function setAria(
        string $name,
        mixed $value
    ): static;


    /**
     * Returns an ARIA attribute value.
     *
     * @param string $name ARIA attribute name without prefix.
     *
     * @return mixed
     */
    public function getAria(
        string $name
    ): mixed;


    /**
     * Determines whether an ARIA attribute exists.
     *
     * @param string $name ARIA attribute name without prefix.
     *
     * @return bool
     */
    public function hasAriaAttribute(
        string $name
    ): bool;


    /**
     * Removes an ARIA attribute.
     *
     * @param string $name ARIA attribute name without prefix.
     *
     * @return static
     */
    public function removeAria(
        string $name
    ): static;


    /**
     * Removes all ARIA attributes.
     *
     * @return static
     */
    public function clearAria(): static;


    /**
     * Returns ARIA attributes formatted for HTML output.
     *
     * Example:
     *
     * aria-label="Close" aria-expanded="false"
     *
     * @return string
     */
    public function ariaString(): string;
}
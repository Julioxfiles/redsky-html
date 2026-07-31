<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

use Attribute;

/**
 * Defines deprecation metadata for RedSky HTML APIs.
 *
 * This attribute marks classes, methods, properties, constants,
 * parameters, or functions that should no longer be used.
 *
 * Deprecation information can later be consumed by documentation
 * generators, static analysis tools, IDE integrations, migration
 * helpers, and developer warnings.
 *
 * Example:
 *
 * #[Deprecated(
 *     message: 'Use ButtonComponent instead.',
 *     since: '1.2.0',
 *     replacement: 'ButtonComponent'
 * )]
 * class OldButton
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(
    Attribute::TARGET_CLASS
    | Attribute::TARGET_METHOD
    | Attribute::TARGET_PROPERTY
    | Attribute::TARGET_CLASS_CONSTANT
    | Attribute::TARGET_PARAMETER
    | Attribute::TARGET_FUNCTION
)]
final class Deprecated
{
    /**
     * Creates deprecation metadata information.
     *
     * @param string      $message     Deprecation explanation.
     * @param string|null $since       Version where deprecation started.
     * @param string|null $replacement Recommended replacement API.
     * @param bool        $removed     Indicates whether the API was removed.
     * @param string|null $removedIn   Version where removal occurred.
     */
    public function __construct(
        private readonly string $message,
        private readonly ?string $since = null,
        private readonly ?string $replacement = null,
        private readonly bool $removed = false,
        private readonly ?string $removedIn = null
    ) {
    }

    /**
     * Returns the deprecation message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }

    /**
     * Returns the version where the API was deprecated.
     *
     * @return string|null
     */
    public function since(): ?string
    {
        return $this->since;
    }

    /**
     * Returns the recommended replacement.
     *
     * @return string|null
     */
    public function replacement(): ?string
    {
        return $this->replacement;
    }

    /**
     * Determines whether the API has been removed.
     *
     * @return bool
     */
    public function isRemoved(): bool
    {
        return $this->removed;
    }

    /**
     * Returns the removal version.
     *
     * @return string|null
     */
    public function removedIn(): ?string
    {
        return $this->removedIn;
    }

    /**
     * Determines whether a replacement exists.
     *
     * @return bool
     */
    public function hasReplacement(): bool
    {
        return $this->replacement !== null
            && $this->replacement !== '';
    }

    /**
     * Determines whether a deprecation version exists.
     *
     * @return bool
     */
    public function hasSince(): bool
    {
        return $this->since !== null
            && $this->since !== '';
    }

    /**
     * Determines whether a removal version exists.
     *
     * @return bool
     */
    public function hasRemovalVersion(): bool
    {
        return $this->removedIn !== null
            && $this->removedIn !== '';
    }

    /**
     * Converts deprecation metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'since' => $this->since,
            'replacement' => $this->replacement,
            'removed' => $this->removed,
            'removedIn' => $this->removedIn,
        ];
    }

    /**
     * Converts deprecation metadata into JSON format.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode(
            $this->toArray(),
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Returns a readable representation of the deprecation notice.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->message;
    }
}
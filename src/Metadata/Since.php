<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use RedSky\Html\Attribute;

/**
 * Defines version metadata for RedSky HTML APIs.
 *
 * This attribute indicates the version in which a class, method,
 * property, constant, parameter, or other API element was introduced.
 *
 * The information can be consumed by documentation generators,
 * changelog tools, compatibility analyzers, and developer utilities.
 *
 * Example:
 *
 * #[Since('1.0.0')]
 * class Button
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
final class Since
{
    /**
     * Creates version metadata information.
     *
     * @param string      $version     Version where the API was introduced.
     * @param string|null $description Additional information about the release.
     * @param string|null $releaseDate Release date in ISO format.
     * @param bool        $experimental Indicates whether the API is experimental.
     */
    public function __construct(
        private readonly string $version,
        private readonly ?string $description = null,
        private readonly ?string $releaseDate = null,
        private readonly bool $experimental = false
    ) {
    }

    /**
     * Returns the introduced version.
     *
     * @return string
     */
    public function version(): string
    {
        return $this->version;
    }

    /**
     * Returns additional release information.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the release date.
     *
     * @return string|null
     */
    public function releaseDate(): ?string
    {
        return $this->releaseDate;
    }

    /**
     * Determines whether the API is experimental.
     *
     * @return bool
     */
    public function isExperimental(): bool
    {
        return $this->experimental;
    }

    /**
     * Determines whether a description exists.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }

    /**
     * Determines whether a release date exists.
     *
     * @return bool
     */
    public function hasReleaseDate(): bool
    {
        return $this->releaseDate !== null
            && $this->releaseDate !== '';
    }

    /**
     * Converts version metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'version' => $this->version,
            'description' => $this->description,
            'releaseDate' => $this->releaseDate,
            'experimental' => $this->experimental,
        ];
    }

    /**
     * Converts version metadata into JSON format.
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
     * Returns a readable representation of the version.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->version;
    }
}
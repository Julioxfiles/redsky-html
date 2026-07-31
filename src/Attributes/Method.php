<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

use Attribute;

/**
 * Defines metadata information for a component method.
 *
 * This attribute is applied to methods exposed by RedSky HTML
 * components. It provides descriptive information that can be used
 * by documentation generators, component inspectors, IDE helpers,
 * and future runtime component discovery systems.
 *
 * Example:
 *
 * #[Method(
 *     description: 'Renders the component HTML output.',
 *     returnType: 'string',
 *     visibility: 'public'
 * )]
 * public function render(): string
 * {
 * }
 *
 * @package RedSky\Html\Attributes
 */
#[Attribute(Attribute::TARGET_METHOD)]
final class Method
{
    /**
     * Creates method metadata information.
     *
     * @param string      $description Human-readable method description.
     * @param string|null $returnType  Expected return type.
     * @param bool        $static      Indicates whether the method is static.
     * @param bool        $chainable   Indicates whether the method returns the object itself.
     * @param bool        $deprecated  Indicates whether the method is deprecated.
     * @param string|null $version     Version where the method was introduced.
     */
    public function __construct(
        private readonly string $description,
        private readonly ?string $returnType = null,
        private readonly bool $static = false,
        private readonly bool $chainable = false,
        private readonly bool $deprecated = false,
        private readonly ?string $version = null
    ) {
    }

    /**
     * Returns the method description.
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Returns the declared return type.
     *
     * @return string|null
     */
    public function returnType(): ?string
    {
        return $this->returnType;
    }

    /**
     * Determines whether the method is static.
     *
     * @return bool
     */
    public function isStatic(): bool
    {
        return $this->static;
    }

    /**
     * Determines whether the method supports fluent chaining.
     *
     * @return bool
     */
    public function isChainable(): bool
    {
        return $this->chainable;
    }

    /**
     * Determines whether the method is deprecated.
     *
     * @return bool
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated;
    }

    /**
     * Returns the version where the method was introduced.
     *
     * @return string|null
     */
    public function version(): ?string
    {
        return $this->version;
    }

    /**
     * Determines whether the method defines a return type.
     *
     * @return bool
     */
    public function hasReturnType(): bool
    {
        return $this->returnType !== null
            && $this->returnType !== '';
    }

    /**
     * Determines whether the method has a version definition.
     *
     * @return bool
     */
    public function hasVersion(): bool
    {
        return $this->version !== null
            && $this->version !== '';
    }

    /**
     * Converts method metadata into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'returnType' => $this->returnType,
            'static' => $this->static,
            'chainable' => $this->chainable,
            'deprecated' => $this->deprecated,
            'version' => $this->version,
        ];
    }

    /**
     * Converts method metadata into JSON format.
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
     * Returns a readable representation of the metadata.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->description;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Metadata;

use Attribute;

/**
 * Defines usage example metadata for RedSky HTML components.
 *
 * This attribute stores executable or descriptive examples that can
 * later be consumed by documentation generators, component explorers,
 * testing tools, or developer reference systems.
 *
 * Examples can represent component initialization, rendering usage,
 * configuration examples, or common implementation patterns.
 *
 * Example:
 *
 * #[Example(
 *     title: 'Primary Button',
 *     code: '<Button variant="primary">Save</Button>',
 *     description: 'Creates a primary action button.',
 *     language: 'html',
 *     primary: true,
 *     output: '<button class="btn btn-primary">Save</button>'
 * )]
 * class Button
 * {
 * }
 *
 * @package RedSky\Html\Metadata
 */
#[Attribute(
    Attribute::TARGET_CLASS
    | Attribute::TARGET_METHOD
    | Attribute::IS_REPEATABLE
)]
final class Example
{
    /**
     * Creates example metadata information.
     *
     * @param string      $title       Example title.
     * @param string      $code        Example source code or markup.
     * @param string|null $description Additional explanation.
     * @param string|null $language    Example language identifier.
     * @param bool        $primary     Indicates the recommended example.
     * @param string|null $output      Expected rendered HTML output.
     */
    public function __construct(
        private readonly string $title,
        private readonly string $code,
        private readonly ?string $description = null,
        private readonly ?string $language = null,
        private readonly bool $primary = false,
        private readonly ?string $output = null
    ) {
    }

    /**
     * Returns the example title.
     *
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * Returns the example code.
     *
     * @return string
     */
    public function code(): string
    {
        return $this->code;
    }

    /**
     * Returns the example description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the example language.
     *
     * @return string|null
     */
    public function language(): ?string
    {
        return $this->language;
    }

    /**
     * Determines whether this is the primary example.
     *
     * @return bool
     */
    public function isPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * Returns the expected rendered HTML output.
     *
     * @return string|null
     */
    public function output(): ?string
    {
        return $this->output;
    }

    /**
     * Determines whether the example has a description.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }

    /**
     * Determines whether the example defines a language.
     *
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return $this->language !== null
            && $this->language !== '';
    }

    /**
     * Determines whether the example contains rendered output.
     *
     * @return bool
     */
    public function hasOutput(): bool
    {
        return $this->output !== null
            && $this->output !== '';
    }

    /**
     * Returns the example metadata as an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,
            'language' => $this->language,
            'primary' => $this->primary,
            'output' => $this->output,
        ];
    }

    /**
     * Converts example metadata into JSON format.
     *
     * @return string
     *
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode(
            $this->toArray(),
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Returns a readable representation of the example.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->title;
    }
}

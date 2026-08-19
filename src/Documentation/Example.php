<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Represents documentation metadata for a component usage example.
 *
 * An example contains source code, an optional description,
 * a language identifier, an indication of whether the example
 * is the primary recommended example, and optional rendered output.
 *
 * @package RedSky\Html\Documentation
 */
class Example
{
    /**
     * Example title.
     */
    protected string $title;


    /**
     * Example source code.
     */
    protected string $code;


    /**
     * Additional example description.
     */
    protected ?string $description;


    /**
     * Example language identifier.
     */
    protected ?string $language;


    /**
     * Indicates whether this is the primary example.
     */
    protected bool $primary;


    /**
     * Rendered HTML output.
     */
    protected ?string $output;


    /**
     * Creates example documentation metadata.
     */
    public function __construct(
        string $title,
        string $code,
        ?string $description = null,
        ?string $language = null,
        bool $primary = false,
        ?string $output = null
    ) {
        $this->title = $title;
        $this->code = $code;
        $this->description = $description;
        $this->language = $language;
        $this->primary = $primary;
        $this->output = $output;
    }


    /**
     * Returns the example title.
     */
    public function title(): string
    {
        return $this->title;
    }


    /**
     * Returns the example source code.
     */
    public function code(): string
    {
        return $this->code;
    }


    /**
     * Returns the example description.
     */
    public function description(): ?string
    {
        return $this->description;
    }


    /**
     * Returns the example language.
     */
    public function language(): ?string
    {
        return $this->language;
    }


    /**
     * Determines whether this is the primary example.
     */
    public function isPrimary(): bool
    {
        return $this->primary;
    }


    /**
     * Returns the rendered HTML output.
     */
    public function output(): ?string
    {
        return $this->output;
    }


    /**
     * Determines whether the example contains source code.
     */
    public function hasCode(): bool
    {
        return $this->code !== '';
    }


    /**
     * Determines whether the example contains a description.
     */
    public function hasDescription(): bool
    {
        return $this->description !== null
            && $this->description !== '';
    }


    /**
     * Determines whether the example defines a language.
     */
    public function hasLanguage(): bool
    {
        return $this->language !== null
            && $this->language !== '';
    }


    /**
     * Determines whether the example contains rendered output.
     */
    public function hasOutput(): bool
    {
        return $this->output !== null
            && $this->output !== '';
    }


    /**
     * Converts example metadata to an associative array.
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
     * Converts example metadata to JSON.
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
}
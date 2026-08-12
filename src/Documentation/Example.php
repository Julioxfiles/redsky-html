<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Represents a component usage example.
 *
 * An example contains the source code used to create
 * a component and the expected rendered HTML output.
 *
 * Examples can be displayed by documentation renderers
 * as executable-looking source code together with the
 * resulting HTML representation.
 *
 * Example:
 *
 * ```php
 * $example = new Example(
 *     'Basic text input',
 *     '$input = new TextInput();',
 *     '<input type="text">'
 * );
 * ```
 */
class Example
{
    /**
     * Example title.
     */
    protected string $title;


    /**
     * PHP source code example.
     */
    protected string $code;


    /**
     * Rendered HTML output.
     */
    protected string $output;


    /**
     * Creates example documentation metadata.
     *
     * @param string $title Example title.
     * @param string $code PHP source code.
     * @param string $output Rendered HTML output.
     */
    public function __construct(
        string $title,
        string $code,
        string $output
    ) {
        $this->title = $title;
        $this->code = $code;
        $this->output = $output;
    }


    /**
     * Gets the example title.
     */
    public function title(): string
    {
        return $this->title;
    }


    /**
     * Gets the PHP source code.
     */
    public function code(): string
    {
        return $this->code;
    }


    /**
     * Gets the rendered HTML output.
     */
    public function output(): string
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
     * Determines whether the example contains rendered output.
     */
    public function hasOutput(): bool
    {
        return $this->output !== '';
    }


    /**
     * Converts example documentation metadata into an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
            'output' => $this->output,
        ];
    }


    /**
     * Converts example documentation metadata into JSON.
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
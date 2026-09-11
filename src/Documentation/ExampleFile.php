<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Represents a real PHP example file used
 * for component documentation.
 *
 * Example files are executable PHP files that
 * create and render components.
 *
 * An example may optionally have associated
 * demonstration assets:
 *
 * Example:
 *
 * Examples/
 *     01.php
 *     01.css
 *     01.js
 *
 * CSS and JavaScript files are only used
 * to demonstrate component usage and are
 * not part of the component implementation.
 */
class ExampleFile
{
    /**
     * Example file path.
     */
    protected string $file;


    /**
     * Example metadata.
     *
     * @var array<string,string>
     */
    protected array $metadata;


    /**
     * PHP source code extracted from the file.
     */
    protected string $source;


    /**
     * Generated HTML output.
     */
    protected string $output;


    /**
     * Creates a new example representation.
     *
     * @param array<string,string> $metadata
     */
    public function __construct(
        string $file,
        array $metadata,
        string $source,
        string $output = ''
    ) {
        $this->file = $file;
        $this->metadata = $metadata;
        $this->source = $source;
        $this->output = $output;
    }


    /**
     * Returns the example file path.
     */
    public function file(): string
    {
        return $this->file;
    }


    /**
     * Returns the example filename.
     */
    public function filename(): string
    {
        return basename($this->file);
    }


    /**
     * Returns all metadata.
     *
     * @return array<string,string>
     */
    public function metadata(): array
    {
        return $this->metadata;
    }


    /**
     * Returns a metadata value.
     */
    public function meta(
        string $key
    ): ?string {
        return $this->metadata[$key] ?? null;
    }


    /**
     * Returns example title.
     */
    public function title(): string
    {
        return $this->meta('Title')
            ?? $this->identifier();
    }


    /**
     * Returns example description.
     */
    public function description(): ?string
    {
        return $this->meta('Description');
    }


    /**
     * Returns PHP source code.
     */
    public function source(): string
    {
        return $this->source;
    }


    /**
     * Returns rendered component output.
     */
    public function output(): string
    {
        return $this->output;
    }


    /**
     * Updates rendered output.
     */
    public function setOutput(
        string $output
    ): static {
        $this->output = $output;

        return $this;
    }


    /**
     * Determines whether the example has output.
     */
    public function hasOutput(): bool
    {
        return $this->output !== '';
    }


    /**
     * Returns the example identifier.
     */
    public function identifier(): string
    {
        return pathinfo(
            $this->filename(),
            PATHINFO_FILENAME
        );
    }


    /**
     * Determines whether a metadata key exists.
     */
    public function hasMeta(
        string $key
    ): bool {
        return array_key_exists(
            $key,
            $this->metadata
        );
    }


    /**
     * Returns a metadata value ignoring key case.
     */
    public function metaInsensitive(
        string $key
    ): ?string {
        foreach ($this->metadata as $name => $value) {
            if (strcasecmp($name, $key) === 0) {
                return $value;
            }
        }

        return null;
    }


    /**
     * Converts example to array.
     *
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        return [
            'file' => $this->file,
            'filename' => $this->filename(),
            'metadata' => $this->metadata,
            'title' => $this->title(),
            'description' => $this->description(),
            'source' => $this->source,
            'output' => $this->output,
            'css' => $this->cssFile(),
            'js' => $this->jsFile(),
        ];
    }


    /**
     * Returns the directory containing the example file.
     */
    public function assetsDirectory(): string
    {
        return dirname($this->file);
    }


    /**
     * Returns the CSS asset associated with this example.
     *
     * Example:
     *
     * Examples/
     *     01.php
     *     01.css
     *
     * @return string|null
     */
    public function cssFile(): ?string
    {
        $file = $this->assetsDirectory()
            . DIRECTORY_SEPARATOR
            . $this->identifier()
            . '.css';

        return is_file($file)
            ? $file
            : null;
    }


    /**
     * Returns the JavaScript asset associated with this example.
     *
     * Example:
     *
     * Examples/
     *     01.php
     *     01.js
     *
     * @return string|null
     */
    public function jsFile(): ?string
    {
        $file = $this->assetsDirectory()
            . DIRECTORY_SEPARATOR
            . $this->identifier()
            . '.js';

        return is_file($file)
            ? $file
            : null;
    }


    /**
     * Returns CSS asset URL.
     */
    public function cssUrl(): ?string
    {
        $file = $this->cssFile();

        if ($file === null) {
            return null;
        }

        return $this->toUrl($file);
    }


    /**
     * Returns JS asset URL.
     */
    public function jsUrl(): ?string
    {
        $file = $this->jsFile();

        if ($file === null) {
            return null;
        }

        return $this->toUrl($file);
    }


    /**
     * Converts filesystem path into browser URL.
     */
    protected function toUrl(
        string $file
    ): string {
        $root = str_replace(
            '\\',
            '/',
            dirname(__DIR__, 2)
        );

        $path = str_replace(
            '\\',
            '/',
            $file
        );

        $relative = str_replace(
            $root,
            '',
            $path
        );

        return '/redsky/redsky-html'
            . $relative;
    }
}
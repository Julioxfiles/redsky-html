<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Loads component documentation examples
 * from real PHP example files.
 *
 * Example files are discovered and converted
 * into ExampleFile metadata objects.
 *
 * Each PHP example may optionally have associated
 * demonstration assets:
 *
 * Example:
 *
 * 01.php
 * 01.css
 * 01.js
 *
 * CSS and JavaScript assets are resolved by
 * ExampleFile and are not loaded here.
 */
class ExampleLoader
{
    /**
     * Example output renderer.
     */
    protected ExampleRenderer $renderer;


    /**
     * Creates a new example loader.
     */
    public function __construct(
        ?ExampleRenderer $renderer = null
    ) {
        $this->renderer = $renderer
            ?? new ExampleRenderer();
    }


    /**
     * Loads examples from a directory.
     *
     * Only PHP files are considered examples.
     *
     * Files beginning with "_" are ignored and
     * can be used for internal helper files.
     *
     * @return array<int, ExampleFile>
     */
    public function load(
        string $directory
    ): array {
        if (!is_dir($directory)) {
            return [];
        }


        $files = glob(
            $directory . DIRECTORY_SEPARATOR . '*.php'
        );


        if ($files === false) {
            return [];
        }


        sort($files);


        $examples = [];


        foreach ($files as $file) {

            if ($this->shouldIgnore($file)) {
                continue;
            }

            $examples[] = $this->loadFile($file);
        }


        return $examples;
    }


    /**
     * Determines whether a file should be ignored.
     */
    protected function shouldIgnore(
        string $file
    ): bool {
        return str_starts_with(
            basename($file),
            '_'
        );
    }


    /**
     * Resolves metadata from example PHPDoc.
     *
     * Example:
     *
     * /**
     *  * Title: Basic Button
     *  * Description: Creates a simple button.
     *  * Category: Interactive
     *  *\/
     *
     * @return array<string,string>
     */
    protected function resolveMetadata(
        string $source
    ): array {
        $metadata = [];


        if (
            preg_match(
                '/\/\*\*(.*?)\*\//s',
                $source,
                $matches
            ) !== 1
        ) {
            return $metadata;
        }


        $comment = $matches[1];


        preg_match_all(
            '/^\s*\*\s*([^:]+):\s*(.+)$/m',
            $comment,
            $matches
        );


        foreach ($matches[1] as $index => $key) {

            $metadata[trim($key)] = trim(
                $matches[2][$index]
            );
        }


        return $metadata;
    }


    /**
     * Loads a single example file.
     */
    protected function loadFile(
        string $file
    ): ExampleFile {

        $source = file_get_contents($file);


        if ($source === false) {
            $source = '';
        }


        $metadata = $this->resolveMetadata(
            $source
        );


        return new ExampleFile(
            file: $file,
            metadata: $metadata,
            source: $source,
            output: ''
        );
    }
}
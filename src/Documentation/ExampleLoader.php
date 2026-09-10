<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Loads component documentation examples
 * from real PHP example files.
 *
 * Example files are discovered and converted
 * into ExampleFile metadata objects.
 */
class ExampleLoader
{
    protected ExampleRenderer $renderer;

    public function __construct(
        ?ExampleRenderer $renderer = null
    ) {
        $this->renderer = $renderer
            ?? new ExampleRenderer();
    }
    
    /**
     * Loads examples from a directory.
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
            $examples[] = $this->loadFile($file);
        }

        return $examples;
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

        $metadata = $this->resolveMetadata($source);

        return new ExampleFile(
            file: $file,
            metadata: $metadata,
            source: $source,
            output: ''
        );
    }
}
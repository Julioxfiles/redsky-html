<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Discovers HTML component classes from the Components directory.
 *
 * This class is responsible only for discovering component classes
 * and reporting namespace or autoloading problems.
 *
 * It does not inspect metadata or generate documentation.
 *
 * Example:
 *
 * ```php
 * $scanner = new ComponentScanner();
 *
 * $classes = $scanner->scan();
 * ```
 */
class ComponentScanner
{
    /**
     * Base namespace for HTML components.
     */
    protected string $namespace = 'RedSky\\Html\\Components';


    /**
     * Components directory.
     */
    protected string $directory;


    /**
     * Namespace discovery errors.
     *
     * @var array<int, array<string,string>>
     */
    protected array $errors = [];


    /**
     * Creates a component scanner.
     *
     * @param string|null $directory Components directory.
     */
    public function __construct(?string $directory = null)
    {
        $this->directory = $directory
            ?? dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Components';
    }


    /**
     * Discovers all component classes.
     *
     * @return array<int, string>
     */
    public function scan(): array
    {
        $this->errors = [];

        if (!is_dir($this->directory)) {
            return [];
        }


        $classes = [];


        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $this->directory,
                \FilesystemIterator::SKIP_DOTS
            )
        );


        foreach ($iterator as $file) {

            if (!$file->isFile()) {
                continue;
            }


            if ($file->getExtension() !== 'php') {
                continue;
            }


            $path = $file->getPathname();


            if ($this->shouldIgnore($path)) {
                continue;
            }


            $class = $this->resolveClass($path);


            if ($class !== null) {
                $classes[] = $class;
            }
        }


        sort($classes);


        return array_values(
            array_unique($classes)
        );
    }


    /**
     * Returns namespace discovery errors.
     *
     * @return array<int, array<string,string>>
     */
    public function errors(): array
    {
        return $this->errors;
    }


    /**
     * Determines whether namespace errors exist.
     */
    public function hasErrors(): bool
    {
        return $this->errors !== [];
    }


    /**
     * Determines whether a file should be ignored.
     */
    protected function shouldIgnore(
        string $file
    ): bool {

        $relative = substr(
            $file,
            strlen($this->directory) + 1
        );


        if ($relative === false) {
            return true;
        }


        $relative = str_replace(
            ['/', '\\'],
            '/',
            $relative
        );


        if (str_contains(
            $relative,
            '/Examples/'
        )) {
            return true;
        }


        $filename = pathinfo(
            $file,
            PATHINFO_FILENAME
        );


        return preg_match(
            '/^[A-Z][A-Za-z0-9]*$/',
            $filename
        ) !== 1;
    }


    /**
     * Converts a PHP file path into its expected class name
     * and validates that the class exists.
     */
    protected function resolveClass(
        string $file
    ): ?string {

        $relative = substr(
            $file,
            strlen($this->directory) + 1
        );


        if ($relative === false) {
            return null;
        }


        $relative = str_replace(
            ['/', '\\'],
            '\\',
            $relative
        );


        $relative = substr(
            $relative,
            0,
            -4
        );


        if ($relative === '') {
            return null;
        }


        $expectedClass = $this->namespace . '\\' . $relative;


        if (class_exists($expectedClass)) {
            return $expectedClass;
        }


        $this->registerError(
            $file,
            $expectedClass
        );


        return null;
    }


    /**
     * Registers a namespace validation error.
     */
    protected function registerError(
        string $file,
        string $expectedClass
    ): void {

        $this->errors[] = [
            'file' => $file,
            'class' => $expectedClass,
            'message' => $this->resolveErrorMessage(
                $file,
                $expectedClass
            ),
        ];
    }


    /**
     * Generates a detailed validation message.
     */
    protected function resolveErrorMessage(
        string $file,
        string $expectedClass
    ): string {

        $contents = file_get_contents($file);


        if ($contents === false) {
            return 'Unable to read PHP file.';
        }


        if (!preg_match(
            '/namespace\s+([^;]+);/',
            $contents,
            $namespaceMatch
        )) {
            return 'Namespace declaration was not found.';
        }


        $namespace = trim(
            $namespaceMatch[1]
        );


        if (!preg_match(
            '/class\s+([A-Za-z0-9_]+)/',
            $contents,
            $classMatch
        )) {
            return 'Class declaration was not found.';
        }


        $declaredClass = $namespace . '\\' . $classMatch[1];


        return sprintf(
            'Expected class "%s" but file declares "%s". Namespace or filename may not match.',
            $expectedClass,
            $declaredClass
        );
    }
}
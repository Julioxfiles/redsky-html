<?php
declare(strict_types=1);

namespace RedSky\Html\Documentation;


/**
 * Discovers HTML component classes from the Components directory.
 *
 * This class is responsible only for discovering component classes.
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


            $class = $this->resolveClass(
                $file->getPathname()
            );


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
     * Converts a PHP file path into its component class name.
     *
     * Example:
     *
     * Components/Form/TextInput.php
     *
     * becomes:
     *
     * RedSky\Html\Components\Form\TextInput
     */
    protected function resolveClass(string $file): ?string
    {
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


        if (!str_ends_with($relative, '.php')) {
            return null;
        }


        $relative = substr(
            $relative,
            0,
            -4
        );


        if ($relative === '') {
            return null;
        }


        return $this->namespace . '\\' . $relative;
    }
}


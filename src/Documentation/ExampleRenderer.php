<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation;

/**
 * Executes component documentation examples
 * and captures their rendered output.
 *
 * Example files are real PHP files that can create
 * and render RedSky HTML components.
 */
class ExampleRenderer
{
    /**
     * Renders a PHP example file.
     *
     * The example output is captured using output buffering.
     *
     * @param string $file Absolute path to the example file.
     *
     * @return string Rendered output.
     *
     * @throws \RuntimeException When the example file does not exist.
     */
    public function render(
        string $file
    ): string {
        if (!is_file($file)) {
            throw new \RuntimeException(
                sprintf(
                    'Example file not found: %s',
                    $file
                )
            );
        }

        ob_start();

        try {
            include $file;

            return (string) ob_get_clean();

        } catch (\Throwable $exception) {

            ob_end_clean();

            throw $exception;
        }
    }


    /**
     * Renders a PHP example file and formats
     * the resulting HTML output.
     */
    public function renderFormatted(
        string $file
    ): string {
        return (new HtmlFormatter())
            ->format(
                $this->render($file)
            );
    }
}
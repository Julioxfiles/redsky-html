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
     * @throws \RuntimeException When the example execution fails.
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

            throw new \RuntimeException(
                $this->formatException(
                    $file,
                    $exception
                ),
                0,
                $exception
            );
        }
    }

    /**
     * Formats example execution errors.
     */
    protected function formatException(
        string $file,
        \Throwable $exception
    ): string {

        $message = sprintf(
            "Documentation example error\n\nFile:\n%s\n\nLine:\n%s\n\nType:\n%s\n\nError:\n%s",
            $file,
            $exception->getLine(),
            $exception::class,
            $exception->getMessage()
        );


        if (
            $exception instanceof \Error &&
            str_contains(
                $exception->getMessage(),
                'Class "'
            )
        ) {

            $message .= "\n\nPossible causes:\n";

            $message .= "- Incorrect namespace.\n";
            $message .= "- Invalid use statement.\n";
            $message .= "- Component was renamed or moved.\n";
            $message .= "- Example was not updated after a component change.\n";
        }


        return $message;
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


    /**
     * Creates a readable error message while
     * preserving the original PHP exception.
     */
    protected function formatError(
        string $file,
        \Throwable $exception
    ): string {

        $message = [];

        $message[] = 'Documentation example error';
        $message[] = '';
        $message[] = 'File:';
        $message[] = $file;
        $message[] = '';
        $message[] = 'Line:';
        $message[] = (string) $exception->getLine();
        $message[] = '';
        $message[] = 'Error:';
        $message[] = $exception->getMessage();
        $message[] = '';
        $message[] = 'Possible causes:';
        $message[] = '- Incorrect namespace.';
        $message[] = '- Invalid use statement.';
        $message[] = '- Component was renamed or moved.';
        $message[] = '- Example was not updated after a component change.';
        $message[] = '';
        $message[] = 'Original exception:';
        $message[] = get_class($exception);


        return implode(
            PHP_EOL,
            $message
        );
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML progress element.
 *
 * The progress element represents the completion
 * progress of a task.
 *
 * @package RedSky\Html\Elements
 */
class ProgressElement extends HtmlElement
{
    /**
     * Creates a new progress element.
     */
    public function __construct()
    {
        parent::__construct('progress');
    }


    /**
     * Sets current progress value.
     *
     * @param float $value
     *
     * @return static
     */
    public function value(
        float $value
    ): static {
        $this->setAttribute(
            'value',
            $value
        );

        return $this;
    }


    /**
     * Sets maximum progress value.
     *
     * @param float $max
     *
     * @return static
     */
    public function max(
        float $max
    ): static {
        $this->setAttribute(
            'max',
            $max
        );

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML meter element.
 *
 * The meter element represents a scalar measurement
 * within a known range.
 *
 * Common uses:
 *
 * - Disk usage.
 * - Scores.
 * - Ratings.
 * - Resource levels.
 *
 * @package RedSky\Html\Elements
 */
class MeterElement extends HtmlElement
{
    /**
     * Creates a new meter element.
     */
    public function __construct()
    {
        parent::__construct('meter');
    }


    /**
     * Sets current value.
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
     * Sets minimum value.
     *
     * @param float $min
     *
     * @return static
     */
    public function min(
        float $min
    ): static {
        $this->setAttribute(
            'min',
            $min
        );

        return $this;
    }


    /**
     * Sets maximum value.
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


    /**
     * Sets low threshold.
     *
     * @param float $low
     *
     * @return static
     */
    public function low(
        float $low
    ): static {
        $this->setAttribute(
            'low',
            $low
        );

        return $this;
    }


    /**
     * Sets high threshold.
     *
     * @param float $high
     *
     * @return static
     */
    public function high(
        float $high
    ): static {
        $this->setAttribute(
            'high',
            $high
        );

        return $this;
    }


    /**
     * Sets optimum value.
     *
     * @param float $optimum
     *
     * @return static
     */
    public function optimum(
        float $optimum
    ): static {
        $this->setAttribute(
            'optimum',
            $optimum
        );

        return $this;
    }
}
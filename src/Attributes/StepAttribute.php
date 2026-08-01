<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML step attribute.
 *
 * Used by numeric form controls to define the increment interval
 * between valid values.
 *
 * Examples:
 *
 * - step="1"
 * - step="0.01"
 * - step="5"
 */
class StepAttribute extends Attribute
{
    /**
     * Creates a new step attribute instance.
     *
     * @param int|float|string|null $value The step value.
     */
    public function __construct(int|float|string|null $value = null)
    {
        parent::__construct('step', $value);
    }

    /**
     * Returns the step value.
     *
     * @return int|float|string|null
     */
    public function getStep(): int|float|string|null
    {
        return $this->getValue();
    }

    /**
     * Sets the step value.
     *
     * @param int|float|string|null $value The step value.
     *
     * @return static
     */
    public function setStep(int|float|string|null $value): static
    {
        $this->setValue($value);

        return $this;
    }
}
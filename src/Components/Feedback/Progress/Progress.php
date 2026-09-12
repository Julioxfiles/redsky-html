<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Progress;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;


/**
 * Represents a progress indicator.
 *
 * Progress is used to communicate the completion status of an operation
 * when its progress can be measured.
 *
 * The progress value represents the current amount completed, while the
 * maximum value represents the total amount required for completion.
 *
 * The component is UI-library agnostic. Bootstrap, Materialize, or another
 * UI library can be integrated through CSS classes and styles.
 *
 * JavaScript can be used to update the progress dynamically during
 * asynchronous operations such as file uploads or API requests.
 */
final class Progress extends HtmlComponent
{
    protected string $tag = 'div';

    protected int|float $value = 0;

    protected int|float $max = 100;

    protected string $label = 'Progress';

    /**
     * Create a Progress component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }

    /**
     * Set the current progress value.
     *
     * The value must be greater than or equal to zero and must not
     * exceed the maximum value.
     */
    public function value(int|float $value): static
    {
        if ($value < 0) {
            throw new InvalidArgumentException(
                'Progress value cannot be less than 0.'
            );
        }

        if ($value > $this->max) {
            throw new InvalidArgumentException(
                sprintf(
                    'Progress value cannot be greater than the maximum value of %s.',
                    $this->max
                )
            );
        }

        $this->value = $value;

        return $this;
    }

    /**
     * Get the current progress value.
     */
    public function getValue(): int|float
    {
        return $this->value;
    }

    /**
     * Set the maximum progress value.
     *
     * The maximum value must be greater than zero.
     */
    public function max(int|float $max): static
    {
        if ($max <= 0) {
            throw new InvalidArgumentException(
                'Progress maximum must be greater than 0.'
            );
        }

        if ($this->value > $max) {
            throw new InvalidArgumentException(
                sprintf(
                    'Progress maximum cannot be less than the current value of %s.',
                    $this->value
                )
            );
        }

        $this->max = $max;

        return $this;
    }

    /**
     * Get the maximum progress value.
     */
    public function getMax(): int|float
    {
        return $this->max;
    }

    /**
     * Set the accessible progress label.
     */
    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the accessible progress label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Render the progress component.
     */
    public function render(): string
    {
        $this->attribute('data-redsky-component', 'progress');
        $this->attribute('data-progress-value', (string) $this->value);
        $this->attribute('data-progress-max', (string) $this->max);
        $this->attribute('role', 'progressbar');
        $this->attribute('aria-valuenow', (string) $this->value);
        $this->attribute('aria-valuemin', '0');
        $this->attribute('aria-valuemax', (string) $this->max);
        $this->attribute('aria-label', $this->label);

        $percentage = ($this->value / $this->max) * 100;

        $percentage = min(100, max(0, $percentage));

        $attributes = $this->renderAttributes();

        return sprintf(
            '<%s%s><div data-progress-indicator style="width: %s%%;"></div></%s>',
            $this->tag,
            $attributes,
            $percentage,
            $this->tag
        );
    }
}
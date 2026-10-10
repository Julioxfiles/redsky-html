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
    protected string $type = 'primary';

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
     * Set the semantic progress type.
     */
    public function type(string $type): static
    {
        $allowedTypes = [
            'primary',
            'success',
            'warning',
            'danger',
            'info',
            'light',
            'dark'
        ];

        if (!in_array($type, $allowedTypes, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid progress type "%s". Allowed types are: %s.',
                    $type,
                    implode(', ', $allowedTypes)
                )
            );
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get the semantic progress type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Render the progress component.
     */
    public function render(): string
    {
        $this->addAttribute('data-redsky-component', 'progress');
        $this->addAttribute('data-progress-value', (string) $this->value);
        $this->addAttribute('data-progress-max', (string) $this->max);
        $this->addAttribute('role', 'progressbar');
        $this->addAttribute('aria-valuenow', (string) $this->value);
        $this->addAttribute('aria-valuemin', '0');
        $this->addAttribute('aria-valuemax', (string) $this->max);
        $this->addAttribute('data-progress-type', $this->type);
        $this->addAttribute('aria-label', $this->label);

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
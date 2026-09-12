<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Spinner;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents a circular loading indicator.
 *
 * Spinner is used to indicate that an operation is currently
 * in progress and that its completion time is unknown.
 *
 * The spinner is UI-library agnostic. The visual appearance can
 * be integrated with Bootstrap, Materialize, or another UI library
 * through CSS classes and styles.
 *
 * CSS provides the rotating animation. JavaScript is only required
 * when the application needs to show or hide the spinner dynamically.
 */ 
class Spinner extends HtmlComponent
{
    protected string $tag = 'span';

    /**
     * Supported visual types:
     *
     * - info
     * - primary
     * - success
     * - warning
     * - danger
     */
    protected string $type = 'primary';

    /**
     * Supported sizes:
     *
     * - small
     * - medium
     * - large
     */
    protected string $size = 'medium';

    protected string $label = 'Loading...';

    /**
     * Create a Spinner component.
     */
    public function __construct()
    {
        parent::__construct('span');
    }

    /**
     * Set the spinner type.
     *
     * Supported values:
     * info, primary, success, warning, danger.
     */
    public function type(string $type): static
    {
        $allowed = [
            'info',
            'primary',
            'success',
            'warning',
            'danger',
        ];

        if (!in_array($type, $allowed, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid spinner type "%s". Allowed values: %s.',
                    $type,
                    implode(', ', $allowed)
                )
            );
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get the spinner type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the spinner size.
     *
     * Supported values:
     * small, medium, large.
     */
    public function size(string $size): static
    {
        $allowed = [
            'small',
            'medium',
            'large',
        ];

        if (!in_array($size, $allowed, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid spinner size "%s". Allowed values: %s.',
                    $size,
                    implode(', ', $allowed)
                )
            );
        }

        $this->size = $size;

        return $this;
    }

    /**
     * Get the spinner size.
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Set the accessible loading label.
     *
     * The label is exposed through aria-label and is not rendered
     * as visible text.
     */
    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the accessible loading label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Render the spinner.
     *
     * The circular animation itself is handled by Spinner.css.
     * JavaScript is not required for the spinner to rotate.
     */
    public function render(): string
    {
        $this->attribute('data-redsky-component', 'spinner');
        $this->attribute('data-spinner-type', $this->type);
        $this->attribute('data-spinner-size', $this->size);
        $this->attribute('role', 'status');
        $this->attribute('aria-label', $this->label);

        $attributes = $this->renderAttributes();

        return sprintf(
            '<%s%s><span data-spinner-indicator aria-hidden="true"></span></%s>',
            $this->tag,
            $attributes,
            $this->tag
        );
    }

}
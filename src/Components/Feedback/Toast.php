<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents a high-level toast notification component.
 *
 * Toast provides temporary feedback to the user.
 *
 * Supported toast types:
 *
 * - info
 * - success
 * - warning
 * - danger
 *
 * The toast can automatically disappear after a configurable duration
 * or be dismissed manually using the close button.
 *
 * A duration of 0 disables automatic dismissal.
 *
 * @package RedSky\Html\Components\Feedback
 */
   #[Example(
        title: 'Bootstrap — Success Toast',
        code: <<<'PHP'
$toast = new Toast();

$toast
    ->type('success')
    ->title('Success')
    ->message('Customer saved successfully.')
    ->duration(3000)
    ->class('toast show')
    ->attribute('role', 'alert')
    ->attribute('aria-live', 'assertive')
    ->attribute('aria-atomic', 'true')
    ->style('position', 'fixed')
    ->style('top', '1rem')
    ->style('right', '1rem')
    ->style('z-index', '1080');

echo $toast;
PHP,
        description: 'Creates a Bootstrap success toast. The type() method accepts info, success, warning, or danger. The duration() method specifies the automatic dismissal time in milliseconds; use 0 to disable automatic dismissal. The dismissible() method controls the close button.',
        language: 'php',
        primary: true,
        output: '<div data-redsky-component="toast" data-toast-type="success" data-toast-duration="3000" data-toast-dismissible="true" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 1rem; right: 1rem; z-index: 1080;"><div data-toast-title="Success">Success</div><div data-toast-message>Customer saved successfully.</div><button type="button" data-toast-dismiss aria-label="Close" style="position: absolute; top: 0.5rem; right: 0.5rem;">×</button></div>'
    )]
    #[Example(
        title: 'Materialize — Error Toast',
        code: <<<'PHP'
$toast = new Toast();

$toast
    ->type('danger')
    ->title('Error')
    ->message('Unable to delete the customer.')
    ->duration(5000)
    ->class('card-panel red lighten-4')
    ->attribute('role', 'alert')
    ->attribute('aria-live', 'assertive')
    ->attribute('aria-atomic', 'true')
    ->style('position', 'fixed')
    ->style('top', '1rem')
    ->style('right', '1rem')
    ->style('z-index', '9999');

echo $toast;
PHP,
        description: 'Creates a Materialize error toast. The type() method accepts info, success, warning, or danger. The duration() method specifies the automatic dismissal time in milliseconds; use 0 to keep the toast visible until manually closed. The dismissible() method controls the close button.',
        language: 'php',
        primary: false,
        output: '<div data-redsky-component="toast" data-toast-type="danger" data-toast-duration="5000" data-toast-dismissible="true" class="card-panel red lighten-4" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"><div data-toast-title="Error">Error</div><div data-toast-message>Unable to delete the customer.</div><button type="button" data-toast-dismiss aria-label="Close" style="position: absolute; top: 0.5rem; right: 0.5rem;">×</button></div>'
 )]
class Toast extends HtmlComponent
{
    protected string $tag = 'div';

    protected string $type = 'info';

    protected ?string $title = null;

    protected string $message = '';

    protected int $duration = 3000;

    protected bool $dismissible = true;

    public function __construct()
    {
        parent::__construct('div');
    }

    /**
     * Set the toast type.
     *
     * Available values:
     *
     * - info
     * - success
     * - warning
     * - danger
     *
     * @param string $type
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     */
    public function type(string $type): static
    {
        $allowed = [
            'info',
            'success',
            'warning',
            'danger',
        ];

        if (!in_array($type, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid toast type "%s". Allowed types: %s.',
                    $type,
                    implode(', ', $allowed)
                )
            );
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get the toast type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the toast title.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the toast title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the toast message.
     *
     * @param string $message
     *
     * @return static
     */
    public function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the toast message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the automatic dismissal duration in milliseconds.
     *
     * Use 0 to disable automatic dismissal.
     *
     * Examples:
     *
     * - 3000 = 3 seconds
     * - 5000 = 5 seconds
     * - 0 = no automatic dismissal
     *
     * @param int $duration
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     */
    public function duration(int $duration): static
    {
        if ($duration < 0) {
            throw new \InvalidArgumentException(
                'Toast duration cannot be negative.'
            );
        }

        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the automatic dismissal duration.
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Enable or disable the close button.
     *
     * @param bool $dismissible
     *
     * @return static
     */
    public function dismissible(bool $dismissible = true): static
    {
        $this->dismissible = $dismissible;

        return $this;
    }

    /**
     * Determine whether the toast has a close button.
     *
     * @return bool
     */
    public function isDismissible(): bool
    {
        return $this->dismissible;
    }

    /**
     * Render the toast as HTML.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= sprintf(
            ' data-redsky-component="toast" data-toast-type="%s"',
            htmlspecialchars(
                $this->type,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );

        $attributes .= sprintf(
            ' data-toast-duration="%d"',
            $this->duration
        );

        if ($this->dismissible) {
            $attributes .= ' data-toast-dismissible="true"';
        }

        $html = '';

        if ($this->title !== null) {
            $html .= sprintf(
                '<div data-toast-title>%s</div>',
                htmlspecialchars(
                    $this->title,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        $html .= sprintf(
            '<div data-toast-message>%s</div>',
            htmlspecialchars(
                $this->message,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );

        if ($this->dismissible) {
            $html .= <<<'HTML'
<button
    type="button"
    data-toast-dismiss
    aria-label="Close"
    style="position: absolute; top: 0.5rem; right: 0.5rem;"
>×</button>
HTML;
        }

        return sprintf(
            '<%s%s>%s</%s>',
            $this->tag,
            $attributes,
            $html,
            $this->tag
        );
    }

}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Toast;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a toast notification component.
 *
 * Toast provides temporary feedback to the user.
 *
 * The component is UI-library-agnostic. Styling is handled by CSS,
 * while JavaScript manages automatic dismissal and manual closing.
 *
 * Supported toast types:
 *
 * - info
 * - success
 * - warning
 * - danger
 *
 * A duration of 0 disables automatic dismissal.
 *
 * @package RedSky\Html\Components\Feedback\Toast
 */
class Toast extends HtmlComponent
{
    /**
     * Toast HTML tag.
     *
     * @var string
     */
    protected string $tag = 'div';

    /**
     * Toast type.
     *
     * @var string
     */
    protected string $type = 'info';

    /**
     * Optional toast title.
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Toast message.
     *
     * @var string
     */
    protected string $message = '';

    /**
     * Automatic dismissal duration in milliseconds.
     *
     * @var int
     */
    protected int $duration = 3000;

    /**
     * Determines whether the toast can be dismissed manually.
     *
     * @var bool
     */
    protected bool $dismissible = true;

    /**
     * Creates a new Toast component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }

    /**
     * Sets the toast type.
     *
     * Supported types are:
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
     * @throws \InvalidArgumentException When the toast type is invalid.
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
     * Returns the current toast type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets the toast title.
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
     * Returns the current toast title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets the toast message.
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
     * Returns the current toast message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Sets the automatic dismissal duration in milliseconds.
     *
     * Use 0 to disable automatic dismissal.
     *
     * @param int $duration
     *
     * @return static
     *
     * @throws \InvalidArgumentException When the duration is negative.
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
     * Returns the automatic dismissal duration.
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Enables or disables the close button.
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
     * Determines whether the toast can be dismissed manually.
     *
     * @return bool
     */
    public function isDismissible(): bool
    {
        return $this->dismissible;
    }

    /**
     * Renders the toast as HTML.
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

        $attributes .= sprintf(
            ' role="%s" aria-live="%s"',
            $this->type === 'danger' ? 'alert' : 'status',
            $this->type === 'danger' ? 'assertive' : 'polite'
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
                aria-label="Close notification"
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
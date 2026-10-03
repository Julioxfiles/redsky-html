<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Alert;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents a high-level alert component.
 *
 * Alert provides a semantic container for displaying informational,
 * success, warning, or error messages to the user.
 *
 * The component is UI-library-agnostic. CSS classes, inline styles,
 * and additional HTML attributes can be supplied through the inherited
 * Component API.
 *
 * Supported alert types:
 *
 * - info
 * - success
 * - warning
 * - danger
 *
 * @package RedSky\Html\Components\Feedback
 */
class Alert extends HtmlComponent
{
    /**
     * Alert HTML tag.
     *
     * @var string
     */
    protected string $tag = 'div';


    /**
     * Alert type.
     *
     * @var string
     */
    protected string $type = 'info';


    /**
     * Optional alert title.
     *
     * @var string|null
     */
    protected ?string $title = null;


    /**
     * Alert message.
     *
     * @var string
     */
    protected string $message = '';


    /**
     * Indicates whether the alert is dismissible.
     *
     * @var bool
     */
    protected bool $dismissible = false;


    /**
     * Creates a new Alert component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }


    /**
     * Sets the alert type.
     *
     * Supported types are:
     *
     * - info
     * - success
     * - warning
     * - danger
     *
     * @param string $type Alert type.
     *
     * @return static
     *
     * @throws \InvalidArgumentException When the alert type is invalid.
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
                    'Invalid alert type "%s". Allowed types: %s.',
                    $type,
                    implode(', ', $allowed)
                )
            );
        }

        $this->type = $type;

        return $this;
    }


    /**
     * Returns the current alert type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * Sets the alert title.
     *
     * @param string $title Alert title.
     *
     * @return static
     */
    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Returns the current alert title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }


    /**
     * Sets the alert message.
     *
     * @param string $message Alert message.
     *
     * @return static
     */
    public function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }


    /**
     * Returns the current alert message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


    /**
     * Enables or disables the dismissible behavior.
     *
     * When enabled, the component renders a dismiss button with
     * the data-alert-dismiss attribute. JavaScript can later use
     * this attribute to implement the actual dismiss behavior.
     *
     * @param bool $dismissible Whether the alert can be dismissed.
     *
     * @return static
     */
    public function dismissible(bool $dismissible = true): static
    {
        $this->dismissible = $dismissible;

        return $this;
    }


    /**
     * Determines whether the alert is dismissible.
     *
     * @return bool
     */
    public function isDismissible(): bool
    {
        return $this->dismissible;
    }


    /**
     * Renders the alert component.
     *
     * The component emits semantic RedSky data attributes describing
     * the alert state. Styling is intentionally delegated to the
     * consuming UI library.
     *
     * When the alert is dismissible, a close button is rendered.
     * The button itself does not contain JavaScript behavior.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= sprintf(
            ' data-redsky-component="alert" data-alert-type="%s"',
            htmlspecialchars(
                $this->type,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );

        if ($this->dismissible) {
            $attributes .= ' data-alert-dismissible="true"';
        }

        $html = '';

        if ($this->title !== null) {
            $html .= sprintf(
                '<div data-alert-title>%s</div>',
                htmlspecialchars(
                    $this->title,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        $html .= sprintf(
            '<div data-alert-message>%s</div>',
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
    data-alert-dismiss
    aria-label="Close"
>
    <span aria-hidden="true">&times;</span>
</button>
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
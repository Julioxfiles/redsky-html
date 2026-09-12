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
#[Example(
    title: 'Bootstrap — Dismissible Success Alert',
    code: <<<'PHP'
$alert = new Alert();

$alert
    ->type('success')
    ->title('Success')
    ->message('The customer was created successfully.')
    ->dismissible()
    ->class('alert alert-success alert-dismissible fade show')
    ->style('margin-bottom', '1rem')
    ->attribute('role', 'alert');

echo $alert;
PHP,
    description: 'Creates a dismissible Bootstrap success alert using the Alert component and the inherited Component API for CSS classes, styles, and HTML attributes.',
    language: 'php',
    primary: true,
    output: '<div data-redsky-component="alert" data-alert-type="success" data-alert-dismissible="true" class="alert alert-success alert-dismissible fade show" style="margin-bottom: 1rem;" role="alert"><div data-alert-title>Success</div><div data-alert-message>The customer was created successfully.</div><button type="button" class="btn-close" data-alert-dismiss aria-label="Close"></button></div>'
)]
#[Example(
    title: 'Materialize — Dismissible Success Alert',
    code: <<<'PHP'
$alert = new Alert();

$alert
    ->type('success')
    ->title('Success')
    ->message('The customer was created successfully.')
    ->dismissible()
    ->class('card-panel green lighten-4')
    ->style('margin-bottom', '1rem')
    ->style('position', 'relative')
    ->attribute('role', 'alert');

echo $alert;
PHP,
    description: 'Creates a dismissible Materialize success alert using the Alert component and the inherited Component API for CSS classes, styles, and HTML attributes.',
    language: 'php',
    primary: false,
    output: '<div data-redsky-component="alert" data-alert-type="success" data-alert-dismissible="true" class="card-panel green lighten-4" style="margin-bottom: 1rem; position: relative;" role="alert"><div data-alert-title>Success</div><div data-alert-message>The customer was created successfully.</div><button type="button" data-alert-dismiss aria-label="Close" style="position: absolute; top: 0.5rem; right: 0.5rem;">×</button></div>'
)]
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
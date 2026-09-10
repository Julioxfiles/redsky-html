<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents a small badge component.
 *
 * Badge provides a compact semantic label for displaying statuses,
 * categories, counters, or other short pieces of information.
 *
 * The component is UI-library-agnostic. CSS classes, inline styles,
 * and additional HTML attributes can be supplied through the inherited
 * Component API.
 *
 * Supported badge types:
 *
 * - info
 * - success
 * - warning
 * - danger
 * - secondary
 *
 * @package RedSky\Html\Components\Feedback
 */
#[Example(
    title: 'Bootstrap — Success Badge',
    code: <<<'PHP'
$badge = new Badge('Active');

$badge
    ->type('success')
    ->class('badge bg-success')
    ->attribute('aria-label', 'Status: Active');

echo $badge;
PHP,
    description: 'Creates a Bootstrap success badge using the Badge component and the inherited Component API.',
    language: 'php',
    primary: true,
    output: '<span data-redsky-component="badge" data-badge-type="success" class="badge bg-success" aria-label="Status: Active">Active</span>'
)]
#[Example(
    title: 'Materialize — Success Badge',
    code: <<<'PHP'
$badge = new Badge('Active');

$badge
    ->type('success')
    ->class('new badge green')
    ->attribute('data-badge-caption', 'Status');

echo $badge;
PHP,
    description: 'Creates a Materialize success badge using the Badge component and the inherited Component API.',
    language: 'php',
    primary: false,
    output: '<span data-redsky-component="badge" data-badge-type="success" class="new badge green" data-badge-caption="Status">Active</span>'
)]
class Badge extends HtmlComponent
{
    /**
     * Badge HTML tag.
     *
     * @var string
     */
    protected string $tag = 'span';


    /**
     * Badge type.
     *
     * @var string
     */
    protected string $type = 'secondary';


    /**
     * Badge text.
     *
     * @var string
     */
    protected string $text = '';


    /**
     * Creates a new Badge component.
     *
     * @param string $text Badge text.
     */
    public function __construct(string $text = '')
    {
        parent::__construct('span');

        $this->text = $text;
    }


    /**
     * Sets the badge type.
     *
     * Supported types are:
     *
     * - info
     * - success
     * - warning
     * - danger
     * - secondary
     *
     * @param string $type Badge type.
     *
     * @return static
     *
     * @throws \InvalidArgumentException When the badge type is invalid.
     */
    public function type(string $type): static
    {
        $allowed = [
            'info',
            'success',
            'warning',
            'danger',
            'secondary',
        ];

        if (!in_array($type, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid badge type "%s". Allowed types: %s.',
                    $type,
                    implode(', ', $allowed)
                )
            );
        }

        $this->type = $type;

        return $this;
    }


    /**
     * Returns the current badge type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * Sets the badge text.
     *
     * @param string $text Badge text.
     *
     * @return static
     */
    public function text(string $text): static
    {
        $this->text = $text;

        return $this;
    }


    /**
     * Returns the current badge text.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }


    /**
     * Renders the badge component.
     *
     * The component emits semantic RedSky data attributes describing
     * the badge state. Styling is intentionally delegated to the
     * consuming UI library.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= sprintf(
            ' data-redsky-component="badge" data-badge-type="%s"',
            htmlspecialchars(
                $this->type,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );

        return sprintf(
            '<%s%s>%s</%s>',
            $this->tag,
            $attributes,
            htmlspecialchars(
                $this->text,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            ),
            $this->tag
        );
    }
}


<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Collapse;

use RedSky\Html\Components\HtmlComponent;

/**
 * Collapse component.
 *
 * Provides a collapsible content section that can be
 * expanded or collapsed through a trigger button.
 *
 * A Collapse component manages:
 *
 * - A visible trigger.
 * - A collapsible content panel.
 * - The expanded or collapsed state.
 * - Accessibility attributes that associate the trigger
 *   with its content panel.
 *
 * The content may be a string or another HtmlComponent.
 *
 * Styling and interaction behavior are handled by the UI layer.
 *
 * @package RedSky\Html\Components\Interactive\Collapse
 */
class Collapse extends HtmlComponent
{
    protected string $title;
    protected bool $active = false;
    protected string|HtmlComponent $collapseContent;

    protected ?string $buttonId = null;
    protected ?string $panelId = null;

    public function __construct(
        string $title,
        string|HtmlComponent $content
    ) {
        parent::__construct('div');

        $this->title = $title;
        $this->collapseContent = $content;
    }

    /**
     * Sets the expanded state.
     *
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = true): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Returns whether the collapse is expanded.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Sets the identifiers used by the trigger and panel.
     *
     * @param string $buttonId
     * @param string $panelId
     *
     * @return static
     */
    public function identifier(
        string $buttonId,
        string $panelId
    ): static {
        $this->buttonId = $buttonId;
        $this->panelId = $panelId;

        return $this;
    }

    public function render(): string
    {
        $buttonId = $this->buttonId ?? 'collapse-button';
        $panelId = $this->panelId ?? 'collapse-panel';

        $this->attribute(
            'class',
            'collapse'
        );

        $this->attribute(
            'data-component',
            'collapse'
        );

        $buttonClass = $this->active
            ? 'collapse-button'
            : 'collapse-button collapsed';

        $panelClass = $this->active
            ? 'collapse-content'
            : 'collapse-content collapsed';

        $content = $this->collapseContent instanceof HtmlComponent
            ? $this->collapseContent->render()
            : $this->collapseContent;

        return sprintf(
            '<div%s>' .
            '<button id="%s" class="%s" type="button"' .
            ' aria-expanded="%s"' .
            ' aria-controls="%s"' .
            ' data-collapse-toggle>' .
            '%s' .
            '</button>' .
            '<div id="%s" class="%s"' .
            ' role="region"' .
            ' aria-labelledby="%s"' .
            ' aria-hidden="%s"' .
            ' data-collapse-content>' .
            '<div class="collapse-body">%s</div>' .
            '</div>' .
            '</div>',
            $this->renderAttributes(),
            $buttonId,
            $buttonClass,
            $this->active ? 'true' : 'false',
            $panelId,
            $this->title,
            $panelId,
            $panelClass,
            $buttonId,
            $this->active ? 'false' : 'true',
            $content
        );
    }
}

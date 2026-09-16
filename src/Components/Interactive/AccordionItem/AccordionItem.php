<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Accordion;

use RedSky\Html\Components\HtmlComponent;

/**
 * AccordionItem component.
 *
 * Represents a single expandable item inside
 * an Accordion component.
 *
 * An AccordionItem contains:
 *
 * - A visible title.
 * - An expandable content panel.
 * - An active state.
 *
 * The content may be a string or another
 * HtmlComponent.
 *
 * Styling and interaction behavior are handled
 * by the UI layer.
 *
 * @package RedSky\Html\Components\Interactive\Accordion
 */
class AccordionItem extends HtmlComponent
{
    /**
     * Item title.
     *
     * @var string
     */
    protected string $title;


    /**
     * Item active state.
     *
     * @var bool
     */
    protected bool $active = false;


    /**
     * Button identifier.
     *
     * @var string|null
     */
    protected ?string $buttonId = null;


    /**
     * Panel identifier.
     *
     * @var string|null
     */
    protected ?string $panelId = null;


    /**
     * Creates a new AccordionItem component.
     *
     * @param string $title
     * @param string|HtmlComponent $content
     */
    public function __construct(
        string $title,
        string|HtmlComponent $content
    ) {
        parent::__construct('div');

        $this->title = $title;

        if ($content instanceof HtmlComponent) {

            $this->addChild(
                $content
            );

        } else {

            $this->content(
                $content
            );
        }
    }


    /**
     * Sets the identifiers used by the accordion controls.
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


    /**
     * Sets the active state.
     *
     * @param bool $active
     *
     * @return static
     */
    public function active(
        bool $active = true
    ): static {

        $this->active = $active;

        return $this;
    }


    /**
     * Returns the current active state.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }


    /**
     * Renders the AccordionItem HTML output.
     *
     * Generates the item header, toggle button,
     * and expandable content panel.
     *
     * @return string
     */
    public function render(): string
    {
        $this->attribute(
            'class',
            'accordion-item'
        );

        $buttonClass = $this->active
            ? 'accordion-button'
            : 'accordion-button collapsed';

        $buttonAttributes = sprintf(
            ' id="%s" class="%s" type="button"',
            $this->buttonId,
            $buttonClass
        );

        $buttonAttributes .= sprintf(
            ' aria-expanded="%s"',
            $this->active
                ? 'true'
                : 'false'
        );

        if ($this->panelId !== null) {

            $buttonAttributes .= sprintf(
                ' aria-controls="%s"',
                $this->panelId
            );
        }

        $buttonAttributes .= ' data-accordion-toggle';

        $contentAttributes = sprintf(
            ' id="%s" class="accordion-collapse%s"',
            $this->panelId,
            $this->active
                ? ''
                : ' collapsed'
        );

        $contentAttributes .= ' role="region"';

        if ($this->buttonId !== null) {

            $contentAttributes .= sprintf(
                ' aria-labelledby="%s"',
                $this->buttonId
            );
        }

        $contentAttributes .= ' data-accordion-content';

        $contentAttributes .= sprintf(
            ' aria-hidden="%s"',
            $this->active
                ? 'false'
                : 'true'
        );

        $content = $this->renderContent();

        if ($content === '') {

            $content = $this->renderChildren();
        }

        return sprintf(
            '<div%s>' .
            '<h2 class="accordion-header">' .
            '<button%s>%s</button>' .
            '</h2>' .
            '<div%s>' .
            '<div class="accordion-body">%s</div>' .
            '</div>' .
            '</div>',
            $this->renderAttributes(),
            $buttonAttributes,
            $this->title,
            $contentAttributes,
            $content
        );
    }
}
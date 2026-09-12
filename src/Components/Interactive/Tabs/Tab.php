<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Tabs;

use RedSky\Html\Components\HtmlComponent;

/**
 * Tab component.
 *
 * Represents a single selectable tab inside
 * a Tabs component.
 *
 * A Tab contains:
 *
 * A visible title.
 * A target panel identifier.
 * An active state.
 *
 * The component only generates the tab button.
 * The related content is handled by TabPanel.
 *
 * Example:
 *
 * $tab = new Tab('Profile');
 *
 * @package RedSky\Html\Components\Interactive\Tabs
 */
class Tab extends HtmlComponent
{
    /**
     * Tab title.
     *
     * @var string
     */
    protected string $title;


    /**
     * Target panel identifier.
     *
     * @var string|null
     */
    protected ?string $target = null;


    /**
     * Active state.
     *
     * @var bool
     */
    protected bool $active = false;


    /**
     * Creates a new Tab component.
     *
     * @param string $title
     */
    public function __construct(
        string $title
    ) {
        parent::__construct('button');

        $this->title = $title;
    }


    /**
     * Defines the target panel.
     *
     * Example:
     *
     * ->target('usepanel')
     *
     * @param string $id
     *
     * @return static
     */
    public function target(
        string $id
    ): static {

        $this->target = $id;

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
     * Renders the Tab HTML output.
     *
     * @return string
     */
    public function render(): string
    {
        $this->attribute(
            'type',
            'button'
        );


        $this->attribute(
            'class',
            $this->active
                ? 'tab active'
                : 'tab'
        );


        if ($this->target !== null) {

            $this->attribute(
                'data-tab-target',
                $this->target
            );

        }


        $this->attribute(
            'role',
            'tab'
        );


        $this->attribute(
            'aria-selected',
            $this->active
                ? 'true'
                : 'false'
        );


        return sprintf(
            '<%s%s>%s</%s>',
            $this->tag(),
            $this->renderAttributes(),
            $this->title,
            $this->tag()
        );
    }
}
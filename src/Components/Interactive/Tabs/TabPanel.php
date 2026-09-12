<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Tabs;

use RedSky\Html\Components\HtmlComponent;

/**
 * TabPanel component.
 *
 * Represents the content container associated
 * with a Tab component.
 *
 * A TabPanel contains:
 *
 * - A unique identifier.
 * - Tab panel content.
 * - Active visibility state.
 *
 * The component does not provide styling
 * or interaction behavior.
 *
 * Those responsibilities belong to the UI layer.
 *
 * @package RedSky\Html\Components\Interactive\Tabs
 */
class TabPanel extends HtmlComponent
{
    /**
     * Panel identifier.
     *
     * @var string
     */
    protected string $id;


    /**
     * Panel active state.
     *
     * @var bool
     */
    protected bool $active = false;



    /**
     * Creates a new TabPanel component.
     *
     * @param string $id
     * @param string|HtmlComponent $content
     * @param bool $active
     */
    public function __construct(
        string $id,
        string|HtmlComponent $content,
        bool $active = false
    ) {
        parent::__construct('div');

        $this->id = $id;

        $this->active = $active;


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
     * Sets the active state.
     *
     * Example:
     *
     * ->active()
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
     * Renders the TabPanel HTML output.
     *
     * Adds:
     *
     * - Panel identifier.
     * - CSS state classes.
     * - Accessibility attributes.
     *
     * @return string
     */
    public function render(): string
    {
        $this->attribute(
            'id',
            $this->id
        );


        $this->attribute(
            'class',
            $this->active
                ? 'tab-panel active'
                : 'tab-panel'
        );


        $this->attribute(
            'data-tab-panel',
            ''
        );


        $this->attribute(
            'role',
            'tabpanel'
        );


        $this->attribute(
            'hidden',
            $this->active
                ? null
                : ''
        );


        return parent::render();
    }
}
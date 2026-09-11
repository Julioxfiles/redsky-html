<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Tabs;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Layout\Div;
use RedSky\Html\Components\Interactive\Tabs\Tab;
use RedSky\Html\Components\Interactive\Tabs\TabPanel;
use RedSky\Html\Components\Interactive\Tabs\TabItem;

/**
 * Tabs component.
 *
 * Provides a high-level tabbed interface builder.
 *
 * A Tabs component manages multiple Tab components
 * and their associated content panels.
 *
 * The component generates:
 *
 * - Tab navigation container.
 * - Tab buttons.
 * - Tab content panels.
 * - Data attributes required by JavaScript behavior.
 *
 * Styling and interaction logic are handled
 * by the UI layer.
 *
 * Example:
 *
 * $tabs = new Tabs();
 *
 * $tabs
 *     ->addTab(
 *         new Tab('Profile')
 *     );
 *
 * echo $tabs;
 *
 * @package RedSky\Html\Components\Interactive\Tabs
 */
class Tabs extends HtmlComponent
{
    /**
     * Registered tab items.
     *
     * Each item contains a Tab component
     * and its associated TabPanel content.
     *
     * @var array<int, TabItem>
     */
    protected array $tabs = [];

    /**
     * Active tab index.
     *
     * @var int
     */
    protected int $active = 0;



    /**
     * Creates a new Tabs component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }



    /**
     * Adds a Tab component.
     *
     * Example:
     *
     * ->addTab(
     *     new Tab('Users')
     * )
     *
     * @param Tab $tab
     * @return static
     */
    public function addTab(
        TabItem $item
    ): static {

        $this->tabs[] = $item;

        return $this;
    }


    /**
     * Sets the active tab.
     *
     * Uses zero-based index.
     *
     * Example:
     *
     * ->active(1)
     *
     * @param int $index
     *
     * @return static
     */
    public function active(
        int $index
    ): static {

        $this->active = $index;

        return $this;
    }



    /**
     * Renders the Tabs HTML output.
     *
     * Generates navigation and content
     * containers from registered tabs.
     *
     * @return string
     */
    public function render(): string
    {
        $container = new Div();


        $container->attribute(
            'class',
            'tabs'
        );


        $container->attribute(
            'data-component',
            'tabs'
        );


        foreach ($this->attributes() as $name => $value) {

            $container->attribute(
                $name,
                $value
            );

        }



        $navigation = new Div();

        $navigation->attribute(
            'class',
            'tabs-navigation'
        );


        $content = new Div();

        $content->attribute(
            'class',
            'tabs-content'
        );



        foreach ($this->tabs as $index => $item) {

            $id = 'tab-' . ($index + 1);

            $isActive = $index === $this->active;


            $tab = $item->tab();


            $tab->target($id);

            $tab->active($isActive);


            $navigation->addChild(
                $tab
            );


            $content->addChild(
                new TabPanel(
                    $id,
                    $item->content(),
                    $isActive
                )
            );
        }



        $container->addChild(
            $navigation
        );


        $container->addChild(
            $content
        );


        return $container->render();
    }
}
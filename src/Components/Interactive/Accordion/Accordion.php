<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Accordion;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Layout\Div\Div;

/**
 * Accordion component.
 *
 * Provides a high-level accordion interface builder.
 *
 * An Accordion component manages multiple AccordionItem
 * components and generates the container required for
 * accordion interaction.
 *
 * The component generates:
 *
 * - Accordion container.
 * - Accordion items.
 * - Item headers and buttons.
 * - Item content panels.
 * - Data attributes required by JavaScript behavior.
 *
 * Styling and interaction logic are handled by the UI layer.
 *
 * @package RedSky\Html\Components\Interactive\Accordion
 */
class Accordion extends HtmlComponent
{
    /**
     * Registered accordion items.
     *
     * @var array<int, AccordionItem>
     */
    protected array $items = [];


    /**
     * Active item index.
     *
     * Uses a zero-based index.
     *
     * @var int|null
     */
    protected ?int $active = 0;


    /**
     * Determines whether multiple items can be open.
     *
     * @var bool
     */
    protected bool $multiple = false;


    /**
     * Creates a new Accordion component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }


    /**
     * Adds an AccordionItem component.
     *
     * @param AccordionItem $item
     *
     * @return static
     */
    public function addItem(
        AccordionItem $item
    ): static {

        $this->items[] = $item;

        return $this;
    }


    /**
     * Sets the active accordion item.
     *
     * Uses a zero-based index.
     *
     * @param int|null $index
     *
     * @return static
     */
    public function active(
        ?int $index
    ): static {

        $this->active = $index;

        return $this;
    }


    /**
     * Enables or disables multiple open items.
     *
     * When enabled, more than one accordion item
     * can remain open at the same time.
     *
     * @param bool $multiple
     *
     * @return static
     */
    public function multiple(
        bool $multiple = true
    ): static {

        $this->multiple = $multiple;

        return $this;
    }


    /**
     * Renders the Accordion HTML output.
     *
     * Generates the accordion container and its
     * registered items.
     *
     * @return string
     */
    public function render(): string
    {
        $container = new Div();

        $container->attribute(
            'class',
            'accordion'
        );

        $container->attribute(
            'data-component',
            'accordion'
        );

        $container->attribute(
            'data-multiple',
            $this->multiple
                ? 'true'
                : 'false'
        );

        foreach ($this->attributes() as $name => $value) {

            $container->attribute(
                $name,
                $value
            );
        }

        foreach ($this->items as $index => $item) {

            $itemId = 'accordion-item-' . ($index + 1);

            $buttonId = $itemId . '-button';

            $panelId = $itemId . '-panel';

            if ($this->multiple) {

                $isActive = $item->isActive();

            } else {

                $isActive = $index === $this->active;
            }

            $item
                ->identifier(
                    $buttonId,
                    $panelId
                )
                ->active(
                    $isActive
                );

            $container->addChild(
                $item
            );
        }

        return $container->render();
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Dropdown;

use RedSky\Html\Components\Component;
use RedSky\Html\Components\Interactive\Button\Button;
use RedSky\Html\Components\Navigation\Link\Link;

/**
 * Dropdown item component.
 *
 * Represents an interactive item inside a dropdown menu.
 *
 * A dropdown item can act as:
 *
 * - A link that navigates to a URL.
 * - A button that executes an onclick event.
 *
 * The component reuses the existing Link and Button
 * components instead of duplicating their behavior.
 *
 * @package RedSky\Html\Components\Interactive\Dropdown
 */
class DropdownItem extends Component
{
    /**
     * Current interactive element.
     *
     * @var Link|Button
     */
    protected Link|Button $action;


    /**
     * Creates a new Dropdown item.
     *
     * @param string|null $text
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct();

        $this->action = new Button();

        $this->action
            ->class('dropdown-item');

        if ($text !== null) {
            $this->action->text($text);
        }
    }


    /**
     * Sets the item text.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {
        $this->action->text($text);

        return $this;
    }


    /**
     * Sets the item URL.
     *
     * The item is rendered as a Link.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $text = $this->action->content();

        $this->action = new Link(
            $href,
            is_string($text) ? $text : null
        );

        $this->action->class('dropdown-item');

        return $this;
    }


    /**
     * Sets the onclick event.
     *
     * The item is rendered as a Button.
     *
     * @param string $script
     *
     * @return static
     */
    public function onClick(
        string $script
    ): static {
        $text = $this->action->content();

        $this->action = new Button(
            is_string($text) ? $text : null
        );

        $this->action
            ->class('dropdown-item')
            ->attribute('onclick', $script);

        return $this;
    }


    /**
     * Renders the dropdown item.
     *
     * @return string
     */
    public function render(): string
    {
        return $this->action->render();
    }
}

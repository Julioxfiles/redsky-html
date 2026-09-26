<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Dropdown;

use RedSky\Html\Components\HtmlComponent;

/**
 * Dropdown toggle component.
 *
 * Represents the button used to open and close
 * an associated dropdown menu.
 *
 * The component is UI-library agnostic.
 * Dropdown behavior is handled by JavaScript.
 *
 * @package RedSky\Html\Components\Interactive\Dropdown
 */
class DropdownToggle extends HtmlComponent
{
    /**
     * Creates a new Dropdown toggle.
     *
     * @param string|null $text
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('button');

        $this
            ->class('dropdown-toggle')
            ->type('button')
            ->aria('expanded', 'false');

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets the button type.
     *
     * @param string $type
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        return $this->attribute(
            'type',
            $type
        );
    }
}

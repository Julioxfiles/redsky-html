<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <li> element.
 *
 * The ListItem component generates a semantic HTML <li>
 * element used to represent an individual item within an
 * ordered (<ol>) or unordered (<ul>) list.
 *
 * The item text can be provided through the constructor.
 * Additional content and child components can be configured
 * using the functionality inherited from HtmlComponent.
 *
 * The value() method can be used when the ListItem belongs
 * to an ordered list and the automatic numbering needs to
 * be overridden.
 *
 * @package RedSky\Html\Components\Lists
 */
class ListItem extends HtmlComponent
{
    /**
     * Creates a new list item component.
     *
     * @param string|null $text Item text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('li');

        if ($text !== null) {
            $this->text($text);
        }
    }

    /**
     * Sets the numeric value of the list item.
     *
     * When the item belongs to an ordered list, this value
     * overrides the position that would otherwise be assigned
     * automatically by the browser.
     *
     * The value attribute has no numbering effect when the
     * item is used inside an unordered list.
     *
     * @param int $value Numeric value for the list item.
     *
     * @return static
     */
    public function value(
        int $value
    ): static {
        return $this->attribute(
            'value',
            $value
        );
    }
}
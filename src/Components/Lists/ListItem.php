<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML list item component.
 *
 * The list item component generates a semantic HTML
 * li element used inside ordered and unordered lists.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
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
     * Sets item value.
     *
     * Used by ordered lists to override
     * automatic numbering.
     *
     * @param int $value
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
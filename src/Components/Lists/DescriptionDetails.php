<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML description details component.
 *
 * The description details component generates a
 * semantic HTML dd element.
 *
 * It provides the description or value associated
 * with a term in a description list.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Lists
 */
class DescriptionDetails extends HtmlComponent
{
    /**
     * Creates a new description details component.
     *
     * @param string|null $text Description text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('dd');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
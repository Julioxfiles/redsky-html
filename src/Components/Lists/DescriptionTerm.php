<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML description term component.
 *
 * The description term component generates a
 * semantic HTML dt element.
 *
 * It defines a term within a description list.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Lists
 */
class DescriptionTerm extends HtmlComponent
{
    /**
     * Creates a new description term component.
     *
     * @param string|null $text Term text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('dt');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
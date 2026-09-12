<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\DescriptionDetails;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <dd> element.
 *
 * The DescriptionDetails component generates a semantic HTML
 * <dd> element used to provide the description, definition,
 * or value associated with a term in a description list.
 *
 * It is normally used together with DescriptionList and
 * DescriptionTerm components to create a complete HTML
 * description list.
 *
 * @package RedSky\Html\Components\Lists
 */
class DescriptionDetails extends HtmlComponent
{
    /**
     * Creates a new description details component.
     *
     * @param string|null $text Description or definition text.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\DescriptionTerm;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML <dt> element.
 *
 * The DescriptionTerm component generates a semantic HTML
 * <dt> element used to define a term, name, or label within
 * a description list.
 *
 * It is normally used together with DescriptionList and
 * DescriptionDetails components to create a complete semantic
 * description list.
 *
 * @package RedSky\Html\Components\Lists
 */
class DescriptionTerm extends HtmlComponent
{
    /**
     * Creates a new description term component.
     *
     * @param string|null $text Term or label text.
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
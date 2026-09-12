<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Paragraph;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML paragraph component.
 *
 * The Paragraph component generates a semantic HTML
 * <p> element used to represent a block of text.
 *
 * Text content can be provided through the constructor.
 * Common content, attribute, styling, child-management,
 * rendering, and string-conversion methods are inherited
 * from HtmlComponent.
 *
 * The component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Paragraph extends HtmlComponent
{
    /**
     * Creates a new paragraph component.
     *
     * When text is provided, it is added as text content
     * inside the <p> element.
     *
     * @param string|null $text Paragraph content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('p');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Performatted;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML preformatted text component.
 *
 * The Preformatted component generates a semantic HTML
 * <pre> element used to preserve whitespace, indentation,
 * and line breaks in text content.
 *
 * It is commonly used to display preformatted content,
 * including source code and other text where the original
 * formatting should be preserved.
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
class Preformatted extends HtmlComponent
{
    /**
     * Creates a new preformatted component.
     *
     * When text is provided, it is added as text content
     * inside the <pre> element.
     *
     * @param string|null $text Content text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('pre');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
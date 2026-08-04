<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML preformatted text component.
 *
 * The preformatted component generates a semantic
 * HTML pre element used to preserve whitespace,
 * indentation, and line breaks.
 *
 * This component is commonly used together with
 * code blocks.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Preformatted extends HtmlComponent
{
    /**
     * Creates a new preformatted component.
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
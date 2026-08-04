<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML preformatted text component.
 *
 * The pre component generates a semantic HTML
 * pre element used to preserve whitespace and
 * formatting.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Pre extends HtmlComponent
{
    /**
     * Creates a new pre component.
     *
     * @param string|null $text Preformatted content.
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
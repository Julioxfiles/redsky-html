<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML span component.
 *
 * The span component generates a semantic HTML
 * inline span element used for grouping inline
 * content.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Span extends HtmlComponent
{
    /**
     * Creates a new span component.
     *
     * @param string|null $text Span content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('span');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML paragraph component.
 *
 * The paragraph component generates a semantic
 * HTML p element used for blocks of text.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Paragraph extends HtmlComponent
{
    /**
     * Creates a new paragraph component.
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
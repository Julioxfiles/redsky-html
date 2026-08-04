<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML emphasis component.
 *
 * The emphasis component generates a semantic
 * HTML em element used to indicate emphasized
 * text.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Emphasis extends HtmlComponent
{
    /**
     * Creates a new emphasis component.
     *
     * @param string|null $text Emphasis content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('em');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
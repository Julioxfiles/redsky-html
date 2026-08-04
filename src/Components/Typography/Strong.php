<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML strong component.
 *
 * The strong component generates a semantic HTML
 * strong element used to indicate importance or
 * emphasis of text.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Strong extends HtmlComponent
{
    /**
     * Creates a new strong component.
     *
     * @param string|null $text Strong content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('strong');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
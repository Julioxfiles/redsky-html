<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Strong;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML strong component.
 *
 * The Strong component generates a semantic HTML
 * <strong> element used to indicate that its content
 * has strong importance or significance.
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
class Strong extends HtmlComponent
{
    /**
     * Creates a new strong component.
     *
     * When text is provided, it is added as text content
     * inside the <strong> element.
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
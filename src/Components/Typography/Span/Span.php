<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Span;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML span component.
 *
 * The Span component generates a semantic HTML
 * <span> element used to group or identify inline
 * content.
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
class Span extends HtmlComponent
{
    /**
     * Creates a new span component.
     *
     * When text is provided, it is added as text content
     * inside the <span> element.
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
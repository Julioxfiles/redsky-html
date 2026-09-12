<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Code;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents an HTML code component.
 *
 * The Code component generates a semantic HTML
 * <code> element used to display inline fragments
 * of source code or other computer-readable text.
 *
 * Code content can be provided through the constructor.
 * Common content, attribute, styling, child-management,
 * rendering, and string-conversion methods are inherited
 * from HtmlComponent.
 *
 * The component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Code extends HtmlComponent
{
    /**
     * Creates a new code component.
     *
     * When code content is provided, it is added as
     * text content inside the <code> element.
     *
     * @param string|null $code Code content.
     */
    public function __construct(
        ?string $code = null
    ) {
        parent::__construct('code');

        if ($code !== null) {
            $this->text($code);
        }
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML code component.
 *
 * The code component generates a semantic HTML
 * code element used to display inline code
 * fragments.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Code extends HtmlComponent
{
    /**
     * Creates a new code component.
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
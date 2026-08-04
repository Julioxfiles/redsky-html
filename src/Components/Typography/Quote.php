<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML block quote component.
 *
 * The quote component generates a semantic HTML
 * blockquote element used for extended quotations.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Quote extends HtmlComponent
{
    /**
     * Creates a new quote component.
     *
     * @param string|null $text Quote text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('blockquote');

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets quote citation source.
     *
     * @param string $source
     *
     * @return static
     */
    public function cite(
        string $source
    ): static {
        return $this->attribute(
            'cite',
            $source
        );
    }
}
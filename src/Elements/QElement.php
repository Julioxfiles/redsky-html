<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML q element.
 *
 * The q element represents a short inline quotation.
 *
 * Browsers usually add quotation marks automatically,
 * depending on the document language.
 *
 * Common uses:
 *
 * - Inline quotes.
 * - References.
 * - Text citations.
 *
 * @package RedSky\Html\Elements
 */
class QElement extends HtmlElement
{
    /**
     * Creates a new q element.
     */
    public function __construct()
    {
        parent::__construct('q');
    }


    /**
     * Sets the source URL of the quotation.
     *
     * @param string $cite
     *
     * @return static
     */
    public function cite(
        string $cite
    ): static {
        $this->setAttribute(
            'cite',
            $cite
        );

        return $this;
    }
}
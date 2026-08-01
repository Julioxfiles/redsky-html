<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML ins element.
 *
 * The ins element represents text that has been
 * inserted into a document.
 *
 * Common uses:
 *
 * - Document revisions.
 * - Content updates.
 * - Change tracking.
 *
 * @package RedSky\Html\Elements
 */
class InsElement extends HtmlElement
{
    /**
     * Creates a new ins element.
     */
    public function __construct()
    {
        parent::__construct('ins');
    }


    /**
     * Sets insertion date and time.
     *
     * @param string $datetime
     *
     * @return static
     */
    public function datetime(
        string $datetime
    ): static {
        $this->setAttribute(
            'datetime',
            $datetime
        );

        return $this;
    }


    /**
     * Sets reference URL for the insertion.
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
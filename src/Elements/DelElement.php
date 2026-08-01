<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML del element.
 *
 * The del element represents text that has been
 * removed from a document.
 *
 * Common uses:
 *
 * - Price changes.
 * - Document revisions.
 * - Content updates.
 *
 * @package RedSky\Html\Elements
 */
class DelElement extends HtmlElement
{
    /**
     * Creates a new del element.
     */
    public function __construct()
    {
        parent::__construct('del');
    }


    /**
     * Sets deletion date and time.
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
     * Sets reference URL for the change.
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
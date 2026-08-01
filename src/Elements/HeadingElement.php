<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

use InvalidArgumentException;

/**
 * Represents an HTML heading element.
 *
 * Supports heading levels from h1 to h6.
 *
 * @package RedSky\Html\Elements
 */
class HeadingElement extends HtmlElement
{
    /**
     * Heading level.
     */
    protected int $level;


    /**
     * Creates a new heading element.
     *
     * @param int $level Heading level (1-6).
     */
    public function __construct(
        int $level = 1
    ) {
        $this->setLevel($level);

        parent::__construct(
            'h' . $this->level
        );
    }


    /**
     * Sets heading level.
     *
     * @param int $level Heading level.
     *
     * @return static
     */
    public function setLevel(
        int $level
    ): static {
        if ($level < 1 || $level > 6) {
            throw new InvalidArgumentException(
                'Heading level must be between 1 and 6.'
            );
        }

        $this->level = $level;

        return $this;
    }


    /**
     * Returns heading level.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}
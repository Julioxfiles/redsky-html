<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML heading component.
 *
 * The heading component generates semantic HTML
 * heading elements from h1 to h6.
 *
 * This component is UI-library agnostic and does
 * not apply any default styling.
 *
 * @package RedSky\Html\Components
 */
class Heading extends HtmlComponent
{
    /**
     * Heading level.
     *
     * @var int
     */
    protected int $level;


    /**
     * Creates a new heading component.
     *
     * @param int $level Heading level (1-6).
     * @param string|null $content Heading content.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(
        int $level = 1,
        ?string $content = null
    ) {
        if ($level < 1 || $level > 6) {
            throw new \InvalidArgumentException(
                'Heading level must be between 1 and 6.'
            );
        }

        $this->level = $level;

        parent::__construct(
            'h' . $level
        );

        if ($content !== null) {
            $this->setContent($content);
        }
    }


    /**
     * Returns heading level.
     *
     * @return int
     */
    public function level(): int
    {
        return $this->level;
    }


    /**
     * Sets heading content.
     *
     * @param string $text
     *
     * @return static
     */
    public function text(
        string $text
    ): static {
        $this->setContent($text);

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML anchor component.
 *
 * The link component generates a semantic HTML
 * anchor element used for navigation.
 *
 * This component is UI-library agnostic and does
 * not apply any default styling.
 *
 * @package RedSky\Html\Components
 */
class Link extends HtmlComponent
{
    /**
     * Creates a new link component.
     *
     * @param string|null $href Link destination.
     * @param string|null $text Link text.
     */
    public function __construct(
        ?string $href = null,
        ?string $text = null
    ) {
        parent::__construct('a');

        if ($href !== null) {
            $this->href($href);
        }

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets link destination.
     *
     * @param string $href
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $this->attribute(
            'href',
            $href
        );

        return $this;
    }


    /**
     * Sets link text.
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


    /**
     * Opens link in a target location.
     *
     * @param string $target
     *
     * @return static
     */
    public function target(
        string $target
    ): static {
        $this->attribute(
            'target',
            $target
        );

        return $this;
    }
}
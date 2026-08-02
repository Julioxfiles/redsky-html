<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Represents an HTML paragraph component.
 *
 * The paragraph component generates a semantic
 * HTML p element for textual content.
 *
 * This component is UI-library agnostic and does
 * not apply any default styling.
 *
 * @package RedSky\Html\Components
 */
class Paragraph extends HtmlComponent
{
    /**
     * Creates a new paragraph component.
     *
     * @param string|null $content Paragraph content.
     */
    public function __construct(
        ?string $content = null
    ) {
        parent::__construct('p');

        if ($content !== null) {
            $this->setContent($content);
        }
    }


    /**
     * Sets paragraph text.
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
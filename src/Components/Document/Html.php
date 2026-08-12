<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents the root HTML <html> element.
 *
 * The html element is the root element of every HTML document.
 * It contains the head and body elements and may define the
 * document language and writing direction.
 *
 * Example:
 *
 * ```php
 * $html = (new Html())
 *     ->lang('en')
 *     ->addChild(
 *         new Head(),
 *         new Body()
 *     );
 * ```
 *
 * Renders:
 *
 * ```html
 * <html lang="en">
 *     <head></head>
 *     <body></body>
 * </html>
 * ```
 */
#[\RedSky\Html\Metadata\Component(
    name: 'Html',
    category: 'Document',
    description: 'Represents the root HTML document element.',
    version: '1.0.0'
)]
class Html extends HtmlComponent
{
    /**
     * Creates a new html component.
     */
    public function __construct()
    {
        parent::__construct('html');
    }

    /**
     * Sets the document language.
     */
    public function lang(string $language): static
    {
        return $this->attribute('lang', $language);
    }

    /**
     * Sets the writing direction.
     */
    public function dir(string $direction): static
    {
        return $this->attribute('dir', $direction);
    }

    public function head(Head $head): static
    {
        return $this->addChild($head);
    }

    public function body(Body $body): static
    {
        return $this->addChild($body);
    }

}
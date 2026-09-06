<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <title> element.
 *
 * The Title component generates the semantic HTML <title>
 * element used to define the title of an HTML document.
 *
 * The document title is typically displayed in the browser
 * tab, window title, browser history, bookmarks, and may also
 * be used by search engines when presenting search results.
 *
 * The title text can be provided when the component is created
 * through the constructor. The component also inherits common
 * functionality from HtmlComponent, including methods for
 * managing attributes, classes, styles, content, children,
 * rendering, and fluent configuration.
 *
 * Title is a document-level component and is normally placed
 * inside a Head component.
 *
 * The component is UI-library agnostic and does not apply
 * any visual styling.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Title('RedSky Framework'))
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <title>RedSky Framework</title>
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'Document Title',
    code: <<<'PHP'
    echo (new Title('RedSky Framework'))
        ->render();
    PHP,
    description: 'The Title component generates the semantic HTML
                 <title> element used to define the title of an
                 HTML document. It is normally placed inside a
                 Head component and its text is displayed by the
                 browser as the document title.',
    language: 'php',
    primary: true,
    output: '<title>RedSky Framework</title>'
)]
class Title extends HtmlComponent
{
    /**
     * Creates a new title component.
     *
     * If a title is provided, it is assigned as the text
     * content of the <title> element.
     *
     * @param string|null $title Document title text.
     */
    public function __construct(
        ?string $title = null
    ) {
        parent::__construct('title');

        if ($title !== null) {
            $this->text($title);
        }
    }
}
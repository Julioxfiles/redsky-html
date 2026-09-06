<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML preformatted text component.
 *
 * The Pre component generates a semantic HTML
 * <pre> element used to preserve whitespace,
 * line breaks, and formatting in text content.
 *
 * Text content can be provided through the constructor.
 * Common content, attribute, styling, child-management,
 * rendering, and string-conversion methods are inherited
 * from HtmlComponent.
 *
 * The component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
#[Example(
    title: 'Preformatted Text',
    code: <<<'PHP'
    echo new Pre(
        "Line one\nLine two\nLine three"
    );
    PHP,
    description: 'Creates a semantic preformatted text element
                 that preserves whitespace and line breaks.',
    language: 'php',
    primary: true,
    output: '<pre>Line one
Line two
Line three</pre>'
)]
class Pre extends HtmlComponent
{
    /**
     * Creates a new preformatted text component.
     *
     * When text is provided, it is added as text content
     * inside the <pre> element.
     *
     * @param string|null $text Preformatted content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('pre');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
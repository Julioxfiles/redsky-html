<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML preformatted text component.
 *
 * The Preformatted component generates a semantic HTML
 * <pre> element used to preserve whitespace, indentation,
 * and line breaks in text content.
 *
 * It is commonly used to display preformatted content,
 * including source code and other text where the original
 * formatting should be preserved.
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
    echo new Preformatted(
        "Name: RedSky\nVersion: 1.0.0\nStatus: Stable"
    );
    PHP,
    description: 'Creates a semantic preformatted text element
                 that preserves whitespace and line breaks.',
    language: 'php',
    primary: true,
    output: '<pre>Name: RedSky
Version: 1.0.0
Status: Stable</pre>'
)]
class Preformatted extends HtmlComponent
{
    /**
     * Creates a new preformatted component.
     *
     * When text is provided, it is added as text content
     * inside the <pre> element.
     *
     * @param string|null $text Content text.
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
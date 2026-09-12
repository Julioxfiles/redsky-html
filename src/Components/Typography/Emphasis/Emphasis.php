<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography\Enphasis;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML emphasis component.
 *
 * The Emphasis component generates a semantic HTML
 * <em> element used to indicate emphasized text.
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
    title: 'Emphasis',
    code: <<<'PHP'
    echo new Emphasis('important information');
    PHP,
    description: 'Creates a semantic emphasis element
                 containing emphasized text.',
    language: 'php',
    primary: true,
    output: '<em>important information</em>'
)]
class Emphasis extends HtmlComponent
{
    /**
     * Creates a new emphasis component.
     *
     * When text is provided, it is added as text content
     * inside the <em> element.
     *
     * @param string|null $text Emphasis content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('em');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML paragraph component.
 *
 * The Paragraph component generates a semantic HTML
 * <p> element used to represent a block of text.
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
    title: 'Paragraph',
    code: <<<'PHP'
    echo (new Paragraph('Welcome to RedSky.'))
        ->class('intro')
        ->attribute('id', 'welcome-text')
        ->render();
    PHP,
    description: 'Creates a semantic HTML paragraph containing
                 a block of text.',
    language: 'php',
    primary: true,
    output: '<p class="intro" id="welcome-text">Welcome to RedSky.</p>'
)]
class Paragraph extends HtmlComponent
{
    /**
     * Creates a new paragraph component.
     *
     * When text is provided, it is added as text content
     * inside the <p> element.
     *
     * @param string|null $text Paragraph content.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('p');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML block quote component.
 *
 * The Quote component generates a semantic HTML
 * <blockquote> element used for extended quotations.
 *
 * Quote text can be provided through the constructor.
 * The citation source can be specified using the cite()
 * method, which sets the HTML cite attribute.
 *
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
    title: 'Block Quote',
    code: <<<'PHP'
    echo (new Quote('Simplicity is the soul of efficiency.'))
        ->cite('https://example.com/quote')
        ->render();
    PHP,
    description: 'Creates a semantic block quotation and
                 optionally specifies the source of the
                 quotation using the cite attribute.',
    language: 'php',
    primary: true,
    output: '<blockquote cite="https://example.com/quote">Simplicity is the soul of efficiency.</blockquote>'
)]
class Quote extends HtmlComponent
{
    /**
     * Creates a new quote component.
     *
     * When text is provided, it is added as text content
     * inside the <blockquote> element.
     *
     * @param string|null $text Quote text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('blockquote');

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets the citation source for the quotation.
     *
     * The source is assigned to the HTML cite attribute.
     *
     * @param string $source Citation source.
     *
     * @return static
     */
    public function cite(
        string $source
    ): static {
        return $this->attribute(
            'cite',
            $source
        );
    }
}
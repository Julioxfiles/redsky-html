<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\DescriptionDetails;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <dd> element.
 *
 * The DescriptionDetails component generates a semantic HTML
 * <dd> element used to provide the description, definition,
 * or value associated with a term in a description list.
 *
 * It is normally used together with DescriptionList and
 * DescriptionTerm components to create a complete HTML
 * description list.
 *
 * DescriptionDetails extends HtmlComponent and inherits common
 * functionality for managing attributes, classes, styles,
 * content, children, rendering, and fluent configuration.
 *
 * The description text can be provided through the constructor.
 * Additional inherited methods can be used to configure the
 * component.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo new DescriptionDetails('A PHP framework for building reusable components.');
 * ```
 *
 * Produces:
 *
 * ```html
 * <dd>A PHP framework for building reusable components.</dd>
 * ```
 *
 * @package RedSky\Html\Components\Lists
 */
#[Example(
    title: 'Description Details',
    code: <<<'PHP'
    echo new DescriptionDetails(
        'A PHP framework for building reusable components.'
    );
    PHP,
    description: 'The DescriptionDetails component generates a
                 semantic HTML <dd> element for providing the
                 description, definition, or value associated
                 with a term in a description list.',
    language: 'php',
    primary: true,
    output: '<dd>A PHP framework for building reusable components.</dd>'
)]
class DescriptionDetails extends HtmlComponent
{
    /**
     * Creates a new description details component.
     *
     * @param string|null $text Description or definition text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('dd');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
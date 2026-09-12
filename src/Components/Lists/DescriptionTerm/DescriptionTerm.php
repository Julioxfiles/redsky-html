<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\DescriptionTerm;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <dt> element.
 *
 * The DescriptionTerm component generates a semantic HTML
 * <dt> element used to define a term, name, or label within
 * a description list.
 *
 * It is normally used together with DescriptionList and
 * DescriptionDetails components to create a complete semantic
 * description list.
 *
 * DescriptionTerm extends HtmlComponent and inherits common
 * functionality for managing attributes, classes, styles,
 * content, children, rendering, and fluent configuration.
 *
 * The term text can be provided through the constructor.
 * Additional inherited methods can be used to configure
 * attributes and other HTML properties.
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
 * echo new DescriptionTerm('Language');
 * ```
 *
 * Produces:
 *
 * ```html
 * <dt>Language</dt>
 * ```
 *
 * @package RedSky\Html\Components\Lists
 */
#[Example(
    title: 'Description Term',
    code: <<<'PHP'
    echo new DescriptionTerm('Language');
    PHP,
    description: 'The DescriptionTerm component generates a
                 semantic HTML <dt> element for defining a term,
                 name, or label within a description list.',
    language: 'php',
    primary: true,
    output: '<dt>Language</dt>'
)]
class DescriptionTerm extends HtmlComponent
{
    /**
     * Creates a new description term component.
     *
     * @param string|null $text Term or label text.
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('dt');

        if ($text !== null) {
            $this->text($text);
        }
    }
}
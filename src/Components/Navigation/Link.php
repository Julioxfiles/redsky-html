<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Link;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML anchor component.
 *
 * The Link component generates a semantic HTML <a>
 * element used for navigation and linking to resources.
 *
 * A destination and link text can be provided through
 * the constructor, or configured using the fluent methods
 * provided by the component.
 *
 * The component supports common anchor attributes including
 * target, download, rel, hreflang, type, referrer policy,
 * title, and ARIA labeling.
 *
 * Common attributes and content methods inherited from
 * HtmlComponent can also be used, including class(),
 * style(), attribute(), addChild(), text(), html(),
 * render(), and __toString().
 *
 * This component is UI-library agnostic and does not
 * apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Link
 */
#[Example(
    title: 'Navigation Link',
    code: <<<'PHP'
    echo (new Link('/docs', 'Documentation'))
        ->target('_blank')
        ->rel('noopener')
        ->attribute('id', 'docs-link')
        ->render();
    PHP,
    description: 'Creates a semantic HTML anchor element that
                 links to a documentation page and opens it in
                 a new browsing context.',
    language: 'php',
    primary: true,
    output: '<a href="/docs" target="_blank" rel="noopener" id="docs-link">Documentation</a>'
)]
class Link extends HtmlComponent
{
    /**
     * Creates a new link component.
     *
     * The destination and link text are optional. When
     * provided, they are assigned to the href attribute
     * and element content respectively.
     *
     * @param string|null $href Link destination URL.
     * @param string|null $text Link text.
     */
    public function __construct(
        ?string $href = null,
        ?string $text = null
    ) {
        parent::__construct('a');

        if ($href !== null) {
            $this->href($href);
        }

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets the link destination.
     *
     * @param string $href Link destination URL.
     *
     * @return static
     */
    public function href(
        string $href
    ): static {
        $this->attribute(
            'href',
            $href
        );

        return $this;
    }


    /**
     * Sets the browsing context in which the link
     * should be opened.
     *
     * Common values include "_self", "_blank",
     * "_parent", and "_top".
     *
     * @param string $target Target browsing context.
     *
     * @return static
     */
    public function target(
        string $target
    ): static {
        $this->attribute(
            'target',
            $target
        );

        return $this;
    }


    /**
     * Sets download behavior for the linked resource.
     *
     * A boolean enables or disables the download behavior.
     * A string can specify the suggested filename.
     *
     * @param string|bool $download Download behavior or filename.
     *
     * @return static
     */
    public function download(
        string|bool $download = true
    ): static {
        return $this->attribute(
            'download',
            $download
        );
    }


    /**
     * Sets the relationship between the current document
     * and the linked resource.
     *
     * Common values include "noopener", "noreferrer",
     * "nofollow", and "external".
     *
     * @param string $rel Link relationship.
     *
     * @return static
     */
    public function rel(
        string $rel
    ): static {
        return $this->attribute(
            'rel',
            $rel
        );
    }


    /**
     * Sets the language of the linked resource.
     *
     * @param string $hreflang Language code.
     *
     * @return static
     */
    public function hreflang(
        string $hreflang
    ): static {
        return $this->attribute(
            'hreflang',
            $hreflang
        );
    }


    /**
     * Sets the MIME type of the linked resource.
     *
     * @param string $type MIME type.
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        return $this->attribute(
            'type',
            $type
        );
    }


    /**
     * Sets the referrer policy for the link.
     *
     * @param string $policy Referrer policy value.
     *
     * @return static
     */
    public function referrerPolicy(
        string $policy
    ): static {
        return $this->attribute(
            'referrerpolicy',
            $policy
        );
    }


    /**
     * Sets the advisory title associated with the link.
     *
     * @param string $title Link title.
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        return $this->attribute(
            'title',
            $title
        );
    }


    /**
     * Sets the accessible ARIA label for the link.
     *
     * This can provide a more descriptive accessible
     * name when the visible link text is insufficient.
     *
     * @param string $label Accessible link label.
     *
     * @return static
     */
    public function ariaLabel(
        string $label
    ): static {
        return $this->attribute(
            'aria-label',
            $label
        );
    }
}
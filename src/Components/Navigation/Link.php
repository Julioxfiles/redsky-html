<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Link;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML anchor component.
 *
 * The link component generates a semantic HTML
 * anchor element used for navigation.
 *
 * This component is UI-library agnostic and does
 * not apply any default styling.
 *
 * @package RedSky\Html\Components\Link
 */
class Link extends HtmlComponent
{
    /**
     * Creates a new link component.
     *
     * @param string|null $href Link destination.
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
     * Sets link destination.
     *
     * @param string $href
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
     * Opens link in a target location.
     *
     * @param string $target
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
     * Sets download behavior.
     *
     * @param string|bool $download
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
     * Sets relationship attribute.
     *
     * @param string $rel
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
     * Sets alternative language.
     *
     * @param string $hreflang
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
     * Sets MIME type.
     *
     * @param string $type
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
     * Sets referrer policy.
     *
     * @param string $policy
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
     * Sets link title.
     *
     * @param string $title
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
     * Sets ARIA label.
     *
     * @param string $label
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
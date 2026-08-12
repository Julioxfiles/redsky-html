<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <head> element.
 *
 * The head element contains metadata about the document,
 * including the title, meta information, stylesheets,
 * scripts, and other resources.
 *
 * Example:
 *
 * ```php
 * $head = (new Head())
 *     ->addTitle(new Title('RedSky'))
 *     ->addMeta((new Meta())->charset('UTF-8'))
 *     ->addLink((new Link())->stylesheet('/css/app.css'));
 * ```
 */
class Head extends HtmlComponent
{
    /**
     * Creates a new head component.
     */
    public function __construct()
    {
        parent::__construct('head');
    }

    /**
     * Adds a title element.
     */
    public function addTitle(Title $title): static
    {
        return $this->addChild($title);
    }

    /**
     * Adds a meta element.
     */
    public function addMeta(Meta $meta): static
    {
        return $this->addChild($meta);
    }

    /**
     * Adds a link element.
     */
    public function addLink(Link $link): static
    {
        return $this->addChild($link);
    }

    /**
     * Adds a style element.
     */
    public function addStyle(Style $style): static
    {
        return $this->addChild($style);
    }

    /**
     * Adds a script element.
     */
    public function addScript(Script $script): static
    {
        return $this->addChild($script);
    }
}
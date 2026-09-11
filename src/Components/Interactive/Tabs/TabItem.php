<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Interactive\Tabs;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a tab definition.
 *
 * Combines a Tab button with its associated
 * content panel.
 */
class TabItem
{
    protected Tab $tab;

    protected string|HtmlComponent $content;


    public function __construct(
        Tab $tab,
        string|HtmlComponent $content
    ) {
        $this->tab = $tab;
        $this->content = $content;
    }


    public function tab(): Tab
    {
        return $this->tab;
    }


    public function content(): string|HtmlComponent
    {
        return $this->content;
    }
}
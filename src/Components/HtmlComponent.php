<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

/**
 * Base class for components that represent HTML elements.
 *
 * This class converts a component definition into
 * a native HTML representation.
 *
 * It is independent from UI libraries and only
 * handles HTML generation.
 *
 * @package RedSky\Html\Components
 */
abstract class HtmlComponent extends Component
{
    /**
     * HTML tag name.
     *
     * @var string
     */
    protected string $tag;


    /**
     * Indicates if element is self closing.
     *
     * @var bool
     */
    protected bool $selfClosing = false;


    /**
     * Creates a new HTML component.
     *
     * @param string|null $tag
     */
    public function __construct(
        ?string $tag = null
    ) {
        parent::__construct();

        if ($tag !== null) {
            $this->tag = $tag;
        }
    }


    /**
     * Returns HTML tag name.
     *
     * @return string
     */
    public function tag(): string
    {
        return $this->tag;
    }


    /**
     * Renders component HTML.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        if ($this->selfClosing) {
            return sprintf(
                '<%s%s />',
                $this->tag,
                $attributes
            );
        }

        return sprintf(
            '<%s%s>%s%s</%s>',
            $this->tag,
            $attributes,
            $this->renderContent(),
            $this->renderChildren(),
            $this->tag
        );
    }


    /**
     * Renders component attributes.
     *
     * @return string
     */
    protected function renderAttributes(): string
    {
        if ($this->attributes->isEmpty()) {
            return '';
        }

        return ' ' . $this->attributes->renderAttributes();
    }


    /**
     * Renders component content.
     *
     * @return string
     */
    protected function renderContent(): string
    {
        if (!$this->hasContent()) {
            return '';
        }

        return (string) $this->content();
    }


    /**
     * Renders child components.
     *
     * @return string
     */
    protected function renderChildren(): string
    {
        $html = '';

        foreach ($this->children as $child) {
            $html .= $child->render();
        }

        return $html;
    }
}
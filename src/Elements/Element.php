<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

use RedSky\Html\Collections\AttributeCollection;
use RedSky\Html\Contracts\Attributeable;
use RedSky\Html\Contracts\Renderable;
use Stringable;

/**
 * Base class for all HTML elements.
 *
 * Represents an HTML node with a tag name,
 * attributes and optional content.
 *
 * @package RedSky\Html\Elements
 */
abstract class Element implements Attributeable, Renderable, Stringable
{
    /**
     * HTML tag name.
     */
    protected string $tag;


    /**
     * Element attributes.
     */
    protected AttributeCollection $attributes;


    /**
     * Element content.
     */
    protected ?string $content = null;


    /**
     * Creates a new element instance.
     */
    public function __construct()
    {
        $this->attributes = new AttributeCollection();

        $this->initialize();
    }


    /**
     * Initializes element configuration.
     *
     * @return void
     */
    protected function initialize(): void
    {
    }


    /**
     * Returns element tag name.
     *
     * @return string
     */
    public function tag(): string
    {
        return $this->tag;
    }


    /**
     * Sets element content.
     *
     * @param string|null $content
     *
     * @return static
     */
    public function content(
        ?string $content
    ): static {
        $this->content = $content;

        return $this;
    }


    /**
     * Returns element content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }


    /**
     * Adds or replaces an attribute.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return static
     */
    public function setAttribute(
        string $name,
        mixed $value
    ): static {
        $this->attributes->setAttribute(
            $name,
            $value
        );

        return $this;
    }


    /**
     * Returns an attribute value.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getAttribute(
        string $name
    ): mixed {
        return $this->attributes->getAttribute($name);
    }


    /**
     * Determines whether an attribute exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute(
        string $name
    ): bool {
        return $this->attributes->hasAttribute($name);
    }


    /**
     * Removes an attribute.
     *
     * @param string $name
     *
     * @return static
     */
    public function removeAttribute(
        string $name
    ): static {
        $this->attributes->removeAttribute($name);

        return $this;
    }


    /**
     * Returns all attributes.
     *
     * @return array<string,mixed>
     */
    public function getAttributes(): array
    {
        return $this->attributes->getAttributes();
    }


    /**
     * Clears attributes.
     *
     * @return static
     */
    public function clearAttributes(): static
    {
        $this->attributes->clearAttributes();

        return $this;
    }


    /**
     * Returns attribute collection.
     *
     * @return AttributeCollection
     */
    public function attributes(): AttributeCollection
    {
        return $this->attributes;
    }


    /**
     * Determines whether element can render.
     *
     * @return bool
     */
    public function canRender(): bool
    {
        return isset($this->tag)
            && $this->tag !== '';
    }


    /**
     * Renders element.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '<' . $this->tag;


        if ($this->attributes->canRenderAttributes()) {
            $html .= ' ' . $this->attributes->renderAttributes();
        }


        $html .= '>';


        if ($this->content !== null) {
            $html .= $this->content;
        }


        $html .= '</' . $this->tag . '>';


        return $html;
    }


    /**
     * Converts element to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
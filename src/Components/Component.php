<?php

declare(strict_types=1);

namespace RedSky\Html\Components;

use RedSky\Html\Contracts\HasAttributes;
use RedSky\Html\Contracts\HasChildren;
use RedSky\Html\Contracts\HasContent;
use RedSky\Html\Contracts\Renderable;
use RedSky\Html\Collections\AttributeCollection;
use RedSky\Html\Collections\ChildrenCollection;

/**
 * Base class for all RedSky HTML components.
 *
 * Components are reusable building blocks designed
 * to be consumed by higher level layers such as
 * redsky-ui.
 *
 * This class is UI-library agnostic and does not
 * contain Bootstrap, Tailwind, or design system logic.
 *
 * @package RedSky\Html\Components
 */
abstract class Component implements
    Renderable,
    HasAttributes,
    HasChildren,
    HasContent
{
    /**
     * Component attributes.
     *
     * @var AttributeCollection
     */
    protected AttributeCollection $attributes;


    /**
     * Component children.
     *
     * @var ChildrenCollection
     */
    protected ChildrenCollection $children;


    /**
     * Component content.
     *
     * @var mixed
     */
    protected mixed $content = null;


    /**
     * Creates a new component instance.
     */
    public function __construct()
    {
        $this->attributes = new AttributeCollection();

        $this->children = new ChildrenCollection();
    }


    /**
     * Returns all attributes.
     *
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        return $this->attributes->getAttributes();
    }


    /**
     * Determines whether attributes exist.
     *
     * @return bool
     */
    public function hasAttributes(): bool
    {
        return $this->attributes->canRenderAttributes();
    }


    /**
     * Adds or replaces an attribute.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return static
     */
    public function attribute(
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
     * Removes an attribute.
     *
     * @param string $name
     *
     * @return static
     */
    public function removeAttribute(
        string $name
    ): static {
        $this->attributes->removeAttribute(
            $name
        );

        return $this;
    }


    /**
     * Determines whether attribute exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute(
        string $name
    ): bool {
        return $this->attributes->hasAttribute(
            $name
        );
    }


    /**
     * Returns attribute value.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getAttribute(
        string $name
    ): mixed {
        return $this->attributes->getAttribute(
            $name
        );
    }


    /**
     * Adds a CSS class.
     *
     * @param string $class
     *
     * @return static
     */
    public function class(
        string $class
    ): static {
        return $this->attribute(
            'class',
            $class
        );
    }


    /**
     * Adds inline style.
     *
     * @param string $property
     * @param string $value
     *
     * @return static
     */
    public function style(
        string $property,
        string $value
    ): static {
        return $this->attribute(
            'style',
            $property . ':' . $value
        );
    }


    /**
     * Returns all children.
     *
     * @return array<int, mixed>
     */
    public function children(): array
    {
        return $this->children->children();
    }


    /**
     * Determines whether children exist.
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return !$this->children->isEmpty();
    }


    /**
     * Adds a child node.
     *
     * @param mixed $child
     *
     * @return static
     */
    public function addChild(
        mixed $child
    ): static {
        $this->children->add($child);

        return $this;
    }

    /**
     * Adds multiple child nodes.
     *
     * @param array<int, mixed> $children Child nodes.
     *
     * @return static
     */
    public function addChildren(
        array $children
    ): static {
        foreach ($children as $child) {
            $this->addChild($child);
        }

        return $this;
    }


    /**
     * Removes a child node.
     *
     * @param mixed $child
     *
     * @return static
     */
    public function removeChild(
        mixed $child
    ): static {
        $this->children->remove($child);

        return $this;
    }


    /**
     * Clears all children.
     *
     * @return static
     */
    public function clearChildren(): static
    {
        $this->children->clear();

        return $this;
    }


    /**
     * Returns children count.
     *
     * @return int
     */
    public function childrenCount(): int
    {
        return $this->children->count();
    }


    /**
     * Returns current content.
     *
     * @return mixed
     */
    public function content(): mixed
    {
        return $this->content;
    }


    /**
     * Sets component content.
     *
     * @param mixed $content
     *
     * @return static
     */
    public function setContent(
        mixed $content
    ): static {
        $this->content = $content;

        return $this;
    }


    /**
     * Determines whether content exists.
     *
     * @return bool
     */
    public function hasContent(): bool
    {
        return $this->content !== null;
    }


    /**
     * Clears content.
     *
     * @return static
     */
    public function clearContent(): static
    {
        $this->content = null;

        return $this;
    }


    /**
     * Appends content.
     *
     * @param mixed $content
     *
     * @return static
     */
    public function appendContent(
        mixed $content
    ): static {
        $this->content .= $content;

        return $this;
    }


    /**
     * Prepends content.
     *
     * @param mixed $content
     *
     * @return static
     */
    public function prependContent(
        mixed $content
    ): static {
        $this->content = $content . $this->content;

        return $this;
    }


    /**
     * Returns component HTML representation.
     *
     * @return string
     */
    abstract public function render(): string;
}
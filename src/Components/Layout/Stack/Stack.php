<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Stack;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents a stack layout component.
 *
 * Stack arranges child components in a consistent vertical
 * or horizontal direction with optional spacing between children.
 *
 * The component is UI-library-agnostic. CSS classes, inline styles,
 * and additional HTML attributes can be supplied through the
 * inherited Component API.
 *
 * Supported directions:
 *
 * - vertical
 * - horizontal
 *
 * @package RedSky\Html\Components\Layout
 */
class Stack extends HtmlComponent
{
    /**
     * Stack HTML tag.
     *
     * @var string
     */
    protected string $tag = 'div';


    /**
     * Stack direction.
     *
     * @var string
     */
    protected string $direction = 'vertical';


    /**
     * Spacing between children.
     *
     * @var string|null
     */
    protected ?string $gap = null;


    /**
     * Creates a new Stack component.
     */
    public function __construct()
    {
        parent::__construct('div');
    }


    /**
     * Sets the stack direction.
     *
     * @param string $direction
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     */
    public function direction(
        string $direction
    ): static {
        $allowed = [
            'vertical',
            'horizontal',
        ];

        if (!in_array($direction, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid stack direction "%s". Allowed directions: %s.',
                    $direction,
                    implode(', ', $allowed)
                )
            );
        }

        $this->direction = $direction;

        return $this;
    }


    /**
     * Returns the stack direction.
     *
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }


    /**
     * Sets the spacing between children.
     *
     * The value may be any valid CSS gap value.
     *
     * @param string|null $gap
     *
     * @return static
     */
    public function gap(
        ?string $gap
    ): static {
        $this->gap = $gap;

        return $this;
    }


    /**
     * Returns the stack gap.
     *
     * @return string|null
     */
    public function getGap(): ?string
    {
        return $this->gap;
    }


    /**
     * Adds a child to the stack.
     *
     * This is a convenience alias for the inherited
     * addChild() method.
     *
     * @param mixed $child
     *
     * @return static
     */
    public function add(
        mixed $child
    ): static {
        return $this->addChild($child);
    }


    /**
     * Renders the Stack component.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= sprintf(
            ' data-redsky-component="stack" data-stack-direction="%s"',
            htmlspecialchars(
                $this->direction,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );

        if ($this->gap !== null) {
            $attributes .= sprintf(
                ' data-stack-gap="%s"',
                htmlspecialchars(
                    $this->gap,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        $content = '';

        foreach ($this->children() as $child) {
            $content .= (string) $child;
        }

        return sprintf(
            '<%s%s>%s</%s>',
            $this->tag,
            $attributes,
            $content,
            $this->tag
        );
    }
}

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
class HtmlComponent extends Component
{
    /**
     * HTML tags that do not require closing tags.
     *
     * @var array<string>
     */
    protected const SELF_CLOSING_TAGS = [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr',
    ];

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
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        parent::__construct();

        $tag = strtolower(trim($tag));

        if ($tag === '' || !preg_match('/^[a-z][a-z0-9-]*$/', $tag)) {
            throw new \InvalidArgumentException(
                'Invalid HTML tag name: ' . $tag
            );
        }

        $this->tag = $tag;

        $this->selfClosing = in_array(
            $tag,
            self::SELF_CLOSING_TAGS,
            true
        );
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
     * Converts component to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
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

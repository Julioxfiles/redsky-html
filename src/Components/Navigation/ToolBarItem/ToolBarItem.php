<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\ToolBarItem;

use RedSky\Html\Components\HtmlComponent;

/**
 * Toolbar item component.
 *
 * Represents an individual action or navigation
 * item inside a toolbar.
 *
 * @package RedSky\Html\Components\Navigation\ToolBarItem
 */
class ToolBarItem extends HtmlComponent
{
    /**
     * Creates a new toolbar item.
     *
     * @param string|null $label
     * @param string $tag
     */
    public function __construct(
        ?string $label = null,
        string $tag = 'button'
    ) {
        $tag = strtolower(trim($tag));

        if (!in_array($tag, ['button', 'a'], true)) {
            throw new \InvalidArgumentException(
                'Toolbar item must be a button or anchor.'
            );
        }

        parent::__construct($tag);

        $this->addAttribute(
            'data-redsky-component',
            'toolbar-item'
        );

        $this->addClass('toolbar-item');

        if ($tag === 'button') {
            $this->addAttribute(
                'type',
                'button'
            );
        }

        if ($label !== null) {
            $this->text($label);
        }
    }

    /**
     * Sets item label.
     *
     * @param string $label
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        return $this->text($label);
    }

    /**
     * Sets item URL.
     *
     * Only available for anchor elements.
     *
     * @param string $url
     *
     * @return static
     */
    public function href(
        string $url
    ): static {
        if ($this->tag() !== 'a') {
            throw new \LogicException(
                'The href method requires an anchor toolbar item.'
            );
        }

        return $this->addAttribute(
            'href',
            $url
        );
    }

    /**
     * Sets tooltip text.
     *
     * @param string $text
     *
     * @return static
     */
    public function tooltip(
        string $text
    ): static {
        return $this->title($text);
    }

    /**
     * Sets active state.
     *
     * @param bool $active
     *
     * @return static
     */
    public function active(
        bool $active = true
    ): static {
        if ($active) {
            $this->addClass('active');

            if ($this->tag() === 'button') {
                $this->aria('pressed', 'true');
            } else {
                $this->aria('current', 'page');
            }
        } else {
            $this->removeClass('active');
            $this->removeAttribute('aria-pressed');
            $this->removeAttribute('aria-current');
        }

        return $this;
    }

    /**
     * Sets disabled state.
     *
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(
        bool $disabled = true
    ): static {
        if ($this->tag() === 'button') {
            if ($disabled) {
                $this->addAttribute('disabled', true);
            } else {
                $this->removeAttribute('disabled');
            }
        } else {
            if ($disabled) {
                $this->aria('disabled', 'true');
                $this->addAttribute('tabindex', '-1');
            } else {
                $this->removeAttribute('aria-disabled');
                $this->removeAttribute('tabindex');
            }
        }

        return $this;
    }

    /**
     * Removes a CSS class.
     *
     * @param string $class
     *
     * @return static
     */
    public function removeClass(
        string $class
    ): static {
        $existing = $this->getAttribute('class');

        if (!is_string($existing)) {
            return $this;
        }

        $classes = preg_split(
            '/\s+/',
            trim($existing)
        );

        $classes = array_filter(
            $classes,
            static fn (string $item): bool =>
                $item !== $class
        );

        return $this->class(
            implode(' ', $classes)
        );
    }

    /**
     * Renders toolbar item HTML.
     *
     * @return string
     */
    public function render(): string
    {
        return sprintf(
            '<%s%s>%s%s</%s>',
            $this->tag(),
            $this->renderAttributes(),
            $this->renderChildren(),
            $this->renderContent(),
            $this->tag()
        );
    }
}

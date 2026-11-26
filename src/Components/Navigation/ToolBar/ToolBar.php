<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\ToolBar;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Graphics\Icon\Icon;
use RedSky\Html\Components\Feedback\Tooltip\Tooltip;
use RedSky\Html\Components\Navigation\ToolBarItem\ToolBarItem;

/**
 * Toolbar component.
 *
 * Organizes icon-based actions and navigation links
 * into a reusable toolbar.
 *
 * @package RedSky\Html\Components\Navigation\ToolBar
 */
class ToolBar extends HtmlComponent
{
    /**
     * Creates a new toolbar.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->addAttribute(
            'data-redsky-component',
            'toolbar'
        );

        $this->addClass('toolbar');

        $this->aria('label', 'Toolbar');
    }

    /**
     * Adds an existing toolbar item.
     *
     * @param ToolBarItem $item
     *
     * @return static
     */
    public function addItem(
        ToolBarItem $item
    ): static {
        return $this->addChild($item);
    }

    /**
     * Adds an icon navigation link.
     *
     * @param string $url
     * @param Icon $icon
     * @param string|null $tooltip
     *
     * @return static
     */
    public function addLink(
        string $url,
        Icon $icon,
        ?string $tooltip = null
    ): static {
        if (trim($url) === '') {
            throw new \InvalidArgumentException(
                'Toolbar link URL cannot be empty.'
            );
        }

        $item = (new ToolBarItem(null, 'a'))
            ->href($url);

        if ($tooltip !== null) {
            $item->aria('label', $tooltip);

            $content = (new Tooltip($tooltip))
                ->addChild($icon);

            $item->addChild($content);
        } else {
            $item->addChild($icon);
        }

        return $this->addItem($item);
    }

    /**
     * Adds an icon action button.
     *
     * @param string $onclick
     * @param Icon $icon
     * @param string|null $tooltip
     *
     * @return static
     */
    public function addAction(
        string $onclick,
        Icon $icon,
        ?string $tooltip = null
    ): static {
        if (trim($onclick) === '') {
            throw new \InvalidArgumentException(
                'Toolbar action cannot be empty.'
            );
        }

        $item = new ToolBarItem();

        $item->addAttribute(
            'onclick',
            $onclick
        );

        if ($tooltip !== null) {
            $item->aria('label', $tooltip);

            $content = (new Tooltip($tooltip))
                ->addChild($icon);

            $item->addChild($content);
        } else {
            $item->addChild($icon);
        }

        return $this->addItem($item);
    }

    /**
     * Sets toolbar orientation.
     *
     * @param string $orientation
     *
     * @return static
     */
    public function orientation(
        string $orientation
    ): static {
        $allowed = [
            'horizontal',
            'vertical',
        ];

        if (!in_array($orientation, $allowed, true)) {
            throw new \InvalidArgumentException(
                'Invalid toolbar orientation.'
            );
        }

        return $this->data(
            'toolbar-orientation',
            $orientation
        );
    }
}

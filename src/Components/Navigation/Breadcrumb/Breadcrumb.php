<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation\Breadcrum;

use RedSky\Html\Components\HtmlComponent;


/**
 * Represents a breadcrumb navigation component.
 *
 * Breadcrumb provides a semantic navigation trail that shows the
 * user's current location within an application's page hierarchy.
 *
 * The component is UI-library-agnostic. CSS classes, inline styles,
 * and additional HTML attributes can be supplied through the inherited
 * Component API.
 *
 * @package RedSky\Html\Components\Navigation
 */
class Breadcrumb extends HtmlComponent
{
    /**
     * Breadcrumb HTML tag.
     *
     * @var string
     */
    protected string $tag = 'nav';

    /**
     * Breadcrumb items.
     *
     * Each item contains:
     *
     * - label
     * - optional URL
     *
     * The last item without a URL is considered the current page.
     *
     * @var array<int, array{label: string, url: string|null}>
     */
    protected array $items = [];

    /**
     * Breadcrumb separator.
     *
     * @var string
     */
    protected string $separator = '>';

    /**
     * Creates a new Breadcrumb component.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }

    /**
     * Adds a breadcrumb item.
     *
     * When no URL is provided, the item is considered the current page.
     *
     * @param string $label Item label.
     * @param string|null $url Optional item URL.
     *
     * @return static
     */
    public function item(string $label, ?string $url = null): static
    {
        $this->items[] = [
            'label' => $label,
            'url' => $url,
        ];

        return $this;
    }

    /**
     * Sets the breadcrumb separator.
     *
     * @param string $separator Separator displayed between breadcrumb items.
     *
     * @return static
     */
    public function separator(string $separator): static
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * Returns the current breadcrumb separator.
     *
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * Returns all breadcrumb items.
     *
     * @return array<int, array{label: string, url: string|null}>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Renders the breadcrumb component.
     *
     * The component emits semantic RedSky data attributes describing
     * each breadcrumb item. Separators are marked as aria-hidden so
     * they are ignored by screen readers.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= ' data-redsky-component="breadcrumb"';

        $items = '';

        $lastIndex = count($this->items) - 1;

        foreach ($this->items as $index => $item) {
            $label = htmlspecialchars(
                $item['label'],
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            $itemAttributes = ' data-breadcrumb-item';

            $isCurrent = $index === $lastIndex || $item['url'] === null;

            if ($isCurrent) {
                $itemAttributes .= ' data-breadcrumb-current="true"';
                $itemAttributes .= ' aria-current="page"';

                $items .= sprintf(
                    '<li%s>%s</li>',
                    $itemAttributes,
                    $label
                );
            } else {
                $url = htmlspecialchars(
                    $item['url'],
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $items .= sprintf(
                    '<li%s><a href="%s">%s</a></li>',
                    $itemAttributes,
                    $url,
                    $label
                );
            }

            /*
             * Add the separator after every item except the last one.
             */
            if ($index < $lastIndex) {
                $separator = htmlspecialchars(
                    $this->separator,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $items .= sprintf(
                    '<li data-breadcrumb-separator aria-hidden="true">%s</li>',
                    $separator
                );
            }
        }

        return sprintf(
            '<%s%s><ol>%s</ol></%s>',
            $this->tag,
            $attributes,
            $items,
            $this->tag
        );
    }
}


<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a pagination navigation component.
 *
 * The Pagination component renders a navigation structure containing
 * page links and optional previous and next links.
 *
 * Example:
 *
 * ```php
 * $pagination = new Pagination();
 *
 * $pagination
 *     ->currentPage(2)
 *     ->totalPages(5)
 *     ->items([
 *         ['label' => '1', 'href' => '?page=1'],
 *         ['label' => '2', 'href' => '?page=2', 'active' => true],
 *         ['label' => '3', 'href' => '?page=3'],
 *         ['label' => '4', 'href' => '?page=4'],
 *         ['label' => '5', 'href' => '?page=5'],
 *     ]);
 *
 * echo $pagination;
 * ```
 *
 * @package RedSky\Html\Components\Navigation
 */
class Pagination extends HtmlComponent
{
    protected int $currentPage = 1;

    protected int $totalPages = 1;

    /**
     * @var array<int, array{
     *     label:string,
     *     href:string,
     *     active?:bool,
     *     disabled?:bool
     * }>
     */
    protected array $items = [];

    protected ?string $previousLabel = 'Previous';

    protected ?string $nextLabel = 'Next';

    protected ?string $previousHref = null;

    protected ?string $nextHref = null;

    public function __construct()
    {
        parent::__construct('nav');

        $this->attribute(
            'data-redsky-component',
            'pagination'
        );

        $this->aria('label', 'Pagination');
    }

    public function currentPage(int $page): static
    {
        $this->currentPage = max(1, $page);

        return $this;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function totalPages(int $pages): static
    {
        $this->totalPages = max(1, $pages);

        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function addItem(
        string $label,
        string $href,
        bool $active = false,
        bool $disabled = false
    ): static {
        $this->items[] = [
            'label' => $label,
            'href' => $href,
            'active' => $active,
            'disabled' => $disabled,
        ];

        return $this;
    }

    /**
     * @param array<int, array{
     *     label:string,
     *     href:string,
     *     active?:bool,
     *     disabled?:bool
     * }> $items
     */
    public function items(array $items): static
    {
        $this->items = [];

        foreach ($items as $item) {
            $this->addItem(
                $item['label'],
                $item['href'],
                $item['active'] ?? false,
                $item['disabled'] ?? false
            );
        }

        return $this;
    }

    /**
     * @return array<int, array{
     *     label:string,
     *     href:string,
     *     active?:bool,
     *     disabled?:bool
     * }>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function previous(
        string $label = 'Previous',
        ?string $href = null
    ): static {
        $this->previousLabel = $label;
        $this->previousHref = $href;

        return $this;
    }

    public function next(
        string $label = 'Next',
        ?string $href = null
    ): static {
        $this->nextLabel = $label;
        $this->nextHref = $href;

        return $this;
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $html = sprintf(
            '<nav%s>',
            $attributes
        );

        $html .= '<ul data-pagination-items>';

        if ($this->previousLabel !== null) {
            $html .= $this->renderNavigationItem(
                $this->previousLabel,
                $this->previousHref,
                $this->currentPage <= 1
            );
        }

        foreach ($this->items as $item) {
            $html .= $this->renderPageItem($item);
        }

        if ($this->nextLabel !== null) {
            $html .= $this->renderNavigationItem(
                $this->nextLabel,
                $this->nextHref,
                $this->currentPage >= $this->totalPages
            );
        }

        $html .= '</ul>';

        $html .= $this->renderChildren();

        $html .= '</nav>';

        return $html;
    }

    /**
     * @param array{
     *     label:string,
     *     href:string,
     *     active?:bool,
     *     disabled?:bool
     * } $item
     */
    protected function renderPageItem(array $item): string
    {
        $label = htmlspecialchars(
            $item['label'],
            ENT_QUOTES,
            'UTF-8'
        );

        $href = htmlspecialchars(
            $item['href'],
            ENT_QUOTES,
            'UTF-8'
        );

        $active = $item['active'] ?? false;
        $disabled = $item['disabled'] ?? false;

        $attributes = ' data-pagination-item';

        if ($active) {
            $attributes .= ' data-pagination-active';
            $attributes .= ' aria-current="page"';
        }

        if ($disabled) {
            $attributes .= ' data-pagination-disabled';
            $attributes .= ' aria-disabled="true"';
        }

        if ($disabled) {
            return sprintf(
                '<li%s><span>%s</span></li>',
                $attributes,
                $label
            );
        }

        return sprintf(
            '<li%s><a href="%s">%s</a></li>',
            $attributes,
            $href,
            $label
        );
    }

    protected function renderNavigationItem(
        string $label,
        ?string $href,
        bool $disabled
    ): string {
        $label = htmlspecialchars(
            $label,
            ENT_QUOTES,
            'UTF-8'
        );

        if ($disabled || $href === null) {
            return sprintf(
                '<li data-pagination-navigation data-pagination-disabled aria-disabled="true">'
                . '<span>%s</span>'
                . '</li>',
                $label
            );
        }

        $href = htmlspecialchars(
            $href,
            ENT_QUOTES,
            'UTF-8'
        );

        return sprintf(
            '<li data-pagination-navigation>'
            . '<a href="%s">%s</a>'
            . '</li>',
            $href,
            $label
        );
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\DataGrid;

/**
 * Represents pagination configuration for a DataGrid.
 *
 * DataGridPagination contains only pagination state and
 * presentation configuration. It does not perform database
 * queries or contain repository or ORM logic.
 *
 * Server-side pagination can use the configured page, page
 * size and total values to determine the current state while
 * the actual data retrieval remains the responsibility of
 * the application layer.
 */
class DataGridPagination
{
    /**
     * Current page number.
     */
    protected int $page = 1;

    /**
     * Number of records displayed per page.
     */
    protected int $perPage = 20;

    /**
     * Total number of records.
     */
    protected int $total = 0;

    /**
     * Available page sizes.
     *
     * @var array<int, int>
     */
    protected array $pageList = [10, 20, 50, 100];

    /**
     * Whether pagination is enabled.
     */
    protected bool $enabled = false;

    /**
     * Whether the page-size selector is displayed.
     */
    protected bool $showPageList = true;

    /**
     * Whether the total record count is displayed.
     */
    protected bool $showTotal = true;

    /**
     * Whether first/last navigation controls are displayed.
     */
    protected bool $showFirstLast = true;

    /**
     * Whether previous/next navigation controls are displayed.
     */
    protected bool $showPreviousNext = true;

    /**
     * Whether direct page-number navigation is displayed.
     */
    protected bool $showPageNumbers = true;

    /**
     * Maximum number of page numbers displayed at once.
     */
    protected int $pageNumberCount = 7;

    /**
     * Position of the pagination controls.
     */
    protected string $position = 'bottom';

    /**
     * Creates pagination configuration.
     *
     * @param int $perPage
     */
    public function __construct(int $perPage = 20)
    {
        $this->setPerPage($perPage);
    }

    /**
     * Creates pagination from an associative configuration array.
     *
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): static
    {
        $pagination = new static();

        return $pagination->configure($config);
    }

    /**
     * Configures pagination.
     *
     * @param array<string, mixed> $config
     */
    public function configure(array $config): static
    {
        if (isset($config['page'])) {
            $this->setPage((int) $config['page']);
        }

        if (isset($config['perPage'])) {
            $this->setPerPage((int) $config['perPage']);
        }

        if (isset($config['total'])) {
            $this->setTotal((int) $config['total']);
        }

        if (isset($config['pageList'])) {
            $this->setPageList((array) $config['pageList']);
        }

        if (isset($config['enabled'])) {
            $this->setEnabled((bool) $config['enabled']);
        }

        if (isset($config['showPageList'])) {
            $this->setShowPageList((bool) $config['showPageList']);
        }

        if (isset($config['showTotal'])) {
            $this->setShowTotal((bool) $config['showTotal']);
        }

        if (isset($config['showFirstLast'])) {
            $this->setShowFirstLast((bool) $config['showFirstLast']);
        }

        if (isset($config['showPreviousNext'])) {
            $this->setShowPreviousNext((bool) $config['showPreviousNext']);
        }

        if (isset($config['showPageNumbers'])) {
            $this->setShowPageNumbers((bool) $config['showPageNumbers']);
        }

        if (isset($config['pageNumberCount'])) {
            $this->setPageNumberCount((int) $config['pageNumberCount']);
        }

        if (isset($config['position'])) {
            $this->setPosition((string) $config['position']);
        }

        return $this;
    }

    /**
     * Returns the current page.
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Sets the current page.
     */
    public function setPage(int $page): static
    {
        $this->page = max(1, $page);

        $this->normalizePage();

        return $this;
    }

    /**
     * Returns the number of records per page.
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * Sets the number of records per page.
     */
    public function setPerPage(int $perPage): static
    {
        if ($perPage < 1) {
            throw new \InvalidArgumentException(
                'The number of records per page must be greater than zero.'
            );
        }

        $this->perPage = $perPage;

        $this->normalizePage();

        return $this;
    }

    /**
     * Returns the total number of records.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Sets the total number of records.
     */
    public function setTotal(int $total): static
    {
        $this->total = max(0, $total);

        $this->normalizePage();

        return $this;
    }

    /**
     * Returns the configured page sizes.
     *
     * @return array<int, int>
     */
    public function getPageList(): array
    {
        return $this->pageList;
    }

    /**
     * Sets the available page sizes.
     *
     * @param array<int, int> $pageList
     */
    public function setPageList(array $pageList): static
    {
        $normalized = [];

        foreach ($pageList as $size) {
            $size = (int) $size;

            if ($size > 0) {
                $normalized[] = $size;
            }
        }

        $normalized = array_values(
            array_unique($normalized, SORT_NUMERIC)
        );

        sort($normalized, SORT_NUMERIC);

        if ($normalized === []) {
            throw new \InvalidArgumentException(
                'The pagination page list cannot be empty.'
            );
        }

        $this->pageList = $normalized;

        return $this;
    }

    /**
     * Adds a page size to the available page-size list.
     */
    public function addPageSize(int $size): static
    {
        if ($size < 1) {
            throw new \InvalidArgumentException(
                'The page size must be greater than zero.'
            );
        }

        $this->pageList[] = $size;

        $this->pageList = array_values(
            array_unique($this->pageList, SORT_NUMERIC)
        );

        sort($this->pageList, SORT_NUMERIC);

        return $this;
    }

    /**
     * Removes a page size from the available page-size list.
     */
    public function removePageSize(int $size): static
    {
        $this->pageList = array_values(
            array_filter(
                $this->pageList,
                static fn (int $value): bool => $value !== $size
            )
        );

        if ($this->pageList === []) {
            throw new \InvalidArgumentException(
                'The pagination page list cannot be empty.'
            );
        }

        return $this;
    }

    /**
     * Returns whether pagination is enabled.
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Enables or disables pagination.
     */
    public function setEnabled(bool $enabled = true): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Returns whether the page-size selector is displayed.
     */
    public function getShowPageList(): bool
    {
        return $this->showPageList;
    }

    /**
     * Configures visibility of the page-size selector.
     */
    public function setShowPageList(bool $show = true): static
    {
        $this->showPageList = $show;

        return $this;
    }

    /**
     * Returns whether the total record count is displayed.
     */
    public function getShowTotal(): bool
    {
        return $this->showTotal;
    }

    /**
     * Configures visibility of the total record count.
     */
    public function setShowTotal(bool $show = true): static
    {
        $this->showTotal = $show;

        return $this;
    }

    /**
     * Returns whether first/last controls are displayed.
     */
    public function getShowFirstLast(): bool
    {
        return $this->showFirstLast;
    }

    /**
     * Configures first/last navigation controls.
     */
    public function setShowFirstLast(bool $show = true): static
    {
        $this->showFirstLast = $show;

        return $this;
    }

    /**
     * Returns whether previous/next controls are displayed.
     */
    public function getShowPreviousNext(): bool
    {
        return $this->showPreviousNext;
    }

    /**
     * Configures previous/next navigation controls.
     */
    public function setShowPreviousNext(bool $show = true): static
    {
        $this->showPreviousNext = $show;

        return $this;
    }

    /**
     * Returns whether page numbers are displayed.
     */
    public function getShowPageNumbers(): bool
    {
        return $this->showPageNumbers;
    }

    /**
     * Configures page-number navigation.
     */
    public function setShowPageNumbers(bool $show = true): static
    {
        $this->showPageNumbers = $show;

        return $this;
    }

    /**
     * Returns the maximum number of visible page numbers.
     */
    public function getPageNumberCount(): int
    {
        return $this->pageNumberCount;
    }

    /**
     * Sets the maximum number of visible page numbers.
     */
    public function setPageNumberCount(int $count): static
    {
        if ($count < 1) {
            throw new \InvalidArgumentException(
                'The page number count must be greater than zero.'
            );
        }

        $this->pageNumberCount = $count;

        return $this;
    }

    /**
     * Returns the pagination position.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Sets the pagination position.
     *
     * Supported positions are top, bottom and both.
     */
    public function setPosition(string $position): static
    {
        $position = strtolower(trim($position));

        $allowed = [
            'top',
            'bottom',
            'both',
        ];

        if (!in_array($position, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported pagination position "%s".',
                    $position
                )
            );
        }

        $this->position = $position;

        return $this;
    }

    /**
     * Returns the total number of pages.
     */
    public function getPages(): int
    {
        if ($this->total === 0) {
            return 0;
        }

        return (int) ceil(
            $this->total / $this->perPage
        );
    }

    /**
     * Returns whether a previous page exists.
     */
    public function hasPrevious(): bool
    {
        return $this->page > 1;
    }

    /**
     * Returns whether a next page exists.
     */
    public function hasNext(): bool
    {
        return $this->page < $this->getPages();
    }

    /**
     * Returns the offset represented by the current page.
     *
     * This is only pagination state. It does not perform any
     * database or data-source operation.
     */
    public function getOffset(): int
    {
        return ($this->page - 1) * $this->perPage;
    }

    /**
     * Moves to the first page.
     */
    public function first(): static
    {
        $this->page = 1;

        return $this;
    }

    /**
     * Moves to the previous page.
     */
    public function previous(): static
    {
        if ($this->hasPrevious()) {
            $this->page--;
        }

        return $this;
    }

    /**
     * Moves to the next page.
     */
    public function next(): static
    {
        if ($this->hasNext()) {
            $this->page++;
        }

        return $this;
    }

    /**
     * Moves to the last page.
     */
    public function last(): static
    {
        $pages = $this->getPages();

        $this->page = max(1, $pages);

        return $this;
    }

    /**
     * Returns the first record number displayed on the current page.
     */
    public function getFirstRecord(): int
    {
        if ($this->total === 0) {
            return 0;
        }

        return $this->getOffset() + 1;
    }

    /**
     * Returns the last record number displayed on the current page.
     */
    public function getLastRecord(): int
    {
        if ($this->total === 0) {
            return 0;
        }

        return min(
            $this->getOffset() + $this->perPage,
            $this->total
        );
    }

    /**
     * Returns the range of page numbers that should be displayed.
     *
     * @return array<int, int>
     */
    public function getVisiblePages(): array
    {
        $pages = $this->getPages();

        if ($pages === 0) {
            return [];
        }

        if ($pages <= $this->pageNumberCount) {
            return range(1, $pages);
        }

        $half = intdiv($this->pageNumberCount, 2);

        $start = max(1, $this->page - $half);
        $end = min(
            $pages,
            $start + $this->pageNumberCount - 1
        );

        if (($end - $start + 1) < $this->pageNumberCount) {
            $start = max(
                1,
                $end - $this->pageNumberCount + 1
            );
        }

        return range($start, $end);
    }

    /**
     * Normalizes the current page after a pagination state change.
     */
    protected function normalizePage(): void
    {
        $pages = $this->getPages();

        if ($pages === 0) {
            $this->page = 1;

            return;
        }

        $this->page = min(
            max(1, $this->page),
            $pages
        );
    }

    /**
     * Returns a serializable pagination configuration.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'enabled' => $this->enabled,
            'page' => $this->page,
            'perPage' => $this->perPage,
            'total' => $this->total,
            'pages' => $this->getPages(),
            'pageList' => $this->pageList,
            'showPageList' => $this->showPageList,
            'showTotal' => $this->showTotal,
            'showFirstLast' => $this->showFirstLast,
            'showPreviousNext' => $this->showPreviousNext,
            'showPageNumbers' => $this->showPageNumbers,
            'pageNumberCount' => $this->pageNumberCount,
            'position' => $this->position,
            'firstRecord' => $this->getFirstRecord(),
            'lastRecord' => $this->getLastRecord(),
        ];
    }
}
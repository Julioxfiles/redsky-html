<?php

declare(strict_types=1);

namespace RedSky\Html\Components\DataGrid;

use RedSky\Html\Components\HtmlComponent;

/**
 * Provides configuration and state management for the DataGrid component.
 *
 * This class contains the fluent configuration API and internal state
 * used by DataGrid. Rendering behavior remains in the DataGrid class.
 *
 * The class is UI-library agnostic and contains no database, SQL,
 * ORM, repository, authentication, or authorization logic.
 */
abstract class DataGridConfiguration extends HtmlComponent
{
    /**
     * DataGrid columns.
     *
     * @var array<int, DataGridColumn>
     */
    protected array $columns = [];

    /**
     * DataGrid records.
     *
     * @var array<int, mixed>
     */
    protected array $data = [];

    /**
     * Optional table caption.
     */
    protected ?string $caption = null;

    /**
     * Pagination enabled.
     */
    protected bool $pagination = false;

    /**
     * Current page.
     */
    protected int $page = 1;

    /**
     * Records per page.
     */
    protected int $perPage = 20;

    /**
     * Total record count.
     */
    protected ?int $total = null;

    /**
     * Available page sizes.
     *
     * @var array<int, int>
     */
    protected array $pageList = [10, 20, 50, 100];

    /**
     * Global sorting enabled.
     */
    protected bool $sortable = true;

    /**
     * Primary sort field.
     */
    protected ?string $sortField = null;

    /**
     * Primary sort direction.
     */
    protected string $sortDirection = 'asc';

    /**
     * Multiple sorting definitions.
     *
     * @var array<int, array{field:string,direction:string}>
     */
    protected array $sorts = [];

    /**
     * Row selection enabled.
     */
    protected bool $selectable = false;

    /**
     * Selection mode.
     */
    protected string $selectionMode = 'single';

    /**
     * Display selection checkboxes.
     */
    protected bool $checkable = false;

    /**
     * Enable select-all.
     */
    protected bool $selectAll = false;

    /**
     * Selecting a row also checks it.
     */
    protected bool $checkOnSelect = true;

    /**
     * Checking a row also selects it.
     */
    protected bool $selectOnCheck = true;

    /**
     * Highlight rows on hover.
     */
    protected bool $rowHover = false;

    /**
     * Row expansion enabled.
     */
    protected bool $expandable = false;

    /**
     * Field used to identify a row.
     */
    protected ?string $idField = null;

    /**
     * Row expansion callback.
     */
    protected $rowExpansion = null;

    /**
     * Editing enabled.
     */
    protected bool $editable = false;

    /**
     * Editing mode.
     */
    protected string $editMode = 'cell';

    /**
     * Automatically save edits.
     */
    protected bool $autoSave = false;

    /**
     * Edit save endpoint.
     */
    protected ?string $saveUrl = null;

    /**
     * Edit save HTTP method.
     */
    protected string $saveMethod = 'POST';

    /**
     * Enable edit validation.
     */
    protected bool $validateEdits = true;

    /**
     * Global actions.
     *
     * @var array<int, mixed>
     */
    protected array $globalActions = [];

    /**
     * Row actions.
     *
     * @var array<int, mixed>
     */
    protected array $rowActions = [];

    /**
     * AJAX enabled.
     */
    protected bool $ajax = false;

    /**
     * AJAX endpoint.
     */
    protected ?string $ajaxUrl = null;

    /**
     * AJAX HTTP method.
     */
    protected string $ajaxMethod = 'GET';

    /**
     * AJAX parameters.
     *
     * @var array<string, mixed>
     */
    protected array $ajaxParams = [];

    /**
     * Explicit AJAX enabled state.
     */
    protected bool $ajaxEnabled = false;

    /**
     * Loading state.
     */
    protected bool $loading = false;

    /**
     * Loading message.
     */
    protected string $loadingMessage = 'Loading...';

    /**
     * Empty-state message.
     */
    protected string $emptyMessage = 'No records found.';

    /**
     * Error-state message.
     */
    protected ?string $errorMessage = null;

    /**
     * Display totals.
     */
    protected bool $showTotals = false;

    /**
     * Totals scope.
     */
    protected string $totalsScope = 'grand';

    /**
     * Total definitions.
     *
     * @var array<string, string|callable>
     */
    protected array $totals = [];

    /**
     * Calculated column callbacks.
     *
     * @var array<string, callable>
     */
    protected array $calculations = [];

    /**
     * Field formatter callbacks.
     *
     * @var array<string, callable>
     */
    protected array $formatters = [];

    /**
     * Field renderer callbacks.
     *
     * @var array<string, callable>
     */
    protected array $renderers = [];

    /**
     * Horizontal scrolling enabled.
     */
    protected bool $horizontalScroll = false;

    /**
     * Vertical scrolling enabled.
     */
    protected bool $verticalScroll = false;

    /**
     * Vertical scroll height.
     */
    protected ?string $scrollHeight = null;

    /**
     * Horizontal scroll width.
     */
    protected ?string $scrollWidth = null;

    /**
     * Automatic column sizing.
     */
    protected bool $autoSizeColumns = false;

    /**
     * Column resizing.
     */
    protected bool $resizableColumns = false;

    /**
     * Column reordering.
     */
    protected bool $reorderableColumns = false;

    /**
     * Column hiding.
     */
    protected bool $hideableColumns = false;

    /**
     * Frozen columns enabled.
     */
    protected bool $frozenColumns = false;

    /**
     * Number of frozen columns.
     */
    protected int $frozenColumnCount = 0;

    /**
     * Frozen rows enabled.
     */
    protected bool $frozenRows = false;

    /**
     * Number of frozen rows.
     */
    protected int $frozenRowCount = 0;

    /**
     * Grouped or multi-level headers.
     *
     * @var array<int, array<string, mixed>>
     */
    protected array $headerGroups = [];

    /**
     * Row class callback.
     */
    protected $rowClass = null;

    /**
     * Row attributes callback.
     */
    protected $rowAttributes = null;

    /**
     * Row formatter callback.
     */
    protected $rowFormatter = null;

    /**
     * Before-edit callback.
     */
    protected $beforeEdit = null;

    /**
     * After-edit callback.
     */
    protected $afterEdit = null;

    /**
     * After-save callback.
     */
    protected $afterSave = null;

    /**
     * Validation-error callback.
     */
    protected $onValidationError = null;

    /**
     * AJAX load-success callback.
     */
    protected $onLoadSuccess = null;

    /**
     * AJAX load-error callback.
     */
    protected $onLoadError = null;

    /**
     * Row selection callback.
     */
    protected $onSelect = null;

    /**
     * Row unselection callback.
     */
    protected $onUnselect = null;

    /**
     * Row expansion callback.
     */
    protected $onExpand = null;

    /**
     * Row collapse callback.
     */
    protected $onCollapse = null;

    /**
     * Sorting callback.
     */
    protected $onSort = null;

    /**
     * Column resize callback.
     */
    protected $onColumnResize = null;

    /**
     * Column reorder callback.
     */
    protected $onColumnReorder = null;

    /**
     * Refresh callback.
     */
    protected $onRefresh = null;

    /**
     * Persistent preferences enabled.
     */
    protected bool $persistPreferences = false;

    /**
     * Preference persistence key.
     */
    protected ?string $persistenceKey = null;

    /**
     * Preference persistence endpoint.
     */
    protected ?string $persistenceUrl = null;

    /**
     * Preference persistence HTTP method.
     */
    protected string $persistenceMethod = 'POST';

    /**
     * Persist column order.
     */
    protected bool $persistColumnOrder = true;

    /**
     * Persist column widths.
     */
    protected bool $persistColumnWidths = true;

    /**
     * Persist visible columns.
     */
    protected bool $persistVisibleColumns = true;

    /**
     * Persist sorting.
     */
    protected bool $persistSorting = true;

    /**
     * Persist page size.
     */
    protected bool $persistPageSize = true;

    /**
     * Persistence configuration.
     *
     * @var array<string, mixed>
     */
    protected array $persistence = [];

    /**
     * Toolbar enabled.
     */
    protected bool $toolbar = false;

    /**
     * Display row numbers.
     */
    protected bool $rowNumbers = false;

    /**
     * Striped rows.
     */
    protected bool $striped = false;

    /**
     * Prevent cell wrapping.
     */
    protected bool $nowrap = false;

    /**
     * Creates the DataGrid configuration.
     *
     * @param array<string, mixed> $config Configuration.
     */
    public function __construct(array $config = [])
    {
        parent::__construct('div');

        $this->applyConfig($config);
    }

    /**
     * Configures the DataGrid.
     *
     * @param array<string, mixed> $config Configuration.
     *
     * @return static
     */
    public function configure(array $config): static
    {
        $this->applyConfig($config);

        return $this;
    }

    /**
     * Adds a DataGrid column.
     *
     * @param DataGridColumn|string $column Column instance or field name.
     * @param string|null $label Optional column label.
     *
     * @return static
     */
    public function addColumn(
        DataGridColumn|string $column,
        ?string $label = null
    ): static {
        if (is_string($column)) {
            $column = new DataGridColumn($column, $label);
        }

        $this->columns[] = $column;

        return $this;
    }

    /**
     * Adds a column by field name.
     *
     * @return static
     */
    public function column(
        string $field,
        ?string $label = null
    ): static {
        return $this->addColumn(
            new DataGridColumn($field, $label)
        );
    }

    /**
     * Sets the columns.
     *
     * @param array<int, DataGridColumn|string|array<string, mixed>> $columns
     *
     * @return static
     */
    public function columns(array $columns): static
    {
        $this->columns = [];

        foreach ($columns as $column) {
            if ($column instanceof DataGridColumn) {
                $this->columns[] = $column;
                continue;
            }

            if (is_string($column)) {
                $this->columns[] = new DataGridColumn($column);
                continue;
            }

            if (is_array($column)) {
                $this->columns[] = DataGridColumn::fromArray($column);
            }
        }

        return $this;
    }

    /**
     * Returns the configured columns.
     *
     * @return array<int, DataGridColumn>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Returns a column by field.
     */
    public function getColumn(string $field): ?DataGridColumn
    {
        foreach ($this->columns as $column) {
            if ($column->getField() === $field) {
                return $column;
            }
        }

        return null;
    }

    /**
     * Determines whether a column exists.
     */
    public function hasColumn(string $field): bool
    {
        return $this->getColumn($field) !== null;
    }

    /**
     * Removes a column.
     *
     * @return static
     */
    public function removeColumn(string $field): static
    {
        $this->columns = array_values(
            array_filter(
                $this->columns,
                static fn (DataGridColumn $column): bool =>
                    $column->getField() !== $field
            )
        );

        return $this;
    }

    /**
     * Removes all columns.
     *
     * @return static
     */
    public function clearColumns(): static
    {
        $this->columns = [];

        return $this;
    }

    /**
     * Sets the grid data.
     *
     * @param array<int, mixed> $data
     *
     * @return static
     */
    public function gridData(array $data): static
    {
        $this->data = array_values($data);

        return $this;
    }
    /**
     * Returns the grid data.
     *
     * @return array<int, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Adds a row.
     *
     * @return static
     */
    public function addRow(mixed $record): static
    {
        $this->data[] = $record;

        return $this;
    }

    /**
     * Clears all rows.
     *
     * @return static
     */
    public function clearData(): static
    {
        $this->data = [];

        return $this;
    }

    /**
     * Sets the caption.
     *
     * @return static
     */
    public function caption(?string $caption): static
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Enables or disables pagination.
     *
     * @return static
     */
    public function pagination(bool $enabled = true): static
    {
        $this->pagination = $enabled;

        return $this;
    }

    /**
     * Sets the current page.
     *
     * @return static
     */
    public function page(int $page): static
    {
        if ($page < 1) {
            throw new \InvalidArgumentException(
                'Page must be greater than zero.'
            );
        }

        $this->page = $page;

        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Sets the page size.
     *
     * @return static
     */
    public function perPage(int $perPage): static
    {
        if ($perPage < 1) {
            throw new \InvalidArgumentException(
                'Per-page value must be greater than zero.'
            );
        }

        $this->perPage = $perPage;

        return $this;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * Sets available page sizes.
     *
     * @param array<int, int> $pageList
     *
     * @return static
     */
    public function pageList(array $pageList): static
    {
        if ($pageList === []) {
            throw new \InvalidArgumentException(
                'Page list cannot be empty.'
            );
        }

        foreach ($pageList as $size) {
            if (!is_int($size) || $size < 1) {
                throw new \InvalidArgumentException(
                    'Page sizes must be positive integers.'
                );
            }
        }

        $this->pageList = array_values(
            array_unique($pageList)
        );

        sort($this->pageList);

        return $this;
    }

    /**
     * @return array<int, int>
     */
    public function getPageList(): array
    {
        return $this->pageList;
    }

    /**
     * Sets the total record count.
     *
     * @return static
     */
    public function total(?int $total): static
    {
        if ($total !== null && $total < 0) {
            throw new \InvalidArgumentException(
                'Total cannot be negative.'
            );
        }

        $this->total = $total;

        return $this;
    }

    /**
     * Enables or disables sorting.
     *
     * @return static
     */
    public function sortable(bool $enabled = true): static
    {
        $this->sortable = $enabled;

        return $this;
    }

    /**
     * Sets the primary sort.
     *
     * @return static
     */
    public function sort(
        string $field,
        string $direction = 'asc'
    ): static {
        $direction = strtolower($direction);

        if (!in_array($direction, ['asc', 'desc'], true)) {
            throw new \InvalidArgumentException(
                'Sort direction must be asc or desc.'
            );
        }

        $this->sortField = $field;
        $this->sortDirection = $direction;

        $this->sorts = [
            [
                'field' => $field,
                'direction' => $direction,
            ],
        ];

        return $this;
    }

    /**
     * Adds a sorting definition.
     *
     * @return static
     */
    public function addSort(
        string $field,
        string $direction = 'asc'
    ): static {
        $direction = strtolower($direction);

        if (!in_array($direction, ['asc', 'desc'], true)) {
            throw new \InvalidArgumentException(
                'Sort direction must be asc or desc.'
            );
        }

        $this->sorts[] = [
            'field' => $field,
            'direction' => $direction,
        ];

        if ($this->sortField === null) {
            $this->sortField = $field;
            $this->sortDirection = $direction;
        }

        return $this;
    }

    /**
     * Clears all sorting definitions.
     *
     * @return static
     */
    public function clearSorts(): static
    {
        $this->sortField = null;
        $this->sortDirection = 'asc';
        $this->sorts = [];

        return $this;
    }

    /**
     * @return array<int, array{field:string,direction:string}>
     */
    public function getSorts(): array
    {
        return $this->sorts;
    }

    /**
     * Enables or disables selection.
     *
     * @return static
     */
    public function selectable(bool $enabled = true): static
    {
        $this->selectable = $enabled;

        return $this;
    }

    /**
     * Sets selection mode.
     *
     * @return static
     */
    public function selectionMode(string $mode): static
    {
        $mode = strtolower($mode);

        if (!in_array($mode, ['single', 'multiple'], true)) {
            throw new \InvalidArgumentException(
                'Selection mode must be single or multiple.'
            );
        }

        $this->selectionMode = $mode;

        return $this;
    }

    public function checkable(bool $enabled = true): static
    {
        $this->checkable = $enabled;

        return $this;
    }

    public function selectAll(bool $enabled = true): static
    {
        $this->selectAll = $enabled;

        return $this;
    }

    public function checkOnSelect(bool $enabled = true): static
    {
        $this->checkOnSelect = $enabled;

        return $this;
    }

    public function selectOnCheck(bool $enabled = true): static
    {
        $this->selectOnCheck = $enabled;

        return $this;
    }

    public function rowHover(bool $enabled = true): static
    {
        $this->rowHover = $enabled;

        return $this;
    }

    public function expandable(bool $enabled = true): static
    {
        $this->expandable = $enabled;

        return $this;
    }

    public function idField(?string $field): static
    {
        $this->idField = $field;

        return $this;
    }

    public function rowExpansion(?callable $callback): static
    {
        $this->rowExpansion = $callback;

        return $this;
    }

    public function editable(bool $enabled = true): static
    {
        $this->editable = $enabled;

        return $this;
    }

    public function editMode(string $mode): static
    {
        $mode = strtolower($mode);

        if (!in_array($mode, ['cell', 'row'], true)) {
            throw new \InvalidArgumentException(
                'Edit mode must be cell or row.'
            );
        }

        $this->editMode = $mode;

        return $this;
    }

    public function autoSave(bool $enabled = true): static
    {
        $this->autoSave = $enabled;

        return $this;
    }

    public function saveUrl(?string $url): static
    {
        $this->saveUrl = $url;

        return $this;
    }

    public function saveMethod(string $method): static
    {
        $this->saveMethod = strtoupper($method);

        return $this;
    }

    public function validateEdits(bool $enabled = true): static
    {
        $this->validateEdits = $enabled;

        return $this;
    }

    /**
     * Adds a global action.
     *
     * @return static
     */
    public function addAction(mixed $action): static
    {
        $this->globalActions[] = $action;

        return $this;
    }

    /**
     * Sets global actions.
     *
     * @param array<int, mixed> $actions
     *
     * @return static
     */
    public function actions(array $actions): static
    {
        $this->globalActions = $actions;

        return $this;
    }

    /**
     * Adds a row action.
     *
     * @return static
     */
    public function addRowAction(mixed $action): static
    {
        $this->rowActions[] = $action;

        return $this;
    }

    /**
     * Sets row actions.
     *
     * @param array<int, mixed> $actions
     *
     * @return static
     */
    public function rowActions(array $actions): static
    {
        $this->rowActions = $actions;

        return $this;
    }

    /**
     * Configures AJAX loading.
     *
     * @param array<string, mixed> $params
     *
     * @return static
     */
    public function ajax(
        string $url,
        string $method = 'GET',
        array $params = []
    ): static {
        $this->ajax = true;
        $this->ajaxEnabled = true;
        $this->ajaxUrl = $url;
        $this->ajaxMethod = strtoupper($method);
        $this->ajaxParams = $params;

        return $this;
    }

    /**
     * Disables AJAX loading.
     *
     * @return static
     */
    public function disableAjax(): static
    {
        $this->ajax = false;
        $this->ajaxEnabled = false;

        return $this;
    }

    /**
     * Sets AJAX parameters.
     *
     * @param array<string, mixed> $params
     *
     * @return static
     */
    public function ajaxParams(array $params): static
    {
        $this->ajaxParams = $params;

        return $this;
    }

    /**
     * Returns AJAX configuration.
     *
     * @return array<string, mixed>
     */
    public function getAjax(): array
    {
        return [
            'enabled' => $this->ajaxEnabled,
            'url' => $this->ajaxUrl,
            'method' => $this->ajaxMethod,
            'params' => $this->ajaxParams,
        ];
    }

    /**
     * Configures loading state.
     *
     * @return static
     */
    public function loading(
        bool $enabled = true,
        string $message = 'Loading...'
    ): static {
        $this->loading = $enabled;
        $this->loadingMessage = $message;

        return $this;
    }

    public function emptyMessage(string $message): static
    {
        $this->emptyMessage = $message;

        return $this;
    }

    public function error(?string $message): static
    {
        $this->errorMessage = $message;

        return $this;
    }

    public function showTotals(bool $enabled = true): static
    {
        $this->showTotals = $enabled;

        return $this;
    }

    public function totalsScope(string $scope): static
    {
        $scope = strtolower($scope);

        if (!in_array($scope, ['page', 'grand'], true)) {
            throw new \InvalidArgumentException(
                'Totals scope must be page or grand.'
            );
        }

        $this->totalsScope = $scope;

        return $this;
    }

    /**
     * Adds a total definition.
     *
     * @param string|callable $operation
     *
     * @return static
     */
    public function totalColumn(
        string $field,
        string|callable $operation
    ): static {
        if (is_string($operation)) {
            $operation = strtoupper($operation);

            if (!in_array(
                $operation,
                ['SUM', 'COUNT', 'AVG', 'MIN', 'MAX'],
                true
            )) {
                throw new \InvalidArgumentException(
                    'Invalid total operation.'
                );
            }
        }

        $this->totals[$field] = $operation;
        $this->showTotals = true;

        return $this;
    }

    /**
     * Sets total definitions.
     *
     * @param array<string, string|callable> $totals
     *
     * @return static
     */
    public function totals(array $totals): static
    {
        $this->totals = [];

        foreach ($totals as $field => $operation) {
            $this->totalColumn(
                (string) $field,
                $operation
            );
        }

        return $this;
    }

    /**
     * Returns total definitions.
     *
     * @return array<string, string|callable>
     */
    public function getTotals(): array
    {
        return $this->totals;
    }

    /**
     * Configures a calculated column.
     *
     * @return static
     */
    public function calculatedColumn(
        string $field,
        callable $calculator
    ): static {
        $this->calculations[$field] = $calculator;

        return $this;
    }

    /**
     * Adds a formatter for a field.
     *
     * @return static
     */
    public function formatter(
        string $field,
        callable $formatter
    ): static {
        $this->formatters[$field] = $formatter;

        return $this;
    }

    /**
     * Adds a renderer for a field.
     *
     * @return static
     */
    public function renderer(
        string $field,
        callable $renderer
    ): static {
        $this->renderers[$field] = $renderer;

        return $this;
    }

    public function horizontalScroll(bool $enabled = true): static
    {
        $this->horizontalScroll = $enabled;

        return $this;
    }

    public function verticalScroll(
        bool $enabled = true,
        ?string $height = null
    ): static {
        $this->verticalScroll = $enabled;
        $this->scrollHeight = $height;

        return $this;
    }

    public function scrollWidth(?string $width): static
    {
        $this->scrollWidth = $width;

        return $this;
    }

    public function autoSizeColumns(bool $enabled = true): static
    {
        $this->autoSizeColumns = $enabled;

        return $this;
    }

    public function resizableColumns(bool $enabled = true): static
    {
        $this->resizableColumns = $enabled;

        return $this;
    }

    public function reorderableColumns(bool $enabled = true): static
    {
        $this->reorderableColumns = $enabled;

        return $this;
    }

    public function hideableColumns(bool $enabled = true): static
    {
        $this->hideableColumns = $enabled;

        return $this;
    }

    public function frozenColumns(int $count = 1): static
    {
        $this->frozenColumns = $count > 0;
        $this->frozenColumnCount = max(0, $count);

        return $this;
    }

    public function frozenRows(int $count = 1): static
    {
        $this->frozenRows = $count > 0;
        $this->frozenRowCount = max(0, $count);

        return $this;
    }

    /**
     * @param array<int, array<string, mixed>> $groups
     *
     * @return static
     */
    public function headerGroups(array $groups): static
    {
        $this->headerGroups = array_values($groups);

        return $this;
    }

    public function rowClass(?callable $callback): static
    {
        $this->rowClass = $callback;

        return $this;
    }

    public function rowAttributes(?callable $callback): static
    {
        $this->rowAttributes = $callback;

        return $this;
    }

    public function rowFormatter(?callable $callback): static
    {
        $this->rowFormatter = $callback;

        return $this;
    }

    public function beforeEdit(?callable $callback): static
    {
        $this->beforeEdit = $callback;

        return $this;
    }

    public function afterEdit(?callable $callback): static
    {
        $this->afterEdit = $callback;

        return $this;
    }

    public function afterSave(?callable $callback): static
    {
        $this->afterSave = $callback;

        return $this;
    }

    public function onValidationError(?callable $callback): static
    {
        $this->onValidationError = $callback;

        return $this;
    }

    public function onLoadSuccess(?callable $callback): static
    {
        $this->onLoadSuccess = $callback;

        return $this;
    }

    public function onLoadError(?callable $callback): static
    {
        $this->onLoadError = $callback;

        return $this;
    }

    public function onSelect(?callable $callback): static
    {
        $this->onSelect = $callback;

        return $this;
    }

    public function onUnselect(?callable $callback): static
    {
        $this->onUnselect = $callback;

        return $this;
    }

    public function onExpand(?callable $callback): static
    {
        $this->onExpand = $callback;

        return $this;
    }

    public function onCollapse(?callable $callback): static
    {
        $this->onCollapse = $callback;

        return $this;
    }

    public function onSort(?callable $callback): static
    {
        $this->onSort = $callback;

        return $this;
    }

    public function onColumnResize(?callable $callback): static
    {
        $this->onColumnResize = $callback;

        return $this;
    }

    public function onColumnReorder(?callable $callback): static
    {
        $this->onColumnReorder = $callback;

        return $this;
    }

    public function onRefresh(?callable $callback): static
    {
        $this->onRefresh = $callback;

        return $this;
    }

    public function persistPreferences(
        bool $enabled = true
    ): static {
        $this->persistPreferences = $enabled;

        return $this;
    }

    public function persistenceKey(?string $key): static
    {
        $this->persistenceKey = $key;

        return $this;
    }

    public function persistenceUrl(?string $url): static
    {
        $this->persistenceUrl = $url;

        return $this;
    }

    public function persistenceMethod(string $method): static
    {
        $this->persistenceMethod = strtoupper($method);

        return $this;
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return static
     */
    public function persistenceOptions(array $options): static
    {
        if (array_key_exists('columnOrder', $options)) {
            $this->persistColumnOrder = (bool) $options['columnOrder'];
        }

        if (array_key_exists('columnWidths', $options)) {
            $this->persistColumnWidths = (bool) $options['columnWidths'];
        }

        if (array_key_exists('visibleColumns', $options)) {
            $this->persistVisibleColumns = (bool) $options['visibleColumns'];
        }

        if (array_key_exists('sorting', $options)) {
            $this->persistSorting = (bool) $options['sorting'];
        }

        if (array_key_exists('pageSize', $options)) {
            $this->persistPageSize = (bool) $options['pageSize'];
        }

        $this->persistence = $options;

        return $this;
    }

    public function toolbar(bool $enabled = true): static
    {
        $this->toolbar = $enabled;

        return $this;
    }

    public function rowNumbers(bool $enabled = true): static
    {
        $this->rowNumbers = $enabled;

        return $this;
    }

    public function striped(bool $enabled = true): static
    {
        $this->striped = $enabled;

        return $this;
    }

    public function nowrap(bool $enabled = true): static
    {
        $this->nowrap = $enabled;

        return $this;
    }

    /**
     * Applies an associative configuration array.
     *
     * @param array<string, mixed> $config
     */
    protected function applyConfig(array $config): void
    {
        if (isset($config['columns']) && is_array($config['columns'])) {
            $this->columns($config['columns']);
        }

        if (isset($config['data']) && is_array($config['data'])) {
            $this->gridData($config['data']);
        }

        if (array_key_exists('caption', $config)) {
            $this->caption($config['caption']);
        }

        if (isset($config['pagination'])) {
            $this->pagination((bool) $config['pagination']);
        }

        if (isset($config['page'])) {
            $this->page((int) $config['page']);
        }

        if (isset($config['perPage'])) {
            $this->perPage((int) $config['perPage']);
        }

        if (
            isset($config['pageList']) &&
            is_array($config['pageList'])
        ) {
            $this->pageList($config['pageList']);
        }

        if (array_key_exists('total', $config)) {
            $this->total(
                $config['total'] !== null
                    ? (int) $config['total']
                    : null
            );
        }

        if (isset($config['sortable'])) {
            $this->sortable((bool) $config['sortable']);
        }

        if (
            isset($config['sort']) &&
            is_array($config['sort'])
        ) {
            $this->sort(
                (string) ($config['sort']['field'] ?? ''),
                (string) ($config['sort']['direction'] ?? 'asc')
            );
        }

        if (isset($config['selectable'])) {
            $this->selectable((bool) $config['selectable']);
        }

        if (isset($config['selectionMode'])) {
            $this->selectionMode(
                (string) $config['selectionMode']
            );
        }

        if (isset($config['checkable'])) {
            $this->checkable((bool) $config['checkable']);
        }

        if (isset($config['selectAll'])) {
            $this->selectAll((bool) $config['selectAll']);
        }

        if (isset($config['checkOnSelect'])) {
            $this->checkOnSelect(
                (bool) $config['checkOnSelect']
            );
        }

        if (isset($config['selectOnCheck'])) {
            $this->selectOnCheck(
                (bool) $config['selectOnCheck']
            );
        }

        if (isset($config['rowHover'])) {
            $this->rowHover((bool) $config['rowHover']);
        }

        if (isset($config['expandable'])) {
            $this->expandable((bool) $config['expandable']);
        }

        if (array_key_exists('idField', $config)) {
            $this->idField(
                $config['idField'] !== null
                    ? (string) $config['idField']
                    : null
            );
        }

        if (isset($config['editable'])) {
            $this->editable((bool) $config['editable']);
        }

        if (isset($config['editMode'])) {
            $this->editMode(
                (string) $config['editMode']
            );
        }

        if (isset($config['autoSave'])) {
            $this->autoSave((bool) $config['autoSave']);
        }

        if (array_key_exists('saveUrl', $config)) {
            $this->saveUrl(
                $config['saveUrl'] !== null
                    ? (string) $config['saveUrl']
                    : null
            );
        }

        if (isset($config['saveMethod'])) {
            $this->saveMethod(
                (string) $config['saveMethod']
            );
        }

        if (isset($config['validateEdits'])) {
            $this->validateEdits(
                (bool) $config['validateEdits']
            );
        }

        if (
            isset($config['actions']) &&
            is_array($config['actions'])
        ) {
            $this->actions($config['actions']);
        }

        if (
            isset($config['rowActions']) &&
            is_array($config['rowActions'])
        ) {
            $this->rowActions($config['rowActions']);
        }

        if (isset($config['ajax'])) {
            if (is_string($config['ajax'])) {
                $this->ajax($config['ajax']);
            } elseif (is_array($config['ajax'])) {
                $this->ajax(
                    (string) ($config['ajax']['url'] ?? ''),
                    (string) ($config['ajax']['method'] ?? 'GET'),
                    (array) ($config['ajax']['params'] ?? [])
                );
            }
        }

        if (isset($config['loading'])) {
            if (is_array($config['loading'])) {
                $this->loading(
                    (bool) ($config['loading']['enabled'] ?? true),
                    (string) (
                        $config['loading']['message']
                        ?? 'Loading...'
                    )
                );
            } else {
                $this->loading((bool) $config['loading']);
            }
        }

        if (isset($config['emptyMessage'])) {
            $this->emptyMessage(
                (string) $config['emptyMessage']
            );
        }

        if (array_key_exists('error', $config)) {
            $this->error(
                $config['error'] !== null
                    ? (string) $config['error']
                    : null
            );
        }

        if (
            isset($config['totals']) &&
            is_array($config['totals'])
        ) {
            $this->showTotals(true);
            $this->totals($config['totals']);
        }

        if (isset($config['totalsScope'])) {
            $this->totalsScope(
                (string) $config['totalsScope']
            );
        }

        if (
            isset($config['calculations']) &&
            is_array($config['calculations'])
        ) {
            foreach ($config['calculations'] as $field => $callback) {
                if (is_callable($callback)) {
                    $this->calculatedColumn(
                        (string) $field,
                        $callback
                    );
                }
            }
        }

        if (
            isset($config['formatters']) &&
            is_array($config['formatters'])
        ) {
            foreach ($config['formatters'] as $field => $callback) {
                if (is_callable($callback)) {
                    $this->formatter(
                        (string) $field,
                        $callback
                    );
                }
            }
        }

        if (
            isset($config['renderers']) &&
            is_array($config['renderers'])
        ) {
            foreach ($config['renderers'] as $field => $callback) {
                if (is_callable($callback)) {
                    $this->renderer(
                        (string) $field,
                        $callback
                    );
                }
            }
        }

        if (isset($config['horizontalScroll'])) {
            $this->horizontalScroll(
                (bool) $config['horizontalScroll']
            );
        }

        if (isset($config['verticalScroll'])) {
            if (is_array($config['verticalScroll'])) {
                $this->verticalScroll(
                    (bool) (
                        $config['verticalScroll']['enabled']
                        ?? true
                    ),
                    isset($config['verticalScroll']['height'])
                        ? (string) $config['verticalScroll']['height']
                        : null
                );
            } else {
                $this->verticalScroll(
                    (bool) $config['verticalScroll']
                );
            }
        }

        if (isset($config['scrollWidth'])) {
            $this->scrollWidth(
                (string) $config['scrollWidth']
            );
        }

        if (isset($config['autoSizeColumns'])) {
            $this->autoSizeColumns(
                (bool) $config['autoSizeColumns']
            );
        }

        if (isset($config['resizableColumns'])) {
            $this->resizableColumns(
                (bool) $config['resizableColumns']
            );
        }

        if (isset($config['reorderableColumns'])) {
            $this->reorderableColumns(
                (bool) $config['reorderableColumns']
            );
        }

        if (isset($config['hideableColumns'])) {
            $this->hideableColumns(
                (bool) $config['hideableColumns']
            );
        }

        if (isset($config['frozenColumns'])) {
            $this->frozenColumns(
                (int) $config['frozenColumns']
            );
        }

        if (isset($config['frozenRows'])) {
            $this->frozenRows(
                (int) $config['frozenRows']
            );
        }

        if (
            isset($config['headerGroups']) &&
            is_array($config['headerGroups'])
        ) {
            $this->headerGroups(
                $config['headerGroups']
            );
        }

        if (isset($config['toolbar'])) {
            $this->toolbar(
                (bool) $config['toolbar']
            );
        }

        if (isset($config['rowNumbers'])) {
            $this->rowNumbers(
                (bool) $config['rowNumbers']
            );
        }

        if (isset($config['striped'])) {
            $this->striped(
                (bool) $config['striped']
            );
        }

        if (isset($config['nowrap'])) {
            $this->nowrap(
                (bool) $config['nowrap']
            );
        }

        if (isset($config['persistence'])) {
            if (is_array($config['persistence'])) {
                $this->persistPreferences(true);
                $this->persistenceOptions(
                    $config['persistence']
                );
            } else {
                $this->persistPreferences(
                    (bool) $config['persistence']
                );
            }
        }

        if (array_key_exists('persistenceKey', $config)) {
            $this->persistenceKey(
                $config['persistenceKey'] !== null
                    ? (string) $config['persistenceKey']
                    : null
            );
        }

        if (array_key_exists('persistenceUrl', $config)) {
            $this->persistenceUrl(
                $config['persistenceUrl'] !== null
                    ? (string) $config['persistenceUrl']
                    : null
            );
        }

        if (isset($config['persistenceMethod'])) {
            $this->persistenceMethod(
                (string) $config['persistenceMethod']
            );
        }
    }
}
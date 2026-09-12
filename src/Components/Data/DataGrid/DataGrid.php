<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Data\DataGrid;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Table\Table\Table;
use RedSky\Html\Components\Table\TableBody\TableBody;
use RedSky\Html\Components\Table\TableCaption\TableCaption;
use RedSky\Html\Components\Table\TableCell\TableCell;
use RedSky\Html\Components\Table\TableFooter\TableFooter;
use RedSky\Html\Components\Table\TableHead\TableHead;
use RedSky\Html\Components\Table\TableHeaderCell\TableHeaderCell;
use RedSky\Html\Components\Table\TableRow\TableRow;

use RedSky\Html\Components\Data\DataGridColumn\DataGridColumn;
use RedSky\Html\Components\Data\DataGridConfiguration\DataGridConfiguration;

/**
 * Represents a high-level, UI-library-agnostic DataGrid component.
 *
 * DataGrid is responsible for rendering the semantic HTML structure
 * and exposing the configuration required by the client-side
 * DataGrid.js implementation.
 *
 * Configuration and fluent state management are provided by
 * DataGridConfiguration.
 *
 * This component does not perform database queries, SQL operations,
 * ORM operations, repository access, authentication, or authorization.
 */
class DataGrid extends DataGridConfiguration
{
    /**
     * Renders the DataGrid.
     *
     * The generated root element contains the configuration required by
     * DataGrid.js to initialize interactive behavior.
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= $this->renderDataAttribute(
            'redsky-component',
            'datagrid'
        );

        $attributes .= $this->renderDataAttribute(
            'datagrid-config',
            $this->jsonConfig()
        );

        return sprintf(
            '<div%s>%s</div>',
            $attributes,
            $this->renderGrid()
        );
    }

    /**
     * Renders the DataGrid internal structure.
     */
    protected function renderGrid(): string
    {
        if ($this->loading) {
            return $this->renderState(
                $this->loadingMessage,
                'loading'
            );
        }

        if ($this->errorMessage !== null) {
            return $this->renderState(
                $this->errorMessage,
                'error'
            );
        }

        $html = '';

        if (
            $this->toolbar ||
            $this->globalActions !== []
        ) {
            $html .= $this->renderToolbar();
        }

        $html .= $this->buildTable();

        if ($this->pagination) {
            $html .= $this->renderPagination();
        }

        return $html;
    }

    /**
     * Builds the underlying semantic HTML table.
     */
    protected function buildTable(): string
    {
        $table = new Table();

        if ($this->caption !== null) {
            $table->caption(
                new TableCaption($this->caption)
            );
        }

        $table->head(
            $this->buildTableHead()
        );

        $table->body(
            $this->buildTableBody()
        );

        if ($this->showTotals) {
            $table->footer(
                $this->buildTableFooter()
            );
        }

        return $table->render();
    }

    /**
     * Builds the table header.
     */
    protected function buildTableHead(): TableHead
    {
        $head = new TableHead();
        $row = new TableRow();

        if ($this->checkable) {
            $checkbox = new TableHeaderCell();

            $checkbox->attribute(
                'data-datagrid-selection',
                'select-all'
            );

            if (!$this->selectAll) {
                $checkbox->attribute(
                    'data-datagrid-select-all',
                    'false'
                );
            }

            $row->addHeaderCell($checkbox);
        }

        if ($this->rowNumbers) {
            $row->addHeaderCell(
                new TableHeaderCell('#')
            );
        }

        foreach ($this->columns as $column) {
            if (!$column->isVisible()) {
                continue;
            }

            $cell = new TableHeaderCell(
                $column->getLabel()
            );

            $cell->attribute(
                'data-column',
                $column->getField()
            );

            if ($column->getDescription() !== null) {
                $cell->title(
                    $column->getDescription()
                );
            }

            if ($column->getWidth() !== null) {
                $cell->style(
                    'width',
                    $column->getWidth()
                );
            }

            if ($column->isSortable()) {
                $cell->attribute(
                    'data-sortable',
                    'true'
                );
            }

            if ($column->isResizable()) {
                $cell->attribute(
                    'data-resizable',
                    'true'
                );
            }

            if ($column->isReorderable()) {
                $cell->attribute(
                    'data-reorderable',
                    'true'
                );
            }

            if ($column->isFrozen()) {
                $cell->attribute(
                    'data-frozen',
                    'true'
                );
            }

            if ($column->getAlign() !== null) {
                $cell->attribute(
                    'data-align',
                    $column->getAlign()
                );
            }

            if ($column->getVerticalAlign() !== null) {
                $cell->attribute(
                    'data-vertical-align',
                    $column->getVerticalAlign()
                );
            }

            $row->addHeaderCell($cell);
        }

        if ($this->rowActions !== []) {
            $row->addHeaderCell(
                new TableHeaderCell('Actions')
            );
        }

        $head->addRow($row);

        return $head;
    }

    /**
     * Builds the table body.
     */
    protected function buildTableBody(): TableBody
    {
        $body = new TableBody();

        $records = $this->data;

        foreach ($records as $index => $record) {
            $body->addRow(
                $this->buildTableRow(
                    $record,
                    $index
                )
            );
        }

        if ($records === []) {
            $row = new TableRow();

            $cell = new TableCell(
                $this->emptyMessage
            );

            $cell->attribute(
                'data-datagrid-empty',
                'true'
            );

            $cell->colspan(
                max(1, $this->visibleColumnCount())
            );

            $row->addCell($cell);
            $body->addRow($row);
        }

        return $body;
    }

    /**
     * Builds a table row from a supplied record.
     */
    protected function buildTableRow(
        mixed $record,
        int $index
    ): TableRow {
        $row = new TableRow();

        $rowId = $this->resolveRowId(
            $record,
            $index
        );

        if ($rowId !== null) {
            $row->attribute(
                'data-row-id',
                (string) $rowId
            );
        }

        $row->attribute(
            'data-row-index',
            (string) $index
        );

        if ($this->rowHover) {
            $row->attribute(
                'data-row-hover',
                'true'
            );
        }

        if ($this->expandable) {
            $row->attribute(
                'data-expandable',
                'true'
            );
        }

        if ($this->rowClass !== null) {
            $class = ($this->rowClass)(
                $record,
                $index
            );

            if (
                is_string($class) &&
                $class !== ''
            ) {
                $row->class($class);
            }
        }

        if ($this->rowAttributes !== null) {
            $attributes = ($this->rowAttributes)(
                $record,
                $index
            );

            if (is_array($attributes)) {
                foreach ($attributes as $name => $value) {
                    $row->attribute(
                        (string) $name,
                        $value
                    );
                }
            }
        }

        if ($this->checkable) {
            $cell = new TableCell();

            $cell->attribute(
                'data-datagrid-selection',
                'checkbox'
            );

            $row->addCell($cell);
        }

        if ($this->rowNumbers) {
            $row->addCell(
                new TableCell(
                    (string) ($index + 1)
                )
            );
        }

        foreach ($this->columns as $column) {
            if (!$column->isVisible()) {
                continue;
            }

            $field = $column->getField();

            $value = $this->resolveValue(
                $record,
                $field
            );

            if (isset($this->calculations[$field])) {
                $value = ($this->calculations[$field])(
                    $record,
                    $value,
                    $index
                );
            }

            if ($column->getCalculator() !== null) {
                $value = ($column->getCalculator())(
                    $record,
                    $value,
                    $index
                );
            }

            $cell = new TableCell();

            $cell->attribute(
                'data-column',
                $field
            );

            if ($column->isEditable()) {
                $cell->attribute(
                    'data-editable',
                    'true'
                );

                if ($column->getEditor() !== null) {
                    $cell->attribute(
                        'data-editor',
                        $column->getEditor()
                    );
                }
            }

            if ($column->getAlign() !== null) {
                $cell->attribute(
                    'data-align',
                    $column->getAlign()
                );
            }

            if ($column->getVerticalAlign() !== null) {
                $cell->attribute(
                    'data-vertical-align',
                    $column->getVerticalAlign()
                );
            }

            if ($column->getWidth() !== null) {
                $cell->style(
                    'width',
                    $column->getWidth()
                );
            }

            if (isset($this->renderers[$field])) {
                $value = ($this->renderers[$field])(
                    $value,
                    $record,
                    $index
                );
            } elseif ($column->getRenderer() !== null) {
                $value = ($column->getRenderer())(
                    $value,
                    $record,
                    $index
                );
            } elseif (isset($this->formatters[$field])) {
                $value = ($this->formatters[$field])(
                    $value,
                    $record,
                    $index
                );
            } elseif ($column->getFormatter() !== null) {
                $value = ($column->getFormatter())(
                    $value,
                    $record,
                    $index
                );
            }

            if ($value instanceof HtmlComponent) {
                $cell->addChild($value);
            } else {
                $cell->text(
                    (string) ($value ?? '')
                );
            }

            $row->addCell($cell);
        }

        if ($this->rowActions !== []) {
            $cell = new TableCell();

            $cell->attribute(
                'data-datagrid-actions',
                'true'
            );

            foreach ($this->rowActions as $action) {
                $this->appendAction(
                    $cell,
                    $action,
                    $record,
                    $index
                );
            }

            $row->addCell($cell);
        }

        if ($this->rowFormatter !== null) {
            $formatted = ($this->rowFormatter)(
                $row,
                $record,
                $index
            );

            if ($formatted instanceof TableRow) {
                $row = $formatted;
            }
        }

        return $row;
    }

    /**
     * Builds the totals footer.
     */
    protected function buildTableFooter(): TableFooter
    {
        $footer = new TableFooter();
        $row = new TableRow();

        if ($this->checkable) {
            $row->addCell(new TableCell());
        }

        if ($this->rowNumbers) {
            $row->addCell(new TableCell());
        }

        foreach ($this->columns as $column) {
            if (!$column->isVisible()) {
                continue;
            }

            $cell = new TableCell();

            $field = $column->getField();

            if (array_key_exists($field, $this->totals)) {
                $value = $this->calculateTotal(
                    $field,
                    $this->totals[$field]
                );

                $cell->text((string) $value);
            }

            $row->addCell($cell);
        }

        if ($this->rowActions !== []) {
            $row->addCell(new TableCell());
        }

        $footer->addRow($row);

        return $footer;
    }

    /**
     * Calculates a total for a field.
     *
     * @param string $field Field name.
     * @param string|callable $operation Total operation.
     */
    protected function calculateTotal(
        string $field,
        string|callable $operation
    ): mixed {
        $values = [];

        foreach ($this->data as $record) {
            $value = $this->resolveValue(
                $record,
                $field
            );

            if (is_numeric($value)) {
                $values[] = (float) $value;
            }
        }

        if (is_callable($operation)) {
            return $operation(
                $values,
                $this->data
            );
        }

        return match (strtoupper($operation)) {
            'SUM' => array_sum($values),

            'COUNT' => count($this->data),

            'AVG' => $values === []
                ? 0
                : array_sum($values) / count($values),

            'MIN' => $values === []
                ? 0
                : min($values),

            'MAX' => $values === []
                ? 0
                : max($values),

            default => '',
        };
    }

    /**
     * Renders the DataGrid toolbar.
     */
    protected function renderToolbar(): string
    {
        $html = '<div data-datagrid-toolbar>';

        foreach ($this->globalActions as $action) {
            if ($action instanceof HtmlComponent) {
                $html .= $action->render();
                continue;
            }

            if (is_string($action)) {
                $html .= $action;
                continue;
            }

            if (is_array($action)) {
                $html .= $this->renderActionConfig(
                    $action
                );
            }
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * Renders a row action.
     */
    protected function appendAction(
        TableCell $cell,
        mixed $action,
        mixed $record,
        int $index
    ): void {
        if ($action instanceof HtmlComponent) {
            $cell->addChild($action);
            return;
        }

        if (is_string($action)) {
            $cell->html($action);
            return;
        }

        if (is_array($action)) {
            $cell->html(
                $this->renderActionConfig(
                    $action,
                    $record,
                    $index
                )
            );
        }
    }

    /**
     * Renders pagination configuration.
     */
    protected function renderPagination(): string
    {
        return sprintf(
            '<div data-datagrid-pagination ' .
            'data-page="%d" data-per-page="%d" data-total="%s"></div>',
            $this->page,
            $this->perPage,
            $this->total !== null
                ? (string) $this->total
                : ''
        );
    }

    /**
     * Renders a DataGrid state message.
     */
    protected function renderState(
        string $message,
        string $state
    ): string {
        return sprintf(
            '<div data-datagrid-state="%s">%s</div>',
            htmlspecialchars(
                $state,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            ),
            htmlspecialchars(
                $message,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );
    }

    /**
     * Resolves a field value from an array or object record.
     */
    protected function resolveValue(
        mixed $record,
        string $field
    ): mixed {
        if (is_array($record)) {
            return $record[$field] ?? null;
        }

        if (is_object($record)) {
            if (isset($record->{$field})) {
                return $record->{$field};
            }

            if (method_exists($record, $field)) {
                return $record->{$field}();
            }

            $getter = 'get' . ucfirst($field);

            if (method_exists($record, $getter)) {
                return $record->{$getter}();
            }
        }

        return null;
    }

    /**
     * Resolves a row identifier.
     */
    protected function resolveRowId(
        mixed $record,
        int $index
    ): string|int {
        if ($this->idField !== null) {
            $value = $this->resolveValue(
                $record,
                $this->idField
            );

            if ($value !== null) {
                return is_int($value)
                    ? $value
                    : (string) $value;
            }
        }

        return $index;
    }

    /**
     * Returns the number of visible columns.
     */
    protected function visibleColumnCount(): int
    {
        $count = 0;

        foreach ($this->columns as $column) {
            if ($column->isVisible()) {
                $count++;
            }
        }

        if ($this->checkable) {
            $count++;
        }

        if ($this->rowNumbers) {
            $count++;
        }

        if ($this->rowActions !== []) {
            $count++;
        }

        return $count;
    }

    /**
     * Returns the DataGrid client configuration as an array.
     *
     * @return array<string, mixed>
     */
    public function config(): array
    {
        return [
            'pagination' => $this->pagination,
            'page' => $this->page,
            'perPage' => $this->perPage,
            'pageList' => $this->pageList,
            'total' => $this->total,

            'sortable' => $this->sortable,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'sorts' => $this->sorts,

            'selectable' => $this->selectable,
            'selectionMode' => $this->selectionMode,
            'checkable' => $this->checkable,
            'checkOnSelect' => $this->checkOnSelect,
            'selectOnCheck' => $this->selectOnCheck,
            'selectAll' => $this->selectAll,
            'rowHover' => $this->rowHover,

            'expandable' => $this->expandable,
            'idField' => $this->idField,

            'editable' => $this->editable,
            'editMode' => $this->editMode,
            'autoSave' => $this->autoSave,
            'saveUrl' => $this->saveUrl,
            'saveMethod' => $this->saveMethod,
            'validateEdits' => $this->validateEdits,

            'ajax' => $this->ajax,
            'ajaxEnabled' => $this->ajaxEnabled,
            'ajaxUrl' => $this->ajaxUrl,
            'ajaxMethod' => $this->ajaxMethod,
            'ajaxParams' => $this->ajaxParams,

            'loading' => $this->loading,
            'loadingMessage' => $this->loadingMessage,
            'emptyMessage' => $this->emptyMessage,
            'errorMessage' => $this->errorMessage,

            'showTotals' => $this->showTotals,
            'totalsScope' => $this->totalsScope,
            'totals' => $this->serializeCallbacks(
                $this->totals
            ),

            'calculations' => array_keys(
                $this->calculations
            ),

            'formatters' => array_keys(
                $this->formatters
            ),

            'renderers' => array_keys(
                $this->renderers
            ),

            'horizontalScroll' => $this->horizontalScroll,
            'verticalScroll' => $this->verticalScroll,
            'scrollHeight' => $this->scrollHeight,
            'scrollWidth' => $this->scrollWidth,

            'autoSizeColumns' => $this->autoSizeColumns,
            'resizableColumns' => $this->resizableColumns,
            'reorderableColumns' => $this->reorderableColumns,
            'hideableColumns' => $this->hideableColumns,

            'frozenColumns' => $this->frozenColumns,
            'frozenColumnCount' => $this->frozenColumnCount,
            'frozenRows' => $this->frozenRows,
            'frozenRowCount' => $this->frozenRowCount,

            'headerGroups' => $this->headerGroups,

            'toolbar' => $this->toolbar,
            'rowNumbers' => $this->rowNumbers,
            'striped' => $this->striped,
            'nowrap' => $this->nowrap,

            'persistence' => $this->persistence,
            'persistPreferences' => $this->persistPreferences,
            'persistenceKey' => $this->persistenceKey,
            'persistenceUrl' => $this->persistenceUrl,
            'persistenceMethod' => $this->persistenceMethod,

            'persistColumnOrder' => $this->persistColumnOrder,
            'persistColumnWidths' => $this->persistColumnWidths,
            'persistVisibleColumns' => $this->persistVisibleColumns,
            'persistSorting' => $this->persistSorting,
            'persistPageSize' => $this->persistPageSize,

            'columns' => array_map(
                static function (
                    DataGridColumn $column
                ): array {
                    return [
                        'field' => $column->getField(),
                        'label' => $column->getLabel(),
                        'description' => $column->getDescription(),
                        'visible' => $column->isVisible(),
                        'sortable' => $column->isSortable(),
                        'resizable' => $column->isResizable(),
                        'reorderable' => $column->isReorderable(),
                        'frozen' => $column->isFrozen(),
                        'editable' => $column->isEditable(),
                        'width' => $column->getWidth(),
                        'minWidth' => $column->getMinWidth(),
                        'maxWidth' => $column->getMaxWidth(),
                        'editor' => $column->getEditor(),
                        'editorOptions' => $column->getEditorOptions(),
                        'align' => $column->getAlign(),
                        'verticalAlign' => $column->getVerticalAlign(),
                        'autoSize' => $column->isAutoSize(),
                        'hideable' => $column->isHideable(),
                        'sortOrder' => $column->getSortOrder(),
                    ];
                },
                $this->columns
            ),
        ];
    }

    /**
     * Returns the DataGrid configuration as JSON.
     *
     * @throws \JsonException
     */
    public function jsonConfig(): string
    {
        return json_encode(
            $this->config(),
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Serializes callbacks into safe client configuration values.
     *
     * @param array<string, mixed> $values
     *
     * @return array<string, mixed>
     */
    protected function serializeCallbacks(
        array $values
    ): array {
        $result = [];

        foreach ($values as $key => $value) {
            $result[$key] = is_callable($value)
                ? 'callback'
                : $value;
        }

        return $result;
    }

    /**
     * Renders a data attribute.
     */
    protected function renderDataAttribute(
        string $name,
        string $value
    ): string {
        return sprintf(
            ' data-%s="%s"',
            $name,
            htmlspecialchars(
                $value,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            )
        );
    }

    /**
     * Renders an action configuration.
     *
     * Supported action types:
     * - button
     * - link
     * - icon
     * - image
     * - svg
     *
     * Buttons and links can contain text.
     * Icons, images, and SVGs are rendered as clickable actions.
     *
     * @param array<string, mixed> $action Action configuration.
     */
    protected function renderActionConfig(
        array $action,
        mixed $record = null,
        ?int $index = null
    ): string {
        $label = (string) (
            $action['label'] ?? 'Action'
        );

        $type = strtolower(
            trim(
                (string) (
                    $action['type'] ?? 'button'
                )
            )
        );

        if (!in_array(
            $type,
            ['button', 'link', 'icon', 'image', 'svg'],
            true
        )) {
            throw new \InvalidArgumentException(
                'The action type must be "button", "link", "icon", "image", or "svg".'
            );
        }

        $event = $action['event'] ?? null;
        $url = $action['url'] ?? null;
        $icon = $action['icon'] ?? null;
        $image = $action['image'] ?? null;
        $svg = $action['svg'] ?? null;

        $attributes = [
            'data-datagrid-action' => 'true',
        ];

        /*
        * Buttons use the native button type attribute.
        */
        if ($type === 'button') {
            $attributes['type'] = 'button';
        }

        /*
        * Links and visual actions can navigate to a URL.
        */
        if (
            in_array(
                $type,
                ['link', 'icon', 'image', 'svg'],
                true
            ) &&
            $url !== null
        ) {
            $attributes['href'] = (string) $url;
        }

        /*
        * Preserve the URL as DataGrid metadata.
        */
        if ($url !== null) {
            $attributes['data-action-url'] =
                (string) $url;
        }

        /*
        * Preserve the event as DataGrid metadata.
        */
        if ($event !== null) {
            $attributes['data-action-event'] =
                (string) $event;
        }

        /*
        * Preserve the row index for row actions.
        */
        if ($index !== null) {
            $attributes['data-row-index'] =
                (string) $index;
        }

        /*
        * Accessibility label.
        */
        $attributes['aria-label'] = $label;

        $attributeString = '';

        foreach ($attributes as $name => $value) {
            $attributeString .= sprintf(
                ' %s="%s"',
                htmlspecialchars(
                    $name,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ),
                htmlspecialchars(
                    (string) $value,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        /*
        * Text content.
        */
        if (
            $type === 'button' ||
            $type === 'link'
        ) {
            $content = htmlspecialchars(
                $label,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            if ($type === 'link') {
                return sprintf(
                    '<a%s>%s</a>',
                    $attributeString,
                    $content
                );
            }

            return sprintf(
                '<button%s>%s</button>',
                $attributeString,
                $content
            );
        }

        /*
        * Font Awesome or another icon CSS class.
        */
        if ($type === 'icon') {
            $icon = htmlspecialchars(
                (string) $icon,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            $content = sprintf(
                '<i class="%s" aria-hidden="true"></i>',
                $icon
            );

            return sprintf(
                '<a%s>%s</a>',
                $attributeString,
                $content
            );
        }

        /*
        * Image action.
        */
        if ($type === 'image') {
            $image = htmlspecialchars(
                (string) $image,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            $alt = htmlspecialchars(
                $label,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            $content = sprintf(
                '<img src="%s" alt="%s">',
                $image,
                $alt
            );

            return sprintf(
                '<a%s>%s</a>',
                $attributeString,
                $content
            );
        }

        /*
        * SVG action.
        *
        * The SVG is intentionally not escaped because it is expected
        * to contain valid SVG markup.
        */
        if ($type === 'svg') {
            $content = (string) $svg;

            return sprintf(
                '<a%s>%s</a>',
                $attributeString,
                $content
            );
        }

        return '';
    }
}
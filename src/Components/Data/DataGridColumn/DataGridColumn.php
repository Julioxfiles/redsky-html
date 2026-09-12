<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Data\DataGridColumn;

use Closure;

/**
 * Represents a column definition for a DataGrid component.
 *
 * A DataGridColumn describes how a field of a DataGrid row should
 * be displayed and interacted with.
 *
 * The column definition is UI-library agnostic. It does not render
 * HTML by itself and does not contain database or persistence logic.
 *
 * A column can define:
 *
 * - Field name.
 * - Display label.
 * - Description / tooltip.
 * - Visibility.
 * - Width.
 * - Minimum and maximum width.
 * - Resizing.
 * - Reordering.
 * - Sorting.
 * - Frozen state.
 * - Editing.
 * - Editor configuration.
 * - Editing permission callback.
 * - Validation callback.
 * - Formatter callback.
 * - Custom renderer callback.
 * - Calculated value callback.
 *
 * The DataGrid component is responsible for using this definition
 * when generating the HTML structure and client-side configuration.
 */
class DataGridColumn
{
    /**
     * The field name represented by the column.
     */
    protected string $field;

    /**
     * The column display label.
     */
    protected ?string $label = null;

    /**
     * The column description or tooltip.
     */
    protected ?string $description = null;

    /**
     * Indicates whether the column is visible.
     */
    protected bool $visible = true;

    /**
     * Indicates whether the column can be sorted.
     */
    protected bool $sortable = false;

    /**
     * Indicates whether the column can be resized.
     */
    protected bool $resizable = true;

    /**
     * Indicates whether the column can be reordered.
     */
    protected bool $reorderable = true;

    /**
     * Indicates whether the column is frozen.
     */
    protected bool $frozen = false;

    /**
     * Indicates whether the column can be edited.
     */
    protected bool $editable = false;

    /**
     * The column width.
     */
    protected ?string $width = null;

    /**
     * The minimum column width.
     */
    protected ?string $minWidth = null;

    /**
     * The maximum column width.
     */
    protected ?string $maxWidth = null;

    /**
     * The editor type.
     */
    protected ?string $editor = null;

    /**
     * Editor configuration.
     *
     * @var array<string, mixed>
     */
    protected array $editorOptions = [];

    /**
     * Callback used to determine whether a cell can be edited.
     */
    protected ?Closure $editableWhen = null;

    /**
     * Callback used to validate an edited value.
     *
     * The callback should return:
     *
     * - true when the value is valid.
     * - false when the value is invalid.
     * - A string containing an error message.
     *
     * @var Closure|null
     */
    protected ?Closure $validator = null;

    /**
     * Callback used to format a cell value.
     */
    protected ?Closure $formatter = null;

    /**
     * Callback used to render a cell.
     */
    protected ?Closure $renderer = null;

    /**
     * Callback used to calculate the value of the column.
     */
    protected ?Closure $calculator = null;

    /**
     * The sorting direction.
     *
     * Valid values are:
     *
     * - asc
     * - desc
     */
    protected ?string $sortOrder = null;

    /**
     * The column alignment.
     */
    protected ?string $align = null;

    /**
     * The vertical alignment.
     */
    protected ?string $verticalAlign = null;

    /**
     * Whether the column should automatically size itself.
     */
    protected bool $autoSize = false;

    /**
     * Whether the column participates in column selection.
     */
    protected bool $hideable = true;

    /**
     * Creates a DataGrid column.
     *
     * @param string $field The field represented by the column.
     * @param string|null $label The display label.
     */
    public function __construct(
        string $field,
        ?string $label = null
    ) {
        $this->field = $field;
        $this->label = $label ?? $field;
    }

    /**
     * Creates a DataGrid column from an array configuration.
     *
     * Supported configuration keys include:
     *
     * - field
     * - label
     * - description
     * - visible
     * - sortable
     * - resizable
     * - reorderable
     * - frozen
     * - editable
     * - width
     * - minWidth
     * - maxWidth
     * - editor
     * - editorOptions
     * - editableWhen
     * - validator
     * - formatter
     * - renderer
     * - calculator
     * - sortOrder
     * - align
     * - verticalAlign
     * - autoSize
     * - hideable
     *
     * @param array<string, mixed> $config
     *
     * @return static
     *
     * @throws \InvalidArgumentException When the field is missing.
     */
    public static function fromArray(array $config): static
    {
        if (
            !isset($config['field'])
            || !is_string($config['field'])
            || $config['field'] === ''
        ) {
            throw new \InvalidArgumentException(
                'A DataGrid column requires a non-empty "field" value.'
            );
        }

        $column = new static(
            $config['field'],
            isset($config['label'])
                ? (string) $config['label']
                : null
        );

        return $column->configure($config);
    }

    /**
     * Configures the column using an associative array.
     *
     * @param array<string, mixed> $config
     *
     * @return static
     */
    public function configure(array $config): static
    {
        if (array_key_exists('label', $config)) {
            $this->label((string) $config['label']);
        }

        if (array_key_exists('description', $config)) {
            $this->description(
                $config['description'] !== null
                    ? (string) $config['description']
                    : null
            );
        }

        if (array_key_exists('visible', $config)) {
            $this->visible((bool) $config['visible']);
        }

        if (array_key_exists('sortable', $config)) {
            $this->sortable((bool) $config['sortable']);
        }

        if (array_key_exists('resizable', $config)) {
            $this->resizable((bool) $config['resizable']);
        }

        if (array_key_exists('reorderable', $config)) {
            $this->reorderable((bool) $config['reorderable']);
        }

        if (array_key_exists('frozen', $config)) {
            $this->frozen((bool) $config['frozen']);
        }

        if (array_key_exists('editable', $config)) {
            $this->editable((bool) $config['editable']);
        }

        if (array_key_exists('width', $config)) {
            $this->width(
                $config['width'] !== null
                    ? (string) $config['width']
                    : null
            );
        }

        if (array_key_exists('minWidth', $config)) {
            $this->minWidth(
                $config['minWidth'] !== null
                    ? (string) $config['minWidth']
                    : null
            );
        }

        if (array_key_exists('maxWidth', $config)) {
            $this->maxWidth(
                $config['maxWidth'] !== null
                    ? (string) $config['maxWidth']
                    : null
            );
        }

        if (array_key_exists('editor', $config)) {
            $this->editor(
                $config['editor'] !== null
                    ? (string) $config['editor']
                    : null
            );
        }

        if (array_key_exists('editorOptions', $config)) {
            $this->editorOptions((array) $config['editorOptions']);
        }

        if (isset($config['editableWhen'])) {
            $this->editableWhen($config['editableWhen']);
        }

        if (isset($config['validator'])) {
            $this->validator($config['validator']);
        }

        if (isset($config['formatter'])) {
            $this->formatter($config['formatter']);
        }

        if (isset($config['renderer'])) {
            $this->renderer($config['renderer']);
        }

        if (isset($config['calculator'])) {
            $this->calculator($config['calculator']);
        }

        if (array_key_exists('sortOrder', $config)) {
            $this->sortOrder(
                $config['sortOrder'] !== null
                    ? (string) $config['sortOrder']
                    : null
            );
        }

        if (array_key_exists('align', $config)) {
            $this->align(
                $config['align'] !== null
                    ? (string) $config['align']
                    : null
            );
        }

        if (array_key_exists('verticalAlign', $config)) {
            $this->verticalAlign(
                $config['verticalAlign'] !== null
                    ? (string) $config['verticalAlign']
                    : null
            );
        }

        if (array_key_exists('autoSize', $config)) {
            $this->autoSize((bool) $config['autoSize']);
        }

        if (array_key_exists('hideable', $config)) {
            $this->hideable((bool) $config['hideable']);
        }

        return $this;
    }

    /**
     * Sets the column field.
     *
     * @param string $field
     *
     * @return static
     */
    public function field(string $field): static
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Sets the display label.
     *
     * @param string $label
     *
     * @return static
     */
    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Sets the column description or tooltip.
     *
     * @param string|null $description
     *
     * @return static
     */
    public function description(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Sets the column visibility.
     *
     * @param bool $visible
     *
     * @return static
     */
    public function visible(bool $visible = true): static
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Hides the column.
     *
     * @return static
     */
    public function hidden(): static
    {
        return $this->visible(false);
    }

    /**
     * Sets whether the column can be sorted.
     *
     * @param bool $sortable
     *
     * @return static
     */
    public function sortable(bool $sortable = true): static
    {
        $this->sortable = $sortable;

        return $this;
    }

    /**
     * Sets whether the column can be resized.
     *
     * @param bool $resizable
     *
     * @return static
     */
    public function resizable(bool $resizable = true): static
    {
        $this->resizable = $resizable;

        return $this;
    }

    /**
     * Sets whether the column can be reordered.
     *
     * @param bool $reorderable
     *
     * @return static
     */
    public function reorderable(bool $reorderable = true): static
    {
        $this->reorderable = $reorderable;

        return $this;
    }

    /**
     * Sets whether the column is frozen.
     *
     * @param bool $frozen
     *
     * @return static
     */
    public function frozen(bool $frozen = true): static
    {
        $this->frozen = $frozen;

        return $this;
    }

    /**
     * Sets whether the column is editable.
     *
     * @param bool $editable
     *
     * @return static
     */
    public function editable(bool $editable = true): static
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * Sets the column width.
     *
     * Examples:
     *
     * - 150
     * - "150px"
     * - "20%"
     * - "auto"
     *
     * @param string|null $width
     *
     * @return static
     */
    public function width(?string $width): static
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Sets the minimum column width.
     *
     * @param string|null $minWidth
     *
     * @return static
     */
    public function minWidth(?string $minWidth): static
    {
        $this->minWidth = $minWidth;

        return $this;
    }

    /**
     * Sets the maximum column width.
     *
     * @param string|null $maxWidth
     *
     * @return static
     */
    public function maxWidth(?string $maxWidth): static
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    /**
     * Configures the column editor.
     *
     * Common editor types can include:
     *
     * - text
     * - number
     * - date
     * - datetime
     * - select
     * - checkbox
     * - textarea
     *
     * The actual editor implementation is handled by DataGrid.js.
     *
     * @param string|null $editor
     *
     * @return static
     */
    public function editor(?string $editor): static
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Sets editor options.
     *
     * @param array<string, mixed> $options
     *
     * @return static
     */
    public function editorOptions(array $options): static
    {
        $this->editorOptions = $options;

        return $this;
    }

    /**
     * Determines whether editing is allowed for a particular row.
     *
     * This callback is a client-side configuration hook only.
     * It must not be considered a replacement for server-side
     * authorization.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function editableWhen(callable $callback): static
    {
        $this->editableWhen = Closure::fromCallable($callback);

        return $this;
    }

    /**
     * Sets the validation callback.
     *
     * The callback receives the new value and row data.
     *
     * It should return:
     *
     * - true when valid.
     * - false when invalid.
     * - A string containing an error message.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function validator(callable $callback): static
    {
        $this->validator = Closure::fromCallable($callback);

        return $this;
    }

    /**
     * Sets the formatter callback.
     *
     * The formatter can transform a raw value into a display value.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function formatter(callable $callback): static
    {
        $this->formatter = Closure::fromCallable($callback);

        return $this;
    }

    /**
     * Sets a custom cell renderer.
     *
     * A renderer can return a string or an HTML component.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function renderer(callable $callback): static
    {
        $this->renderer = Closure::fromCallable($callback);

        return $this;
    }

    /**
     * Sets a calculated value callback.
     *
     * The callback receives the complete row and returns the
     * value displayed by the column.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function calculator(callable $callback): static
    {
        $this->calculator = Closure::fromCallable($callback);

        return $this;
    }

    /**
     * Sets the initial sorting direction.
     *
     * Valid values are:
     *
     * - asc
     * - desc
     *
     * @param string|null $order
     *
     * @return static
     *
     * @throws \InvalidArgumentException
     */
    public function sortOrder(?string $order): static
    {
        if ($order !== null) {
            $order = strtolower($order);

            if (!in_array($order, ['asc', 'desc'], true)) {
                throw new \InvalidArgumentException(
                    'DataGrid column sort order must be "asc" or "desc".'
                );
            }
        }

        $this->sortOrder = $order;

        return $this;
    }

    /**
     * Sets the horizontal alignment.
     *
     * @param string|null $align
     *
     * @return static
     */
    public function align(?string $align): static
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Sets the vertical alignment.
     *
     * @param string|null $verticalAlign
     *
     * @return static
     */
    public function verticalAlign(?string $verticalAlign): static
    {
        $this->verticalAlign = $verticalAlign;

        return $this;
    }

    /**
     * Enables or disables automatic sizing.
     *
     * @param bool $autoSize
     *
     * @return static
     */
    public function autoSize(bool $autoSize = true): static
    {
        $this->autoSize = $autoSize;

        return $this;
    }

    /**
     * Sets whether the user can hide the column.
     *
     * @param bool $hideable
     *
     * @return static
     */
    public function hideable(bool $hideable = true): static
    {
        $this->hideable = $hideable;

        return $this;
    }

    /**
     * Returns the field name.
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Returns the display label.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label ?? $this->field;
    }

    /**
     * Returns the description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Returns whether the column is visible.
     *
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * Returns whether the column is sortable.
     *
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * Returns whether the column is resizable.
     *
     * @return bool
     */
    public function isResizable(): bool
    {
        return $this->resizable;
    }

    /**
     * Returns whether the column is reorderable.
     *
     * @return bool
     */
    public function isReorderable(): bool
    {
        return $this->reorderable;
    }

    /**
     * Returns whether the column is frozen.
     *
     * @return bool
     */
    public function isFrozen(): bool
    {
        return $this->frozen;
    }

    /**
     * Returns whether the column is editable.
     *
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * Returns the configured width.
     *
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * Returns the minimum width.
     *
     * @return string|null
     */
    public function getMinWidth(): ?string
    {
        return $this->minWidth;
    }

    /**
     * Returns the maximum width.
     *
     * @return string|null
     */
    public function getMaxWidth(): ?string
    {
        return $this->maxWidth;
    }

    /**
     * Returns the editor type.
     *
     * @return string|null
     */
    public function getEditor(): ?string
    {
        return $this->editor;
    }

    /**
     * Returns editor options.
     *
     * @return array<string, mixed>
     */
    public function getEditorOptions(): array
    {
        return $this->editorOptions;
    }

    /**
     * Returns the editing permission callback.
     *
     * @return Closure|null
     */
    public function getEditableWhen(): ?Closure
    {
        return $this->editableWhen;
    }

    /**
     * Returns the validation callback.
     *
     * @return Closure|null
     */
    public function getValidator(): ?Closure
    {
        return $this->validator;
    }

    /**
     * Returns the formatter callback.
     *
     * @return Closure|null
     */
    public function getFormatter(): ?Closure
    {
        return $this->formatter;
    }

    /**
     * Returns the custom renderer callback.
     *
     * @return Closure|null
     */
    public function getRenderer(): ?Closure
    {
        return $this->renderer;
    }

    /**
     * Returns the calculated value callback.
     *
     * @return Closure|null
     */
    public function getCalculator(): ?Closure
    {
        return $this->calculator;
    }

    /**
     * Returns the configured sort order.
     *
     * @return string|null
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Returns the horizontal alignment.
     *
     * @return string|null
     */
    public function getAlign(): ?string
    {
        return $this->align;
    }

    /**
     * Returns the vertical alignment.
     *
     * @return string|null
     */
    public function getVerticalAlign(): ?string
    {
        return $this->verticalAlign;
    }

    /**
     * Returns whether automatic sizing is enabled.
     *
     * @return bool
     */
    public function isAutoSize(): bool
    {
        return $this->autoSize;
    }

    /**
     * Returns whether the column can be hidden.
     *
     * @return bool
     */
    public function isHideable(): bool
    {
        return $this->hideable;
    }
}
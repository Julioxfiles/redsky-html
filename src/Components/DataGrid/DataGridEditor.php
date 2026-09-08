<?php

declare(strict_types=1);

namespace RedSky\Html\Components\DataGrid;

/**
 * Represents a configurable editor for DataGrid cell editing.
 *
 * DataGridEditor defines the client-side editor type and its
 * configuration while remaining independent of any particular
 * UI library.
 */
class DataGridEditor
{
    /**
     * Supported editor types.
     */
    public const TEXT = 'text';

    public const NUMBER = 'number';

    public const DATE = 'date';

    public const DATETIME = 'datetime';

    public const SELECT = 'select';

    public const CHECKBOX = 'checkbox';

    public const TEXTAREA = 'textarea';

    /**
     * The editor type.
     */
    protected string $type = self::TEXT;

    /**
     * Editor configuration options.
     *
     * @var array<string, mixed>
     */
    protected array $options = [];

    /**
     * Whether the editor is required.
     */
    protected bool $required = false;

    /**
     * Optional validation callback.
     *
     * @var callable|null
     */
    protected $validator = null;

    /**
     * Optional condition determining whether the editor
     * is available for a particular row.
     *
     * @var callable|null
     */
    protected $editableWhen = null;

    /**
     * Creates a DataGrid editor.
     */
    public function __construct(
        string $type = self::TEXT,
        array $options = []
    ) {
        $this->setType($type);
        $this->options($options);
    }

    /**
     * Creates an editor from an associative configuration array.
     *
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): static
    {
        $type = isset($config['type'])
            ? (string) $config['type']
            : self::TEXT;

        $editor = new static($type);

        return $editor->configure($config);
    }

    /**
     * Configures the editor.
     *
     * @param array<string, mixed> $config
     */
    public function configure(array $config): static
    {
        if (isset($config['type'])) {
            $this->setType((string) $config['type']);
        }

        if (isset($config['options'])) {
            $this->options((array) $config['options']);
        }

        if (isset($config['required'])) {
            $this->required((bool) $config['required']);
        }

        if (array_key_exists('validator', $config)) {
            $this->setValidator($config['validator']);
        }

        if (array_key_exists('editableWhen', $config)) {
            $this->setEditableWhen($config['editableWhen']);
        }

        return $this;
    }

    /**
     * Returns the editor type.
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * Sets the editor type.
     *
     * @throws \InvalidArgumentException
     */
    public function setType(string $type): static
    {
        $type = strtolower(trim($type));

        $allowed = [
            self::TEXT,
            self::NUMBER,
            self::DATE,
            self::DATETIME,
            self::SELECT,
            self::CHECKBOX,
            self::TEXTAREA,
        ];

        if (!in_array($type, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported DataGrid editor type "%s".',
                    $type
                )
            );
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Creates a text editor.
     */
    public static function text(array $options = []): static
    {
        return new static(self::TEXT, $options);
    }

    /**
     * Creates a number editor.
     */
    public static function number(array $options = []): static
    {
        return new static(self::NUMBER, $options);
    }

    /**
     * Creates a date editor.
     */
    public static function date(array $options = []): static
    {
        return new static(self::DATE, $options);
    }

    /**
     * Creates a datetime editor.
     */
    public static function datetime(array $options = []): static
    {
        return new static(self::DATETIME, $options);
    }

    /**
     * Creates a select editor.
     *
     * @param array<mixed> $options
     */
    public static function select(array $options = []): static
    {
        return new static(self::SELECT, $options);
    }

    /**
     * Creates a checkbox editor.
     */
    public static function checkbox(array $options = []): static
    {
        return new static(self::CHECKBOX, $options);
    }

    /**
     * Creates a textarea editor.
     */
    public static function textarea(array $options = []): static
    {
        return new static(self::TEXTAREA, $options);
    }

    /**
     * Returns all editor options.
     *
     * @return array<string, mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Sets all editor options.
     *
     * @param array<string, mixed> $options
     */
    public function options(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Adds or replaces one editor option.
     */
    public function option(string $name, mixed $value): static
    {
        $this->options[$name] = $value;

        return $this;
    }

    /**
     * Removes an editor option.
     */
    public function removeOption(string $name): static
    {
        unset($this->options[$name]);

        return $this;
    }

    /**
     * Returns whether an option exists.
     */
    public function hasOption(string $name): bool
    {
        return array_key_exists($name, $this->options);
    }

    /**
     * Returns an option value.
     */
    public function getOption(
        string $name,
        mixed $default = null
    ): mixed {
        return $this->options[$name] ?? $default;
    }

    /**
     * Configures whether the editor requires a value.
     */
    public function required(bool $required = true): static
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Returns whether the editor is required.
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Sets a minimum value.
     *
     * Useful for number editors.
     */
    public function min(int|float $value): static
    {
        return $this->option('min', $value);
    }

    /**
     * Sets a maximum value.
     *
     * Useful for number editors.
     */
    public function max(int|float $value): static
    {
        return $this->option('max', $value);
    }

    /**
     * Sets the step value.
     *
     * Useful for number editors.
     */
    public function step(int|float|string $value): static
    {
        return $this->option('step', $value);
    }

    /**
     * Sets the placeholder.
     */
    public function placeholder(?string $value): static
    {
        return $this->option('placeholder', $value);
    }

    /**
     * Sets the input name.
     */
    public function name(?string $value): static
    {
        return $this->option('name', $value);
    }

    /**
     * Sets the input class.
     */
    public function class(?string $value): static
    {
        return $this->option('class', $value);
    }

    /**
     * Sets the input HTML attributes.
     *
     * @param array<string, mixed> $attributes
     */
    public function attributes(array $attributes): static
    {
        return $this->option('attributes', $attributes);
    }

    /**
     * Sets select options.
     *
     * @param array<mixed> $options
     */
    public function choices(array $options): static
    {
        return $this->option('choices', $options);
    }

    /**
     * Sets the empty option label for a select editor.
     */
    public function emptyOption(?string $label): static
    {
        return $this->option('emptyOption', $label);
    }

    /**
     * Sets the date format.
     */
    public function dateFormat(?string $format): static
    {
        return $this->option('dateFormat', $format);
    }

    /**
     * Sets the datetime format.
     */
    public function datetimeFormat(?string $format): static
    {
        return $this->option('datetimeFormat', $format);
    }

    /**
     * Returns the validator callback.
     *
     * @return callable|null
     */
    public function getValidator(): ?callable
    {
        return $this->validator;
    }


    /**
     * Sets the validator callback.
     *
     * @param callable|null $validator
     */
    public function setValidator(?callable $validator): static
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Validates a value using the configured validator.
     *
     * @return bool|string
     */
    public function validate(
        mixed $value,
        mixed $row = null
    ): bool|string {
        if ($this->required) {
            if ($value === null || $value === '') {
                return 'This field is required.';
            }
        }

        if ($this->validator === null) {
            return true;
        }

        return call_user_func(
            $this->validator,
            $value,
            $row,
            $this
        );
    }

    /**
     * Returns the editable condition callback.
     *
     * @return callable|null
     */
    public function getEditableWhen(): ?callable
    {
        return $this->editableWhen;
    }

    /**
     * Sets the editable condition callback.
     *
     * @param callable|null $callback
     */
    public function setEditableWhen(?callable $callback): static
    {
        $this->editableWhen = $callback;

        return $this;
    }

    /**
     * Determines whether this editor can edit a row.
     */
    public function canEdit(mixed $row = null): bool
    {
        if ($this->editableWhen === null) {
            return true;
        }

        return (bool) call_user_func(
            $this->editableWhen,
            $row,
            $this
        );
    }

    /**
     * Returns whether the editor has options.
     */
    public function hasOptions(): bool
    {
        return $this->options !== [];
    }

    /**
     * Converts the editor into a serializable configuration.
     *
     * PHP callbacks are represented as metadata and are not
     * serialized as executable values.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'options' => $this->options,
            'required' => $this->required,
            'hasValidator' => $this->validator !== null,
            'hasEditableWhen' => $this->editableWhen !== null,
        ];
    }
}
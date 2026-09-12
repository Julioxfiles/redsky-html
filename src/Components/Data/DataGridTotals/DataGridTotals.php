<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Data\DataGridTotals;

/**
 * Represents totals and subtotal configuration for a DataGrid.
 *
 * DataGridTotals defines aggregate operations that can be
 * displayed in the DataGrid footer. It does not perform
 * database queries and does not depend on an ORM, repository,
 * or database implementation.
 *
 * Supported aggregate operations are:
 *
 * - SUM
 * - COUNT
 * - AVG
 * - MIN
 * - MAX
 *
 * Totals may be calculated from the currently available
 * DataGrid data or supplied externally by the application
 * when server-side pagination is used.
 */
class DataGridTotals
{
    /**
     * Supported aggregate operations.
     */
    public const SUM = 'sum';

    public const COUNT = 'count';

    public const AVG = 'avg';

    public const MIN = 'min';

    public const MAX = 'max';

    /**
     * Supported total scopes.
     */
    public const PAGE = 'page';

    public const GRAND = 'grand';

    /**
     * Total definitions.
     *
     * @var array<string, array<string, mixed>>
     */
    protected array $definitions = [];

    /**
     * Calculated or externally supplied values.
     *
     * @var array<string, mixed>
     */
    protected array $values = [];

    /**
     * Default scope used for newly added totals.
     */
    protected string $scope = self::GRAND;

    /**
     * Whether the totals footer is visible.
     */
    protected bool $visible = true;

    /**
     * Creates a totals configuration.
     *
     * @param array<string, mixed> $definitions
     */
    public function __construct(array $definitions = [])
    {
        if ($definitions !== []) {
            $this->configure($definitions);
        }
    }

    /**
     * Creates totals from an associative configuration array.
     *
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): static
    {
        $totals = new static();

        return $totals->configure($config);
    }

    /**
     * Configures totals.
     *
     * The configuration may contain either:
     *
     * [
     *     'price' => 'sum',
     *     'quantity' => 'sum',
     * ]
     *
     * or:
     *
     * [
     *     'price' => [
     *         'operation' => 'sum',
     *         'label' => 'Total',
     *     ],
     * ]
     *
     * @param array<string, mixed> $config
     */
    public function configure(array $config): static
    {
        if (isset($config['scope'])) {
            $this->setScope((string) $config['scope']);
        }

        if (isset($config['visible'])) {
            $this->visible((bool) $config['visible']);
        }

        if (isset($config['values'])) {
            $this->values((array) $config['values']);
        }

        foreach ($config as $field => $definition) {
            if (
                in_array(
                    (string) $field,
                    ['scope', 'visible', 'values'],
                    true
                )
            ) {
                continue;
            }

            if (is_string($definition)) {
                $this->add(
                    (string) $field,
                    $definition
                );

                continue;
            }

            if (is_array($definition)) {
                $this->add(
                    (string) $field,
                    (string) (
                        $definition['operation']
                        ?? self::SUM
                    ),
                    $definition
                );
            }
        }

        return $this;
    }

    /**
     * Adds a total definition.
     *
     * @param array<string, mixed> $options
     */
    public function add(
        string $field,
        string $operation = self::SUM,
        array $options = []
    ): static {
        $field = trim($field);

        if ($field === '') {
            throw new \InvalidArgumentException(
                'A total requires a field name.'
            );
        }

        $operation = strtolower(trim($operation));

        $this->assertOperation($operation);

        $scope = isset($options['scope'])
            ? (string) $options['scope']
            : $this->scope;

        $this->assertScope($scope);

        $this->definitions[$field] = array_merge(
            [
                'field' => $field,
                'operation' => $operation,
                'scope' => $scope,
                'label' => null,
                'format' => null,
            ],
            $options
        );

        return $this;
    }

    /**
     * Adds a SUM total.
     */
    public function sum(
        string $field,
        array $options = []
    ): static {
        return $this->add(
            $field,
            self::SUM,
            $options
        );
    }

    /**
     * Adds a COUNT total.
     */
    public function count(
        string $field,
        array $options = []
    ): static {
        return $this->add(
            $field,
            self::COUNT,
            $options
        );
    }

    /**
     * Adds an AVG total.
     */
    public function average(
        string $field,
        array $options = []
    ): static {
        return $this->add(
            $field,
            self::AVG,
            $options
        );
    }

    /**
     * Adds a MIN total.
     */
    public function min(
        string $field,
        array $options = []
    ): static {
        return $this->add(
            $field,
            self::MIN,
            $options
        );
    }

    /**
     * Adds a MAX total.
     */
    public function max(
        string $field,
        array $options = []
    ): static {
        return $this->add(
            $field,
            self::MAX,
            $options
        );
    }

    /**
     * Removes a total definition.
     */
    public function remove(string $field): static
    {
        unset(
            $this->definitions[$field],
            $this->values[$field]
        );

        return $this;
    }

    /**
     * Removes all total definitions and values.
     */
    public function clear(): static
    {
        $this->definitions = [];
        $this->values = [];

        return $this;
    }

    /**
     * Returns all total definitions.
     *
     * @return array<string, array<string, mixed>>
     */
    public function definitions(): array
    {
        return $this->definitions;
    }

    /**
     * Returns a total definition.
     *
     * @return array<string, mixed>|null
     */
    public function definition(string $field): ?array
    {
        return $this->definitions[$field] ?? null;
    }

    /**
     * Returns whether a total is defined for a field.
     */
    public function has(string $field): bool
    {
        return isset($this->definitions[$field]);
    }

    /**
     * Returns all configured fields.
     *
     * @return array<int, string>
     */
    public function fields(): array
    {
        return array_keys($this->definitions);
    }

    /**
     * Returns the number of configured totals.
     */
    public function countDefinitions(): int
    {
        return count($this->definitions);
    }

    /**
     * Returns the configured default scope.
     */
    public function getScope(): string
    {
        return $this->scope;
    }
    
    /**
     * Sets the default scope.
     *
     * Supported scopes are page and grand.
     */
    public function setScope(string $scope): static
    {
        $scope = strtolower(trim($scope));

        $this->assertScope($scope);

        $this->scope = $scope;

        return $this;
    }

    /**
     * Sets the scope of an individual total.
     */
    public function totalScope(
        string $field,
        string $scope
    ): static {
        if (!$this->has($field)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'No total is defined for field "%s".',
                    $field
                )
            );
        }

        $scope = strtolower(trim($scope));

        $this->assertScope($scope);

        $this->definitions[$field]['scope'] = $scope;

        return $this;
    }

    /**
     * Sets the label of an individual total.
     */
    public function label(
        string $field,
        ?string $label
    ): static {
        if (!$this->has($field)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'No total is defined for field "%s".',
                    $field
                )
            );
        }

        $this->definitions[$field]['label'] = $label;

        return $this;
    }

    /**
     * Sets the output format of an individual total.
     *
     * The format is metadata intended for the DataGrid renderer.
     */
    public function format(
        string $field,
        ?string $format
    ): static {
        if (!$this->has($field)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'No total is defined for field "%s".',
                    $field
                )
            );
        }

        $this->definitions[$field]['format'] = $format;

        return $this;
    }

    /**
     * Returns whether the totals footer is visible.
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * Shows or hides the totals footer.
     */
    public function visible(bool $visible = true): static
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Sets an externally calculated total value.
     *
     * This is useful for grand totals when the DataGrid uses
     * server-side pagination and the current page does not
     * contain all records.
     */
    public function value(
        string $field,
        mixed $value
    ): static {
        if (!$this->has($field)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'No total is defined for field "%s".',
                    $field
                )
            );
        }

        $this->values[$field] = $value;

        return $this;
    }

    /**
     * Sets multiple externally calculated total values.
     *
     * @param array<string, mixed> $values
     */
    public function values(array $values): static
    {
        foreach ($values as $field => $value) {
            if ($this->has((string) $field)) {
                $this->values[(string) $field] = $value;
            }
        }

        return $this;
    }

    /**
     * Returns all externally supplied values.
     *
     * @return array<string, mixed>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Returns an externally supplied value.
     */
    public function getValue(
        string $field,
        mixed $default = null
    ): mixed {
        return $this->values[$field] ?? $default;
    }

    /**
     * Returns whether an external value exists.
     */
    public function hasValue(string $field): bool
    {
        return array_key_exists($field, $this->values);
    }

    /**
     * Clears externally supplied values.
     */
    public function clearValues(): static
    {
        $this->values = [];

        return $this;
    }

    /**
     * Calculates all configured totals from the supplied rows.
     *
     * Only definitions whose values have not been supplied
     * externally are calculated.
     *
     * @param array<int, mixed> $rows
     *
     * @return array<string, mixed>
     */
    public function calculate(array $rows): array
    {
        $results = $this->values;

        foreach ($this->definitions as $field => $definition) {
            if (array_key_exists($field, $results)) {
                continue;
            }

            $results[$field] = $this->calculateField(
                $rows,
                $field,
                (string) $definition['operation']
            );
        }

        $this->values = $results;

        return $results;
    }

    /**
     * Calculates a single total field.
     *
     * @param array<int, mixed> $rows
     */
    public function calculateField(
        array $rows,
        string $field,
        string $operation
    ): mixed {
        $operation = strtolower(trim($operation));

        $this->assertOperation($operation);

        if ($operation === self::COUNT) {
            return count($rows);
        }

        $values = [];

        foreach ($rows as $row) {
            $value = $this->resolveValue($row, $field);

            if ($value === null || $value === '') {
                continue;
            }

            if (
                $operation !== self::COUNT
                && !is_numeric($value)
            ) {
                continue;
            }

            $values[] = (float) $value;
        }

        if ($values === []) {
            return match ($operation) {
                self::SUM,
                self::AVG => 0,
                self::MIN,
                self::MAX => null,
                default => 0,
            };
        }

        return match ($operation) {
            self::SUM => array_sum($values),
            self::AVG => array_sum($values) / count($values),
            self::MIN => min($values),
            self::MAX => max($values),
            default => 0,
        };
    }

    /**
     * Resolves a field value from an array or object row.
     */
    protected function resolveValue(
        mixed $row,
        string $field
    ): mixed {
        if (is_array($row)) {
            if (array_key_exists($field, $row)) {
                return $row[$field];
            }

            return null;
        }

        if (is_object($row)) {
            if (isset($row->{$field})) {
                return $row->{$field};
            }

            if (method_exists($row, $field)) {
                return $row->{$field}();
            }

            $getter = 'get' . ucfirst($field);

            if (method_exists($row, $getter)) {
                return $row->{$getter}();
            }
        }

        return null;
    }

    /**
     * Validates an aggregate operation.
     */
    protected function assertOperation(string $operation): void
    {
        $allowed = [
            self::SUM,
            self::COUNT,
            self::AVG,
            self::MIN,
            self::MAX,
        ];

        if (!in_array($operation, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported DataGrid total operation "%s".',
                    $operation
                )
            );
        }
    }

    /**
     * Validates a total scope.
     */
    protected function assertScope(string $scope): void
    {
        $allowed = [
            self::PAGE,
            self::GRAND,
        ];

        if (!in_array($scope, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported DataGrid total scope "%s".',
                    $scope
                )
            );
        }
    }

    /**
     * Returns a serializable totals configuration.
     *
     * Calculated values are included separately from definitions.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'visible' => $this->visible,
            'scope' => $this->scope,
            'definitions' => $this->definitions,
            'values' => $this->values,
        ];
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML month input component.
 *
 * The month input component generates
 * an input element with type="month".
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete month input',
    code: <<<'PHP'
    echo new MonthInput('month')
        ->class('dark')
        ->style('color:cornflowerblue')
        ->attribute('id', 'month-input')
        ->between('2026-01', '2026-12')
        ->render();
    PHP,
    description: 'The MonthInput component generates a native HTML
                 <input type="month"> element that allows users to
                 select a specific month and year.',
    language: 'php',
    primary: true,
    output: '<input type="month" name="month" class="dark" style="color:cornflowerblue" id="month-input" min="2026-01" max="2026-12" />'
)]
class MonthInput extends Input
{
    /**
     * Creates a new month input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'month',
            $name
        );
    }

    /**
     * Sets current month as value.
     *
     * @return static
     */
    public function current(): static
    {
        $this->value(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Sets minimum and maximum month.
     *
     * @param string $min
     * @param string $max
     *
     * @return static
     */
    public function between(
        string $min,
        string $max
    ): static {
        return $this
            ->min($min)
            ->max($max);
    }


    /**
     * Restricts months from current month onwards.
     *
     * @return static
     */
    public function future(): static
    {
        $this->min(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Restricts months up to current month.
     *
     * @return static
     */
    public function past(): static
    {
        $this->max(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Sets current year range.
     *
     * @return static
     */
    public function currentYear(): static
    {
        $year = date('Y');

        return $this
            ->min($year . '-01')
            ->max($year . '-12');
    }
}
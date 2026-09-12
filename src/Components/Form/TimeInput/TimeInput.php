<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TimeInput\UrlInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML time input component.
 *
 * The TimeInput component generates a semantic HTML
 * <input type="time"> element for selecting a time of day.
 *
 * It extends Input and inherits common input functionality,
 * including methods for setting values, minimum and maximum
 * values, placeholders, classes, styles, and HTML attributes.
 *
 * TimeInput also provides convenience methods for setting the
 * current time and restricting the accepted time range to
 * common periods such as business hours, morning, afternoon,
 * or evening.
 *
 * The component uses the HTML time input format and does not
 * apply any UI-library-specific classes or styles.
 *
 * The component uses fluent methods, allowing multiple
 * configuration calls to be chained together.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo new TimeInput('appointment')
 *     ->businessHours('08:00', '18:00')
 *     ->value('10:30')
 *     ->attribute('id', 'appointment-time')
 *     ->required()
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="time"
 *        name="appointment"
 *        min="08:00"
 *        max="18:00"
 *        value="10:30"
 *        id="appointment-time"
 *        required />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Business hours time input',
    code: <<<'PHP'
    echo new TimeInput('appointment')
        ->businessHours('08:00', '18:00')
        ->value('10:30')
        ->attribute('id', 'appointment-time')
        ->required()
        ->render();
    PHP,
    description: 'The TimeInput component generates a semantic HTML
                 <input type="time"> element and provides convenient
                 methods for setting the current time or restricting
                 the selectable time to a specific range or period.',
    language: 'php',
    primary: true,
    output: '<input type="time" name="appointment" min="08:00" max="18:00" value="10:30" id="appointment-time" required />'
)]
class TimeInput extends Input
{
    /**
     * Creates a new time input component.
     *
     * The input type is automatically set to `time`.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'time',
            $name
        );
    }

    /**
     * Sets the current system time as the input value.
     *
     * The value is generated using the `H:i` format,
     * which corresponds to the standard 24-hour time format
     * used by HTML time inputs.
     *
     * @return static
     */
    public function now(): static
    {
        $this->value(
            date('H:i')
        );

        return $this;
    }

    /**
     * Sets the minimum and maximum allowed time.
     *
     * @param string $min Minimum time in `HH:MM` format.
     * @param string $max Maximum time in `HH:MM` format.
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
     * Restricts the input to the specified business hours.
     *
     * By default, the allowed range is from 08:00 to 18:00.
     * Custom start and end times can be provided.
     *
     * @param string $start Start of the business-hours range.
     * @param string $end End of the business-hours range.
     *
     * @return static
     */
    public function businessHours(
        string $start = '08:00',
        string $end = '18:00'
    ): static {
        return $this
            ->min($start)
            ->max($end);
    }

    /**
     * Restricts the input to morning hours.
     *
     * The allowed range is from 06:00 to 12:00.
     *
     * @return static
     */
    public function morning(): static
    {
        return $this
            ->min('06:00')
            ->max('12:00');
    }

    /**
     * Restricts the input to afternoon hours.
     *
     * The allowed range is from 12:00 to 18:00.
     *
     * @return static
     */
    public function afternoon(): static
    {
        return $this
            ->min('12:00')
            ->max('18:00');
    }

    /**
     * Restricts the input to evening hours.
     *
     * The allowed range is from 18:00 to 23:59.
     *
     * @return static
     */
    public function evening(): static
    {
        return $this
            ->min('18:00')
            ->max('23:59');
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TelInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML telephone input component.
 *
 * The TelInput component generates a native HTML
 * <input type="tel"> element for entering telephone
 * numbers.
 *
 * The browser may provide a telephone-optimized keyboard
 * or input behavior depending on the device and platform.
 *
 * The component does not validate or normalize telephone
 * numbers. Validation rules should be applied separately
 * according to the requirements of the application.
 *
 *
 * @package RedSky\Html\Components\Form
 */
class TelInput extends Input
{
    /**
     * Creates a new telephone input component.
     *
     * The input type is automatically set to "tel".
     *
     * @param string|null $name Input name used to identify
     *                          the submitted telephone value.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'tel',
            $name
        );
    }
}
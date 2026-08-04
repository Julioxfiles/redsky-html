<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML telephone input component.
 *
 * The telephone input component generates
 * an input element with type="tel".
 *
 * @package RedSky\Html\Components\Form
 */
class TelInput extends Input
{
    /**
     * Creates a new telephone input component.
     *
     * @param string|null $name Input name.
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
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML email input component.
 *
 * The email input component generates
 * an input element with type="email".
 *
 * @package RedSky\Html\Components\Form
 */
class EmailInput extends Input
{
    /**
     * Creates a new email input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'email',
            $name
        );
    }
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML hidden input component.
 *
 * The hidden input component generates a semantic
 * HTML input element with type="hidden".
 *
 * Hidden inputs are commonly used to submit values
 * that should not be visible or editable by users.
 *
 * This component is UI-library agnostic and
 * does not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class HiddenInput extends Input
{
    /**
     * Creates a new hidden input component.
     */
    public function __construct()
    {
        parent::__construct();

        $this->type('hidden');
    }
}
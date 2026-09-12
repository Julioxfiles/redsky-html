<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\HiddenInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The HiddenInput component generates a native HTML
 * <input type="hidden"> element for submitting values
 * that are not visible to the user.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
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
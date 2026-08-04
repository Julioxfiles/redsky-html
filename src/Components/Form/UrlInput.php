<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML URL input component.
 *
 * The URL input component generates
 * an input element with type="url".
 *
 * @package RedSky\Html\Components\Form
 */
class UrlInput extends Input
{
    /**
     * Creates a new URL input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'url',
            $name
        );
    }
}
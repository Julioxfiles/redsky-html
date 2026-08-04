<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML search input component.
 *
 * The search input component generates
 * an input element with type="search".
 *
 * @package RedSky\Html\Components\Form
 */
class SearchInput extends Input
{
    /**
     * Creates a new search input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'search',
            $name
        );
    }
}
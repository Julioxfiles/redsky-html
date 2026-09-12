<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\SearchInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The SearchInput component generates a native HTML
 * <input type="search"> element for entering search queries.
 *
 * Browsers may provide native search-specific behavior
 * depending on the platform.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class SearchInput extends Input
{
    /**
     * Creates a new search input component.
     *
     * The input type is automatically set to "search".
     *
     * @param string|null $name Input name used to identify
     *                          the submitted search value.
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
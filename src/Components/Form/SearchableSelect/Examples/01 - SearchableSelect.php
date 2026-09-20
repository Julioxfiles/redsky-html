<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\SearchableSelect\SearchableSelect;

/*
 * Example 1: Fluent API with local options.
 */

$fluent = (new SearchableSelect())
    ->name('country')
    ->placeholder('Search for a country...')
    ->option('Mexico', 'mx')
    ->option('United States', 'us')
    ->option('Canada', 'ca')
    ->option('Brazil', 'br')
    ->option('Argentina', 'ar');

echo "<h4>Fluent PHP</h4>";    
echo $fluent;


/*
 * Example 2: Array configuration with local options.
 */

$array = (new SearchableSelect())
    ->name('country_array')
    ->placeholder('Search for a country...')
    ->options([
        'Mexico' => 'mx',
        'United States' => 'us',
        'Canada' => 'ca',
        'Brazil' => 'br',
        'Argentina' => 'ar',
    ]);

echo "<h4>Using Array</h4>";
echo $array;


/*
 * Example 3: Remote search using a URI.
 */

$remote = (new SearchableSelect())
    ->name('city')
    ->placeholder('Search for a city...')
    ->searchUrl('/api/cities/search?q={query}')
    ->minimumInputLength(2)
    ->delay(300)
    ->limit(20);

echo "<h4>Searching by Ajax</h4>";
echo $remote;
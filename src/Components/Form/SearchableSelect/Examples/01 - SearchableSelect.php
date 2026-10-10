<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\SearchableSelect\SearchableSelect;
?>

<section>
    <h4>Example 1: Fluent API</h4>

    <?php
    echo (new SearchableSelect())
        ->name('country')
        ->placeholder('Search for a country...')
        ->option('Mexico', 'mx')
        ->option('United States', 'us')
        ->option('Canada', 'ca')
        ->option('Brazil', 'br')
        ->option('Argentina', 'ar');
    ?>
</section>

<section>
    <h4>Example 2: Array Configuration</h4>

    <?php
    echo new SearchableSelect([
        'name' => 'country_array',
        'placeholder' => 'Search for a country...',
        'options' => [
            'Mexico' => 'mx',
            'United States' => 'us',
            'Canada' => 'ca',
            'Brazil' => 'br',
            'Argentina' => 'ar',
        ],
    ]);
    ?>
</section>

<section>
    <h4>Example 3: Preselected Option</h4>

    <?php
    echo (new SearchableSelect())
        ->name('selected_country')
        ->placeholder('Search for a country...')
        ->option('Mexico', 'mx')
        ->option('United States', 'us')
        ->option('Canada', 'ca')
        ->selected('ca');
    ?>
</section>

<section>
    <h4>Example 4: Required Selection</h4>

    <?php
    echo (new SearchableSelect())
        ->name('required_country')
        ->placeholder('Select a country...')
        ->option('Mexico', 'mx')
        ->option('United States', 'us')
        ->option('Canada', 'ca')
        ->required();
    ?>
</section>

<section>
    <h4>Example 5: Disabled Component</h4>

    <?php
    echo (new SearchableSelect())
        ->name('disabled_country')
        ->placeholder('Country selection disabled')
        ->option('Mexico', 'mx')
        ->option('United States', 'us')
        ->option('Canada', 'ca')
        ->disabled();
    ?>
</section>

<section>
    <h4>Example 6: Remote Search</h4>

    <?php
    echo (new SearchableSelect())
        ->name('city')
        ->placeholder('Search for a city...')
        ->searchUrl('/api/cities/search?q={query}')
        ->minimumInputLength(2)
        ->delay(300)
        ->limit(20);
    ?>
</section>

<section>
    <h4>Example 7: Remote Search with Custom Limit and Delay</h4>

    <?php
    echo (new SearchableSelect())
        ->name('customer')
        ->placeholder('Search for a customer...')
        ->searchUrl('/api/customers/search?q={query}')
        ->minimumInputLength(3)
        ->delay(500)
        ->limit(10);
    ?>
</section>

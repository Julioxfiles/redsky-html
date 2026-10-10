<?php

declare(strict_types=1);

use RedSky\Html\Components\Form\SearchInput\SearchInput;


// ============================================================
// Example 1: Basic Search Form
// ============================================================

$basicSearch = (new SearchInput('query'))
    ->placeholder('Search...')
    ->required();

echo '<h4>Basic Search Form</h4>';
echo '<form method="GET" action="/search">';
echo $basicSearch;
echo '<button type="submit">Search</button>';
echo '</form>';


// ============================================================
// Example 2: Filter a List While Typing
// ============================================================

$listSearch = (new SearchInput('filter'))
    ->placeholder('Filter names...')
    ->addAttribute('id', 'name-filter');

echo '<h4>Filter a List</h4>';
echo $listSearch;

echo '<ul id="name-list">';
echo '<li>John Smith</li>';
echo '<li>Mary Johnson</li>';
echo '<li>Peter Williams</li>';
echo '<li>Sarah Brown</li>';
echo '<li>Michael Davis</li>';
echo '</ul>';

?>

<script type="module">
const searchInput = document.querySelector('#name-filter');
const listItems = document.querySelectorAll('#name-list li');

searchInput?.addEventListener('input', () => {
    const query = searchInput.value.trim().toLowerCase();

    listItems.forEach((item) => {
        item.hidden = !item.textContent.toLowerCase().includes(query);
    });
});
</script>

<?php

// ============================================================
// Example 3: Remote Search Using Fetch
// ============================================================

$remoteSearch = (new SearchInput('remote_query'))
    ->placeholder('Search users (type at least 2 characters)...')
    ->addAttribute('id', 'remote-search');

echo '<h4>Remote Search with Fetch</h4>';
echo $remoteSearch;

echo '<p id="remote-search-status" role="status" aria-live="polite"></p>';
echo '<ul id="remote-search-results"></ul>';

?>

<script type="module">
const remoteSearch = document.querySelector('#remote-search');
const status = document.querySelector('#remote-search-status');
const resultsList = document.querySelector('#remote-search-results');

let controller;

remoteSearch?.addEventListener('input', async () => {
    const query = remoteSearch.value.trim();

    controller?.abort();

    if (query.length < 2) {
        status.textContent = 'Enter at least 2 characters.';
        resultsList.replaceChildren();
        return;
    }

    controller = new AbortController();

    status.textContent = 'Searching...';
    resultsList.replaceChildren();

    try {
        const url = new URL('/api/search', window.location.origin);
        url.searchParams.set('q', query);

        const response = await fetch(url, {
            signal: controller.signal,
            headers: {
                Accept: 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error: ${response.status}`);
        }

        const results = await response.json();

        // This example expects a JSON array of strings.
        if (!Array.isArray(results)) {
            throw new Error('The API must return a JSON array.');
        }

        const fragment = document.createDocumentFragment();

        results.forEach((result) => {
            const item = document.createElement('li');
            item.textContent = String(result);
            fragment.appendChild(item);
        });

        resultsList.replaceChildren(fragment);
        status.textContent = `${results.length} result(s) found.`;
    } catch (error) {
        if (error.name === 'AbortError') {
            return;
        }

        status.textContent = 'Unable to complete the search.';
        console.error('Search failed:', error);
    }
});
</script>

<?php

// ============================================================
// Example 4: Search with Debounce
// ============================================================

$debouncedSearch = (new SearchInput('debounced_query'))
    ->placeholder('Search with debounce...')
    ->addAttribute('id', 'debounced-search');

echo '<h4>Search with Debounce</h4>';
echo $debouncedSearch;

echo '<p id="debounced-search-status" role="status" aria-live="polite"></p>';

?>

<script type="module">
const debouncedSearch = document.querySelector('#debounced-search');
const debouncedStatus = document.querySelector('#debounced-search-status');

let debounceTimer;

debouncedSearch?.addEventListener('input', () => {
    clearTimeout(debounceTimer);

    const query = debouncedSearch.value.trim();

    if (query.length === 0) {
        debouncedStatus.textContent = '';
        return;
    }

    debouncedStatus.textContent = 'Waiting for input...';

    debounceTimer = setTimeout(() => {
        debouncedStatus.textContent = `Ready to search for: ${query}`;

        // Perform the search here, for example by calling fetch().
    }, 300);
});
</script>
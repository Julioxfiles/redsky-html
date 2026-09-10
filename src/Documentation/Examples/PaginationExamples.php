<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

    #[Example(
        title: 'Basic Pagination',
        description: 'A simple pagination component with previous, next, and numbered pages.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(2)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1'],
        ['label' => '2', 'href' => '?page=2', 'active' => true],
        ['label' => '3', 'href' => '?page=3'],
        ['label' => '4', 'href' => '?page=4'],
        ['label' => '5', 'href' => '?page=5'],
    ])
    ->previous('Previous', '?page=1')
    ->next('Next', '?page=3');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-basic [data-pagination-items] {
        display: flex;
        gap: .5rem;
        margin: 0;
        padding: 0;
        list-style: none;
        align-items: center;
    }

    .pagination-basic a,
    .pagination-basic span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 .75rem;
        border: 1px solid #d1d5db;
        border-radius: .5rem;
        text-decoration: none;
        color: #374151;
        background: #ffffff;
        font-family: system-ui, sans-serif;
        font-size: .9rem;
    }

    .pagination-basic a:hover {
        background: #f3f4f6;
    }

    .pagination-basic [data-pagination-active] a {
        background: #2563eb;
        border-color: #2563eb;
        color: #ffffff;
    }

    .pagination-basic [data-pagination-disabled] span {
        color: #9ca3af;
        background: #f9fafb;
        cursor: not-allowed;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-basic"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <a href="?page=1">Previous</a>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=2">2</a>
        </li>

        <li data-pagination-item>
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=3">Next</a>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'First Page',
        description: 'Pagination on the first page with the Previous control disabled.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(1)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1', 'active' => true],
        ['label' => '2', 'href' => '?page=2'],
        ['label' => '3', 'href' => '?page=3'],
        ['label' => '4', 'href' => '?page=4'],
        ['label' => '5', 'href' => '?page=5'],
    ])
    ->previous('Previous')
    ->next('Next', '?page=2');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-first [data-pagination-items] {
        display: flex;
        gap: .35rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pagination-first a,
    .pagination-first span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.25rem;
        height: 2.25rem;
        padding: 0 .7rem;
        border-radius: .375rem;
        text-decoration: none;
        font-family: system-ui, sans-serif;
        font-size: .875rem;
    }

    .pagination-first a {
        color: #374151;
        background: #f3f4f6;
    }

    .pagination-first a:hover {
        background: #e5e7eb;
    }

    .pagination-first [data-pagination-active] a {
        color: #ffffff;
        background: #111827;
    }

    .pagination-first [data-pagination-disabled] span {
        color: #9ca3af;
        background: #f9fafb;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-first"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li
            data-pagination-navigation
            data-pagination-disabled
            aria-disabled="true"
        >
            <span>Previous</span>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=1">1</a>
        </li>

        <li data-pagination-item>
            <a href="?page=2">2</a>
        </li>

        <li data-pagination-item>
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=2">Next</a>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'Last Page',
        description: 'Pagination on the last page with the Next control disabled.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(5)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1'],
        ['label' => '2', 'href' => '?page=2'],
        ['label' => '3', 'href' => '?page=3'],
        ['label' => '4', 'href' => '?page=4'],
        ['label' => '5', 'href' => '?page=5', 'active' => true],
    ])
    ->previous('Previous', '?page=4')
    ->next('Next');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-last [data-pagination-items] {
        display: flex;
        gap: .5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pagination-last a,
    .pagination-last span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 .75rem;
        border-radius: 999px;
        text-decoration: none;
        font-family: system-ui, sans-serif;
    }

    .pagination-last a {
        color: #1f2937;
        background: #f3f4f6;
    }

    .pagination-last a:hover {
        background: #e5e7eb;
    }

    .pagination-last [data-pagination-active] a {
        color: #ffffff;
        background: #7c3aed;
    }

    .pagination-last [data-pagination-disabled] span {
        color: #9ca3af;
        background: #f9fafb;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-last"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <a href="?page=4">Previous</a>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li data-pagination-item>
            <a href="?page=2">2</a>
        </li>

        <li data-pagination-item>
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=5">5</a>
        </li>

        <li
            data-pagination-navigation
            data-pagination-disabled
            aria-disabled="true"
        >
            <span>Next</span>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'Custom Labels',
        description: 'Pagination using custom labels for the previous and next controls.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(3)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1'],
        ['label' => '2', 'href' => '?page=2'],
        ['label' => '3', 'href' => '?page=3', 'active' => true],
        ['label' => '4', 'href' => '?page=4'],
        ['label' => '5', 'href' => '?page=5'],
    ])
    ->previous('Back', '?page=2')
    ->next('Forward', '?page=4');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-custom [data-pagination-items] {
        display: flex;
        align-items: center;
        gap: .75rem;
        margin: 0;
        padding: .5rem;
        list-style: none;
        border: 1px solid #334155;
        border-radius: .75rem;
        background: #0f172a;
    }

    .pagination-custom a,
    .pagination-custom span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.25rem;
        padding: 0 .75rem;
        border-radius: .5rem;
        text-decoration: none;
        color: #cbd5e1;
        font-family: system-ui, sans-serif;
        font-size: .875rem;
    }

    .pagination-custom a:hover {
        background: #1e293b;
    }

    .pagination-custom [data-pagination-active] a {
        background: #2563eb;
        color: #ffffff;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-custom"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <a href="?page=2">Back</a>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li data-pagination-item>
            <a href="?page=2">2</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=4">Forward</a>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'Pagination from Component Array',
        description: 'Pagination configured from an array of page definitions.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pages = [
    ['label' => '1', 'href' => '?page=1'],
    ['label' => '2', 'href' => '?page=2'],
    ['label' => '3', 'href' => '?page=3', 'active' => true],
    ['label' => '4', 'href' => '?page=4'],
    ['label' => '5', 'href' => '?page=5'],
];

$pagination = new Pagination();

$pagination
    ->currentPage(3)
    ->totalPages(count($pages))
    ->items($pages)
    ->previous('Previous', '?page=2')
    ->next('Next', '?page=4');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-array [data-pagination-items] {
        display: flex;
        align-items: center;
        gap: .25rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pagination-array a,
    .pagination-array span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 .75rem;
        text-decoration: none;
        border-radius: .25rem;
        font-family: system-ui, sans-serif;
    }

    .pagination-array a {
        color: #475569;
    }

    .pagination-array a:hover {
        background: #e2e8f0;
    }

    .pagination-array [data-pagination-active] a {
        background: #0f766e;
        color: #ffffff;
    }

    .pagination-array [data-pagination-navigation] a {
        padding-inline: 1rem;
        font-weight: 600;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-array"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <a href="?page=2">Previous</a>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li data-pagination-item>
            <a href="?page=2">2</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=4">Next</a>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'Disabled Page',
        description: 'Pagination containing a disabled page item.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(2)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1'],
        ['label' => '2', 'href' => '?page=2', 'active' => true],
        ['label' => '3', 'href' => '?page=3'],
        ['label' => '4', 'href' => '?page=4', 'disabled' => true],
        ['label' => '5', 'href' => '?page=5'],
    ])
    ->previous('Previous', '?page=1')
    ->next('Next', '?page=3');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-disabled [data-pagination-items] {
        display: flex;
        gap: .5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pagination-disabled a,
    .pagination-disabled span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 .75rem;
        border: 1px solid #d1d5db;
        border-radius: .5rem;
        text-decoration: none;
        color: #374151;
        background: #ffffff;
        font-family: system-ui, sans-serif;
    }

    .pagination-disabled a:hover {
        background: #f3f4f6;
    }

    .pagination-disabled [data-pagination-active] a {
        background: #111827;
        border-color: #111827;
        color: #ffffff;
    }

    .pagination-disabled [data-pagination-disabled] span {
        color: #9ca3af;
        background: #f3f4f6;
        border-color: #e5e7eb;
        cursor: not-allowed;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-disabled"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <a href="?page=1">Previous</a>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=2">2</a>
        </li>

        <li data-pagination-item>
            <a href="?page=3">3</a>
        </li>

        <li
            data-pagination-item
            data-pagination-disabled
            aria-disabled="true"
        >
            <span>4</span>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=3">Next</a>
        </li>
    </ul>
</nav>
HTML
    )]

    #[Example(
        title: 'Minimal Pagination',
        description: 'A compact pagination style suitable for simple application interfaces.',
        language: 'php',
        code: <<<'PHP'
use RedSky\Html\Components\Navigation\Pagination;

$pagination = new Pagination();

$pagination
    ->currentPage(3)
    ->totalPages(5)
    ->items([
        ['label' => '1', 'href' => '?page=1'],
        ['label' => '2', 'href' => '?page=2'],
        ['label' => '3', 'href' => '?page=3', 'active' => true],
        ['label' => '4', 'href' => '?page=4'],
        ['label' => '5', 'href' => '?page=5'],
    ])
    ->previous('<')
    ->next('>', '?page=4');

echo $pagination;
PHP,
        output: <<<'HTML'
<style>
    .pagination-minimal [data-pagination-items] {
        display: flex;
        align-items: center;
        gap: .25rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .pagination-minimal a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: .375rem;
        text-decoration: none;
        color: #4b5563;
        font-family: system-ui, sans-serif;
    }

    .pagination-minimal a:hover {
        background: #f3f4f6;
    }

    .pagination-minimal [data-pagination-active] a {
        background: #2563eb;
        color: #ffffff;
        font-weight: 600;
    }

    .pagination-minimal [data-pagination-disabled] span {
        color: #d1d5db;
    }
</style>

<nav
    data-redsky-component="pagination"
    class="pagination-minimal"
    aria-label="Pagination"
>
    <ul data-pagination-items>
        <li data-pagination-navigation>
            <span>&lt;</span>
        </li>

        <li data-pagination-item>
            <a href="?page=1">1</a>
        </li>

        <li data-pagination-item>
            <a href="?page=2">2</a>
        </li>

        <li
            data-pagination-item
            data-pagination-active
            aria-current="page"
        >
            <a href="?page=3">3</a>
        </li>

        <li data-pagination-item>
            <a href="?page=4">4</a>
        </li>

        <li data-pagination-item>
            <a href="?page=5">5</a>
        </li>

        <li data-pagination-navigation>
            <a href="?page=4">&gt;</a>
        </li>
    </ul>
</nav>
HTML
    )]
class PaginationExamples
{
}
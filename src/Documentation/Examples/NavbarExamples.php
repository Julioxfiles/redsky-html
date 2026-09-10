<?php

declare(strict_types=1);

namespace RedSky\Html\Documentation\Examples;

use RedSky\Html\Metadata\Example;

#[Example(
    title: 'Modern SaaS Navbar',
    description: 'A polished SaaS navigation bar with product navigation, resources, and an account area.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar
    ->brand('RedSky')
    ->class('navbar-saas')
    ->attribute(
        'style',
        'display:flex;align-items:center;gap:2rem;'
        . 'padding:1rem 1.5rem;'
        . 'background:#0f172a;'
        . 'border:1px solid #1e293b;'
        . 'border-radius:14px;'
        . 'box-shadow:0 10px 30px rgba(15,23,42,.25);'
        . 'font-family:Inter,system-ui,sans-serif;'
    )
    ->items([
        ['label' => 'Platform', 'href' => '/platform'],
        ['label' => 'Solutions', 'href' => '/solutions'],
        ['label' => 'Developers', 'href' => '/developers'],
        ['label' => 'Resources', 'href' => '/resources'],
        ['label' => 'Pricing', 'href' => '/pricing'],
        ['label' => 'Sign In', 'href' => '/login'],
    ]);

echo $navbar;
PHP,
    output: <<<'HTML'
<nav
    data-redsky-component="navbar"
    class="navbar-saas"
    style="display:flex;align-items:center;gap:2rem;padding:1rem 1.5rem;background:#0f172a;border:1px solid #1e293b;border-radius:14px;box-shadow:0 10px 30px rgba(15,23,42,.25);font-family:Inter,system-ui,sans-serif;"
>
    <a data-navbar-brand href="/">RedSky</a>

    <ul data-navbar-items>
        <li data-navbar-item>
            <a href="/platform">Platform</a>
        </li>
        <li data-navbar-item>
            <a href="/solutions">Solutions</a>
        </li>
        <li data-navbar-item>
            <a href="/developers">Developers</a>
        </li>
        <li data-navbar-item>
            <a href="/resources">Resources</a>
        </li>
        <li data-navbar-item>
            <a href="/pricing">Pricing</a>
        </li>
        <li data-navbar-item>
            <a href="/login">Sign In</a>
        </li>
    </ul>
</nav>
HTML
)]
#[Example(
    title: 'Premium Business Navbar',
    description: 'An elegant business navigation bar designed for a premium corporate website.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar
    ->brand('RED SKY')
    ->class('navbar-business')
    ->attribute(
        'style',
        'display:flex;align-items:center;justify-content:space-between;'
        . 'padding:1.25rem 2rem;'
        . 'background:#fafaf9;'
        . 'border-bottom:1px solid #d6d3d1;'
        . 'font-family:Georgia,serif;'
        . 'letter-spacing:.04em;'
    )
    ->items([
        ['label' => 'About', 'href' => '/about'],
        ['label' => 'Services', 'href' => '/services'],
        ['label' => 'Case Studies', 'href' => '/case-studies'],
        ['label' => 'Insights', 'href' => '/insights'],
        ['label' => 'Contact', 'href' => '/contact'],
    ]);

echo $navbar;
PHP,
    output: <<<'HTML'
<style>
    .navbar-business a {
        color: #1e293b !important;
        text-decoration: none;
    }

    .navbar-business a:hover {
        color: #b45309 !important;
    }

    .navbar-business [data-navbar-brand] {
        font-size: 1.25rem;
        font-weight: 700;
    }

    .navbar-business [data-navbar-items] {
        display: flex;
        gap: 1.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .navbar-business [data-navbar-item] {
        margin: 0;
        padding: 0;
    }
</style>

<nav
    data-redsky-component="navbar"
    class="navbar-business"
    style="display:flex;align-items:center;justify-content:space-between;padding:1.25rem 2rem;background:#fafaf9;border-bottom:1px solid #d6d3d1;font-family:Georgia,serif;letter-spacing:.04em;"
>
    <a data-navbar-brand href="/">RED SKY</a>

    <ul data-navbar-items>
        <li data-navbar-item>
            <a href="/about">About</a>
        </li>
        <li data-navbar-item>
            <a href="/services">Services</a>
        </li>
        <li data-navbar-item>
            <a href="/case-studies">Case Studies</a>
        </li>
        <li data-navbar-item>
            <a href="/insights">Insights</a>
        </li>
        <li data-navbar-item>
            <a href="/contact">Contact</a>
        </li>
    </ul>
</nav>
HTML
)]
#[Example(
    title: 'Developer Platform Navbar',
    description: 'A developer-focused navigation bar inspired by modern API and cloud platforms.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar
    ->brand('redsky.dev')
    ->class('navbar-developer')
    ->attribute(
        'style',
        'display:flex;align-items:center;gap:1.5rem;'
        . 'padding:.75rem 1rem;'
        . 'background:#09090b;'
        . 'border:1px solid #27272a;'
        . 'border-radius:10px;'
        . 'font-family:ui-monospace,SFMono-Regular,Menlo,monospace;'
    )
    ->items([
        ['label' => 'Docs', 'href' => '/docs'],
        ['label' => 'API', 'href' => '/api'],
        ['label' => 'Components', 'href' => '/components'],
        ['label' => 'Guides', 'href' => '/guides'],
        ['label' => 'Changelog', 'href' => '/changelog'],
        ['label' => 'GitHub', 'href' => '/github'],
    ]);

echo $navbar;
PHP,
    output: <<<'HTML'
<nav
    data-redsky-component="navbar"
    class="navbar-developer"
    style="display:flex;align-items:center;gap:1.5rem;padding:.75rem 1rem;background:#09090b;border:1px solid #27272a;border-radius:10px;font-family:ui-monospace,SFMono-Regular,Menlo,monospace;"
>
    <a data-navbar-brand href="/">redsky.dev</a>

    <ul data-navbar-items>
        <li data-navbar-item>
            <a href="/docs">Docs</a>
        </li>
        <li data-navbar-item>
            <a href="/api">API</a>
        </li>
        <li data-navbar-item>
            <a href="/components">Components</a>
        </li>
        <li data-navbar-item>
            <a href="/guides">Guides</a>
        </li>
        <li data-navbar-item>
            <a href="/changelog">Changelog</a>
        </li>
        <li data-navbar-item>
            <a href="/github">GitHub</a>
        </li>
    </ul>
</nav>
HTML
)]
#[Example(
    title: 'Navbar Without Brand',
    description: 'A navigation bar containing only navigation items.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar->items([
    ['label' => 'Home', 'href' => '/'],
    ['label' => 'Products', 'href' => '/products'],
    ['label' => 'Contact', 'href' => '/contact'],
]);

echo $navbar;
PHP,
    output: <<<'HTML'
<nav data-redsky-component="navbar">
    <ul data-navbar-items>
        <li data-navbar-item><a href="/">Home</a></li>
        <li data-navbar-item><a href="/products">Products</a></li>
        <li data-navbar-item><a href="/contact">Contact</a></li>
    </ul>
</nav>
HTML
)]
#[Example(
    title: 'Styled Navbar',
    description: 'A navbar with custom HTML attributes and styling.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar
    ->brand('RedSky')
    ->class('main-navigation')
    ->attribute(
        'style',
        'border:2px solid #3b82f6;padding:1rem;'
    )
    ->items([
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Customers', 'href' => '/customers'],
        ['label' => 'Orders', 'href' => '/orders'],
    ]);

echo $navbar;
PHP,
    output: <<<'HTML'
<nav
    data-redsky-component="navbar"
    class="main-navigation"
    style="border:2px solid #3b82f6;padding:1rem;"
>
    <a data-navbar-brand href="/">RedSky</a>
    <ul data-navbar-items>
        <li data-navbar-item><a href="/">Home</a></li>
        <li data-navbar-item><a href="/customers">Customers</a></li>
        <li data-navbar-item><a href="/orders">Orders</a></li>
    </ul>
</nav>
HTML
)]
#[Example(
    title: 'Glassmorphism Navbar',
    description: 'A modern glass-style navigation bar with translucent surfaces and subtle visual effects.',
    language: 'php',
    code: <<<'PHP'
use RedSky\Html\Components\Navigation\Navbar;

$navbar = new Navbar();

$navbar
    ->brand('RedSky')
    ->class('navbar-glass')
    ->attribute(
        'style',
        'padding:1rem 1.5rem;'
        . 'background:rgba(255,255,255,.12);'
        . 'border:1px solid rgba(255,255,255,.25);'
        . 'border-radius:16px;'
        . 'backdrop-filter:blur(12px);'
        . 'font-family:Inter,system-ui,sans-serif;'
    )
    ->items([
        ['label' => 'Discover', 'href' => '/discover'],
        ['label' => 'Explore', 'href' => '/explore'],
        ['label' => 'Collections', 'href' => '/collections'],
        ['label' => 'Community', 'href' => '/community'],
        ['label' => 'Get Started', 'href' => '/signup'],
    ]);

echo $navbar;
PHP,
    output: <<<'HTML'
<style>
    .navbar-glass a {
        color:#e2e8f0 !important;
        text-decoration:none;
    }

    .navbar-glass a:hover {
        color:#ffffff !important;
    }

    .navbar-glass [data-navbar-brand] {
        color:#ffffff !important;
        font-size:1.2rem;
        font-weight:700;
    }

    .navbar-glass [data-navbar-items] {
        display:flex;
        align-items:center;
        gap:.5rem;
        margin:0;
        padding:0;
        list-style:none;
    }

    .navbar-glass [data-navbar-item] {
        margin:0;
        padding:0;
    }

    .navbar-glass [data-navbar-item] a {
        display:block;
        padding:.5rem .8rem;
        border-radius:8px;
        transition:background .2s ease;
    }

    .navbar-glass [data-navbar-item] a:hover {
        background:rgba(255,255,255,.12);
    }
</style>

<nav
    data-redsky-component="navbar"
    class="navbar-glass"
    style="padding:1rem 1.5rem;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);border-radius:16px;backdrop-filter:blur(12px);font-family:Inter,system-ui,sans-serif;"
>
    <a data-navbar-brand href="/">RedSky</a>

    <ul data-navbar-items>
        <li data-navbar-item>
            <a href="/discover">Discover</a>
        </li>
        <li data-navbar-item>
            <a href="/explore">Explore</a>
        </li>
        <li data-navbar-item>
            <a href="/collections">Collections</a>
        </li>
        <li data-navbar-item>
            <a href="/community">Community</a>
        </li>
        <li data-navbar-item>
            <a href="/signup">Get Started</a>
        </li>
    </ul>
</nav>
HTML
)]
final class NavbarExamples
{
}
<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML <script> element.
 *
 * The script element embeds or references executable code,
 * typically JavaScript.
 *
 * Example:
 *
 * ```php
 * $script = (new Script())
 *     ->src('/js/app.js')
 *     ->defer();
 *
 * $inline = (new Script())
 *     ->javascript("console.log('Hello');");
 * ```
 *
 * Renders:
 *
 * ```html
 * <script src="/js/app.js" defer></script>
 *
 * <script>
 * console.log('Hello');
 * </script>
 * ```
 */
class Script extends HtmlComponent
{
    /**
     * Creates a new script component.
     */
    public function __construct()
    {
        parent::__construct('script');
    }

    /**
     * Sets the source URL.
     */
    public function src(string $src): static
    {
        return $this->attribute('src', $src);
    }

    /**
     * Sets the script type.
     */
    public function type(string $type): static
    {
        return $this->attribute('type', $type);
    }

    /**
     * Sets the nonce attribute.
     */
    public function nonce(string $nonce): static
    {
        return $this->attribute('nonce', $nonce);
    }

    /**
     * Marks the script as asynchronous.
     */
    public function async(): static
    {
        return $this->attribute('async', true);
    }

    /**
     * Defers script execution.
     */
    public function defer(): static
    {
        return $this->attribute('defer', true);
    }

    /**
     * Sets the crossorigin attribute.
     */
    public function crossorigin(string $value = 'anonymous'): static
    {
        return $this->attribute('crossorigin', $value);
    }

    /**
     * Sets the integrity attribute.
     */
    public function integrity(string $hash): static
    {
        return $this->attribute('integrity', $hash);
    }

    /**
     * Sets the referrerpolicy attribute.
     */
    public function referrerPolicy(string $policy): static
    {
        return $this->attribute('referrerpolicy', $policy);
    }

    /**
     * Sets inline JavaScript.
     */
    public function javascript(string $code): static
    {
        return $this->text($code);
    }
}
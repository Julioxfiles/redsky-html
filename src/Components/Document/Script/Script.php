<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Document\Script;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML <script> element.
 *
 * The Script component generates a semantic HTML <script>
 * element used to embed executable code or reference an
 * external script resource, typically JavaScript.
 *
 * It supports both external scripts through the src() method
 * and inline JavaScript through the javascript() method.
 *
 * The component provides fluent methods for configuring
 * common script attributes such as type, nonce, async, defer,
 * crossorigin, integrity, and referrer policy.
 *
 * Script extends HtmlComponent and inherits common functionality
 * for managing attributes, classes, styles, content, and other
 * HTML component features.
 *
 * The component is UI-library agnostic and does not apply
 * default classes or styles.
 *
 * The component can be rendered explicitly using render()
 * or converted automatically to its HTML representation
 * through __toString().
 *
 * Example:
 *
 * ```php
 * echo (new Script())
 *     ->src('/js/app.js')
 *     ->defer()
 *     ->attribute('id', 'app-script')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <script src="/js/app.js" defer id="app-script"></script>
 * ```
 *
 * @package RedSky\Html\Components\Document
 */
#[Example(
    title: 'External JavaScript',
    code: <<<'PHP'
    echo (new Script())
        ->src('/js/app.js')
        ->defer()
        ->attribute('id', 'app-script')
        ->render();
    PHP,
    description: 'The Script component generates a semantic HTML
                 <script> element for embedding inline JavaScript
                 or referencing an external script resource. It
                 provides fluent methods for configuring common
                 script loading and security attributes.',
    language: 'php',
    primary: true,
    output: '<script src="/js/app.js" defer id="app-script"></script>'
)]
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
     * Sets the source URL of an external script.
     *
     * Corresponds to the HTML `src` attribute.
     *
     * @param string $src Script resource URL.
     *
     * @return static
     */
    public function src(
        string $src
    ): static {
        return $this->attribute(
            'src',
            $src
        );
    }

    /**
     * Sets the script type.
     *
     * Corresponds to the HTML `type` attribute.
     *
     * @param string $type Script MIME type or module type.
     *
     * @return static
     */
    public function type(
        string $type
    ): static {
        return $this->attribute(
            'type',
            $type
        );
    }

    /**
     * Sets the Content Security Policy nonce.
     *
     * Corresponds to the HTML `nonce` attribute.
     *
     * @param string $nonce Cryptographic nonce value.
     *
     * @return static
     */
    public function nonce(
        string $nonce
    ): static {
        return $this->attribute(
            'nonce',
            $nonce
        );
    }

    /**
     * Marks the script for asynchronous execution.
     *
     * Corresponds to the HTML boolean `async` attribute.
     *
     * @return static
     */
    public function async(): static
    {
        return $this->attribute(
            'async',
            true
        );
    }

    /**
     * Defers script execution until the document has been parsed.
     *
     * Corresponds to the HTML boolean `defer` attribute.
     *
     * @return static
     */
    public function defer(): static
    {
        return $this->attribute(
            'defer',
            true
        );
    }

    /**
     * Sets the cross-origin request mode.
     *
     * Corresponds to the HTML `crossorigin` attribute.
     *
     * @param string $value Cross-origin mode, such as `anonymous`.
     *
     * @return static
     */
    public function crossorigin(
        string $value = 'anonymous'
    ): static {
        return $this->attribute(
            'crossorigin',
            $value
        );
    }

    /**
     * Sets the Subresource Integrity hash.
     *
     * Corresponds to the HTML `integrity` attribute.
     *
     * @param string $hash Integrity metadata.
     *
     * @return static
     */
    public function integrity(
        string $hash
    ): static {
        return $this->attribute(
            'integrity',
            $hash
        );
    }

    /**
     * Sets the referrer policy.
     *
     * Corresponds to the HTML `referrerpolicy` attribute.
     *
     * @param string $policy Referrer policy value.
     *
     * @return static
     */
    public function referrerPolicy(
        string $policy
    ): static {
        return $this->attribute(
            'referrerpolicy',
            $policy
        );
    }

    /**
     * Sets inline JavaScript code.
     *
     * The supplied code becomes the text content of the
     * script element.
     *
     * @param string $code JavaScript source code.
     *
     * @return static
     */
    public function javascript(
        string $code
    ): static {
        return $this->text($code);
    }
}
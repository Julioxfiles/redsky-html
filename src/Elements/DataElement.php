<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML data element.
 *
 * The data element links visible content with
 * a machine-readable value.
 *
 * Common uses:
 *
 * - Product identifiers.
 * - Database references.
 * - Structured data.
 *
 * @package RedSky\Html\Elements
 */
class DataElement extends HtmlElement
{
    /**
     * Creates a new data element.
     */
    public function __construct()
    {
        parent::__construct('data');
    }


    /**
     * Sets machine-readable value.
     *
     * @param string $value
     *
     * @return static
     */
    public function value(
        string $value
    ): static {
        $this->setAttribute(
            'value',
            $value
        );

        return $this;
    }
}
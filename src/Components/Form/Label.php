<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML label component.
 *
 * The label component generates a semantic HTML
 * label element associated with a form control.
 *
 * This component is UI-library agnostic and
 * does not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class Label extends HtmlComponent
{
    /**
     * Creates a new label component.
     *
     * @param string|null $text
     */
    public function __construct(
        ?string $text = null
    ) {
        parent::__construct('label');

        if ($text !== null) {
            $this->text($text);
        }
    }

    /**
     * Associates the label with a form control.
     *
     * @param string $id
     *
     * @return static
     */
    public function for(
        string $id
    ): static {
        return $this->attribute(
            'for',
            $id
        );
    }

    
    /**
     * Sets label title.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(
        string $title
    ): static {
        return $this->attribute(
            'title',
            $title
        );
    }


    /**
     * Sets label access key.
     *
     * @param string $accesskey
     *
     * @return static
     */
    public function accesskey(
        string $accesskey
    ): static {
        return $this->attribute(
            'accesskey',
            $accesskey
        );
    }   
}
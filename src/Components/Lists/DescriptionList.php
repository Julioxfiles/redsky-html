<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML description list component.
 *
 * The description list component generates a
 * semantic HTML dl element.
 *
 * Description terms and details should be added
 * using DescriptionTerm and DescriptionDetails
 * components.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Lists
 */
class DescriptionList extends HtmlComponent
{
    /**
     * Creates a new description list component.
     */
    public function __construct()
    {
        parent::__construct('dl');
    }


    /**
     * Adds a description term.
     *
     * @param DescriptionTerm $term
     *
     * @return static
     */
    public function addTerm(
        DescriptionTerm $term
    ): static {
        return $this->addChild($term);
    }


    /**
     * Adds multiple description terms.
     *
     * @param array<int, DescriptionTerm> $terms
     *
     * @return static
     */
    public function addTerms(
        array $terms
    ): static {
        foreach ($terms as $term) {
            $this->addTerm($term);
        }

        return $this;
    }


    /**
     * Adds description details.
     *
     * @param DescriptionDetails $details
     *
     * @return static
     */
    public function addDetails(
        DescriptionDetails $details
    ): static {
        return $this->addChild($details);
    }


    /**
     * Adds multiple description details.
     *
     * @param array<int, DescriptionDetails> $details
     *
     * @return static
     */
    public function addDetailsList(
        array $details
    ): static {
        foreach ($details as $detail) {
            $this->addDetails($detail);
        }

        return $this;
    }
}
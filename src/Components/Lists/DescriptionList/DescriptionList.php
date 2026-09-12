<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Lists\DescriptionList;

use RedSky\Html\Components\HtmlComponent;

use RedSky\Html\Components\Lists\DescriptionTerm\DescriptionTerm;
use RedSky\Html\Components\Lists\DescriptionDetails\DescriptionDetails;

/**
 * Represents an HTML <dl> element.
 *
 * The DescriptionList component generates a semantic HTML
 * <dl> element used to contain a list of terms and their
 * corresponding descriptions or values.
 *
 * Description terms are represented by DescriptionTerm
 * components, while their associated descriptions are
 * represented by DescriptionDetails components.
 *
 * The component provides dedicated methods for adding individual
 * or multiple terms and details while preserving the semantic
 * structure of the description list.
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
     * Adds a description term to the list.
     *
     * @param DescriptionTerm $term Description term component.
     *
     * @return static
     */
    public function addTerm(
        DescriptionTerm $term
    ): static {
        return $this->addChild($term);
    }

    /**
     * Adds multiple description terms to the list.
     *
     * @param array<int, DescriptionTerm> $terms Description terms.
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
     * Adds description details to the list.
     *
     * @param DescriptionDetails $details Description details component.
     *
     * @return static
     */
    public function addDetails(
        DescriptionDetails $details
    ): static {
        return $this->addChild($details);
    }

    /**
     * Adds multiple description details to the list.
     *
     * @param array<int, DescriptionDetails> $details Description details.
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
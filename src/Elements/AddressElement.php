<?php

declare(strict_types=1);

namespace RedSky\Html\Elements;

/**
 * Represents an HTML contact information element.
 *
 * The address element represents contact
 * information for the nearest article or body
 * element ancestor.
 *
 * It is commonly used for author information,
 * email addresses, physical addresses, or
 * other contact details associated with a document.
 *
 * Example:
 *
 * <code>
 * <address>
 *     Contact: admin@example.com
 * </address>
 * </code>
 *
 * @package RedSky\Html\Elements
 */
class AddressElement extends HtmlElement
{
    /**
     * Creates a new address element.
     */
    public function __construct()
    {
        parent::__construct('address');
    }
}
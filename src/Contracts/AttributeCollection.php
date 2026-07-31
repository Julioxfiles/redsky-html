<?php

declare(strict_types=1);

namespace RedSky\Html\Contracts;

/**
 * Defines the contract for attribute collections.
 *
 * An attribute collection manages multiple HTML attributes
 * as a structured collection.
 *
 * @package RedSky\Html\Contracts
 */
interface AttributeCollection extends
    Attributeable,
    RenderableAttributes,
    SerializableAttributes
{
}
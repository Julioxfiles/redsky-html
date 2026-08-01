<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

use Countable;
use IteratorAggregate;
use RedSky\Html\Contracts\Eventable;
use Traversable;

/**
 * Represents a collection of HTML event attributes.
 *
 * This collection stores objects implementing the Eventable contract
 * and provides basic operations for managing them.
 *
 * @implements IteratorAggregate<int, Eventable>
 */
class EventCollection extends Collection implements Countable, IteratorAggregate
{
    
    /**
     * Determines whether the collection contains an event.
     *
     * Comparison is performed using strict identity.
     *
     * @param Eventable $event The event instance.
     *
     * @return bool
     */
    public function contains(Eventable $event): bool
    {
        foreach ($this->items as $item) {
            if ($item === $event) {
                return true;
            }
        }

        return false;
    }

    
    /**
     * Returns the collection items.
     *
     * @return array<int, Eventable>
     */
    public function all(): array
    {
        /** @var array<int, Eventable> $items */
        $items = $this->items;

        return $items;
    }

    /**
     * Returns an iterator for the collection.
     *
     * @return Traversable<int, Eventable>
     */
    public function getIterator(): Traversable
    {
        yield from $this->all();
    }
}
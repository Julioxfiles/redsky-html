<?php

declare(strict_types=1);

namespace RedSky\Html\Collections;

/**
 * Represents a collection of child nodes.
 *
 * This collection manages hierarchical child objects used by
 * RedSky HTML structures.
 *
 * Supported children may include:
 *
 * - Elements.
 * - Components.
 * - Text nodes.
 * - Renderable objects.
 * - Document fragments.
 *
 * The purpose of this collection is to provide a consistent API
 * for managing HTML trees.
 *
 * @package RedSky\Html\Collections
 */
class ChildrenCollection extends Collection
{
    /**
     * Adds a child node.
     *
     * @param mixed $child Child object.
     *
     * @return static
     */
    public function addChild(
        mixed $child
    ): static {
        return $this->add($child);
    }


    /**
     * Removes a child node.
     *
     * @param mixed $child Child object.
     *
     * @return static
     */
    public function removeChild(
        mixed $child
    ): static {
        foreach ($this->items as $key => $item) {
            if ($item === $child) {
                unset($this->items[$key]);
            }
        }

        return $this->reindex();
    }


    /**
     * Returns all child nodes.
     *
     * @return array<int, mixed>
     */
    public function children(): array
    {
        return array_values($this->items);
    }


    /**
     * Returns the child at a position.
     *
     * @param int $index Child index.
     *
     * @return mixed|null
     */
    public function childAt(
        int $index
    ): mixed {
        return $this->items[$index] ?? null;
    }


    /**
     * Inserts a child at the beginning.
     *
     * @param mixed $child Child object.
     *
     * @return static
     */
    public function prepend(
        mixed $child
    ): static {
        array_unshift(
            $this->items,
            $child
        );

        return $this;
    }


    /**
     * Determines whether children exist.
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return !$this->isEmpty();
    }


    /**
     * Removes all children.
     *
     * @return static
     */
    public function clearChildren(): static
    {
        return $this->clear();
    }


    /**
     * Returns child count.
     *
     * @return int
     */
    public function countChildren(): int
    {
        return $this->count();
    }


    /**
     * Returns renderable children.
     *
     * @return array<int, mixed>
     */
    public function renderableChildren(): array
    {
        return array_filter(
            $this->items,
            static function (mixed $child): bool {
                return method_exists(
                    $child,
                    'render'
                );
            }
        );
    }


    /**
     * Reindexes internal items.
     *
     * @return static
     */
    protected function reindex(): static
    {
        $this->items = array_values(
            $this->items
        );

        return $this;
    }
}
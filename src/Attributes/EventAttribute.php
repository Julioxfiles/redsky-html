<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML event attribute.
 *
 * Examples:
 *
 * - onclick="save()"
 * - onchange="validate()"
 * - onsubmit="return confirm()"
 */
class EventAttribute extends Attribute
{
    /**
     * Creates a new event attribute instance.
     *
     * @param string $name    The event attribute name.
     * @param string $handler The JavaScript event handler.
     */
    public function __construct(
        string $name,
        string $handler
    ) {
        parent::__construct(
            $this->normalizeName($name),
            $handler
        );
    }

    /**
     * Returns the JavaScript handler.
     *
     * @return string
     */
    public function getHandler(): string
    {
        return (string) $this->getValue();
    }

    /**
     * Sets the JavaScript handler.
     *
     * @param string $handler The JavaScript handler.
     *
     * @return static
     */
    public function setHandler(string $handler): static
    {
        $this->setValue($handler);

        return $this;
    }

    /**
     * Returns the event name without the "on" prefix.
     *
     * @return string
     */
    public function getEvent(): string
    {
        return substr($this->getName(), 2);
    }

    /**
     * Sets the event name.
     *
     * @param string $event The event name.
     *
     * @return static
     */
    public function setEvent(string $event): static
    {
        $this->setName(
            $this->normalizeName($event)
        );

        return $this;
    }

    /**
     * Normalizes the event attribute name.
     *
     * Ensures the attribute name starts with the "on" prefix.
     *
     * @param string $name The event name.
     *
     * @return string
     */
    protected function normalizeName(string $name): string
    {
        $name = trim($name);

        if (str_starts_with($name, 'on')) {
            return $name;
        }

        return 'on' . $name;
    }
}
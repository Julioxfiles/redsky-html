<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an HTML heading component.
 *
 * The heading component generates semantic HTML
 * heading elements from h1 to h6.
 *
 * This component is UI-library agnostic and does
 * not apply any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
class Heading extends HtmlComponent
{
    /**
     * Heading level.
     *
     * @var int
     */
    protected int $level;


    /**
     * Creates a new heading component.
     *
     * @param int $level Heading level (1-6).
     * @param string|null $text Heading content.
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        int $level = 1,
        ?string $text = null
    ) {
        $this->validateLevel($level);

        $this->level = $level;

        parent::__construct(
            'h' . $level
        );

        if ($text !== null) {
            $this->text($text);
        }
    }


    /**
     * Sets heading level.
     *
     * @param int $level
     *
     * @return static
     *
     * @throws InvalidArgumentException
     */
    public function level(
        int $level
    ): static {
        $this->validateLevel($level);

        $this->level = $level;

        $this->tag = 'h' . $level;

        return $this;
    }


    /**
     * Returns heading level.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }


    /**
     * Validates heading level.
     *
     * @param int $level
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function validateLevel(
        int $level
    ): void {
        if ($level < 1 || $level > 6) {
            throw new InvalidArgumentException(
                'Heading level must be between 1 and 6.'
            );
        }
    }
}
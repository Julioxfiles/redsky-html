<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Typography;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML heading component.
 *
 * The Heading component generates semantic HTML heading
 * elements from <h1> through <h6>.
 *
 * The heading level is specified when the component is
 * created and can also be changed dynamically using
 * the level() method. Only levels from 1 through 6 are
 * accepted.
 *
 * Text content can be provided through the constructor.
 * Common content, attribute, styling, child-management,
 * rendering, and string-conversion methods are inherited
 * from HtmlComponent.
 *
 * The component is UI-library agnostic and does not apply
 * any default classes or styles.
 *
 * @package RedSky\Html\Components\Typography
 */
#[Example(
    title: 'Heading',
    code: <<<'PHP'
    echo (new Heading(2, 'RedSky Framework'))
        ->class('page-title')
        ->attribute('id', 'main-heading')
        ->render();
    PHP,
    description: 'Creates a semantic HTML heading with a
                 configurable level from h1 through h6.',
    language: 'php',
    primary: true,
    output: '<h2 class="page-title" id="main-heading">RedSky Framework</h2>'
)]
class Heading extends HtmlComponent
{
    /**
     * Heading level.
     *
     * @var int
     */
    protected int $level;
    
    protected HtmlComponent $header;

    protected HtmlComponent $body;

    protected HtmlComponent $footer;

    /**
     * Creates a new heading component.
     *
     * The heading level must be between 1 and 6.
     * The corresponding HTML tag is generated automatically.
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

        $this->header = new class('header') extends HtmlComponent {

        };

        $this->body = new class('section') extends HtmlComponent {
        };

        $this->footer = new class('footer') extends HtmlComponent {
        };
    }


    /**
     * Sets the heading level.
     *
     * Changing the level also changes the underlying
     * HTML tag from h1 through h6.
     *
     * @param int $level Heading level (1-6).
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
     * Returns the current heading level.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }


    /**
     * Validates a heading level.
     *
     * Only heading levels from 1 through 6 are valid
     * according to the HTML heading element range.
     *
     * @param int $level Heading level to validate.
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


    public function bodyAttribute(string $name, mixed $value): static
    {
        $this->body->attribute($name, $value);

        return $this;
    }

    public function bodyClass(string $class): static
    {
        $this->body->class($class);

        return $this;
    }

    public function bodyStyle(string $property, string $value): static
    {
        $this->body->style($property, $value);

        return $this;
    }

    public function bodyData(string $name, mixed $value): static
    {
        $this->body->data($name, $value);

        return $this;
    }

    public function bodyAria(string $name, mixed $value): static
    {
        $this->body->aria($name, $value);

        return $this;
    }


}
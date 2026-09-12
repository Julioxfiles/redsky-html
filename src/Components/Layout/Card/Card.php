<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Card;

use RedSky\Html\Components\Component;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Media\Image\Image;
use RedSky\Html\Components\Navigation\A;
use RedSky\Html\Components\Typography\Heading\Heading;


/**
 * Represents a semantic HTML card component.
 *
 * The Card component generates a reusable semantic HTML
 * structure composed of an <article> element containing
 * a <header>, <section>, and <footer>.
 *
 * An image may optionally be included in the header.
 * The card title is represented by a Heading component.
 * The main content is placed inside the section element.
 * The footer is always rendered and may contain zero or
 * more links, buttons, or other components.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or visual styles.
 *
 * Each part of the card can be configured independently,
 * allowing HTML attributes, classes, styles, event handlers,
 * data attributes, ARIA attributes, and other HTML attributes
 * to be applied to the appropriate element.
 *
 * The component supports both fluent builder configuration
 * and array configuration.
 *
 * @package RedSky\Html\Components\Layout
 */
class Card extends HtmlComponent
{
    /**
     * Card header component.
     *
     * @var HtmlComponent
     */
    protected HtmlComponent $header;

    /**
     * Card body component.
     *
     * @var HtmlComponent
     */
    protected HtmlComponent $body;

    /**
     * Card footer component.
     *
     * @var HtmlComponent
     */
    protected HtmlComponent $footer;

    /**
     * Card title component.
     *
     * @var Heading|null
     */
    protected ?Heading $titleComponent = null;

    /**
     * Card image component.
     *
     * @var Image|null
     */
    protected ?Image $imageComponent = null;

    /**
     * Creates a new card component.
     *
     * @param array $config Card configuration.
     */
    public function __construct(
        array $config = []
    ) {
        parent::__construct('article');

        $this->header = new class('header') extends HtmlComponent {
        };

        $this->body = new class('section') extends HtmlComponent {
        };

        $this->footer = new class('footer') extends HtmlComponent {
        };

        if (array_key_exists('image', $config)) {
            $this->image($config['image']);
        }

        if (array_key_exists('title', $config)) {
            $this->title($config['title']);
        }

        if (array_key_exists('content', $config)) {
            $this->bodyContent($config['content']);
        }

        if (array_key_exists('actions', $config)) {
            $this->actions($config['actions']);
        }

        if (array_key_exists('attributes', $config)) {
            foreach ($config['attributes'] as $name => $value) {
                $this->attribute($name, $value);
            }
        }
    }

    /**
     * Sets the card image.
     *
     * @param Image $image Image component.
     *
     * @return static
     */
    public function image(
        Image $image
    ): static {
        $this->imageComponent = $image;

        $this->header->addChild($image);

        return $this;
    }

    /**
     * Sets the card title.
     *
     * @param string $title Card title.
     * @param int $level Heading level.
     *
     * @return static
     */
    public function title(
        string $title,
        int $level = 2
    ): static {
        $this->titleComponent = new Heading(
            $level,
            $title
        );

        $this->header->addChild(
            $this->titleComponent
        );

        return $this;
    }

    /**
     * Sets the card body content.
     *
     * @param mixed $content Card content.
     *
     * @return static
     */
    public function bodyContent(
        mixed $content
    ): static {
        $this->body->setContent($content);

        return $this;
    }

    /**
     * Adds an action to the card footer.
     *
     * @param Component $action Action component.
     *
     * @return static
     */
    public function action(
        Component $action
    ): static {
        $this->footer->addChild($action);

        return $this;
    }

    /**
     * Adds multiple actions to the card footer.
     *
     * @param array $actions Action components.
     *
     * @return static
     */
    public function actions(
        array $actions
    ): static {
        foreach ($actions as $action) {
            $this->action($action);
        }

        return $this;
    }

    /**
     * Returns the card header component.
     *
     * @return HtmlComponent
     */
    public function header(): HtmlComponent
    {
        return $this->header;
    }

    /**
     * Returns the card title component.
     *
     * @return Heading|null
     */
    public function titleComponent(): ?Heading
    {
        return $this->titleComponent;
    }

    /**
     * Returns the card image component.
     *
     * @return Image|null
     */
    public function imageComponent(): ?Image
    {
        return $this->imageComponent;
    }

    /**
     * Returns the card body component.
     *
     * @return HtmlComponent
     */
    public function bodyComponent(): HtmlComponent
    {
        return $this->body;
    }

    /**
     * Returns the card footer component.
     *
     * @return HtmlComponent
     */
    public function footerComponent(): HtmlComponent
    {
        return $this->footer;
    }

    /**
     * Renders the card as HTML.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return sprintf(
            '<%s%s>%s%s%s</%s>',
            $this->tag,
            $attributes,
            $this->header->render(),
            $this->body->render(),
            $this->footer->render(),
            $this->tag
        );
    }
}
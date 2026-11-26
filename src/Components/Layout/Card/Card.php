<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Layout\Card;

use RedSky\Html\Components\Component;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Media\Image\Image;
use RedSky\Html\Components\Typography\Heading\Heading;

/**
 * Provides a base implementation for card components.
 *
 * The Card class manages common card data and configuration,
 * including images, titles, body content, and actions.
 *
 * It does not define or generate a specific HTML structure.
 * Concrete card implementations must define their own markup
 * by implementing the render() method.
 *
 * @package RedSky\Html\Components\Layout\Card
 */
abstract class Card extends HtmlComponent
{
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
     * Card body content.
     *
     * @var mixed
     */
    protected mixed $content = null;

    /**
     * Card action components.
     *
     * @var Component[]
     */
    protected array $actionComponents = [];

    /**
     * Creates a new card component.
     *
     * @param array $config Card configuration.
     */
    public function __construct(
        array $config = []
    ) {
        parent::__construct('div');

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
                $this->addAttribute($name, $value);
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
    public function image(Image $image): static {
        
        $this->imageComponent = $image;

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
        $this->content = $content;

        return $this;
    }

    /**
     * Adds an action to the card.
     *
     * @param Component $action Action component.
     *
     * @return static
     */
    public function action(
        Component $action
    ): static {
        $this->actionComponents[] = $action;

        return $this;
    }

    /**
     * Adds multiple actions to the card.
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
     * Returns the card body content.
     *
     * @return mixed
     */
    public function content(): mixed
    {
        return $this->content;
    }

    /**
     * Returns the card action components.
     *
     * @return Component[]
     */
    public function actionComponents(): array
    {
        return $this->actionComponents;
    }

    
}

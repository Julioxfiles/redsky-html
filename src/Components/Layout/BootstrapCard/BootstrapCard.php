<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Layout\BootstrapCard;

use RedSky\Html\Components\Component;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Layout\Card\Card;

/**
 * Represents a Bootstrap-styled card.
 *
 * Builds the HTML structure and applies Bootstrap-compatible
 * CSS classes using the common data provided by Card.
 *
 * @package RedSky\Html\Components\Layout\Card
 */
class BootstrapCard extends Card
{
    /**
     * Initializes the Bootstrap card.
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->addClass('card');
    }


    /**
     * Renders the image section.
     */
    protected function renderImage(): string
    {
        if ($this->imageComponent === null) {
            return '';
        }

        $container = $this->createContainer('div', 'bootstrap-card-image');

        $this->imageComponent->addClass('card-img-top');

        $container->addChild($this->imageComponent);

        return $container->render();
    }

    /**
     * Renders the title section.
     */
    protected function renderHeader(): string
    {
        if ($this->titleComponent === null) {
            return '';
        }

        $header = $this->createContainer('header', 'bootstrap-card-header');

        $header->addChild($this->titleComponent);

        return $header->render();
    }

    /**
     * Renders the body section.
     */
    protected function renderBody(): string
    {
        if ($this->content === null) {
            return '';
        }

        $body = $this->createContainer('div', 'bootstrap-card-body');

        $content = new class('div') extends HtmlComponent {};

        $content->setContent($this->content);

        $body->addChild($content);

        return $body->render();
    }

    /**
     * Renders the actions section.
     */
    protected function renderFooter(): string
    {
        if ($this->actionComponents === []) {
            return '';
        }

        $footer = $this->createContainer('footer', 'bootstrap-card-footer');

        foreach ($this->actionComponents as $action) {
            $footer->addChild($action);
        }

        return $footer->render();
    }

    /**
     * Creates an HTML container with the specified CSS class.
     */
    protected function createContainer(
        string $tag,
        string $class
    ): HtmlComponent {
        $container = new class($tag) extends HtmlComponent {};

        $container->addClass($class);

        return $container;
    }

    /**
     * Renders the complete card.
     */
    public function render(): string
    {
        $html = sprintf('<div%s>', $this->renderAttributes());

        $html .= $this->renderImage();
        $html .= $this->renderHeader();
        $html .= $this->renderBody();
        $html .= $this->renderFooter();

        $html .= '</div>';

        return $html;
    }
}

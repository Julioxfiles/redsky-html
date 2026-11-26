<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Data\RecordCard;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a flexible card for displaying database records.
 *
 * Supports configurable dimensions, optional images, descriptions,
 * metadata, expandable details and action links.
 *
 * @package RedSky\Html\Components\Data\RecordCard
 */
class RecordCard extends HtmlComponent
{
    protected ?string $name = null;

    protected ?string $description = null;

    protected ?string $image = null;

    protected ?string $imageAlt = null;

    protected ?string $createdAt = null;

    protected ?string $status = null;

    protected ?string $width = null;

    protected ?string $height = null;

    protected array $details = [];

    protected array $links = [];

    /**
     * Initializes the record card.
     */
    public function __construct()
    {
        parent::__construct('article');

        $this->addClass('record-card');
        $this->addAttribute('data-redsky-component', 'record-card');
    }

    /**
     * Sets the maximum width of the card.
     */
    public function width(string $width): static
    {
        $this->width = $this->validateDimension($width);

        return $this;
    }

    /**
     * Sets the height of the card.
     */
    public function height(string $height): static
    {
        $this->height = $this->validateDimension($height);

        return $this;
    }

    /**
     * Validates a CSS dimension.
     */
    protected function validateDimension(string $dimension): string
    {
        $dimension = trim($dimension);

        if (!preg_match('/^\d+(?:\.\d+)?(?:px|rem|em|%|vh|vw)$/i', $dimension)) {
            throw new InvalidArgumentException(
                'Invalid CSS dimension: ' . $dimension
            );
        }

        return $dimension;
    }

    /**
     * Sets the record name.
     */
    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Sets the record description.
     */
    public function description(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Sets the record image.
     */
    public function image(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Sets the image alternative text.
     */
    public function imageAlt(string $imageAlt): static
    {
        $this->imageAlt = $imageAlt;

        return $this;
    }

    /**
     * Sets the record creation date.
     */
    public function createdAt(string $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Sets the record status.
     */
    public function status(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Adds an additional record detail.
     */
    public function addDetail(string $label, string $value): static
    {
        if (trim($label) === '' || trim($value) === '') {
            return $this;
        }

        $this->details[] = [
            'label' => $label,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * Adds an action link to the card.
     *
     * The class argument is retained for compatibility,
     * but is intentionally not applied to the link.
     */
    public function addLink(
        string $label,
        string $url,
        string $class = ''
    ): static {
        if (trim($label) === '' || trim($url) === '') {
            return $this;
        }

        $this->links[] = [
            'label' => $label,
            'url' => $url,
        ];

        return $this;
    }

    /**
     * Creates a generic HTML element.
     */
    protected function createElement(string $tag, string $class): HtmlComponent
    {
        $element = new HtmlComponent($tag);
        $element->addClass($class);

        return $element;
    }

    /**
     * Creates a wrapper for already rendered HTML.
     */
    protected function createElementFromHtml(string $html): HtmlComponent
    {
        $element = new HtmlComponent('div');
        $element->setContent($html);

        return $element;
    }

    /**
     * Creates the optional image element.
     */
    protected function renderImage(): string
    {
        if ($this->image === null || trim($this->image) === '') {
            return '';
        }

        $image = $this->createElement('img', 'record-card-image');

        $image->addAttribute('src', $this->image);
        $image->addAttribute('alt', $this->imageAlt ?? '');

        return $image->render();
    }

    /**
     * Creates the optional record name.
     */
    protected function renderName(): string
    {
        if ($this->name === null || trim($this->name) === '') {
            return '';
        }

        $element = $this->createElement('h3', 'record-card-name');
        $element->setContent($this->name);

        return $element->render();
    }

    /**
     * Creates the optional description.
     */
    protected function renderDescription(): string
    {
        if ($this->description === null || trim($this->description) === '') {
            return '';
        }

        $element = $this->createElement('p', 'record-card-description');
        $element->setContent($this->description);

        return $element->render();
    }

    /**
     * Creates the optional status indicator.
     */
    protected function renderStatus(): string
    {
        if ($this->status === null || trim($this->status) === '') {
            return '';
        }

        $element = $this->createElement('span', 'record-card-status');

        $statusClass = match (strtolower(trim($this->status))) {
            'active' => 'is-active',
            'inactive' => 'is-inactive',
            'pending' => 'is-pending',
            'danger', 'blocked', 'suspended' => 'is-danger',
            default => '',
        };

        if ($statusClass !== '') {
            $element->addClass($statusClass);
        }

        $element->setContent($this->status);

        return $element->render();
    }

    /**
     * Creates the optional creation date.
     */
    protected function renderCreatedAt(): string
    {
        if ($this->createdAt === null || trim($this->createdAt) === '') {
            return '';
        }

        $element = $this->createElement('span', 'record-card-created-at');
        $element->setContent($this->createdAt);

        return $element->render();
    }

    /**
     * Creates the optional metadata section.
     */
    protected function renderMetadata(): string
    {
        $status = $this->renderStatus();
        $createdAt = $this->renderCreatedAt();

        if ($status === '' && $createdAt === '') {
            return '';
        }

        $metadata = $this->createElement('div', 'record-card-metadata');

        if ($status !== '') {
            $metadata->addChild($this->createElementFromHtml($status));
        }

        if ($createdAt !== '') {
            $metadata->addChild($this->createElementFromHtml($createdAt));
        }

        return $metadata->render();
    }

    /**
     * Creates the expandable details section.
     */
    protected function renderDetails(): string
    {
        if ($this->details === []) {
            return '';
        }

        $items = '';

        foreach ($this->details as $detail) {
            $item = $this->createElement('div', 'record-card-detail');

            $label = $this->createElement('span', 'record-card-detail-label');
            $label->setContent($detail['label'] . ':');

            $value = $this->createElement('span', 'record-card-detail-value');
            $value->setContent($detail['value']);

            $item->addChild($label);
            $item->addChild($value);

            $items .= $item->render();
        }

        $details = new HtmlComponent('details');
        $details->addClass('record-card-details');

        $summary = new HtmlComponent('summary');
        $summary->addClass('record-card-details-toggle');
        $summary->setContent('View More Details');

        $details->addChild($summary);
        $details->setContent(
            '<div class="record-card-details-content">' . $items . '</div>'
        );

        return $details->render();
    }

    /**
     * Creates the card content.
     */
    protected function renderContent(): string
    {
        $content = $this->createElement('div', 'record-card-content');

        $content->setContent(
            $this->renderName()
            . $this->renderDescription()
            . $this->renderMetadata()
            . $this->renderDetails()
        );

        return $content->render();
    }

    /**
     * Creates the optional action links section.
     */
    protected function renderFooter(): string
    {
        if ($this->links === []) {
            return '';
        }

        $footer = $this->createElement('footer', 'record-card-footer');
        $actions = $this->createElement('div', 'record-card-actions');

        foreach ($this->links as $link) {
            $element = $this->createElement('a', 'record-card-action');

            $element->addAttribute('href', $link['url']);
            $element->setContent($link['label']);

            $actions->addChild($element);
        }

        $footer->addChild($actions);

        return $footer->render();
    }

    /**
     * Renders the complete record card.
     */
    public function render(): string
    {
        $styles = [];

        if ($this->width !== null) {
            $styles[] = '--record-card-width: ' . $this->width;
        }

        if ($this->height !== null) {
            $styles[] = '--record-card-height: ' . $this->height;
        }

        if ($styles !== []) {
            $this->addAttribute('style', implode('; ', $styles));
        }

        $main = $this->createElement('div', 'record-card-main');

        $image = $this->renderImage();

        if ($image !== '') {
            $main->addChild($this->createElementFromHtml($image));
        }

        $main->addChild(
            $this->createElementFromHtml($this->renderContent())
        );

        $html = sprintf(
            '<article%s>',
            $this->renderAttributes()
        );

        $html .= $main->render();
        $html .= $this->renderFooter();
        $html .= '</article>';

        return $html;
    }
}

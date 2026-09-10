<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Navigation;

use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Metadata\Example;

/**
 * Represents a breadcrumb navigation component.
 *
 * Breadcrumb provides a semantic navigation trail that shows the
 * user's current location within an application's page hierarchy.
 *
 * The component is UI-library-agnostic. CSS classes, inline styles,
 * and additional HTML attributes can be supplied through the inherited
 * Component API.
 *
 * @package RedSky\Html\Components\Navigation
 */
#[Example(
    title: 'Bootstrap — Customer Details Breadcrumb',
    code: <<<'PHP'
$breadcrumb = new Breadcrumb();

$breadcrumb
    ->item('Home', '/')
    ->item('Customers', '/customers')
    ->item('Customer Details')
    ->class('breadcrumb')
    ->attribute('aria-label', 'Breadcrumb');

echo $breadcrumb;
PHP,
    description: 'Creates a Bootstrap breadcrumb navigation showing the path from Home to the current Customer Details page.',
    language: 'php',
    primary: true,
    output: '<nav data-redsky-component="breadcrumb" aria-label="Breadcrumb"><ol class="breadcrumb"><li data-breadcrumb-item><a href="/">Home</a></li><li data-breadcrumb-separator aria-hidden="true">&gt;</li><li data-breadcrumb-item><a href="/customers">Customers</a></li><li data-breadcrumb-separator aria-hidden="true">&gt;</li><li data-breadcrumb-item data-breadcrumb-current="true" aria-current="page">Customer Details</li></ol></nav>'
)]
#[Example(
    title: 'Materialize — Customer Details Breadcrumb',
    code: <<<'PHP'
$breadcrumb = new Breadcrumb();

$breadcrumb
    ->item('Home', '/')
    ->item('Customers', '/customers')
    ->item('Customer Details')
    ->class('breadcrumb');

echo $breadcrumb;
PHP,
    description: 'Creates a Materialize breadcrumb navigation using the Breadcrumb component and the inherited Component API.',
    language: 'php',
    primary: false,
    output: '<nav data-redsky-component="breadcrumb"><ol class="breadcrumb"><li data-breadcrumb-item><a href="/">Home</a></li><li data-breadcrumb-separator aria-hidden="true">&gt;</li><li data-breadcrumb-item><a href="/customers">Customers</a></li><li data-breadcrumb-separator aria-hidden="true">&gt;</li><li data-breadcrumb-item data-breadcrumb-current="true" aria-current="page">Customer Details</li></ol></nav>'
)]
class Breadcrumb extends HtmlComponent
{
    /**
     * Breadcrumb HTML tag.
     *
     * @var string
     */
    protected string $tag = 'nav';

    /**
     * Breadcrumb items.
     *
     * Each item contains:
     *
     * - label
     * - optional URL
     *
     * The last item without a URL is considered the current page.
     *
     * @var array<int, array{label: string, url: string|null}>
     */
    protected array $items = [];

    /**
     * Breadcrumb separator.
     *
     * @var string
     */
    protected string $separator = '>';

    /**
     * Creates a new Breadcrumb component.
     */
    public function __construct()
    {
        parent::__construct('nav');
    }

    /**
     * Adds a breadcrumb item.
     *
     * When no URL is provided, the item is considered the current page.
     *
     * @param string $label Item label.
     * @param string|null $url Optional item URL.
     *
     * @return static
     */
    public function item(string $label, ?string $url = null): static
    {
        $this->items[] = [
            'label' => $label,
            'url' => $url,
        ];

        return $this;
    }

    /**
     * Sets the breadcrumb separator.
     *
     * @param string $separator Separator displayed between breadcrumb items.
     *
     * @return static
     */
    public function separator(string $separator): static
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * Returns the current breadcrumb separator.
     *
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * Returns all breadcrumb items.
     *
     * @return array<int, array{label: string, url: string|null}>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Renders the breadcrumb component.
     *
     * The component emits semantic RedSky data attributes describing
     * each breadcrumb item. Separators are marked as aria-hidden so
     * they are ignored by screen readers.
     *
     * @return string
     */
    public function render(): string
    {
        $attributes = $this->renderAttributes();

        $attributes .= ' data-redsky-component="breadcrumb"';

        $items = '';

        $lastIndex = count($this->items) - 1;

        foreach ($this->items as $index => $item) {
            $label = htmlspecialchars(
                $item['label'],
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            $itemAttributes = ' data-breadcrumb-item';

            $isCurrent = $index === $lastIndex || $item['url'] === null;

            if ($isCurrent) {
                $itemAttributes .= ' data-breadcrumb-current="true"';
                $itemAttributes .= ' aria-current="page"';

                $items .= sprintf(
                    '<li%s>%s</li>',
                    $itemAttributes,
                    $label
                );
            } else {
                $url = htmlspecialchars(
                    $item['url'],
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $items .= sprintf(
                    '<li%s><a href="%s">%s</a></li>',
                    $itemAttributes,
                    $url,
                    $label
                );
            }

            /*
             * Add the separator after every item except the last one.
             */
            if ($index < $lastIndex) {
                $separator = htmlspecialchars(
                    $this->separator,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $items .= sprintf(
                    '<li data-breadcrumb-separator aria-hidden="true">%s</li>',
                    $separator
                );
            }
        }

        return sprintf(
            '<%s%s><ol>%s</ol></%s>',
            $this->tag,
            $attributes,
            $items,
            $this->tag
        );
    }
}


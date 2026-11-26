<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Graphics\Icon;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents an SVG icon component.
 *
 * The Icon component renders SVG icons from a local
 * collection of SVG files.
 *
 * It is designed to work with icon libraries such as
 * Lucide, while remaining independent of any specific
 * icon library.
 *
 * Icons are rendered inline as SVG elements, allowing
 * their appearance to be customized through CSS.
 *
 * @package RedSky\Html\Components\Graphics\Icon
 */
class Icon extends HtmlComponent
{
    /**
     * Default icon size.
     *
     * @var int
     */
    protected const DEFAULT_SIZE = 24;

    /**
     * Default SVG stroke width.
     *
     * @var float
     */
    protected const DEFAULT_STROKE_WIDTH = 2.0;


    /**
     * Creates a new icon component.
     *
     * @param string $name Icon filename without extension.
     */
    public function __construct(
        string $name
    ) {
        parent::__construct('svg');

        $this
            ->addAttribute(
                'data-redsky-component',
                'icon'
            )
            ->class('icon')
            ->addAttribute(
                'xmlns',
                'http://www.w3.org/2000/svg'
            )
            ->addAttribute(
                'viewBox',
                '0 0 24 24'
            )
            ->addAttribute(
                'width',
                self::DEFAULT_SIZE
            )
            ->addAttribute(
                'height',
                self::DEFAULT_SIZE
            )
            ->addAttribute(
                'fill',
                'none'
            )
            ->addAttribute(
                'stroke',
                'currentColor'
            )
            ->addAttribute(
                'stroke-width',
                self::DEFAULT_STROKE_WIDTH
            )
            ->addAttribute(
                'stroke-linecap',
                'round'
            )
            ->addAttribute(
                'stroke-linejoin',
                'round'
            )
            ->addAttribute(
                'aria-hidden',
                'true'
            )
            ->addAttribute(
                'focusable',
                'false'
            );

        $this->loadIcon($name);
    }


    /**
     * Loads an SVG icon from the local icons directory.
     *
     * The SVG root element is removed because this
     * component already generates its own SVG element.
     *
     * @param string $name Icon filename without extension.
     *
     * @return void
     */
    protected function loadIcon(
        string $name
    ): void {
        $name = trim($name);

        if (
            $name === '' ||
            !preg_match(
                '/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                $name
            )
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid icon name "%s".',
                    $name
                )
            );
        }

        $path = __DIR__
            . DIRECTORY_SEPARATOR
            . 'icons'
            . DIRECTORY_SEPARATOR
            . $name
            . '.svg';

        if (!is_file($path)) {
            throw new \RuntimeException(
                sprintf(
                    'Icon "%s" was not found.',
                    $name
                )
            );
        }

        $svg = file_get_contents($path);

        if ($svg === false) {
            throw new \RuntimeException(
                sprintf(
                    'Unable to read icon "%s".',
                    $name
                )
            );
        }

        if (
            !preg_match(
                '/<svg\b[^>]*>(.*?)<\/svg>/is',
                $svg,
                $matches
            )
        ) {
            throw new \RuntimeException(
                sprintf(
                    'Invalid SVG content for icon "%s".',
                    $name
                )
            );
        }

        $this->html(
            trim($matches[1])
        );
    }


    /**
     * Renders the icon.
     *
     * @return string
     */
    public function render(): string
    {
        return parent::render();
    }


    /**
     * Sets the icon width and height.
     *
     * @param int $size Icon size in pixels.
     *
     * @return static
     */
    public function size(
        int $size
    ): static {
        if ($size <= 0) {
            throw new \InvalidArgumentException(
                'Icon size must be greater than zero.'
            );
        }

        return $this
            ->addAttribute('width', $size)
            ->addAttribute('height', $size);
    }


    /**
     * Sets the SVG stroke width.
     *
     * @param float $width Stroke width.
     *
     * @return static
     */
    public function strokeWidth(
        float $width
    ): static {
        if ($width <= 0) {
            throw new \InvalidArgumentException(
                'Icon stroke width must be greater than zero.'
            );
        }

        return $this->addAttribute(
            'stroke-width',
            $width
        );
    }


    /**
     * Sets the icon color.
     *
     * The color is applied through CSS currentColor,
     * affecting the SVG stroke.
     *
     * @param string $color Icon color.
     *
     * @return static
     */
    public function color(
        string $color
    ): static {
        return $this->style(
            'color',
            $color
        );
    }


    /**
     * Sets the icon background color.
     *
     * @param string $color Background color.
     *
     * @return static
     */
    public function backgroundColor(
        string $color
    ): static {
        return $this->style(
            'background-color',
            $color
        );
    }


    /**
     * Sets an accessible label for the icon.
     *
     * @param string $label Accessible icon description.
     *
     * @return static
     */
    public function label(
        string $label
    ): static {
        $this
            ->removeAttribute('aria-hidden')
            ->addAttribute('role', 'img')
            ->aria('label', $label);

        return $this;
    }
}

<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Tooltip;

use RedSky\Html\Components\HtmlComponent;

/**
 * Tooltip component.
 *
 * Displays contextual information when the user
 * hovers over or focuses on an element.
 *
 * @package RedSky\Html\Components\Feedback\Tooltip
 */
class Tooltip extends HtmlComponent
{
    /**
     * Creates a new tooltip.
     *
     * @param string|null $content
     */
    public function __construct(
        ?string $content = null
    ) {
        parent::__construct('span');

        $this->addAttribute(
            'data-redsky-component',
            'tooltip'
        );

        $this->addClass('tooltip');

        if ($content !== null) {
            $this->data('tooltip', $content);
        }
    }

    /**
     * Sets tooltip position.
     *
     * @param string $position
     *
     * @return static
     */
    public function position(
        string $position
    ): static {
        $allowed = [
            'top',
            'right',
            'bottom',
            'left',
        ];

        if (!in_array($position, $allowed, true)) {
            throw new \InvalidArgumentException(
                'Invalid tooltip position: ' . $position
            );
        }

        return $this->data(
            'tooltip-position',
            $position
        );
    }

    /**
     * Sets tooltip background color.
     *
     * @param string $color
     *
     * @return static
     */
    public function background(
        string $color
    ): static {
        return $this->style(
            '--tooltip-bg',
            $color
        );
    }

    /**
     * Sets tooltip text color.
     *
     * @param string $color
     *
     * @return static
     */
    public function color(
        string $color
    ): static {
        return $this->style(
            '--tooltip-color',
            $color
        );
    }
}

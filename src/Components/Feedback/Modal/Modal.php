<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback\Modal;

use RedSky\Html\Components\HtmlComponent;

/**
 * Modal dialog component.
 *
 * Provides an accessible modal dialog HTML structure
 * with support for titles, descriptions, visibility,
 * positioning metadata, resizing and interaction
 * configuration.
 *
 * This component only generates HTML.
 * Client-side behavior is handled by redsky-ui.
 *
 * Supported behaviors:
 *
 * - Keyboard
 * - OutsideClick
 * - Toggleable
 * - Positionable
 * - Resizable
 *
 * @package RedSky\Html\Components\Feedback
 */
class Modal extends HtmlComponent
{
    /**
     * Modal title text.
     *
     * @var string|null
     */
    protected ?string $modalTitle = null;


    /**
     * Modal description text.
     *
     * @var string|null
     */
    protected ?string $modalDescription = null;


    /**
     * Modal body content.
     *
     * @var mixed
     */
    protected mixed $modalBody = null;


    /**
     * Modal footer content.
     *
     * @var array
     */
    protected array $footerChildren = [];


    /**
     * Determines whether modal is open.
     *
     * @var bool
     */
    protected bool $open = false;


    /**
     * Determines whether close button is rendered.
     *
     * @var bool
     */
    protected bool $showCloseButton = true;


    /**
     * Determines whether backdrop click closes modal.
     *
     * @var bool
     */
    protected bool $closeOnBackdrop = true;


    /**
     * Determines whether Escape key closes modal.
     *
     * @var bool
     */
    protected bool $closeOnEscape = true;


    /**
     * Determines whether body scrolling is locked.
     *
     * @var bool
     */
    protected bool $lockBodyScroll = true;


    /**
     * Determines whether focus is trapped.
     *
     * @var bool
     */
    protected bool $trapFocus = true;


    /**
     * Determines whether focus is restored after close.
     *
     * @var bool
     */
    protected bool $restoreFocus = true;


    /**
     * Modal position mode.
     *
     * @var string
     */
    protected string $position = 'center';


    /**
     * Modal animation type.
     *
     * @var string
     */
    protected string $animation = 'fade';


    /**
     * Modal size.
     *
     * @var string
     */
    protected string $size = 'medium';


    /**
     * Determines whether modal can be dragged.
     *
     * @var bool
     */
    protected bool $draggable = false;


    /**
     * Drag boundary restriction.
     *
     * @var string
     */
    protected string $dragBoundary = 'viewport';


    /**
     * Determines whether modal can be resized.
     *
     * @var bool
     */
    protected bool $resizable = false;


    /**
     * Determines whether position updates on resize.
     *
     * @var bool
     */
    protected bool $repositionOnResize = true;


    /**
     * Determines whether position updates on scroll.
     *
     * @var bool
     */
    protected bool $repositionOnScroll = true;


    /**
     * Custom horizontal position.
     *
     * @var float|null
     */
    protected ?float $positionX = null;


    /**
     * Custom vertical position.
     *
     * @var float|null
     */
    protected ?float $positionY = null;


    /**
     * Creates a new Modal component.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->attribute(
            'data-redsky-component',
            'modal'
        );

        $this->attribute(
            'role',
            'dialog'
        );

        $this->attribute(
            'aria-modal',
            'true'
        );

        $this->attribute(
            'tabindex',
            '-1'
        );
    }


    /**
     * Sets modal title.
     *
     * @param string $title
     *
     * @return static
     */
    public function title(
        string $title
    ): static {

        $this->modalTitle = $title;

        return $this;
    }


    /**
     * Returns modal title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->modalTitle;
    }


    /**
     * Sets modal description.
     *
     * @param string $description
     *
     * @return static
     */
    public function description(
        string $description
    ): static {

        $this->modalDescription = $description;

        return $this;
    }


    /**
     * Returns modal description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->modalDescription;
    }


    /**
     * Sets modal body content.
     *
     * @param mixed $body
     *
     * @return static
     */
    public function body(
        mixed $body
    ): static {

        $this->modalBody = $body;

        return $this;
    }


    /**
     * Returns modal body content.
     *
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->modalBody;
    }


    /**
     * Adds content to the modal footer.
     *
     * @param mixed $content
     *
     * @return static
     */
    public function footer(
        mixed $content
    ): static {

        $this->footerChildren[] = $content;

        return $this;
    }


    /**
     * Returns modal footer content.
     *
     * @return array
     */
    public function getFooter(): array
    {
        return $this->footerChildren;
    }


    /**
     * Opens or closes modal.
     *
     * @param bool $open
     *
     * @return static
     */
    public function open(
        bool $open = true
    ): static {

        $this->open = $open;

        return $this;
    }


    /**
     * Closes modal.
     *
     * @return static
     */
    public function close(): static
    {
        $this->open = false;

        return $this;
    }


    /**
     * Determines whether modal is open.
     *
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->open;
    }


    /**
     * Enables or disables close button.
     *
     * @param bool $show
     *
     * @return static
     */
    public function showCloseButton(
        bool $show = true
    ): static {

        $this->showCloseButton = $show;

        return $this;
    }


    /**
     * Determines whether close button exists.
     *
     * @return bool
     */
    public function hasCloseButton(): bool
    {
        return $this->showCloseButton;
    }


    /**
     * Enables or disables backdrop closing.
     *
     * @param bool $close
     *
     * @return static
     */
    public function closeOnBackdrop(
        bool $close = true
    ): static {

        $this->closeOnBackdrop = $close;

        return $this;
    }


    /**
     * Determines whether backdrop closes modal.
     *
     * @return bool
     */
    public function closesOnBackdrop(): bool
    {
        return $this->closeOnBackdrop;
    }


    /**
     * Enables or disables Escape closing.
     *
     * @param bool $close
     *
     * @return static
     */
    public function closeOnEscape(
        bool $close = true
    ): static {

        $this->closeOnEscape = $close;

        return $this;
    }


    /**
     * Determines whether Escape closes modal.
     *
     * @return bool
     */
    public function closesOnEscape(): bool
    {
        return $this->closeOnEscape;
    }


    /**
     * Enables or disables body scroll locking.
     *
     * @param bool $lock
     *
     * @return static
     */
    public function lockBodyScroll(
        bool $lock = true
    ): static {

        $this->lockBodyScroll = $lock;

        return $this;
    }


    /**
     * Determines whether body scroll is locked.
     *
     * @return bool
     */
    public function locksBodyScroll(): bool
    {
        return $this->lockBodyScroll;
    }


    /**
     * Enables or disables focus trap.
     *
     * @param bool $trap
     *
     * @return static
     */
    public function trapFocus(
        bool $trap = true
    ): static {

        $this->trapFocus = $trap;

        return $this;
    }


    /**
     * Determines whether focus is trapped.
     *
     * @return bool
     */
    public function trapsFocus(): bool
    {
        return $this->trapFocus;
    }


    /**
     * Enables or disables focus restoration.
     *
     * @param bool $restore
     *
     * @return static
     */
    public function restoreFocus(
        bool $restore = true
    ): static {

        $this->restoreFocus = $restore;

        return $this;
    }


    /**
     * Determines whether focus is restored.
     *
     * @return bool
     */
    public function restoresFocus(): bool
    {
        return $this->restoreFocus;
    }


    /**
     * Sets modal position mode.
     *
     * Supported values:
     *
     * - center
     * - top
     * - bottom
     * - left
     * - right
     * - anchor
     * - custom
     *
     * @param string $position
     *
     * @return static
     */
    public function position(
        string $position
    ): static {

        $allowed = [
            'center',
            'top',
            'bottom',
            'left',
            'right',
            'anchor',
            'custom',
        ];

        if (
            !in_array(
                $position,
                $allowed,
                true
            )
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal position "%s".',
                    $position
                )
            );
        }

        $this->position = $position;

        if (
            $position !== 'custom'
        ) {
            $this->positionX = null;
            $this->positionY = null;
        }

        return $this;
    }


    /**
     * Returns current position mode.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }


    /**
     * Defines custom modal coordinates.
     *
     * @param float|int $left
     * @param float|int $top
     *
     * @return static
     */
    public function customPosition(
        float|int $left,
        float|int $top
    ): static {

        $this->position = 'custom';

        $this->positionX = (float) $left;
        $this->positionY = (float) $top;

        return $this;
    }


    /**
     * Returns custom X coordinate.
     *
     * @return float|null
     */
    public function getPositionX(): ?float
    {
        return $this->positionX;
    }


    /**
     * Returns custom Y coordinate.
     *
     * @return float|null
     */
    public function getPositionY(): ?float
    {
        return $this->positionY;
    }


    /**
     * Sets modal animation.
     *
     * @param string $animation
     *
     * @return static
     */
    public function animation(
        string $animation
    ): static {

        $allowed = [
            'none',
            'fade',
            'slide-down',
            'slide-up',
            'slide-left',
            'slide-right',
            'zoom',
        ];

        if (
            !in_array(
                $animation,
                $allowed,
                true
            )
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal animation "%s".',
                    $animation
                )
            );
        }

        $this->animation = $animation;

        return $this;
    }


    /**
     * Returns modal animation.
     *
     * @return string
     */
    public function getAnimation(): string
    {
        return $this->animation;
    }


    /**
     * Sets modal size.
     *
     * @param string $size
     *
     * @return static
     */
    public function size(
        string $size
    ): static {

        $allowed = [
            'small',
            'medium',
            'large',
            'fullscreen',
        ];

        if (
            !in_array(
                $size,
                $allowed,
                true
            )
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal size "%s".',
                    $size
                )
            );
        }

        $this->size = $size;

        return $this;
    }


    /**
     * Returns modal size.
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }


    /**
     * Enables or disables dragging.
     *
     * @param bool $draggable
     *
     * @return static
     */
    public function draggable(
        bool $draggable = true
    ): static {

        $this->draggable = $draggable;

        return $this;
    }


    /**
     * Determines whether modal is draggable.
     *
     * @return bool
     */
    public function isDraggable(): bool
    {
        return $this->draggable;
    }


    /**
     * Sets drag boundary.
     *
     * Supported values:
     *
     * - viewport
     * - none
     *
     * @param string $boundary
     *
     * @return static
     */
    public function dragBoundary(
        string $boundary
    ): static {

        if (
            !in_array(
                $boundary,
                [
                    'viewport',
                    'none',
                ],
                true
            )
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid drag boundary "%s".',
                    $boundary
                )
            );
        }

        $this->dragBoundary = $boundary;

        return $this;
    }


    /**
     * Returns drag boundary.
     *
     * @return string
     */
    public function getDragBoundary(): string
    {
        return $this->dragBoundary;
    }


    /**
     * Enables or disables resizing.
     *
     * @param bool $resizable
     *
     * @return static
     */
    public function resizable(
        bool $resizable = true
    ): static {

        $this->resizable = $resizable;

        return $this;
    }


    /**
     * Determines whether modal is resizable.
     *
     * @return bool
     */
    public function isResizable(): bool
    {
        return $this->resizable;
    }


    /**
     * Enables or disables reposition after resize.
     *
     * @param bool $reposition
     *
     * @return static
     */
    public function repositionOnResize(
        bool $reposition = true
    ): static {

        $this->repositionOnResize = $reposition;

        return $this;
    }


    /**
     * Determines whether position updates on resize.
     *
     * @return bool
     */
    public function repositionsOnResize(): bool
    {
        return $this->repositionOnResize;
    }


    /**
     * Enables or disables reposition after scroll.
     *
     * @param bool $reposition
     *
     * @return static
     */
    public function repositionOnScroll(
        bool $reposition = true
    ): static {

        $this->repositionOnScroll = $reposition;

        return $this;
    }


    /**
     * Determines whether position updates on scroll.
     *
     * @return bool
     */
    public function repositionsOnScroll(): bool
    {
        return $this->repositionOnScroll;
    }


    /**
     * Renders the modal.
     *
     * @return string
     */
    public function render(): string
    {
        $this->attribute(
            'data-modal-close-on-backdrop',
            $this->closeOnBackdrop ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-close-on-escape',
            $this->closeOnEscape ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-lock-body-scroll',
            $this->lockBodyScroll ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-trap-focus',
            $this->trapFocus ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-restore-focus',
            $this->restoreFocus ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-position',
            $this->position
        );

        $this->attribute(
            'data-modal-animation',
            $this->animation
        );

        $this->attribute(
            'data-modal-size',
            $this->size
        );

        $this->attribute(
            'data-modal-draggable',
            $this->draggable ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-drag-boundary',
            $this->dragBoundary
        );

        $this->attribute(
            'data-modal-reposition-on-resize',
            $this->repositionOnResize ? 'true' : 'false'
        );

        $this->attribute(
            'data-modal-reposition-on-scroll',
            $this->repositionOnScroll ? 'true' : 'false'
        );

        if (
            $this->positionX !== null
        ) {
            $this->attribute(
                'data-modal-position-x',
                (string) $this->positionX
            );
        }

        if (
            $this->positionY !== null
        ) {
            $this->attribute(
                'data-modal-position-y',
                (string) $this->positionY
            );
        }

        $attributes = $this->renderAttributes();

        if (!$this->open) {
            $attributes .= ' hidden';
        } else {
            $attributes .= ' data-modal-open';
        }

        $html = sprintf(
            '<div%s>',
            $attributes
        );

        $html .= '<div data-modal-backdrop></div>';

        $html .= '<div data-modal-dialog>';

        $html .= '<div data-modal-header>';

        if (
            $this->modalTitle !== null
        ) {
            $html .= sprintf(
                '<div data-modal-title>%s</div>',
                htmlspecialchars(
                    $this->modalTitle,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        if (
            $this->modalDescription !== null
        ) {
            $html .= sprintf(
                '<div data-modal-description>%s</div>',
                htmlspecialchars(
                    $this->modalDescription,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
        }

        if (
            $this->showCloseButton
        ) {
            $html .=
                '<button type="button" ' .
                'data-modal-close ' .
                'aria-label="Close modal">' .
                '×' .
                '</button>';
        }

        $html .= '</div>';

        $html .= '<div data-modal-body>';

        if (
            $this->modalBody instanceof HtmlComponent
        ) {
            $html .= $this->modalBody->render();
        } elseif (
            $this->modalBody !== null
        ) {
            $html .= htmlspecialchars(
                (string) $this->modalBody,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );
        }

        $html .= $this->renderChildren();

        $html .= '</div>';

        if (
            $this->footerChildren !== []
        ) {
            $html .= '<div data-modal-footer>';

            foreach (
                $this->footerChildren as $content
            ) {
                if (
                    $content instanceof HtmlComponent
                ) {
                    $html .= $content->render();
                } elseif (
                    $content !== null
                ) {
                    $html .= htmlspecialchars(
                        (string) $content,
                        ENT_QUOTES | ENT_SUBSTITUTE,
                        'UTF-8'
                    );
                }
            }

            $html .= '</div>';
        }

        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
}
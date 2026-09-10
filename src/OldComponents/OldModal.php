<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Feedback;

use RedSky\Html\Components\HtmlComponent;

class Modal extends HtmlComponent
{
    protected ?string $modalTitle = null;

    protected bool $open = false;

    protected bool $showCloseButton = true;

    protected bool $closeOnBackdrop = true;

    protected bool $closeOnEscape = true;

    protected bool $lockBodyScroll = true;

    protected bool $trapFocus = true;

    protected bool $restoreFocus = true;

    protected string $position = 'center';

    protected string $animation = 'fade';

    protected string $size = 'medium';

    protected bool $draggable = false;

    protected string $dragBoundary = 'viewport';

    protected bool $repositionOnResize = true;

    protected bool $repositionOnScroll = true;

    protected ?float $positionX = null;

    protected ?float $positionY = null;

    public function __construct()
    {
        parent::__construct('div');

        $this->attribute('data-redsky-component', 'modal');
        $this->attribute('role', 'dialog');
        $this->attribute('aria-modal', 'true');
    }

    public function title(string $title): static
    {
        $this->modalTitle = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->modalTitle;
    }

    public function open(bool $open = true): static
    {
        $this->open = $open;

        return $this;
    }

    public function close(): static
    {
        $this->open = false;

        return $this;
    }

    public function isOpen(): bool
    {
        return $this->open;
    }

    public function showCloseButton(bool $show = true): static
    {
        $this->showCloseButton = $show;

        return $this;
    }

    public function hasCloseButton(): bool
    {
        return $this->showCloseButton;
    }

    public function closeOnBackdrop(bool $close = true): static
    {
        $this->closeOnBackdrop = $close;

        return $this;
    }

    public function closesOnBackdrop(): bool
    {
        return $this->closeOnBackdrop;
    }

    public function closeOnEscape(bool $close = true): static
    {
        $this->closeOnEscape = $close;

        return $this;
    }

    public function closesOnEscape(): bool
    {
        return $this->closeOnEscape;
    }

    public function lockBodyScroll(bool $lock = true): static
    {
        $this->lockBodyScroll = $lock;

        return $this;
    }

    public function locksBodyScroll(): bool
    {
        return $this->lockBodyScroll;
    }

    public function trapFocus(bool $trap = true): static
    {
        $this->trapFocus = $trap;

        return $this;
    }

    public function trapsFocus(): bool
    {
        return $this->trapFocus;
    }

    public function restoreFocus(bool $restore = true): static
    {
        $this->restoreFocus = $restore;

        return $this;
    }

    public function restoresFocus(): bool
    {
        return $this->restoreFocus;
    }

    public function position(string $position): static
    {
        $allowed = [
            'center',
            'top',
            'bottom',
            'left',
            'right',
            'anchor',
            'custom',
        ];

        if (!in_array($position, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal position "%s". Allowed positions: %s.',
                    $position,
                    implode(', ', $allowed)
                )
            );
        }

        $this->position = $position;

        if ($position !== 'custom') {
            $this->positionX = null;
            $this->positionY = null;
        }

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function customPosition(
        float|int $left,
        float|int $top
    ): static {
        $this->position = 'custom';
        $this->positionX = (float) $left;
        $this->positionY = (float) $top;

        return $this;
    }

    public function getPositionX(): ?float
    {
        return $this->positionX;
    }

    public function getPositionY(): ?float
    {
        return $this->positionY;
    }

    public function animation(string $animation): static
    {
        $allowed = [
            'none',
            'fade',
            'slide-down',
            'slide-up',
            'slide-left',
            'slide-right',
            'zoom',
        ];

        if (!in_array($animation, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal animation "%s". Allowed animations: %s.',
                    $animation,
                    implode(', ', $allowed)
                )
            );
        }

        $this->animation = $animation;

        return $this;
    }

    public function getAnimation(): string
    {
        return $this->animation;
    }

    public function size(string $size): static
    {
        $allowed = [
            'small',
            'medium',
            'large',
            'fullscreen',
        ];

        if (!in_array($size, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal size "%s". Allowed sizes: %s.',
                    $size,
                    implode(', ', $allowed)
                )
            );
        }

        $this->size = $size;

        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function draggable(bool $draggable = true): static
    {
        $this->draggable = $draggable;

        return $this;
    }

    public function isDraggable(): bool
    {
        return $this->draggable;
    }

    public function dragBoundary(string $boundary): static
    {
        $allowed = [
            'viewport',
            'none',
        ];

        if (!in_array($boundary, $allowed, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid modal drag boundary "%s". Allowed boundaries: %s.',
                    $boundary,
                    implode(', ', $allowed)
                )
            );
        }

        $this->dragBoundary = $boundary;

        return $this;
    }

    public function getDragBoundary(): string
    {
        return $this->dragBoundary;
    }

    public function repositionOnResize(
        bool $reposition = true
    ): static {
        $this->repositionOnResize = $reposition;

        return $this;
    }

    public function repositionsOnResize(): bool
    {
        return $this->repositionOnResize;
    }

    public function repositionOnScroll(
        bool $reposition = true
    ): static {
        $this->repositionOnScroll = $reposition;

        return $this;
    }

    public function repositionsOnScroll(): bool
    {
        return $this->repositionOnScroll;
    }

    public function render(): string
    {
        $titleId = $this->getTitleId();

        if (
            $this->modalTitle !== null &&
            !$this->hasAttribute('aria-labelledby')
        ) {
            $this->attribute(
                'aria-labelledby',
                $titleId
            );
        }

        $attributes = $this->renderAttributes();

        $attributes .= $this->open
            ? ' data-modal-open'
            : ' hidden';

        $attributes .= sprintf(
            ' data-modal-position="%s"',
            htmlspecialchars(
                $this->position,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        $attributes .= sprintf(
            ' data-modal-animation="%s"',
            htmlspecialchars(
                $this->animation,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        $attributes .= sprintf(
            ' data-modal-size="%s"',
            htmlspecialchars(
                $this->size,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        $attributes .= sprintf(
            ' data-modal-close-on-backdrop="%s"',
            $this->closeOnBackdrop
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-close-on-escape="%s"',
            $this->closeOnEscape
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-lock-body-scroll="%s"',
            $this->lockBodyScroll
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-trap-focus="%s"',
            $this->trapFocus
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-restore-focus="%s"',
            $this->restoreFocus
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-draggable="%s"',
            $this->draggable
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-drag-boundary="%s"',
            htmlspecialchars(
                $this->dragBoundary,
                ENT_QUOTES,
                'UTF-8'
            )
        );

        $attributes .= sprintf(
            ' data-modal-reposition-on-resize="%s"',
            $this->repositionOnResize
                ? 'true'
                : 'false'
        );

        $attributes .= sprintf(
            ' data-modal-reposition-on-scroll="%s"',
            $this->repositionOnScroll
                ? 'true'
                : 'false'
        );

        if ($this->positionX !== null) {
            $attributes .= sprintf(
                ' data-modal-position-x="%s"',
                htmlspecialchars(
                    (string) $this->positionX,
                    ENT_QUOTES,
                    'UTF-8'
                )
            );
        }

        if ($this->positionY !== null) {
            $attributes .= sprintf(
                ' data-modal-position-y="%s"',
                htmlspecialchars(
                    (string) $this->positionY,
                    ENT_QUOTES,
                    'UTF-8'
                )
            );
        }

        $html = sprintf(
            '<div%s>',
            $attributes
        );

        $html .= '<div data-modal-backdrop></div>';

        $html .= '<div data-modal-dialog>';

        $html .= $this->renderHeader();

        $html .= $this->renderBody();

        $html .= $this->renderFooter();

        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    protected function getTitleId(): string
    {
        $titleId = $this->getAttribute('id');

        if ($titleId !== null) {
            return $titleId . '-title';
        }

        return 'redsky-modal-title';
    }

    protected function renderHeader(): string
    {
        $html = '<div data-modal-header>';

        if ($this->modalTitle !== null) {
            $title = htmlspecialchars(
                $this->modalTitle,
                ENT_QUOTES,
                'UTF-8'
            );

            $titleId = $this->getTitleId();

            $html .= sprintf(
                '<h2 id="%s" data-modal-title>%s</h2>',
                htmlspecialchars(
                    $titleId,
                    ENT_QUOTES,
                    'UTF-8'
                ),
                $title
            );
        }

        if ($this->showCloseButton) {
            $html .=
                '<button ' .
                'type="button" ' .
                'data-modal-close ' .
                'aria-label="Close modal">' .
                '&times;' .
                '</button>';
        }

        $html .= '</div>';

        return $html;
    }

    protected function renderBody(): string
    {
        if (!$this->hasContent()) {
            return '<div data-modal-body></div>';
        }

        return sprintf(
            '<div data-modal-body>%s</div>',
            (string) $this->content()
        );
    }

    protected function renderFooter(): string
    {
        if (!$this->hasChildren()) {
            return '<div data-modal-footer></div>';
        }

        $html = '<div data-modal-footer>';

        $html .= $this->renderChildren();

        $html .= '</div>';

        return $html;
    }
}
<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Widgets\PostStick;

use InvalidArgumentException;
use RedSky\Html\Components\HtmlComponent;
use RedSky\Html\Components\Navigation\ToolBar\ToolBar;
use RedSky\Html\Components\Navigation\ToolBarItem\ToolBarItem;

/**
 * PostStick component.
 *
 * Represents a floating sticky note with an editable
 * content area and an integrated formatting toolbar.
 *
 * Supports independent light and dark themes, predefined
 * colors and custom hexadecimal colors.
 *
 * The component is independent from any UI library.
 *
 * @package RedSky\Html\Components\Widgets\PostStick
 */
class PostStick extends HtmlComponent
{
    /**
     * Available predefined note colors.
     *
     * @var array<string, string>
     */
    protected const COLORS = [
        'yellow' => '#FFF4A8',
        'pink'   => '#FFDCE5',
        'blue'   => '#D8ECFF',
        'green'  => '#DCF5D8',
        'purple' => '#EADFFF',
        'gray'   => '#E8E8E8',
    ];

    /**
     * Default note theme.
     *
     * @var string
     */
    protected string $noteTheme = 'light';

    /**
     * Note title.
     *
     * @var string
     */
    protected string $noteTitle = 'New note';

    /**
     * Note content.
     *
     * @var string
     */
    protected string $noteContent = '';

    /**
     * Note accent/background color.
     *
     * Can be a predefined color name or hexadecimal value.
     *
     * @var string
     */
    protected string $noteColor = 'yellow';

    /**
     * Note width.
     *
     * @var int
     */
    protected int $noteWidth = 320;

    /**
     * Note height.
     *
     * @var int
     */
    protected int $noteHeight = 360;

    /**
     * Note horizontal position.
     *
     * @var int|null
     */
    protected ?int $positionX = null;

    /**
     * Note vertical position.
     *
     * @var int|null
     */
    protected ?int $positionY = null;

    /**
     * Indicates whether the note can be dragged.
     *
     * @var bool
     */
    protected bool $isDraggable = true;

    /**
     * Indicates whether the note can be resized.
     *
     * @var bool
     */
    protected bool $isResizable = true;

    /**
     * Creates a new PostStick component.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this
            ->addAttribute(
                'data-redsky-component',
                'post-stick'
            )
            ->addClass('post-stick')
            ->role('region')
            ->aria('label', 'Sticky note');
    }

    /**
     * Sets the note theme.
     *
     * Supported themes:
     * - light
     * - dark
     *
     * @param string $theme
     *
     * @return static
     */
    public function theme(
        string $theme
    ): static {
        $theme = strtolower(trim($theme));

        if (!in_array($theme, ['light', 'dark'], true)) {
            throw new InvalidArgumentException(
                'Invalid PostStick theme: ' . $theme
            );
        }

        $this->noteTheme = $theme;

        return $this;
    }

    /**
     * Sets the note heading.
     *
     * @param string $title
     *
     * @return static
     */
    public function noteTitle(
        string $title
    ): static {
        $this->noteTitle = $title;

        return $this;
    }

    /**
     * Sets the note content.
     *
     * @param string $content
     *
     * @return static
     */
    public function noteContent(
        string $content
    ): static {
        $this->noteContent = $content;

        return $this;
    }

    /**
     * Sets the note color.
     *
     * Accepts predefined colors or hexadecimal values.
     *
     * Supported predefined colors:
     * - yellow
     * - pink
     * - blue
     * - green
     * - purple
     * - gray
     *
     * Supported hexadecimal formats:
     * - #RGB
     * - #RRGGBB
     *
     * @param string $color
     *
     * @return static
     */
    public function color(
        string $color
    ): static {
        $color = strtolower(trim($color));

        $isNamedColor = array_key_exists(
            $color,
            self::COLORS
        );

        $isHexColor = preg_match(
            '/^#(?:[a-f0-9]{3}|[a-f0-9]{6})$/i',
            $color
        ) === 1;

        if (!$isNamedColor && !$isHexColor) {
            throw new InvalidArgumentException(
                'Invalid PostStick color: ' . $color
            );
        }

        $this->noteColor = $color;

        return $this;
    }

    /**
     * Sets the note dimensions.
     *
     * @param int $width
     * @param int $height
     *
     * @return static
     */
    public function size(
        int $width,
        int $height
    ): static {
        if ($width < 240 || $height < 180) {
            throw new InvalidArgumentException(
                'PostStick dimensions are too small.'
            );
        }

        $this->noteWidth = $width;
        $this->noteHeight = $height;

        return $this;
    }

    /**
     * Sets the note position.
     *
     * @param int $x
     * @param int $y
     *
     * @return static
     */
    public function position(
        int $x,
        int $y
    ): static {
        $this->positionX = $x;
        $this->positionY = $y;

        return $this;
    }

    /**
     * Enables or disables dragging.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function draggable(
        bool $enabled = true
    ): static {
        $this->isDraggable = $enabled;

        return $this;
    }

    /**
     * Enables or disables resizing.
     *
     * @param bool $enabled
     *
     * @return static
     */
    public function resizable(
        bool $enabled = true
    ): static {
        $this->isResizable = $enabled;

        return $this;
    }

    /**
     * Resolves the selected color to a hexadecimal value.
     *
     * @return string
     */
    protected function resolveColor(): string
    {
        return self::COLORS[$this->noteColor]
            ?? $this->noteColor;
    }

    /**
     * Builds a standard header button.
     *
     * @param string $label
     * @param string $class
     * @param string $action
     * @param string $title
     *
     * @return HtmlComponent
     */
    protected function buildHeaderButton(
        string $label,
        string $class,
        string $action,
        string $title
    ): HtmlComponent {
        return (new HtmlComponent('button'))
            ->addAttribute('type', 'button')
            ->addClass($class)
            ->title($title)
            ->aria('label', $title)
            ->data('post-stick-action', $action)
            ->text($label);
    }

    /**
     * Builds the note header.
     *
     * @return HtmlComponent
     */
    protected function buildHeader(): HtmlComponent
    {
        $header = (new HtmlComponent('div'))
            ->addClass('post-stick-header')
            ->data('post-stick-drag-handle', 'true');

        $addButton = $this->buildHeaderButton(
            '+',
            'post-stick-add',
            'add',
            'Add new note'
        );

        $title = (new HtmlComponent('div'))
            ->addClass('post-stick-title')
            ->text(
                htmlspecialchars(
                    $this->noteTitle,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );

        $colorButton = $this->buildHeaderButton(
            '...',
            'post-stick-color-toggle',
            'toggle-color-menu',
            'Change note color'
        );

        $closeButton = $this->buildHeaderButton(
            '×',
            'post-stick-close',
            'close',
            'Close note'
        );

        $controls = (new HtmlComponent('div'))
            ->addClass('post-stick-header-controls');

        $controls
            ->addChild($colorButton)
            ->addChild($closeButton);

        $header
            ->addChild($addButton)
            ->addChild($title)
            ->addChild($controls)
            ->addChild($this->buildColorMenu());

        return $header;
    }

    /**
     * Builds the note color selection menu.
     *
     * @return HtmlComponent
     */
    protected function buildColorMenu(): HtmlComponent
    {
        $menu = (new HtmlComponent('div'))
            ->addClass('post-stick-color-menu')
            ->addAttribute('hidden', 'hidden')
            ->data('post-stick-color-menu', 'true')
            ->role('group')
            ->aria('label', 'Note colors');

        foreach (self::COLORS as $name => $hex) {
            $colorButton = (new HtmlComponent('button'))
                ->addAttribute('type', 'button')
                ->addClass('post-stick-color-option')
                ->addAttribute(
                    'aria-label',
                    ucfirst($name)
                )
                ->title(ucfirst($name))
                ->style('background-color', $hex)
                ->data('post-stick-color-option', $name);

            $menu->addChild($colorButton);
        }

        return $menu;
    }

    /**
     * Builds the formatting toolbar.
     *
     * @return ToolBar
     */
    protected function buildToolbar(): ToolBar
    {
        $toolbar = (new ToolBar())
            ->orientation('horizontal')
            ->addClass('post-stick-toolbar')
            ->aria('label', 'Note formatting');

        $toolbar->addItem(
            (new ToolBarItem('B'))
                ->title('Bold')
                ->data('post-stick-action', 'bold')
        );

        $toolbar->addItem(
            (new ToolBarItem('I'))
                ->title('Italic')
                ->data('post-stick-action', 'italic')
        );

        $toolbar->addItem(
            (new ToolBarItem('U'))
                ->title('Underline')
                ->data('post-stick-action', 'underline')
        );

        $toolbar->addItem(
            (new ToolBarItem('ab'))
                ->title('Strikethrough')
                ->data('post-stick-action', 'strikethrough')
        );

        $toolbar->addItem(
            (new ToolBarItem('List'))
                ->title('Bullet list')
                ->data('post-stick-action', 'list')
        );

        $toolbar->addItem(
            (new ToolBarItem('Image'))
                ->title('Insert image')
                ->data('post-stick-action', 'image')
        );

        return $toolbar;
    }

    /**
     * Builds the editable note content.
     *
     * @return HtmlComponent
     */
    protected function buildContent(): HtmlComponent
    {
        return (new HtmlComponent('div'))
            ->addClass('post-stick-content')
            ->addAttribute('contenteditable', 'true')
            ->addAttribute('spellcheck', 'true')
            ->role('textbox')
            ->aria('label', 'Note content')
            ->aria('multiline', 'true')
            ->data('post-stick-content', 'true')
            ->text(
                htmlspecialchars(
                    $this->noteContent,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                )
            );
    }

    /**
     * Renders the PostStick component.
     *
     * @return string
     */
    public function render(): string
    {
        $this->clearChildren();

        $this
            ->data('post-stick-theme', $this->noteTheme)
            ->data('post-stick-color', $this->noteColor)
            ->data('post-stick-draggable', $this->isDraggable ? 'true' : 'false')
            ->data('post-stick-resizable', $this->isResizable ? 'true' : 'false')
            ->style('width', $this->noteWidth . 'px')
            ->style('height', $this->noteHeight . 'px')
            ->style('--post-stick-accent', $this->resolveColor());

        if ($this->positionX !== null) {
            $this->style(
                'left',
                $this->positionX . 'px'
            );
        }

        if ($this->positionY !== null) {
            $this->style(
                'top',
                $this->positionY . 'px'
            );
        }

        $this
            ->addChild($this->buildHeader())
            ->addChild($this->buildContent())
            ->addChild($this->buildToolbar());

        return parent::render();
    }
}

<?php
declare(strict_types=1);

namespace RedSky\Html\Components\Communication\ContactCard;

use RedSky\Html\Components\HtmlComponent;

/**
 * Represents a contact card component.
 *
 * Displays a contact's avatar, name, description,
 * activity time and notification count.
 *
 * @package RedSky\Html\Components\Communication\ContactCard
 */
class ContactCard extends HtmlComponent
{
    protected ?string $name = null;

    protected ?string $message = null;

    protected ?string $avatar = null;

    protected ?string $time = null;

    protected ?string $status = null;

    protected int $unread = 0;

    protected bool $online = false;

    /**
     * Initializes the contact card.
     */
    public function __construct()
    {
        parent::__construct('div');

        $this->addClass('contact-card');
    }

    /**
     * Sets the contact name.
     */
    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Sets the last message or description.
     */
    public function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Sets the contact avatar.
     */
    public function avatar(string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Sets the activity time.
     */
    public function time(string $time): static
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Sets the contact status.
     */
    public function status(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Sets the unread message count.
     */
    public function unread(int $count): static
    {
        $this->unread = max(0, $count);

        return $this;
    }

    /**
     * Sets the online indicator.
     */
    public function online(bool $online = true): static
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Renders the contact avatar.
     */
    protected function renderAvatar(): string
    {
        $avatar = new HtmlComponent('div');

        $avatar->addClass('contact-card-avatar');

        if ($this->avatar !== null) {
            $image = new HtmlComponent('img');

            $image->addAttribute('src', $this->avatar);
            $image->addAttribute('alt', $this->name ?? '');

            $avatar->addChild($image);
        } else {
            $avatar->addClass('contact-card-avatar-placeholder');

            $avatar->setContent(
                htmlspecialchars(
                    mb_substr($this->name ?? '?', 0, 1),
                    ENT_QUOTES,
                    'UTF-8'
                )
            );
        }

        if ($this->online) {
            $indicator = new HtmlComponent('span');

            $indicator->addClass('contact-card-online');

            $avatar->addChild($indicator);
        }

        return $avatar->render();
    }

    /**
     * Renders the contact information.
     */
    protected function renderInformation(): string
    {
        $information = new HtmlComponent('div');

        $information->addClass('contact-card-information');

        if ($this->name !== null) {
            $name = new HtmlComponent('div');

            $name->addClass('contact-card-name');
            $name->setContent($this->name);

            $information->addChild($name);
        }

        $description = $this->message ?? $this->status;

        if ($description !== null) {
            $message = new HtmlComponent('div');

            $message->addClass('contact-card-message');
            $message->setContent($description);

            $information->addChild($message);
        }

        return $information->render();
    }

    /**
     * Renders the activity information.
     */
    protected function renderMetadata(): string
    {
        $metadata = new HtmlComponent('div');

        $metadata->addClass('contact-card-metadata');

        if ($this->time !== null) {
            $time = new HtmlComponent('span');

            $time->addClass('contact-card-time');
            $time->setContent($this->time);

            $metadata->addChild($time);
        }

        if ($this->unread > 0) {
            $badge = new HtmlComponent('span');

            $badge->addClass('contact-card-unread');
            $badge->setContent((string) $this->unread);

            $metadata->addChild($badge);
        }

        return $metadata->render();
    }

    /**
     * Renders the complete contact card.
     */
    public function render(): string
    {
        $html = sprintf(
            '<div%s>',
            $this->renderAttributes()
        );

        $html .= $this->renderAvatar();

        $html .= $this->renderInformation();

        $html .= $this->renderMetadata();

        $html .= '</div>';

        return $html;
    }
}

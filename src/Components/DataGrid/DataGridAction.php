<?php

declare(strict_types=1);

namespace RedSky\Html\Components\DataGrid;

/**
 * Represents an action that can be displayed and executed
 * by a DataGrid.
 *
 * A DataGridAction may represent a global action displayed
 * in the DataGrid toolbar or a row action displayed for an
 * individual record.
 *
 * The action is UI-library agnostic. It stores semantic
 * configuration that can later be interpreted by the
 * DataGrid renderer and its client-side behavior.
 */
class DataGridAction
{
    /**
     * The action name.
     */
    protected string $name;

    /**
     * The action label.
     */
    protected string $label;

    /**
     * Optional action icon.
     */
    protected ?string $icon = null;

    /**
     * Optional action URL.
     */
    protected ?string $url = null;

    /**
     * HTTP method used when the action communicates
     * with a server endpoint.
     */
    protected string $method = 'GET';

    /**
     * Optional action event name.
     */
    protected ?string $event = null;

    /**
     * Whether the action is enabled.
     */
    protected bool $enabled = true;

    /**
     * Whether the action is visible.
     */
    protected bool $visible = true;

    /**
     * Whether the action requires selected rows.
     */
    protected bool $requiresSelection = false;

    /**
     * Whether the action applies to one row.
     */
    protected bool $rowAction = false;

    /**
     * Whether the action should ask for confirmation.
     */
    protected bool $confirm = false;

    /**
     * Confirmation message.
     */
    protected ?string $confirmMessage = null;

    /**
     * Optional CSS class.
     */
    protected ?string $class = null;

    /**
     * Optional target.
     */
    protected ?string $target = null;

    /**
     * Optional action parameters.
     *
     * @var array<string, mixed>
     */
    protected array $parameters = [];

    /**
     * Optional arbitrary attributes.
     *
     * @var array<string, mixed>
     */
    protected array $attributes = [];

    /**
     * Optional permission identifier.
     */
    protected ?string $permission = null;

    /**
     * Optional authorization callback.
     *
     * @var callable|null
     */
    protected $authorization = null;

    /**
     * Optional action callback.
     *
     * @var callable|null
     */
    protected $callback = null;

    /**
     * Creates a DataGrid action.
     *
     * @param string $name
     * @param string|null $label
     */
    public function __construct(string $name, ?string $label = null)
    {
        $this->name = $name;
        $this->label = $label ?? $name;
    }

    /**
     * Creates an action from an associative configuration array.
     *
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): static
    {
        if (!isset($config['name'])) {
            throw new \InvalidArgumentException(
                'A DataGrid action requires a name.'
            );
        }

        $action = new static(
            (string) $config['name'],
            isset($config['label'])
                ? (string) $config['label']
                : null
        );

        return $action->configure($config);
    }

    /**
     * Configures the action.
     *
     * @param array<string, mixed> $config
     */
    public function configure(array $config): static
    {
        if (isset($config['label'])) {
            $this->setLabel((string) $config['label']);
        }

        if (array_key_exists('icon', $config)) {
            $this->icon(
                $config['icon'] !== null
                    ? (string) $config['icon']
                    : null
            );
        }

        if (array_key_exists('url', $config)) {
            $this->url(
                $config['url'] !== null
                    ? (string) $config['url']
                    : null
            );
        }

        if (isset($config['method'])) {
            $this->setMethod((string) $config['method']);
        }

        if (array_key_exists('event', $config)) {
            $this->event(
                $config['event'] !== null
                    ? (string) $config['event']
                    : null
            );
        }

        if (isset($config['enabled'])) {
            $this->enabled((bool) $config['enabled']);
        }

        if (isset($config['visible'])) {
            $this->visible((bool) $config['visible']);
        }

        if (isset($config['requiresSelection'])) {
            $this->setRequiresSelection(
                (bool) $config['requiresSelection']
            );
        }

        if (isset($config['rowAction'])) {
            $this->rowAction((bool) $config['rowAction']);
        }

        if (isset($config['confirm'])) {
            $this->confirm((bool) $config['confirm']);
        }

        if (array_key_exists('confirmMessage', $config)) {
            $this->confirmMessage(
                $config['confirmMessage'] !== null
                    ? (string) $config['confirmMessage']
                    : null
            );
        }

        if (array_key_exists('class', $config)) {
            $this->class(
                $config['class'] !== null
                    ? (string) $config['class']
                    : null
            );
        }

        if (array_key_exists('target', $config)) {
            $this->setTarget(
                $config['target'] !== null
                    ? (string) $config['target']
                    : null
            );
        }

        if (isset($config['parameters'])) {
            $this->setParameters((array) $config['parameters']);
        }

        if (isset($config['attributes'])) {
            $this->attributes((array) $config['attributes']);
        }

        if (array_key_exists('permission', $config)) {
            $this->setPermission(
                $config['permission'] !== null
                    ? (string) $config['permission']
                    : null
            );
        }

        if (array_key_exists('authorization', $config)) {
            $this->setAuthorization($config['authorization']);
        }

        if (array_key_exists('callback', $config)) {
            $this->setCallback($config['callback']);
        }

        return $this;
    }

    /**
     * Returns the action name.
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Sets the action name.
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the action label.
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Sets the action label.
     */
    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Returns the icon.
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Sets the icon.
     */
    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Returns the URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets the URL.
     */
    public function url(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Returns the HTTP method.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Sets the HTTP method.
     */
    public function setMethod(string $method): static
    {
        $method = strtoupper(trim($method));

        if ($method === '') {
            throw new \InvalidArgumentException(
                'The action HTTP method cannot be empty.'
            );
        }

        $this->method = $method;

        return $this;
    }

    /**
     * Returns the event name.
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * Sets the event name.
     */
    public function event(?string $event): static
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Returns whether the action is enabled.
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Enables or disables the action.
     */
    public function enabled(bool $enabled = true): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Returns whether the action is visible.
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * Shows or hides the action.
     */
    public function visible(bool $visible = true): static
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Returns whether the action requires selected rows.
     */
    public function getRequiresSelection(): bool
    {
        return $this->requiresSelection;
    }
    
    /**
     * Configures whether the action requires selected rows.
     */
    public function setRequiresSelection(bool $requires = true): static
    {
        $this->requiresSelection = $requires;

        return $this;
    }

    /**
     * Returns whether this is a row action.
     */
    public function isRowAction(): bool
    {
        return $this->rowAction;
    }

    /**
     * Configures the action as a row action.
     */
    public function rowAction(bool $rowAction = true): static
    {
        $this->rowAction = $rowAction;

        return $this;
    }

    /**
     * Returns whether confirmation is required.
     */
    public function requiresConfirmation(): bool
    {
        return $this->confirm;
    }

    /**
     * Enables or disables confirmation.
     */
    public function confirm(bool $confirm = true): static
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * Returns the confirmation message.
     */
    public function getConfirmMessage(): ?string
    {
        return $this->confirmMessage;
    }

    /**
     * Sets the confirmation message.
     *
     * Enabling confirmation is not implicit. Use confirm()
     * to enable the confirmation behavior.
     */
    public function confirmMessage(?string $message): static
    {
        $this->confirmMessage = $message;

        return $this;
    }

    /**
     * Returns the CSS class.
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * Sets the CSS class.
     */
    public function class(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Returns the target.
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * Sets the target.
     */
    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Returns all action parameters.
     *
     * @return array<string, mixed>
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

   
    /**
     * Sets all action parameters.
     *
     * @param array<string, mixed> $parameters
     */
    public function setParameters(array $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * Adds or replaces one action parameter.
     */
    public function parameter(string $name, mixed $value): static
    {
        $this->parameters[$name] = $value;

        return $this;
    }

    /**
     * Removes an action parameter.
     */
    public function removeParameter(string $name): static
    {
        unset($this->parameters[$name]);

        return $this;
    }

    /**
     * Returns whether an action parameter exists.
     */
    public function hasParameter(string $name): bool
    {
        return array_key_exists($name, $this->parameters);
    }

    /**
     * Returns an action parameter.
     */
    public function getParameter(
        string $name,
        mixed $default = null
    ): mixed {
        return $this->parameters[$name] ?? $default;
    }

    /**
     * Returns all custom attributes.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Sets all custom attributes.
     *
     * @param array<string, mixed> $attributes
     */
    public function attributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Adds or replaces a custom attribute.
     */
    public function attribute(string $name, mixed $value): static
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * Removes a custom attribute.
     */
    public function removeAttribute(string $name): static
    {
        unset($this->attributes[$name]);

        return $this;
    }

    /**
     * Returns whether a custom attribute exists.
     */
    public function hasAttribute(string $name): bool
    {
        return array_key_exists($name, $this->attributes);
    }

    /**
     * Returns a custom attribute.
     */
    public function getAttribute(
        string $name,
        mixed $default = null
    ): mixed {
        return $this->attributes[$name] ?? $default;
    }

    /**
     * Returns the permission identifier.
     */
    public function getPermission(): ?string
    {
        return $this->permission;
    }

    /**
     * Sets the permission identifier required by the action.
     */
    public function setPermission(?string $permission): static
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * Returns the authorization callback.
     *
     * @return callable|null
     */
    public function getAuthorization(): ?callable
    {
        return $this->authorization;
    }
    
    /**
     * Sets an authorization callback.
     *
     * @param callable|null $authorization
     */
    public function setAuthorization(?callable $authorization): static
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * Determines whether the action is authorized.
     *
     * If no authorization callback has been configured,
     * authorization is considered allowed at this component
     * level. Server-side authorization must still be enforced
     * by the application when the action performs a protected
     * operation.
     */
    public function isAuthorized(mixed $context = null): bool
    {
        if ($this->authorization === null) {
            return true;
        }

        return (bool) call_user_func(
            $this->authorization,
            $context,
            $this
        );
    }

    /**
     * Returns the action callback.
     *
     * @return callable|null
     */
    public function getCallback(): ?callable
    {
        return $this->callback;
    }
    
    /**
     * Sets the action callback.
     *
     * @param callable|null $callback
     */
    public function setCallback(?callable $callback): static
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * Executes the configured server-side callback.
     *
     * @throws \LogicException When no callback is configured.
     */
    public function execute(mixed $context = null): mixed
    {
        if ($this->callback === null) {
            throw new \LogicException(
                sprintf(
                    'DataGrid action "%s" does not have a callback.',
                    $this->name
                )
            );
        }

        return call_user_func(
            $this->callback,
            $context,
            $this
        );
    }

    /**
     * Returns whether the action has a URL.
     */
    public function hasUrl(): bool
    {
        return $this->url !== null && $this->url !== '';
    }

    /**
     * Returns whether the action has an event.
     */
    public function hasEvent(): bool
    {
        return $this->event !== null && $this->event !== '';
    }

    /**
     * Returns whether the action has parameters.
     */
    public function hasParameters(): bool
    {
        return $this->parameters !== [];
    }

    /**
     * Returns whether the action has custom attributes.
     */
    public function hasAttributes(): bool
    {
        return $this->attributes !== [];
    }

    /**
     * Returns whether the action can currently be displayed.
     *
     * Visibility and enabled state are intentionally kept
     * separate.
     */
    public function canDisplay(mixed $context = null): bool
    {
        return $this->visible && $this->isAuthorized($context);
    }

    /**
     * Converts the action into a serializable configuration.
     *
     * Server-side callbacks are represented only by metadata
     * and are never serialized as executable PHP values.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'icon' => $this->icon,
            'url' => $this->url,
            'method' => $this->method,
            'event' => $this->event,
            'enabled' => $this->enabled,
            'visible' => $this->visible,
            'requiresSelection' => $this->requiresSelection,
            'rowAction' => $this->rowAction,
            'confirm' => $this->confirm,
            'confirmMessage' => $this->confirmMessage,
            'class' => $this->class,
            'target' => $this->target,
            'parameters' => $this->parameters,
            'attributes' => $this->attributes,
            'permission' => $this->permission,
            'hasAuthorization' => $this->authorization !== null,
            'hasCallback' => $this->callback !== null,
        ];
    }
}
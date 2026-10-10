
/**
 * SearchableSelect component.
 *
 * Provides searchable select behavior for local and remote data sources.
 *
 * Local mode filters options already present in the DOM.
 * Remote mode requests matching options from a configured endpoint.
 *
 * @package RedSky\Html
 */

class SearchableSelectController {
    /**
     * Creates a SearchableSelect controller.
     *
     * @param {HTMLElement} element Component root element.
     */
    constructor(element) {
        this.element = element;
        this.input = null;
        this.hiddenInput = null;
        this.menu = null;
        this.options = [];
        this.highlightedOption = null;
        this.debounceTimer = null;
        this.abortController = null;
        this.requestSequence = 0;

        this.initialize();
    }

    /**
     * Initializes the component.
     *
     * @returns {void}
     */
    initialize() {
        this.input = this.element.querySelector('.form-control');
        this.hiddenInput = this.element.querySelector('input[type="hidden"]');
        this.menu = this.element.querySelector('.searchable-select-menu');

        if (!this.input || !this.hiddenInput || !this.menu) {
            return;
        }

        this.searchUrl = this.element.getAttribute('data-search-url') || '';
        this.minimumInputLength = this.getNumberAttribute(
            'data-minimum-input-length',
            0
        );
        this.delay = this.getNumberAttribute('data-delay', 300);
        this.limit = this.getNumberAttribute('data-limit', 20);

        this.configureAccessibility();
        this.collectLocalOptions();
        this.bindEvents();
        this.initializeSelectedOption();
        this.syncRequiredValidity();
    }

    /**
     * Configures accessibility attributes.
     *
     * @returns {void}
     */
    configureAccessibility() {
        if (!this.menu.id) {
            this.menu.id = `searchable-select-menu-${crypto.randomUUID
                ? crypto.randomUUID()
                : Math.random().toString(36).slice(2)}`;
        }

        this.input.setAttribute('role', 'combobox');
        this.input.setAttribute('aria-autocomplete', 'list');
        this.input.setAttribute('aria-expanded', 'false');
        this.input.setAttribute('aria-controls', this.menu.id);

        this.menu.setAttribute('role', 'listbox');

        if (this.hiddenInput.hasAttribute('required')) {
            this.input.required = true;
        }
    }

    /**
     * Collects options currently present in the menu.
     *
     * @returns {void}
     */
    collectLocalOptions() {
        this.options = Array.from(
            this.menu.querySelectorAll('.searchable-select-option')
        );

        this.options.forEach((option) => {
            option.setAttribute('role', 'option');

            if (!option.hasAttribute('aria-selected')) {
                option.setAttribute('aria-selected', 'false');
            }

            if (option.dataset.value === undefined) {
                option.dataset.value = '';
            }
        });
    }

    /**
     * Registers event listeners.
     *
     * @returns {void}
     */
    bindEvents() {
        this.input.addEventListener('focus', () => {
            this.open();
        });

        this.input.addEventListener('input', () => {
            this.handleInput();
        });

        this.input.addEventListener('keydown', (event) => {
            this.handleKeydown(event);
        });

        this.input.addEventListener('blur', () => {
            this.syncRequiredValidity();
        });

        this.menu.addEventListener('click', (event) => {
            this.handleOptionClick(event);
        });

        this.documentClickHandler = (event) => {
            this.handleDocumentClick(event);
        };

        document.addEventListener('click', this.documentClickHandler);
    }

    /**
     * Handles search input.
     *
     * @returns {void}
     */
    handleInput() {
        const query = this.input.value.trim();

        // Typing a new query invalidates the previous selection.
        this.hiddenInput.value = '';
        this.syncRequiredValidity();

        this.open();
        this.clearHighlight();

        if (query.length < this.minimumInputLength) {
            clearTimeout(this.debounceTimer);

            this.requestSequence++;

            if (this.abortController) {
                this.abortController.abort();
                this.abortController = null;
            }

            if (this.isRemote()) {
                this.clearRemoteResults();
                this.removeStatus();
            } else {
                this.filterLocalOptions(query);
            }

            return;
        }

        if (this.isRemote()) {
            this.scheduleRemoteSearch(query);
            return;
        }

        this.filterLocalOptions(query);
    }

    /**
     * Determines whether remote searching is enabled.
     *
     * @returns {boolean}
     */
    isRemote() {
        return this.searchUrl !== '';
    }

    /**
     * Filters locally defined options.
     *
     * @param {string} query Search query.
     *
     * @returns {void}
     */
    filterLocalOptions(query) {
        const normalizedQuery = query.toLocaleLowerCase();
        let visibleCount = 0;

        this.options.forEach((option) => {
            const text = option.textContent.trim().toLocaleLowerCase();
            const matches = text.includes(normalizedQuery);

            option.hidden = !matches;

            if (matches) {
                visibleCount++;
            }
        });

        this.clearHighlight();
        this.removeStatus();

        if (visibleCount === 0) {
            this.showStatus('No results found.');
        }
    }

    /**
     * Schedules a remote search request.
     *
     * @param {string} query Search query.
     *
     * @returns {void}
     */
    scheduleRemoteSearch(query) {
        clearTimeout(this.debounceTimer);

        this.debounceTimer = setTimeout(() => {
            this.searchRemote(query);
        }, Math.max(0, this.delay));
    }

    /**
     * Performs a remote search.
     *
     * @param {string} query Search query.
     *
     * @returns {Promise<void>}
     */
    async searchRemote(query) {
        const sequence = ++this.requestSequence;

        if (this.abortController) {
            this.abortController.abort();
        }

        this.abortController = new AbortController();

        this.showLoading();

        try {
            const response = await fetch(this.buildSearchUrl(query), {
                method: 'GET',
                headers: {
                    Accept: 'application/json'
                },
                signal: this.abortController.signal
            });

            if (!response.ok) {
                throw new Error(`Search request failed: ${response.status}`);
            }

            const data = await response.json();

            if (sequence !== this.requestSequence) {
                return;
            }

            this.renderRemoteResults(this.normalizeResults(data));
        } catch (error) {
            if (error.name === 'AbortError') {
                return;
            }

            if (sequence !== this.requestSequence) {
                return;
            }

            this.showError('Unable to load results.');
            console.error('SearchableSelect:', error);
        }
    }

    /**
     * Builds the remote search URL.
     *
     * Supports a {query} placeholder or a standard q parameter.
     *
     * @param {string} query Search query.
     *
     * @returns {string}
     */
    buildSearchUrl(query) {
        const encodedQuery = encodeURIComponent(query);
        let url;

        if (this.searchUrl.includes('{query}')) {
            url = this.searchUrl.replace('{query}', encodedQuery);
        } else {
            const separator = this.searchUrl.includes('?') ? '&' : '?';
            url = `${this.searchUrl}${separator}q=${encodedQuery}`;
        }

        const separator = url.includes('?') ? '&' : '?';

        return `${url}${separator}limit=${encodeURIComponent(String(this.limit))}`;
    }

    /**
     * Normalizes supported response formats.
     *
     * @param {*} data Response data.
     *
     * @returns {Array}
     */
    normalizeResults(data) {
        if (Array.isArray(data)) {
            return data;
        }

        if (!data || typeof data !== 'object') {
            return [];
        }

        for (const key of ['results', 'data', 'items', 'records']) {
            if (Array.isArray(data[key])) {
                return data[key];
            }
        }

        return [];
    }

    /**
     * Normalizes one remote result.
     *
     * @param {*} result Remote result.
     *
     * @returns {{value: *, text: string}|null}
     */
    normalizeResult(result) {
        if (!result || typeof result !== 'object') {
            return null;
        }

        const value =
            result.value ??
            result.id ??
            result.key ??
            result.clave ??
            result.code ??
            null;

        const text =
            result.text ??
            result.name ??
            result.label ??
            result.nombre ??
            result.descripcion ??
            result.description ??
            null;

        if (value === null || text === null) {
            return null;
        }

        return {
            value,
            text: String(text)
        };
    }

    /**
     * Renders remote results.
     *
     * @param {Array} results Search results.
     *
     * @returns {void}
     */
    renderRemoteResults(results) {
        this.clearRemoteResults();
        this.removeStatus();

        let renderedCount = 0;

        results.slice(0, Math.max(0, this.limit)).forEach((result) => {
            const normalized = this.normalizeResult(result);

            if (!normalized) {
                return;
            }

            this.menu.appendChild(
                this.createOption(normalized.text, normalized.value)
            );

            renderedCount++;
        });

        this.collectLocalOptions();

        if (renderedCount === 0) {
            this.showStatus('No results found.');
        }

        this.clearHighlight();
    }

    /**
     * Creates a remote option.
     *
     * @param {string} text Visible option text.
     * @param {*} value Submitted option value.
     *
     * @returns {HTMLDivElement}
     */
    createOption(text, value) {
        const option = document.createElement('div');

        option.className = 'searchable-select-option';
        option.textContent = text;
        option.dataset.value = String(value);
        option.dataset.remote = 'true';

        option.setAttribute('role', 'option');
        option.setAttribute('aria-selected', 'false');

        return option;
    }

    /**
     * Handles option clicks.
     *
     * @param {MouseEvent} event Click event.
     *
     * @returns {void}
     */
    handleOptionClick(event) {
        const target = event.target;

        if (!(target instanceof Element)) {
            return;
        }

        const option = target.closest('.searchable-select-option');

        if (!option || !this.menu.contains(option) || option.hidden) {
            return;
        }

        if (option.getAttribute('aria-disabled') === 'true') {
            return;
        }

        this.selectOption(option);
    }

    /**
     * Selects an option and updates the hidden form value.
     *
     * @param {HTMLElement} option Selected option.
     *
     * @returns {void}
     */
    selectOption(option) {
        this.input.value = option.textContent.trim();
        this.hiddenInput.value = option.dataset.value ?? '';

        this.options.forEach((currentOption) => {
            currentOption.setAttribute(
                'aria-selected',
                currentOption === option ? 'true' : 'false'
            );
        });

        this.syncRequiredValidity();
        this.close();
    }

    /**
     * Initializes the current selection.
     *
     * @returns {void}
     */
    initializeSelectedOption() {
        const selected = this.menu.querySelector(
            '.searchable-select-option[aria-selected="true"]'
        );

        if (!selected) {
            return;
        }

        this.input.value = selected.textContent.trim();

        if (selected.dataset.value !== undefined) {
            this.hiddenInput.value = selected.dataset.value;
        }
    }

    /**
     * Validates required selection using the visible input.
     *
     * @returns {void}
     */
    syncRequiredValidity() {
        if (!this.input || !this.hiddenInput) {
            return;
        }

        if (this.hiddenInput.hasAttribute('required')) {
            this.input.setCustomValidity(
                this.hiddenInput.value === ''
                    ? 'Please select an option.'
                    : ''
            );
        } else {
            this.input.setCustomValidity('');
        }
    }

    /**
     * Handles keyboard navigation.
     *
     * @param {KeyboardEvent} event Keyboard event.
     *
     * @returns {void}
     */
    handleKeydown(event) {
        if (event.key === 'ArrowDown') {
            event.preventDefault();
            this.open();
            this.moveHighlight(1);
            return;
        }

        if (event.key === 'ArrowUp') {
            event.preventDefault();
            this.open();
            this.moveHighlight(-1);
            return;
        }

        if (event.key === 'Enter') {
            if (this.highlightedOption) {
                event.preventDefault();
                this.selectOption(this.highlightedOption);
            }

            return;
        }

        if (event.key === 'Escape') {
            event.preventDefault();
            this.close();
        }
    }

    /**
     * Moves the keyboard highlight.
     *
     * @param {number} direction Direction: 1 or -1.
     *
     * @returns {void}
     */
    moveHighlight(direction) {
        const visibleOptions = this.options.filter((option) => {
            return (
                !option.hidden &&
                option.getAttribute('aria-disabled') !== 'true'
            );
        });

        if (visibleOptions.length === 0) {
            return;
        }

        let index = visibleOptions.indexOf(this.highlightedOption);

        if (index < 0) {
            index = direction > 0 ? -1 : visibleOptions.length;
        }

        index += direction;

        if (index < 0) {
            index = visibleOptions.length - 1;
        } else if (index >= visibleOptions.length) {
            index = 0;
        }

        this.clearHighlight();

        this.highlightedOption = visibleOptions[index];
        this.highlightedOption.classList.add('active');
        this.input.setAttribute(
            'aria-activedescendant',
            this.ensureOptionId(this.highlightedOption)
        );

        this.highlightedOption.scrollIntoView({
            block: 'nearest'
        });
    }

    /**
     * Ensures that an option has an ID for accessibility.
     *
     * @param {HTMLElement} option Option element.
     *
     * @returns {string}
     */
    ensureOptionId(option) {
        if (!option.id) {
            option.id = `searchable-select-option-${Math.random()
                .toString(36)
                .slice(2)}`;
        }

        return option.id;
    }

    /**
     * Clears the highlighted option.
     *
     * @returns {void}
     */
    clearHighlight() {
        this.options.forEach((option) => {
            option.classList.remove('active');
        });

        this.highlightedOption = null;

        if (this.input) {
            this.input.removeAttribute('aria-activedescendant');
        }
    }

    /**
     * Opens the options menu.
     *
     * @returns {void}
     */
    open() {
        if (this.element.dataset.disabled === 'true') {
            return;
        }

        this.element.classList.add('open');
        this.input.setAttribute('aria-expanded', 'true');
    }

    /**
     * Closes the options menu.
     *
     * @returns {void}
     */
    close() {
        this.element.classList.remove('open');

        if (this.input) {
            this.input.setAttribute('aria-expanded', 'false');
        }

        this.clearHighlight();
    }

    /**
     * Closes the menu when the user clicks outside the component.
     *
     * @param {MouseEvent} event Click event.
     *
     * @returns {void}
     */
    handleDocumentClick(event) {
        if (!this.element.contains(event.target)) {
            this.close();
        }
    }

    /**
     * Shows a loading message.
     *
     * @returns {void}
     */
    showLoading() {
        this.clearRemoteResults();
        this.showStatus('Loading...');
    }

    /**
     * Shows an error message.
     *
     * @param {string} message Error text.
     *
     * @returns {void}
     */
    showError(message) {
        this.clearRemoteResults();
        this.showStatus(message);
        this.clearHighlight();
    }

    /**
     * Shows a status message in the menu.
     *
     * @param {string} message Status text.
     *
     * @returns {void}
     */
    showStatus(message) {
        this.removeStatus();

        const status = document.createElement('div');

        status.className = 'searchable-select-status';
        status.textContent = message;
        status.setAttribute('role', 'status');

        this.menu.appendChild(status);
    }

    /**
     * Removes the status message.
     *
     * @returns {void}
     */
    removeStatus() {
        this.menu.querySelectorAll('.searchable-select-status').forEach(
            (status) => status.remove()
        );
    }

    /**
     * Removes dynamically generated remote options.
     *
     * @returns {void}
     */
    clearRemoteResults() {
        this.menu
            .querySelectorAll(
                '.searchable-select-option[data-remote="true"]'
            )
            .forEach((option) => option.remove());

        this.collectLocalOptions();
    }

    /**
     * Reads a numeric data attribute.
     *
     * @param {string} name Attribute name.
     * @param {number} fallback Default value.
     *
     * @returns {number}
     */
    getNumberAttribute(name, fallback) {
        const value = this.element.getAttribute(name);

        if (value === null) {
            return fallback;
        }

        const number = Number(value);

        return Number.isFinite(number) ? number : fallback;
    }
}

/**
 * Initializes all SearchableSelect components.
 *
 * @returns {void}
 */
function initializeSearchableSelects() {
    document
        .querySelectorAll('[data-redsky-component="searchable-select"]')
        .forEach((element) => {
            if (element.searchableSelectController) {
                return;
            }

            element.searchableSelectController =
                new SearchableSelectController(element);
        });
}

/**
 * Initializes components when the document is ready.
 */
if (document.readyState === 'loading') {
    document.addEventListener(
        'DOMContentLoaded',
        initializeSearchableSelects
    );
} else {
    initializeSearchableSelects();
}


/**
 * PostStick component controller.
 *
 * Handles dragging, resizing, closing and persistent position
 * and dimensions for PostStick elements.
 *
 * @package RedSky\Html\Components\Widgets\PostStick
 */

/**
 * Returns the storage key for a PostStick.
 *
 * @param {HTMLElement} element
 * @returns {string}
 */
function getStorageKey(element) {
    return `redsky-post-stick-${element.id || 'default'}`;
}

/**
 * Saves the current position and dimensions.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function savePostStick(element) {
    const rect = element.getBoundingClientRect();

    const state = {
        left: rect.left,
        top: rect.top,
        width: rect.width,
        height: rect.height
    };

    try {
        localStorage.setItem(
            getStorageKey(element),
            JSON.stringify(state)
        );
    } catch (error) {
        console.warn('PostStick: unable to save state.', error);
    }
}

/**
 * Restores the previously saved position and dimensions.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function restorePostStick(element) {
    try {
        const savedState = localStorage.getItem(getStorageKey(element));

        if (!savedState) {
            return;
        }

        const state = JSON.parse(savedState);

        if (
            typeof state.left !== 'number' ||
            typeof state.top !== 'number' ||
            typeof state.width !== 'number' ||
            typeof state.height !== 'number'
        ) {
            return;
        }

        element.style.left = `${state.left}px`;
        element.style.top = `${state.top}px`;
        element.style.right = 'auto';
        element.style.bottom = 'auto';

        element.style.width = `${state.width}px`;
        element.style.height = `${state.height}px`;

    } catch (error) {
        console.warn('PostStick: unable to restore state.', error);
    }
}

/**
 * Initializes dragging behavior.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function initializeDragging(element) {
    if (element.getAttribute('data-post-stick-draggable') === 'false') {
        return;
    }

    const handle = element.querySelector('[data-post-stick-drag-handle]');

    if (!handle) {
        return;
    }

    handle.style.cursor = 'move';
    handle.style.touchAction = 'none';

    let dragging = false;
    let pointerStartX = 0;
    let pointerStartY = 0;
    let elementStartX = 0;
    let elementStartY = 0;

    handle.addEventListener('pointerdown', (event) => {
        if (event.button !== 0) {
            return;
        }

        if (event.target.closest('button, a, input, select, textarea')) {
            return;
        }

        const rect = element.getBoundingClientRect();

        pointerStartX = event.clientX;
        pointerStartY = event.clientY;

        elementStartX = rect.left;
        elementStartY = rect.top;

        element.style.left = `${rect.left}px`;
        element.style.top = `${rect.top}px`;
        element.style.right = 'auto';
        element.style.bottom = 'auto';

        dragging = true;

        handle.setPointerCapture(event.pointerId);

        event.preventDefault();
    });

    handle.addEventListener('pointermove', (event) => {
        if (!dragging) {
            return;
        }

        const deltaX = event.clientX - pointerStartX;
        const deltaY = event.clientY - pointerStartY;

        const rect = element.getBoundingClientRect();

        const minVisibleWidth = Math.min(60, rect.width);
        const minVisibleHeight = Math.min(38, rect.height);

        const maxX = window.innerWidth - minVisibleWidth;
        const maxY = window.innerHeight - minVisibleHeight;

        const nextX = Math.max(
            0,
            Math.min(elementStartX + deltaX, maxX)
        );

        const nextY = Math.max(
            0,
            Math.min(elementStartY + deltaY, maxY)
        );

        element.style.left = `${nextX}px`;
        element.style.top = `${nextY}px`;
    });

    const stopDragging = () => {
        if (!dragging) {
            return;
        }

        dragging = false;
        savePostStick(element);
    };

    handle.addEventListener('pointerup', stopDragging);
    handle.addEventListener('pointercancel', stopDragging);
    handle.addEventListener('lostpointercapture', stopDragging);
}

/**
 * Initializes resizing and observes dimension changes.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function initializeResizing(element) {
    if (element.getAttribute('data-post-stick-resizable') === 'false') {
        element.style.resize = 'none';
        return;
    }

    element.style.resize = 'both';

    if (typeof ResizeObserver === 'undefined') {
        return;
    }

    let resizeTimeout = null;

    const observer = new ResizeObserver(() => {
        clearTimeout(resizeTimeout);

        resizeTimeout = setTimeout(() => {
            savePostStick(element);
        }, 250);
    });

    observer.observe(element);
}

/**
 * Initializes the close button.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function initializeCloseButton(element) {
    const closeButton = element.querySelector(
        '[data-post-stick-action="close"]'
    );

    if (!closeButton) {
        return;
    }

    closeButton.addEventListener('click', () => {
        savePostStick(element);
        element.remove();
    });
}

/**
 * Initializes a single PostStick.
 *
 * @param {HTMLElement} element
 * @returns {void}
 */
function initializePostStick(element) {
    if (element.dataset.postStickInitialized === 'true') {
        return;
    }

    restorePostStick(element);

    initializeDragging(element);
    initializeResizing(element);
    initializeCloseButton(element);

    element.dataset.postStickInitialized = 'true';
}

/**
 * Initializes all PostStick elements inside a container.
 *
 * @param {ParentNode} root
 * @returns {void}
 */
export function initPostSticks(root = document) {
    const elements = root.querySelectorAll(
        '[data-redsky-component="post-stick"]'
    );

    elements.forEach(initializePostStick);
}

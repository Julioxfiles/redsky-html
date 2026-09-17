document.addEventListener('DOMContentLoaded', () => {
    const switchInput = document.querySelector('#notifications-switch');

    if (!switchInput) {
        return;
    }

    switchInput.addEventListener('change', (event) => {
        const input = event.currentTarget;

        const state = {
            name: input.name,
            value: input.value,
            checked: input.checked
        };

        console.log('Switch changed:', state);

        /*
         * This is where the application could make an AJAX request.
         *
         * Example:
         *
         * fetch('/api/settings/notifications', {
         *     method: 'POST',
         *     headers: {
         *         'Content-Type': 'application/json'
         *     },
         *     body: JSON.stringify({
         *         enabled: input.checked
         *     })
         * });
         */
    });
});
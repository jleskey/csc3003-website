'use strict';

const MAX_LABEL_LENGTH = 16;

// Ensure every submit button click is properly validated.
document.body.addEventListener('click', e => {
    const target = e.target;

    if (target instanceof HTMLInputElement || target instanceof HTMLButtonElement) {
        const type = target.type;
        if (type === 'submit') {
            const form = target.closest('form');
            // At this point, we know that a submit button was clicked in a
            // form. It's time for some action.
            return !form || validateForm(form);
        }
    }

    return true;
});

/**
 * Alert the user if there is an incorrect input in the given form
 * @param {HTMLFormElement} form The given form
 * @returns {boolean} Whether or not the form is valid
 */
function validateForm(form) {
    let problems = '';

    form.querySelectorAll('input, textarea, select').forEach(input => {
        const label = document.querySelector(`label[for="${input.id}"]`);
        const labelText = label instanceof HTMLLabelElement ? label.innerText : input.id;

        if (input instanceof HTMLInputElement) {
            if (input.required && !input.value) {
                addMessage('Please enter a value');
            } else if (input.pattern) {
                const regex = new RegExp(`^${input.pattern}$`);
                if (!regex.test(input.value)) {
                    addMessage(`Please format like ${input.placeholder}`);
                }
            }
        } else if (input instanceof HTMLTextAreaElement && input.required && !input.value) {
            addMessage('Please provide details')
        } else if (input instanceof HTMLSelectElement && input.required && !input.value) {
            addMessage('Please select an option')
        }

        /**
         * Add a problem to be reported to the user
         * @param {string} problem A description of the problem
         */
        function addMessage(problem) {
            const labelRepr = labelText.length > MAX_LABEL_LENGTH
                ? labelText.substring(0, MAX_LABEL_LENGTH - 3).trimEnd() + '...'
                : labelText;
            problems += `${problems ? '\n' : ''}${labelRepr}: ${problem}.`;
        }
    });

    if (problems) {
        alert(problems);
        return false;
    }

    return true;
}

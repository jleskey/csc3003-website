/**
 * The currently selected list item
 * @type {HTMLLIElement | undefined}
 */
let currentItem;

/**
 * The list container
 * @type {HTMLElement | undefined}
 */
let listContainer;

// Initialize the shopping list.
document.addEventListener('DOMContentLoaded', () => {
    listContainer = document.getElementById('glist');
    if (listContainer) {
        // Initialize the list item styling.
        for (const item of listContainer.children) {
            item.className = 'unselected';
        }

        // Select the last list item.
        select(listContainer.lastElementChild);
    }
});

/**
 * Moves the selected list item to the start of the list.
 */
function moveFirst() {
    if (listContainer && currentItem) {
        listContainer.prepend(currentItem);
    }
}

/**
 * Selects the previous list item.
 */
function scrollUp() {
    if (currentItem && !select(currentItem.previousElementSibling)) {
        alert('You are already at the top of the list.');
    }
}

/**
 * Adds a new item to the list.
 */
function addItem() {
    const input = document.querySelector('#addgroup input');
    if (listContainer && input instanceof HTMLInputElement) {
        const value = input.value.trim();
        if (value) {
            // Create a new item.
            const item = document.createElement('li');
            item.innerText = value;

            // Add the item to the list.
            listContainer.append(item);

            // Select it.
            select(item);

            // Reset the input value.
            input.value = '';
        }
    }
}


/**
 * Removes an item from the list.
 */
function removeItem() {
    if (currentItem) {
        const newSelection = (
            currentItem.previousElementSibling ||
            currentItem.nextElementSibling
        );
        currentItem.remove();
        select(newSelection);
    }
}

/**
 * Selects the next list item.
 */
function scrollDown() {
    if (currentItem && !select(currentItem.nextElementSibling)) {
        alert('You are already at the bottom of the list.');
    }
}

/**
 * Moves the selected list item to the end of the list.
 */
function moveLast() {
    if (listContainer && currentItem) {
        listContainer.append(currentItem);
    }
}

/**
 * Selects an item by its index.
 * @param {HTMLElement} item The item
 */
function select(item) {
    if (item instanceof HTMLElement && item !== currentItem) {
        if (currentItem) {
            currentItem.className = 'unselected';
        }
        currentItem = item;
        item.className = 'selected';
        return item;
    }
}

/**
 * The currently selected list item
 * @type {HTMLLIElement | undefined}
 */
let currentItem;

/**
 * All list items
 * @type {HTMLCollection | undefined}
 */
let listItems;

// Initialize the shopping list.
document.addEventListener('DOMContentLoaded', () => {
    const listContainer = document.getElementById('glist');
    if (listContainer) {
        listItems = listContainer.getElementsByTagName('li');

        // Initialize the list item styling.
        for (const item of listItems) {
            item.className = 'unselected';
        }

        // Select the last list item.
        select(listItems.length - 1);
    }
});

/**
 * Selects the given item.
 * @param {number} index The index of the given item
 */
function select(index) {
    const item = listItems && listItems[index];
    if (item instanceof HTMLElement) {
        if (currentItem) {
            currentItem.className = 'unselected';
        }
        currentItem = item;
        item.className = 'selected';
    }
}

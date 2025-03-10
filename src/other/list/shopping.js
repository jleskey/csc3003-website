var currentItem; // refers to currently selected list item (<li> element)

/* init function is invoked when the body of page has completely loaded */
function init() {
    // assign all list items to the unselected class by default
    var listItems = document.querySelectorAll('li');
    var i;
    for (i = 0; i < listItems.length; i++) {
        listItems[i].className = 'unselected'; // change class to selected
    }

    var glist = document.getElementById("glist");
    // initialize currentItem to the last item and select it
    currentItem = glist.lastChild;
    currentItem.className = 'selected';
}

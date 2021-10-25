var category = document.getElementsByClassName("sub-list")[0];
var open = 0;
function show() {
    if (open == 0) {
        open = 1;
        category.style.display = "block";
    } else {
        open = 0;
        category.style.display = "none";
    }
}

var sidebar = document.getElementsByClassName("sidebar")[0];
var baropen = 0;
function barshow() {
    if (baropen == 0) {
        baropen = 1;
        sidebar.style.display = "block";
    } else {
        baropen = 0;
        sidebar.style.display = "none";
    }
}

var hidden_buttons = document.getElementsByClassName("hidden-buttons")[0];
var hiddenOpen = 0;
function hiddenshow() {
    if (hiddenOpen == 0) {
        hiddenOpen = 1;
        hidden_buttons.style.display = "block";
    } else {
        hiddenOpen = 0;
        hidden_buttons.style.display = "none";
    }
}

var search = document.getElementsByClassName("search-hidden")[0];
var searchOpen = 0;
function searchshow() {
    if (searchOpen == 0) {
        searchOpen = 1;
        search.style.display = "flex";
    } else {
        searchOpen = 0;
        search.style.display = "none";
    }
}
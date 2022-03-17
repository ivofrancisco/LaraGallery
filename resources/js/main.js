// Toggle dropdown menu
// from table rows
let rowMenu = document.querySelectorAll(".g-row-item-manager");
document.body.addEventListener("click", function(e) {
    toggleSubMenu(e, rowMenu, "row-toggle");
});

// Update Class from a
// selected element
function updateClass(group, className) {
    group.forEach(item => {
        item.classList.remove(className);
    });
}

// Toggle a dropdown menu
function toggleSubMenu(element, group, targetClass) {
    if (element.target.classList.contains(targetClass)) {
        let parent = element.target.parentElement.classList;
        if (parent.contains("opened")) {
            parent.remove("opened");
        } else {
            updateClass(group, "opened");
            parent.add("opened");
        }
    } else {
        updateClass(group, "opened");
    }
}
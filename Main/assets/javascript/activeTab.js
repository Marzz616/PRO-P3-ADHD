document.addEventListener('DOMContentLoaded', function() {
    // Determining the current page's URL.
    var currentUrl = window.location.href;

    // Determining all tab elements
    var tabs = document.querySelectorAll('.main-menu a');
    var tabs = document.querySelectorAll('.user-menu a');

    //Checking if all tabs match the URL
    tabs.forEach(function(tab) {
        if (tab.href === currentUrl) {
            // If the URL matches the href value of the tab, then we highlight it.
            tab.classList.add('active-tab');
        }
    });
});

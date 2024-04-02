document.addEventListener('DOMContentLoaded', function() {
    // Az aktuális oldal URL-jének meghatározása
    var currentUrl = window.location.href;

    // Az összes fül elem meghatározása
    var tabs = document.querySelectorAll('.main-menu a');

    // Az összes fül ellenőrzése, hogy egyezik-e az URL
    tabs.forEach(function(tab) {
        if (tab.href === currentUrl) {
            // Ha az URL megegyezik a fül href értékével, akkor kiemeljük
            tab.classList.add('active-tab');
        }
    });
});

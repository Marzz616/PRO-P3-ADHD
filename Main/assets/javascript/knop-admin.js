console.log('het bestand wordt geladen');

const tabel_1 = document.querySelector('.tabel-1-display');

const tabel_2 = document.querySelector('.tabel-2-display');

const displayFormKnop = document.querySelector('.knopVoorFormInfo');

const displayContactKnop = document.querySelector('.knopVoorContactInfo');

displayFormKnop.addEventListener('click', function() {

    tabel_2.style.display = 'inline';
    tabel_1.style.display = 'none';

    console.log('De knop werkt');
});

displayContactKnop.addEventListener('click', function() {

    tabel_1.style.display = 'inline';
    tabel_2.style.display = 'none';

    console.log('De knop werkt');

});
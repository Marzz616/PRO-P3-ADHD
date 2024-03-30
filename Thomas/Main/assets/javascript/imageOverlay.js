document.addEventListener('DOMContentLoaded', function() {
    var overlay = document.getElementById('overlay');
    var images = document.querySelectorAll('.gallery img');
    
    images.forEach(function(image) {
      image.addEventListener('click', function() {
        var largeImage = document.createElement('img');
        largeImage.src = this.src;
        largeImage.classList.add('large-image');
        overlay.innerHTML = '';
        overlay.appendChild(largeImage);
        overlay.classList.add('active'); // Átlátszó réteg aktiválása
        document.body.style.overflow = 'hidden'; // Szükség esetén a görgetést letiltjuk
      });
    });
  
    overlay.addEventListener('click', function() {
      overlay.classList.remove('active'); // Átlátszó réteg inaktiválása
      document.body.style.overflow = ''; // A görgetést visszaállítjuk
    });
  });
  
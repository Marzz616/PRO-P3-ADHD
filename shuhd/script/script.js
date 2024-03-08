var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');
const img = new Image();

img.onload = () => {
  canvas.width = img.width;
  canvas.height = img.height;

  ctx.drawImage(img, 0, 0);

  // Add text
  ctx.font = 'bold 30px sans-serif';
  ctx.fillStyle = 'white';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  const text = 'Hello, World!';
  const x = canvas.width / 2;
  const y = canvas.height / 2;
  ctx.fillText(text, x, y);
};

img.src = 'your-image-url.jpg';


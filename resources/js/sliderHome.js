window.actualSlide = actualSlide;

var slideIndex = 1;
showSlides(slideIndex);

function actualSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var dots = document.getElementsByClassName("navigation-manual-btn");
  var slides = document.getElementsByClassName("slide");
  if (slides && slides.length > 0) {
    var i;
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
}
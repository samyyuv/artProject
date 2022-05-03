const slider = document.querySelector('.slider-content');

let sliderGrabbed = false;

if (slider) {
  slider.addEventListener('mousedown', (e) => {
    sliderGrabbed = true;
    slider.style.cursor = 'grabbing';
  })

  slider.addEventListener('mouseup', (e) => {
    sliderGrabbed = false;
    slider.style.cursor = 'grab';
  })

  slider.addEventListener('mouseleave', (e) => {
    sliderGrabbed = false;
  })

  slider.addEventListener('mousemove', (e) => {
    if (sliderGrabbed) {
      slider.parentElement.scrollLeft -= e.movementX;
    }
  })

  // slider.addEventListener('wheel', (e) => {
  //   e.preventDefault()
  //   slider.parentElement.scrollLeft += e.deltaY;
  // })
}

function getScrollPercentage() {
  return ((slider.parentElement.scrollLeft / (slider.parentElement.scrollWidth - slider.parentElement.clientWidth)) * 100);
}
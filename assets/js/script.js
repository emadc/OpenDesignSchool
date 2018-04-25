function resizeHeaderOnScroll() {
  const distanceY = window.pageYOffset || document.documentElement.scrollTop,
  shrinkOn = 200,
  headerEl = document.getElementById('target');
  
  if (distanceY > shrinkOn) {
    headerEl.classList.add("header_s");
  } else {
    headerEl.classList.remove("header_s");
  }
}

window.addEventListener('scroll', resizeHeaderOnScroll);
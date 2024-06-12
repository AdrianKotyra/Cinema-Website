document.addEventListener('DOMContentLoaded', () => {

    const heroSection = document.querySelector('.hero-section');
    const heroBottomTitle = document.querySelector(".hero-bottom-title")
    const navContainer = document.querySelector(".navigation-container")
    const hiddenNav = document.querySelectorAll(".hiddenNav")
    const logoContainer = document.querySelector(".logo-container")
    const blackGradientHero = document.querySelector(".black-gradient-animation")
    const dotsSlider = document.querySelector(".dots-slider")
  
    const calculateViewportHeightPercentage = () => {

        const viewportHeight = window.innerHeight;
        const heroSectionHeight = heroSection.offsetHeight;
        const rect = heroSection.getBoundingClientRect();
        const visibleHeight = Math.max(0, Math.min(heroSectionHeight, viewportHeight - rect.top, rect.bottom));
        const fontSizeAdjust = (100-(visibleHeight / heroSectionHeight) * 100);
        const visibleHeightPercentage = (100-(visibleHeight / heroSectionHeight) * 100)*2;
       

        heroBottomTitle.style.opacity=`${visibleHeightPercentage}%`;   // change opacity hero title
        navContainer.style.backgroundColor = `rgba(0, 0, 0, ${fontSizeAdjust}%)`;
        hiddenNav.forEach(element => { // change opacity hero title
            element.style.opacity=`${visibleHeightPercentage}%`
        });
        logoContainer.style.transform = `scale(calc(100% - ${fontSizeAdjust}% * 0.3))`; // change fontsize logo title
        const translateValue = 200 + 900 * (fontSizeAdjust / 100);
        const dotsOpacity = 100 - fontSizeAdjust*4 // change dots opacity slider 
        console.log(dotsOpacity)
        // Apply the new height to the element
        blackGradientHero.style.height = `${translateValue}px`;
        dotsSlider.style.opacity=`${dotsOpacity}%`

    };

    // Initial calculation
    calculateViewportHeightPercentage();

    // Recalculate on scroll and resize
    window.addEventListener('scroll', calculateViewportHeightPercentage);
    window.addEventListener('resize', calculateViewportHeightPercentage);
});



// -------------------------slider--------------------------------

let slides = document.querySelector("#slides");
let imgslides = document.querySelectorAll(".slide");
let liItem = document.querySelectorAll(".thumbnail");
let previous = document.querySelector("#previous");
let ul = document.querySelector("ul");
let next = document.querySelector("#next");
let timeout = 6000;
let current = -1;

let slider = setTimeout(fadeNextSlide, timeout);

function fadeNextSlide() {
  for (let i = 0; i < imgslides.length; i++) {
    imgslides[i].style.opacity = 0;
    liItem[i].classList.remove("active");
  }

  if (current !== imgslides.length - 1) {
    current++;
  } else {
    current = 0;
  }
  imgslides[current].style.opacity = 1;
  liItem[current].classList.add("active");
  slider = setTimeout(fadeNextSlide, timeout);
}

next.addEventListener("click", function () {
  clearTimeout(slider);
  fadeNextSlide();
});

function fadePrevSlide() {
  for (let i = 0; i < imgslides.length; i++) {
    imgslides[i].style.opacity = 0;
    liItem[i].classList.remove("active");
  }
  if (current == 0) {
    current = imgslides.length - 1;
  } else {
    current--;
  }
  imgslides[current].style.opacity = 1;
  liItem[current].classList.add("active");
  slider = setTimeout(fadeNextSlide, timeout);
}

previous.addEventListener("click", function () {
  clearTimeout(slider);
  fadePrevSlide();
});

ul.addEventListener("click", function (event) {
  let liIndex = event.target.dataset.numb;
  for (let i = 0; i < imgslides.length; i++) {
    imgslides[i].style.opacity = 0;
    liItem[i].classList.remove("active");
  }
  clearTimeout(slider);
  current = liIndex;
  imgslides[liIndex].style.opacity = 1;
  liItem[liIndex].classList.add("active");
  slider = setTimeout(fadeNextSlide, timeout);
});


window.onload = function() {
  var content = document.querySelector('body');
  content.style.display = 'block';
};



document.addEventListener('DOMContentLoaded', () => {

    const heroSection = document.querySelector('.hero-section');
    const heroBottomTitle = document.querySelector(".hero-bottom-title")
    const navContainer = document.querySelector(".navigation-container")
    const hiddenNav = document.querySelectorAll(".hiddenNav")
    const logoContainer = document.querySelector(".logo-container")
    const blackGradientHero = document.querySelector(".black-gradient-animation")
    const searchBar = document.querySelector(".wrapper-search")
  
    const calculateViewportHeightPercentage = () => {

        const viewportHeight = window.innerHeight;
        const heroSectionHeight = heroSection.offsetHeight;
        const rect = heroSection.getBoundingClientRect();
        const visibleHeight = Math.max(0, Math.min(heroSectionHeight, viewportHeight - rect.top, rect.bottom));
        const fontSizeAdjust = (100-(visibleHeight / heroSectionHeight) * 100);
        const visibleHeightPercentage = (100-(visibleHeight / heroSectionHeight) * 100)*2;
       
        heroBottomTitle?  heroBottomTitle.style.opacity=`${visibleHeightPercentage}%`: null // change opacity hero title
        navContainer.style.backgroundColor = `rgba(0, 0, 0, ${fontSizeAdjust}%)`;

      
        const scaleValue = `calc(100% - ${fontSizeAdjust}% * 0.2)`;
       
        // Combine scale and translateX transformations
        logoContainer.style.transform = `scale(${scaleValue})`;

        const translateValue = 200 + 900 * (fontSizeAdjust / 100);
       
       
      
        blackGradientHero.style.height = `${translateValue}px`;
      

    };

    // Initial calculation
    calculateViewportHeightPercentage();

    // Recalculate on scroll and resize
    window.addEventListener('scroll', calculateViewportHeightPercentage);
    window.addEventListener('resize', calculateViewportHeightPercentage);
});



// -------------------------slider--------------------------------

$(function(){
	/*make sure the first element shows up*/
	$('.slides_container .slide:first-child').addClass("active");
	var interval = 5000,
     active_slide = 0,
     dom_slides = $('.slides_container .slide'),
     num_slides = dom_slides.length;
	setInterval(function(){
		++active_slide;
		if((active_slide = active_slide%num_slides)<0) active_slide+=num_slides;
		dom_slides.removeClass('active').eq(active_slide).addClass('active');
	},interval);
});

// -------------------------draggable list of movies slider--------------------------------

const slider = document.querySelectorAll('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;

slider.forEach(ele=>ele.addEventListener('mousedown', (e) => {
  let rect = ele.getBoundingClientRect();
  isDown = true;
  ele.classList.add('active');
  // Get initial mouse position
  startX = e.pageX - rect.left;
  // Get initial scroll position in pixels from left
  scrollLeft = ele.scrollLeft;
  console.log(startX, scrollLeft);
}));

slider.forEach(ele=>ele.addEventListener('mouseleave', () => {
  isDown = false;
  ele.dataset.dragging = false;
  ele.classList.remove('active');
}));

slider.forEach(ele=>ele.addEventListener('mouseup', () => {
  isDown = false;
  ele.dataset.dragging = false;
  ele.classList.remove('active');
}));

slider.forEach(ele=>ele.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  let rect = ele.getBoundingClientRect();
  e.preventDefault();
  ele.dataset.dragging = true;
  // Get new mouse position
  const x = e.pageX - rect.left;
  // Get distance mouse has moved (new mouse position minus initial mouse position)
  const walk = (x - startX);
  // Update scroll position of slider from left (amount mouse has moved minus initial scroll position)
  ele.scrollLeft = scrollLeft - walk;
  console.log(x, walk, ele.scrollLeft);
}));

// -------------------------change movies section background, desc on card click--------------------------------

function initialActiveCard(){ //<==========initial first card active
  const moviesSection = document.querySelector(".movies-section");
  const cards = document.querySelectorAll(".movie-card-detailed");
  
  if(cards[0]) {
    cards[0].classList.add("active-card")
    const computedStyle = getComputedStyle(cards[0]);
    const CardbackgroundImage = computedStyle.backgroundImage;
    moviesSection.style.backgroundImage=CardbackgroundImage
  } 
}



function changeBackgroundOnHover(){ //<==========change active card 
  const moviesSection = document.querySelector(".movies-section");
  const cards = document.querySelectorAll(".movie-card-detailed");
 
 


  initialActiveCard()
  cards? cards.forEach(card=>card.addEventListener("click", ()=>{
    
    cards.forEach(card=>card.classList.remove("active-card"))
    setTimeout(() => {
      card.classList.add("active-card")
      const computedStyle = getComputedStyle(card);
      const CardbackgroundImage = computedStyle.backgroundImage;
      moviesSection.style.backgroundImage=CardbackgroundImage
    }, 1);
  
  })): null
} 
changeBackgroundOnHover()


function searchBar(){
  $(".search_field .input").click(function(){
    $(".wrapper-search .search_box .dropdown").addClass("show");
  });
  
  
  
  $(".default_option").click(function(){
    $(".dropdown ul").toggleClass("active");
  });
  
  $(".dropdown ul li").click(function(){
    var text = $(this).text();
    $(".default_option").text(text);
    $(".dropdown ul").removeClass("active");
  });
}
searchBar()
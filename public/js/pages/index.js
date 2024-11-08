

// ------------hero-text-slider---------

function sliderHeroText() {
	const buttonHeroLogin = document.querySelector(".hero-login-btn");
	const buttonHeroSignup = document.querySelector(".hero-singup-btn");
	const slide1 = document.querySelector(".hero-text-slide-1");
	const slide2 = document.querySelector(".hero-text-slide-2");
	const allSlides = document.querySelectorAll(".hero-slide");

	// Function to handle animation and text change
	function handleHoverAnimation(button, text, animationClass) {
		button.addEventListener("mouseover", () => {
			button.classList.add("active-button-text-hero");
				const heading = slide2.querySelector("h3");

				heading.classList.remove("header-text-hero-animation-class-right") 
				heading.classList.remove("header-text-hero-animation-class-left") 
				setTimeout(() => {
					heading.classList.add(animationClass) 
					heading.innerHTML = text; // Update text
				}, 1);
			
	
				
			
			
		});
	}

	// Initialize slides by deactivating all
	allSlides.forEach(slide => slide.classList.remove("active-hero-slide"));

	// Activate slide 1 after 2 seconds
	setTimeout(() => {
		slide1.classList.add("active-hero-slide");
	}, 1000);

	// Switch to slide 2 after another 2 seconds
	setTimeout(() => {
		slide1.classList.remove("active-hero-slide");
		slide2.classList.add("active-hero-slide");

		// Add hover animations for buttons
		handleHoverAnimation(buttonHeroLogin, "Discover hundreds of movies", "header-text-hero-animation-class-left");
		handleHoverAnimation(buttonHeroSignup, "Become part of Limelight cinema", "header-text-hero-animation-class-right");
	}, 3000);
}

sliderHeroText();






// ------------Function to show more items---------
let itemsPerPage = 12;  
let currentlyVisible = 12; 
function showItems() {

  const items = document.querySelectorAll('.more-movies-container .card-layout-more-card');
  const buttonShowMore = document.querySelector(".show-more-titles-button")

  items&&items.forEach((item, index) => {
    if (index < currentlyVisible) {
      item.style.display = 'block';  
    } else {
      item.style.display = 'none';  
    }
  });
  
  // Hide "Load More" button if all items are visible
  if (buttonShowMore&& currentlyVisible >= items.length) {
    buttonShowMore.style.display = "none";
  }
  
  buttonShowMore&&buttonShowMore.addEventListener("click", () => {
  currentlyVisible += itemsPerPage;  // Increment visible items
  showItems();  // Update the displayed items
});

}


// Initial display of 20 items
showItems();


// ------------Function slider choose movies section---------

jQuery(function ($) {
	function setBackgroundImages() {
		$('.flickfeed .card').each(function () {
			var bgImage = $(this).attr('data-bg');
			//$(this).css('background-image', 'url(' + bgImage + ')');
		});
	}

	// Store background image URLs in a data attribute to reapply later
	$('.flickfeed .card').each(function () {
		var bgImage = $(this).css('background-image');
		//$(this).attr('data-bg', bgImage);
	});

	let clonedBeforeFirst; // Store the cloned element before the first active slide.

	// Initialize Slick Slider
	$('.flickfeed').on('init', function () {
		$(this).removeClass('hideme'); // Show the slider after init
		setTimeout(function () {
			$('.flickfeed').addClass('loaded');
		}, 10);
		setBackgroundImages(); // Reapply background images after initialization

		// Set opacity 0 for slick-prev and last slick-cloned
		$('.slick-prev').addClass('first-none').attr('disabled', 'disabled');

		var currentFirst = $(this).find('.slick-active').first();
		$(currentFirst).addClass('firster');

		// Select the slick-cloned that comes right before the first visible "slick-active"
		clonedBeforeFirst = $(currentFirst).prev('.slick-cloned');
		if (clonedBeforeFirst.length) {
			clonedBeforeFirst.css('opacity', '0'); // Set the opacity to 0
		}

		var currentfirst = $(this).find('.slick-active').first();
		$(currentfirst).addClass('firster');
		var currentlast = $(this).find('.slick-active').last();
		$(currentlast).addClass('laster');

		$('body').removeClass('hidden');
	});

	// Reapply background images after each change
	$('.flickfeed').on('afterChange', function (event, slick, currentSlide, nextSlide) {
		setBackgroundImages(); // Reapply background images after change

		var currentfirst = $(this).find('.slick-active').first();
		$(this).find(".slick-slide").removeClass('firster');
		$(currentfirst).addClass('firster');
		var currentlast = $(this).find('.slick-active').last();
		$(this).find(".slick-slide").removeClass('laster');
		$(currentlast).addClass('laster');

		// Check if the active slide has both 'is-active' and 'laster' classes
		if (currentlast.hasClass('laster') && currentlast.hasClass('is-active')) {
			// Remove class 'first-none' and remove the disabled attribute from .slick-prev
			$('.slick-prev').removeClass('first-none').removeAttr('disabled');

			// Remove opacity from the clonedBeforeFirst element
			clonedBeforeFirst.css('opacity', '1');
		}
	});

	// Reapply background images after resizing
	$('.flickfeed').on('setPosition', function () {
		setBackgroundImages(); // Reapply background images after resizing
	});

	// Initialize details slider with adaptive height
	$('.details-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		adaptiveHeight: true, // Important to enable adaptive height
		infinite: true,
		useTransform: true,
	});

	// Slick slider settings
	$('.flickfeed').slick({
  
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 7,
		slidesToScroll: 7,
		touchMove: true,
		swipe: false,
		focusOnSelect: false,
		appendDots: $('.slick-slider-dots'),
		//appendArrows: $('.slick-slider-nav'),
		responsive: [{
			breakpoint: 1200,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 5,
			}
		}, {
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4,
			}
		}, {
			breakpoint: 768,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}, {
			breakpoint: 580,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			}
		}, {
			breakpoint: 420,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}]
	});

	// Event handler for slick-next click
	$('.slick-next').on('click', function () {
		// Set opacity to 1 when next is clicked
		$('.slick-prev').removeClass('first-none').removeAttr('disabled');
		if (clonedBeforeFirst && clonedBeforeFirst.length) {
			clonedBeforeFirst.css('opacity', '1'); // Restore opacity to 1
		}
	});

	// Optionally handle slick-prev click to reset opacity
	$('.slick-prev').on('click', function () {
		if ($('.slick-slide').first().hasClass('slick-active')) {
			// Only hide if the first slide is active after clicking prev
			$('.slick-prev').removeClass('first-none').removeAttr('disabled');
			if (clonedBeforeFirst && clonedBeforeFirst.length) {
				clonedBeforeFirst.css('opacity', '0'); // Restore opacity to 1
			}
		}
	});

	// Hover effects for slides
	$(".slick-slide").mouseenter(function () {
		if ($(window).width() > 991) { // Check if the screen size is greater than 991px
			if ($(this).hasClass("firster")) {
				var hoverslide = $(this);
				$(hoverslide).nextAll().addClass('furthernextslides');
			} else if ($(this).hasClass("laster")) {
				var hoverslide = $(this);
				$(hoverslide).prevAll().addClass('furtherprevslides');
			} else {
				var hoverslide = $(this);
				$(hoverslide).nextAll().addClass('nextslides');
				$(hoverslide).prevAll().addClass('prevslides');
			}
		}
	});

	$(".slick-slide").mouseleave(function () {
		if ($(window).width() > 991) { // Check if the screen size is greater than 991px
			$(this).parent().find(".slick-slide").removeClass('nextslides');
			$(this).parent().find(".slick-slide").removeClass('prevslides');
			$(this).parent().find(".slick-slide").removeClass('furthernextslides');
			$(this).parent().find(".slick-slide").removeClass('furtherprevslides');
		}
	});

	// Handle the click on "more" button in the flickfeed slider
	$('.flickfeed .more').on('click', function () {
		// Remove 'is-active' class from all cards
		$('.flickfeed .card').removeClass('is-active');

		// Add 'is-active' class to the clicked card
		const parentCard = $(this).closest('.card');
		parentCard.addClass('is-active');

		// Get the data-id of the clicked card
		const cardId = parentCard.data('id');

		// Expand the details-slider-wrapper
		$('.details-slider-wrapper').addClass('expanded');

		// Go to the corresponding slide in the details slider
		$('.details-slider').slick('slickGoTo', cardId - 1);
	});

	// Close the details slider
	$('.close-details').on('click', function () {
		$('.details-slider-wrapper').removeClass('expanded');
		// Optionally remove 'is-active' class from the flickfeed card
		$('.flickfeed .card').removeClass('is-active');
	});

	// Next/Prev buttons for details slider
	$('.next-detail').on('click', function () {
		$('.details-slider').slick('slickNext');
	});

	$('.prev-detail').on('click', function () {
		$('.details-slider').slick('slickPrev');
	});

	// Recalculate slider dimensions after each slide change
	$('.details-slider').on('afterChange', function (event, slick, currentSlide) {
		// Sync with thumb slider
		$('.flickfeed').slick('slickGoTo', currentSlide);
		var currentNavSlideElem = '.flickfeed .slick-slide[data-slick-index="' + currentSlide + '"]';
		$('.flickfeed .card.is-active').removeClass('is-active');
		$(currentNavSlideElem).addClass('is-active');

		// Recalculate height of the slick list after slide change
		setTimeout(function () {
			$('.details-slider').slick('setPosition');
		}, 300); // Adjust delay as needed
	});

});
function scrollSlidersBy(classSection, triggerButtonRight, triggerButtonLeft ){
	const sliderContainer = document.querySelector(`.${classSection}`);
	const triggerRight = document.querySelector(`.${triggerButtonRight}`);
	const triggerLeft = document.querySelector(`.${triggerButtonLeft}`);
	triggerRight.addEventListener("click", ()=>{
	  const currentScreenWidth = window.innerWidth;
	  console.log(currentScreenWidth)
	  sliderContainer.scrollBy({
		left: currentScreenWidth * 0.8,  // Scroll horizontally by the width of the screen
		behavior: 'smooth'         // Optional: adds smooth scrolling
	  });
	})
	triggerLeft.addEventListener("click", ()=>{
	  const currentScreenWidth = window.innerWidth;
   
	  sliderContainer.scrollBy({
		left: -currentScreenWidth * 0.8,  
		behavior: 'smooth'         
	  });
	})
  }
  
  scrollSlidersBy("trends-slider", "slider-arrow-trending-right", "slider-arrow-trending-left")
  scrollSlidersBy("current-slider", "slider-arrow-currnet-right", "slider-arrow-currnet-left")
  scrollSlidersBy("comming-slider", "slider-arrow-comming-right", "slider-arrow-comming-left")

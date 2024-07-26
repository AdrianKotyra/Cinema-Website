
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

}));

// -------------------------change movies section background, desc on card click--------------------------------

function initialActiveCard(){ //<==========initial first card active
  const moviesSection = document.querySelector(".background-section-popular-movies");
  const cards = document.querySelectorAll(".movie-card-detailed");
  
  if(cards[0]) {
    cards[0].classList.add("active-card")
 
    const CardbackgroundImage = document.querySelector(`.active-card img`)
    moviesSection.style.backgroundImage = `url('${CardbackgroundImage.src}')`;
  } 
}



function changeBackgroundOnClick(){ //<==========change active card 
  const moviesSection = document.querySelector(".background-section-popular-movies");
  const cards = document.querySelectorAll(".movie-card-detailed");
 
 


  initialActiveCard()
  cards? cards.forEach(card=>card.addEventListener("click", ()=>{
    
    cards.forEach(card=>card.classList.remove("active-card"))
    setTimeout(() => {
      card.classList.add("active-card")
      const CardbackgroundImage = document.querySelector(`.active-card img`)
      moviesSection.style.backgroundImage = `url('${CardbackgroundImage.src}')`;
    }, 1);
  
  })): null
} 
changeBackgroundOnClick()

// -------------------------Search movies bar nav--------------------------------

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


// -------------------------change current movie background--------------------------------

function movieCurrentBackground() {
  const movieCurrentSection = document.querySelector(".background-section-current-movie");
  const movieCurrentMovie = document.querySelector(".movie-section-current img");
  
  if(movieCurrentMovie) {
    const movieCurrentMovieImage = movieCurrentMovie.getAttribute("src");
  

    movieCurrentSection.style.backgroundImage = `url(${movieCurrentMovieImage})`;
    
  }




}
const movieCurrentSection = document.querySelector(".background-section-current-movie");
movieCurrentSection?  movieCurrentBackground() : null

// -------------------------Select popular movie and get it by sending ajax--------------------------------

function getIdFromPopularMovies(){
 
  const selectedMoviePopularId = document.querySelectorAll(".movie-card-detailed");

  selectedMoviePopularId.forEach(ele=>ele.addEventListener("click", ()=> {
    const MovieSelectedTitle = document.querySelector(".selected_movie_title");
    const MovieSelectedDescription = document.querySelector(".selected_movie_description");
    const selectedMovieId = ele.getAttribute("data-id")
    
    SendDataAjax(selectedMovieId, "ajax/GET_MOVIE_BY_ID.php")
    .then(data => {
      const movieData = JSON.parse(data);
      const selectedMovieTitle = movieData[0][0]
      const selectedMovieDescription = movieData[0][1]
      const selectedMovieDescriptionShorted = selectedMovieDescription.substring(0, 250);
      console.log(selectedMovieTitle)
      MovieSelectedTitle.textContent=selectedMovieTitle;
      MovieSelectedDescription.textContent=selectedMovieDescriptionShorted + "...";
    })
    .catch(error => {
        console.error('Error:', error);
    });
  }))
} 

getIdFromPopularMovies()

// -------------------------Load first active selected movie using ajax--------------------------------

function initialiseAjaxFirstSelectedMoviePopular(){
    const MovieSelectedTitle = document.querySelector(".selected_movie_title");
    const MovieSelectedDescription = document.querySelector(".selected_movie_description");
    const ids = []
    const popularMoviesCards = document.querySelectorAll(".movie-card-detailed");
    popularMoviesCards.forEach(card=>{
      ids.push(card.getAttribute("data-id"));
    })
 
    SendDataAjax(ids[0], "ajax/GET_MOVIE_BY_ID.php")
    .then(data => {
      const movieData = JSON.parse(data);
      const selectedMovieTitle = movieData[0][0]
      const selectedMovieDescription = movieData[0][1]
      const selectedMovieDescriptionShorted = selectedMovieDescription.substring(0, 250);
    
      MovieSelectedTitle.textContent=selectedMovieTitle;
      MovieSelectedDescription.textContent=selectedMovieDescriptionShorted + "...";
    })
    .catch(error => {
        console.error('Error:', error);
    });
  
}
getIdFromPopularMovies()

initialiseAjaxFirstSelectedMoviePopular()


// -------------------------AJAX--------------------------------

function SendDataAjax(sendData, file) {
  return new Promise((resolve, reject) => {
      $.post(file, {data: sendData}, function(data) {
          resolve(data);
      }).fail(function(jqXHR, textStatus, errorThrown) {
          reject(errorThrown);
      });
  });
}
// -------------------------Display registration menu-------------------------------
function regMenuInit(){
  const registerButton = document.querySelector(".register_button");
  const regMenu = document.querySelector(".registration_content");
  const registrationForm = registration_form();
  registerButton? registerButton.addEventListener("click", ()=>{
    regMenu.innerHTML=registrationForm;
  }) : null
  logUser()
}
regMenuInit()



function logUser(){
  const registerMenu = document.querySelector(".registration_content");
  const regMenu = document.querySelector(".registration_content");
  const loginTrigger = document.querySelector(".login_button")
  loginTrigger? loginTrigger.addEventListener("click", ()=>{
    regMenu.innerHTML=loginForm();
    const join_button = document.querySelector(".join_button")
    join_button.addEventListener("click", ()=>{
      registerMenu.innerHTML=registration_form();
      displayRegistration()
    })
   
  }): null
}

function displayRegistration(){

  const loginTrigger = document.querySelector(".login_button")
  const registerMenu = document.querySelector(".registration_content");
  const body = document.querySelector("body");
  const BodyMask = document.querySelector(".body_mask")
  const cross = document.querySelector(".reg-cross");

  const registrationTrigger = document.querySelector(".sign_up_link");
  const registration = document.querySelector(".registration_container");
  logUser()
  registrationTrigger.addEventListener("click", ()=>{
    BodyMask.style.display="block"
    registration.style.display="block"
      body.style.overflowY="hidden"

  })


  cross? cross.addEventListener("click", ()=>{

    body.style.overflowY="scroll";
    BodyMask.style.animation="fadeIn_backwards 0.4s forwards";
    registration.style.animation="registration_animation_backwards 0.4s forwards";
    setTimeout(() => {
      registerMenu.innerHTML=menu_form();
      regMenuInit();
      registration.style.display="none";
      BodyMask.style.display="none";
      registration.style.animation="registration_animation 0.4s forwards";
      BodyMask.style.animation="fadeIn 0.4s forwards";
    
    }, 401);
  }): null




}
   
 
// -------------------------Display hamburger--------------------------------

function displayHamburger() {
  
  const NavLinks = ` 
  <a class="link active-nav" href="index.php">home</a>
  <a class="link"href="">News</a>
  <a class="link" href="/movies">Movies</a>
  <span class="link sign_up_link">Sign up</span>
  <a class="hiddenNav active-link login-link link" href="">Log in</a>
  `
  const hamburger = `<img src="./imgs/icons/hamburger.svg" class="hamburger">`;
  const containerLinks = document.querySelector(".container-links");
  
  function changeToHamburger() {
   

    if (window.innerWidth <= 1250) {
      containerLinks.innerHTML = hamburger;
    } else {
      containerLinks.innerHTML = NavLinks; 

      displayRegistration()    
      
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    changeToHamburger();
  });

  window.addEventListener("resize", () => {
    changeToHamburger();
  });
}

displayHamburger();

function searchMovies(){
 
  const resultsSearched = document.querySelector(".list-searched-movies")
  const movieSearcheInput = document.querySelector(".search-movie");

 
  movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;
    if (movieSearcheInputValue.trim().length > 0 && movieSearcheInputValue!="") {
      SendDataAjax(movieSearcheInputValue, "ajax/GET_SEARCHED_MOVIES.php")
      .then(data => {
      resultsSearched.innerHTML=data;
        
        
      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
    else {
      resultsSearched.innerHTML=""
    }
    
  
  })
 
}
searchMovies()


function searchbarWider(){
  const searchBar = document.querySelector(".wrapper-search .search_box .search_field");
  searchBar.addEventListener("click", ()=>{
    searchBar.style.width="300px"
  })

}
searchbarWider()

function menu_form(){
  const menuForm = `
  <div class="registration_content">
       
        <div class="reg_menu">
            <div class="poster-registration">
                <div class="poster_text">
                    <p class="poster-title">
                        Become a Cinema City member
                    </p>

                    <p class="poster-desc">FOR EXCLUSIVE OFFERS, PERSONALISED CONTENT, ACCESS TO SPEEDY PAYMENT AND MORE</p>
                
                </div>
            
            
            </div>
            <button class="register_button"> JOIN US </button>
            <p>Already have Account?</p>
            <button class="login_button"> 
                <span class="span-log">login</span>         
                <img class="right-arrow-btn" src="./imgs/icons/right-arrow-nobg.svg" alt="">
            </button>
        </div>
        
       
    </div>
  `
  return menuForm;
}

function registration_form(){

  const regForm = `<div class="registration_form">
      <div class="poster_reg_form">
          <span> BECOME A CINEMA CITY MEMBER</span>
  
      </div>
      <form class="form_reg"action="registration.php" method="POST">
          
          <input type="text" class="reg_user_name" placeholder="name" name="name">
          <input type="text" class="reg_user_surname"  placeholder="surname" name="surname">
          <input type="text" class="reg_user_email"  placeholder="email" name="email">
          <input type="text" class="reg_user_email_confirmation"  placeholder="confirm email" name="confirm_email">
          <input type="text" class="reg_user_password"  placeholder="password" name="password">
          <input type="text" class="reg_user_password_confirmation"  placeholder="confirm password" name="confirm_password">
          <div class="well"> 
              <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control" id="exampleInputDOB1" placeholder="Date of Birth">
              </div>
          </div>

        
          <button class="confirm_reg_new_user">JOIN</button>


      </form>



  </div>
  `
  return regForm
}

function loginForm(){
  const logForm = ` <div class="login_form">
        <div class="poster_reg_form">
            <span> LOG INTO YOUR ACCOUNT</span>
           
        </div>
        <form class="login_form"action="login.php" method="POST">
          

          <input type="text" class="reg_user_email"  placeholder="email" name="email">
          <input type="text" class="reg_user_password"  placeholder="password" name="password">
          

        
            <button class="login_user_button"> 
                <span class="span-log">login</span>         
              
            </button>
            


        </form>
        <p>Not a Cinema City member?</p>
        <button class="login_button join_button"> 
            <span class="span-log">Join us</span>         
            <img class="right-arrow-btn" src="./imgs/icons/right-arrow-nobg.svg" alt="">
        </button>

    </div>
`
return logForm
}


// function sliderArrow() {
//   const slider = document.querySelector(".slider-trending");
//   const arrow = document.querySelector(".slider-arrow-trending");
//   let counter = 1
//   arrow.addEventListener("click", () => {
//     counter+=1
//       slider.style.transform = `translateX(calc(${counter} * 300px)`;
//   });
// }

// sliderArrow();

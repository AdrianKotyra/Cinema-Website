
// Load page when everying is loaded



window.onload = function() {
  var content = document.querySelector('body');
  content.style.display = 'block';

};

function mobileDropDowns(){
  const DropTriggers = document.querySelectorAll(".mobile-dropdown");
  DropTriggers.forEach(dropTrigger=>{
    dropTrigger.addEventListener("click", ()=>{

      const dropDown = dropTrigger.querySelector(".drop-down-content");
      !dropDown.classList.contains("active-dropdown-mobile") ?
      dropDown.classList.add("active-dropdown-mobile") :
      dropDown.classList.remove("active-dropdown-mobile")
    })
  })
}

mobileDropDowns()
function zoomReviewCard() {
  const reviewCards = document.querySelectorAll(".review-card");
  let activeCard = null; // Track the currently active card

  reviewCards.forEach(card => {
    const triggerReviewZoom = card.querySelector(".screen-up-review");
    const ImgtriggerReviewZoom = card.querySelector(".screen-up-review img");
    const reviewText = card.querySelector(".review_text_card");

    // Check if triggerReviewZoom exists
    if (triggerReviewZoom) {
      triggerReviewZoom.addEventListener("click", (event) => {
        event.stopPropagation(); // Prevent the click from bubbling up to the document

        if (activeCard === card) {
          // If the clicked card is already active, zoom out (toggle behavior)
          ImgtriggerReviewZoom.src = "./imgs/icons/zoom-in.svg";
          reviewText.style.overflowY = "hidden";
          card.classList.remove("active-review-card");
          activeCard = null; // Reset active card
        } else {
          // Otherwise, zoom into the clicked card
          reviewCards.forEach(review => {
            const otherImg = review.querySelector(".screen-up-review img");
            otherImg.src = "./imgs/icons/zoom-in.svg"; // Set all other cards to zoom-in icon
            const reviewContent = review.querySelector(".desc-container-review p");
            reviewContent.style.overflowY = "hidden";
            review.classList.remove("active-review-card");
          });

          // Set the clicked card to active
          ImgtriggerReviewZoom.src = "./imgs/icons/zoom-out.svg";
          reviewText.style.overflowY = "scroll";
          card.classList.add("active-review-card");
          activeCard = card; // Set the clicked card as active
        }
      });
    }
  });

  // Add a click event listener to the document to handle clicks outside the active card
  document.addEventListener("click", (event) => {
    if (activeCard && !activeCard.contains(event.target)) {
      // Click happened outside the active card
      const ImgtriggerReviewZoom = activeCard.querySelector(".screen-up-review img");
      ImgtriggerReviewZoom.src = "./imgs/icons/zoom-in.svg"; // Set zoom-in icon
      const reviewText = activeCard.querySelector(".review_text_card");
      reviewText.style.overflowY = "hidden";
      activeCard.classList.remove("active-review-card");
      activeCard = null; // Reset active card
    }
  });
}

zoomReviewCard()
function generateRandomNumbers(count = 10) {
  let randomNumbers = '';
  for (let i = 0; i < count; i++) {
      randomNumbers += Math.floor(Math.random() * 10); // Random digit between 0 and 9
  }
  return parseInt(randomNumbers, 10); // Convert the concatenated string to an integer
}





// DISPLAY CONFIRMATION WINDOW MODAL BOOKING

function displaConfirmationModalBooking(day, time, movieId, ticketQuantity, TicketPriceUnit, totalPriceNumber){
  const modalMain = document.querySelector(".modal_container");

  const Trigger = document.querySelector(".book-modal-trigger");
  const imgMovieSrc = document.querySelector(".selected_movie_image").src;
  Trigger.addEventListener("click", ()=>{
    let ranNumber = generateRandomNumbers();
    console.log(ranNumber)
    const modal = ` <form class="form_booking" method="POST" action="./movie_booking.php?movie=${movieId}" >
    <div class="modal-forum-posts_delete modal-booking">
    <img class="cross_quiz" src="./imgs/icons/cross.svg" alt="">
      <input type="hidden" class="input-hidden" name="random_number" value="${ranNumber}">
      <input type="hidden" class="input-hidden" name="day" value="${day}">
      <input type="hidden" class="input-hidden" name="time" value="${time}">
      <input type="hidden" class="input-hidden" name="ticket_quantity" value="${ticketQuantity}">
      <input type="hidden" class="input-hidden" name="Ticket_price_unit" value="${TicketPriceUnit}">
      <input type="hidden" class="input-hidden" name="total_price_number" value="${totalPriceNumber}">


      <div class="row-custom modal-booking-container">
          <img class="modal_movie_img" src="${imgMovieSrc}" alt="">
          <div>
            <h5>Date: </h5>
            <p class="day-booking-conf">
            ${day}
            </p>
            <h5>Time: </h5>
            <p class="time-screen-booking-conf">${time} </p>
            <h5>Ticket Quantity: </h5>
            <p>${ticketQuantity} </p>

            <h5>Ticket Price: </h5>
            <p>${TicketPriceUnit}£ </p>

            <h5>Total Price: </h5>
            <p>${totalPriceNumber}£ </p>


            <button type="submit"class="button-custom button-post-added" name="submit_booking">
              Proceed
            </button>
          </div>
    </div>

  </div>
  </form>
  `

  modalMain.innerHTML=modal
  const crossExit = document.querySelector(".cross_quiz")
  crossExit.addEventListener("click", ()=>{
    modalMain.innerHTML=""
  })
  })

}
function displayConfBooking(day, time, movieId, ticketQuantity){
  const confiramtionBooking = document.querySelector(".confiramtion-booking");
  confiramtionBooking.style.display="block"
  confiramtionBooking.scrollIntoView({
    behavior: 'smooth', // Scroll with a smooth transition
    block: 'center' // Scroll until the element is at the top

  });
  const totalPriceContainer = document.querySelector(".total_price_booking")
  const ticketQuantityContainer = document.querySelector(".ticket_number_conf")
  const dayInfo = document.querySelector(".day-booking-conf");
  const timeInfo = document.querySelector(".time-screen-booking-conf");
  const TicketPriceUnit = Number(document.querySelector(".ticket_price_unit").innerHTML);


  totalPriceContainer.innerHTML = ticketQuantity * TicketPriceUnit;
  const totalPriceNumber =  totalPriceContainer.innerHTML;

  ticketQuantityContainer.innerHTML=ticketQuantity;
  timeInfo.innerHTML=time
  dayInfo.innerHTML=day

  displaConfirmationModalBooking(day, time, movieId, ticketQuantity, TicketPriceUnit, totalPriceNumber  )

}

function bookMovieDate(){
  const allDates = document.querySelectorAll(".date_day");
  const allTimeScreenCards = document.querySelectorAll(".screen-card-select");
  const selects = document.querySelectorAll(".select-booking");
  getDateDayBooking()
  getTimeFromCardBooking()

  selects.forEach(select=>{
    select.addEventListener("click", ()=>{

      const activeDay = document.querySelector(".date_day_active");
      const activeCard = document.querySelector(".active-screen-card");



      if(activeDay&&activeCard ) {
        const dataTimeScreen =  activeCard.getAttribute("data-time");
        const dataDay =  activeDay.getAttribute("data-day");
        const movieId =  activeDay.getAttribute("data-movie-id");


        if(dataTimeScreen&&dataDay&&movieId) {

          const chooseTicketsBooking = document.querySelector(".choose-tickets-booking");

          chooseTicketsBooking.scrollIntoView({
              behavior: 'smooth', // Scroll with a smooth transition
              block: 'center' // Scroll until the element is at the top

            });
              const confirmButton1 = document.querySelector(".confirm-booking-part_1")
              confirmButton1.addEventListener("click", ()=>{
                const ticketQuantity = Number(document.querySelector(".counter-ticket").innerHTML);
                console.log(ticketQuantity)
                displayConfBooking(dataDay, dataTimeScreen, movieId, ticketQuantity)





            })




          // window.location.href = `movie_booking.php?movie?${movieId}`;
        }


      }


    })
  })

  function getDateDayBooking(){
    allDates.forEach(date=>{
      date.addEventListener("click", ()=>{
        allDates.forEach(date=>{
          date.classList.remove("date_day_active")
        })

        date.classList.add("date_day_active");
        // const activeDay = document.querySelector(".date_day_active");
        // const dataDAy =  activeDay.getAttribute("data-day");
        // const postId =  activeDay.getAttribute("data-movie-id");
        // const dayAndPostId = [dataDAy,postId];




      })
    })
  }




  function getTimeFromCardBooking(){
    allTimeScreenCards.forEach(screenCard=>{
      screenCard.addEventListener("click", ()=>{
        allTimeScreenCards.forEach(screenCard=>{
          screenCard.classList.remove("active-screen-card")

        })
        screenCard.classList.add("active-screen-card");
        // const activeCard = document.querySelector(".active-screen-card");
        // const dataTimeScreen =  activeCard.getAttribute("data-time");



      })
    })

  }


}
bookMovieDate()
// DISPLAY BOOK CONTENT MOVIE.PHP
function checkUserAgeAjax() {
  displayLoader()
  const data = "i";
  SendDataAjax(data, "ajax/GET_USER_AGE_BOOKING.php")
  .then(data => {
    let trimmed_data = data.trim();

    offLoader()
    if(trimmed_data=="true") {

      return true
    } else {

      return false
    }




  })
  .catch(error => {
      console.error('Error:', error);
  })

}
function displayBookMovieContent(){
  const bookContainer = document.querySelector(".book_container");
  const bookAnchor = document.querySelector(".book-anchor");
  const bookTrigger = document.querySelector(".book-button");
  bookTrigger&&bookTrigger.addEventListener("click", ()=>{
    const movieId = bookTrigger.getAttribute("data_movie_id");
    console.log(movieId)
    SendDataAjax(movieId, "ajax/GET_USER_AGE_BOOKING_AND_TICKETS.php")
    .then(data => {
      let trimmed_data = data.trim();
      if(trimmed_data=="true") {

        bookContainer.style.display="block";
        bookAnchor.scrollIntoView({
          behavior: 'smooth', // Scroll with a smooth transition
          block: 'start' // Scroll until the element is at the top
        });

      }
      else if(trimmed_data=="no_tickets") {
        GeneralModal("Tickets out of stock", "cross", "red_icons" )


      }
      else if(trimmed_data=="no_time") {
        GeneralModal("Not available times for this movie", "cross", "red_icons" )


      }
      else if(trimmed_data=="no_logged") {
        GeneralModal("Please log in to book a ticket", "cross", "red_icons" )
      }
      else if(trimmed_data=="false") {
        GeneralModal("Only adults memeber can book a ticket", "cross", "red_icons" )
      }


    })
    .catch(error => {
        console.error('Error:', error);
    })


  })
}


displayBookMovieContent()
// -----------------quiz---------------



// get data from sql ajax and then run quiz js function with list of question retrieved from ajax sql
async function retrieveDataQuizAjax() {


  try {
    const data = "";
    const response = await SendDataAjax(data, "ajax/GET_QUIZ.php");


    const questions = JSON.parse(response);
    if(questions) {
      offLoader()
      runQuiz(questions)
    }


  } catch (error) {
    console.error('Error:', error);
    throw error;
  }
}
// js function to run quiz
function runQuiz(questions) {
  const numberOfQuestions = document.querySelector(".question_len");
  numberOfQuestions.innerHTML = questions.length;
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }

  // Shuffle the questions
  const shuffledQuestions = shuffleArray(questions);

  let currentQuestion = 0;
  let correctAnswers = 0;

  function showQuestion() {
    const questionImage = document.querySelector(".quiz_image");
    const questionText = document.getElementById("question-text");
    questionImage.src= questions[currentQuestion].img_src;
    questionText.textContent = questions[currentQuestion].question;

    const choices = document.querySelectorAll(".choice");
    choices.forEach((choice, index) => {
      choice.textContent = questions[currentQuestion].choices[index];
      choice.classList.remove("choosen-answer");  // Reset the chosen answer class
      choice.removeAttribute("disabled");  // Ensure choices are clickable again
    });

    const feedback = document.getElementById("feedback");
    feedback.textContent = "";
  }

  function handleChoiceClick(event) {

    const quizNumber = document.querySelector("#question-number");
    const quizQuestion = document.querySelector("#question-text");
    const selectedChoice = event.target;
    const answer = parseInt(selectedChoice.getAttribute("data-answer"), 10);

    const choices = document.querySelectorAll(".choice");
    choices.forEach(choice => choice.setAttribute("disabled", "disabled"));  // Disable all choices after selection

    const feedback = document.getElementById("feedback");

    if (answer === questions[currentQuestion].correct) {
      feedback.textContent = "Correct!";
      if(feedback.textContent==="Correct!") {
        feedback.style.backgroundColor="#31d92b"
      }

      correctAnswers++;


    } else {
      feedback.style.backgroundColor="red"
      feedback.textContent = "Incorrect!";

    }

    setTimeout(() => {
      currentQuestion++;
      quizNumber.innerHTML=currentQuestion+1;
      feedback.style.backgroundColor="white"
      if (currentQuestion < questions.length) {
        showQuestion();
      } else {
        const quizContainer = document.querySelector(".quiz-container");
        quizContainer.innerHTML = `<p>You got ${correctAnswers} out of ${questions.length} questions correct.</p> <br>
        <button class="button-custom exit_button_quiz"> OK </button>`;
        const exitButton = document.querySelector(".exit_button_quiz")
        exitButton.addEventListener("click", ()=>{
          quizContainer.style.display="none"
        })
      }
    }, 1000);
  }

  function checkAnswer() {
    const choices = document.querySelectorAll(".choice");
    choices.forEach((choice, index) => {
      choice.addEventListener("click", handleChoiceClick);
      choice.setAttribute("data-answer", index);  // Set data-answer attribute to map with question choices
    });
  }

  showQuestion();
  checkAnswer();
}

function showQuizKids(){
  const quizTrigger = document.querySelectorAll(".quiz_link");
  const modalMain = document.querySelector(".modal_container");
  function disableQuiz(){

    const quizContainer = document.querySelector(".quiz-container");
    const crossExit = document.querySelector(".cross_quiz")
    crossExit.addEventListener("click", ()=>{
      quizContainer.style.display="none"
    })

  }

  const quizLiteral = `<div class="quiz-container">
    <div class="quiz_layout">
    <img class="cross_quiz" src="./imgs/icons/cross.svg" alt="">
    <h1>Quiz</h1>
    <div class="col-custom">
      <div class="image-container">
        <img class="quiz_image" src="./imgs/placeholder-image.jpg" alt="">
      </div>
      <div class="row-custom question_number_container">
        <p>Question number:</p>&nbsp;
        <p id="question-number">  1</p>/ <span class="question_len"> 10 </span>
      </div>

      <div class="question">
        <p id="question-text">question</p>
        <div class="choices">
          <button class="choice" data-answer="0" >answer 1</button>
          <button class="choice" data-answer="1" ">answer 2</button>
          <button class="choice" data-answer="2" ">answer 3</button>
        </div>
        <p id="feedback"></p>
      </div>

    </div>

    </div>`;
  quizTrigger && quizTrigger.forEach(trigger=>{
    trigger.addEventListener("click", ()=>{
      displayLoader()
      modalMain.innerHTML=quizLiteral;
      disableQuiz()

      setTimeout(() => {
        retrieveDataQuizAjax()
      }, 500);

    })
  })

}

showQuizKids()
function verticalScrollActive() {
  const containers = document.querySelectorAll('.vetical-scroll-grab-class');

  containers.forEach(container => {
    let startY;
    let startX;
    let scrollLeft;
    let scrollTop;
    let isDown = false;

    container.addEventListener('mousedown', (e) => mouseIsDown(e));
    container.addEventListener('mouseup', (e) => mouseUp(e));
    container.addEventListener('mouseleave', (e) => mouseLeave(e));
    container.addEventListener('mousemove', (e) => mouseMove(e));

    function mouseIsDown(e) {
      isDown = true;
      startY = e.pageY - container.offsetTop;
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
      scrollTop = container.scrollTop;
    }

    function mouseUp(e) {
      isDown = false;
    }

    function mouseLeave(e) {
      isDown = false;
    }

    function mouseMove(e) {
      if (isDown) {
        e.preventDefault();
        const y = e.pageY - container.offsetTop;
        const walkY = y - startY;
        container.scrollTop = scrollTop - walkY;

        const x = e.pageX - container.offsetLeft;
        const walkX = x - startX;
        container.scrollLeft = scrollLeft - walkX;
      }
    }
  });
}

function calculateUserAge() {
  const birthdateInput = document.querySelector('.reg_user_date').value;
  if (birthdateInput) {
    const birthDate = new Date(birthdateInput);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    return age;
  }
}
verticalScrollActive()

function ajaxReloadComponent(file_location, container){
  $(document).ready(function(){


    $.ajax({
        url: file_location,
        method: 'POST',
        success: function(response) {

            $(container).html(response);
        },
        error: function(xhr, status, error) {

            console.log('Error: ' + error);
        }
    });

});
}

function ajaxReloadImageMainComponent(file_location, container){
  $(document).ready(function(){


    $.ajax({
        url: file_location,
        method: 'POST',
        success: function(response) {

            $(container).html(response);
            displayDropdowns() //<---- give reloaded image functionality to drop again
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });

});
}




function showUploadedImage(){
  let input =  document.getElementById('imageInput');
  input? input.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const thumbnail = document.getElementById('thumbnail');
            thumbnail.src = e.target.result;   // Set the source to the uploaded image's data URL
            thumbnail.style.display = 'block'; // Show the thumbnail
        }
        reader.readAsDataURL(file);  // Read the file as a data URL for preview
    }
}) : null
}

function changeLikeAnimation(forumCommentId){
  const likeIcon = document.querySelector(`.like-icon_num_${forumCommentId}`);

  if(likeIcon.classList.contains("active_like")) {
    likeIcon.classList.remove("active_like")
    setTimeout(() => {
      likeIcon.classList.add("inactive_like")
    }, 1);


  }
  else {
    likeIcon.classList.remove("inactive_like")
    setTimeout(() => {
      likeIcon.classList.add("active_like")
    }, 1);

  }
}


function displayCommentEdit() {
  const editLabel = document.querySelectorAll(".edit_comment");
  const allOptions = document.querySelectorAll(".comment_options")
  editLabel && editLabel.forEach(edit => {

    edit.addEventListener("click", function() {

      const closestCommentLabel = edit.closest('.comment_edit_label');

      const options = closestCommentLabel.querySelector(".comment_options");

      if (options && !options.classList.contains("comment-options-active")) {
        allOptions.forEach(option=>{
          option.classList.remove("comment-options-active");
        })
        setTimeout(() => {
          options.classList.add("comment-options-active");
        }, 2);


      }
      else {
        options.classList.remove("comment-options-active");
      }
    });
  });
}

displayCommentEdit()
function addLikeForumPosts(){


  const likes = document.querySelectorAll(".like");

  likes.forEach(like=>{
    like.addEventListener('click', function() {

      const forumCommentId = like.getAttribute("data-comment-id");
      const forumCommentPostId = like.getAttribute("data-post-id");
      const data = [forumCommentId, forumCommentPostId]
      const likesContainer = document.querySelector(`.count_${forumCommentId}`)
      const likeIcon = document.querySelector(`.like-icon_num_${forumCommentId}`);
      SendDataAjax(data, "ajax/UPDATE_FORUM_COMMENTS_LIKES.php")
        .then(data => {
          // get num likes and icon from array ajax
          data_array = JSON.parse(data)

          likesContainer.innerHTML=`likes: ${data_array[0]}`;
          likeIcon.src=data_array[1];
          changeLikeAnimation(forumCommentId)

        })
        .catch(error => {
            console.error('Error:', error);
        })
    })
  })

}
addLikeForumPosts()


function addLikeNews(){


  const likes = document.querySelectorAll(".like_news");

  likes.forEach(like=>{
    like.addEventListener('click', function() {

      const forumCommentId = like.getAttribute("data-comment-id");
      const forumCommentPostId = like.getAttribute("data-post-id");
      const data = [forumCommentId, forumCommentPostId]
      const likesContainer = document.querySelector(`.count_${forumCommentId}`)
      const likeIcon = document.querySelector(`.like-icon_num_${forumCommentId}`);
      SendDataAjax(data, "ajax/UPDATE_NEWS_COMMENTS_LIKES.php")
        .then(data => {
          // get num likes and icon from array ajax
          data_array = JSON.parse(data)

          likesContainer.innerHTML=`likes: ${data_array[0]}`;
          likeIcon.src=data_array[1];
          changeLikeAnimation(forumCommentId)


        })
        .catch(error => {
            console.error('Error:', error);
        })
    })
  })

}
addLikeNews()


// display modal add post form
function initiateModalWindowBg(){
  const body = document.querySelector("body");
  const BodyMask = document.querySelector(".body_mask")
  body.style.overflowY="hidden";
  BodyMask.style.display="block";
  BodyMask.style.animation="fadeIn 0.4s forwards";
  setTimeout(() => {
    BodyMask.style.animation=" "
  }, 401);
}

function closeModalWindowBg(){
  const body = document.querySelector("body");
  const BodyMask = document.querySelector(".body_mask")
  body.style.overflowY="scroll";
  BodyMask.style.display="none";
  BodyMask.style.animation="fadeIn_backwards 0.4s forwards";
  setTimeout(() => {
    BodyMask.style.animation=" "
  }, 401);
}




// DISPLAY FORUM POSTS ADD POST FORM MODAL
function displayForumPostsAddPostModal(){

  const triggerModalButton = document.querySelector(".add_form_post_trigger");
  if(triggerModalButton) {

    const closeModal = document.querySelector(".closeModal");
    const modalAddPost = document.querySelector(".forum_posts_modal_form");

    triggerModalButton.addEventListener("click", ()=>{
      initiateModalWindowBg()
      modalAddPost.style.display="block";
      closeModal.addEventListener("click", ()=>{
        modalAddPost.style.display="none"
        closeModalWindowBg()


      })
    })
  }

}



displayForumPostsAddPostModal()

// DISPLAY REVIEWS ADD REVIEW FORM MODAL
function displayReviewsFormModal() {
  const triggerModalButton = document.querySelector(".add_review_post_trigger");

  if (triggerModalButton) {
    triggerModalButton.addEventListener("click", () => {
      const closeModal = document.querySelectorAll(".closeModal");
      const modalAddPost = document.querySelector(".reviews_modal_form");
      const data = " ";


      SendDataAjax(data, "ajax/CHECK_IF_USER_LOGGED_IN.php")
        .then(data => {
          let trimmed_data = data.trim();
          if (trimmed_data === "true") {

            // Display modal and handle logic
            initiateModalWindowBg();
            modalAddPost.style.display = "block";
            searchMoviesReviewsForm();
            manageStartsReviews();

            closeModal.forEach(exit => {
              exit.addEventListener("click", () => {
                modalAddPost.style.display = "none";
                closeModalWindowBg();
              });
            });
          } else {
            GeneralModal("Please log in to leave a review", "cross", "red_icons");
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  }
}


displayReviewsFormModal()


function AjaxrefreshComponent($selector, $component_location){

    var xhr = new XMLHttpRequest();
    xhr.open('GET', $component_location, true); // Request the PHP file that generates the component
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.querySelector($selector).innerHTML = xhr.responseText; // Update the component content
        }
    };
    xhr.send();
;
}
function isValidJSON(data) {
  try {
      JSON.parse(data);
      return true;
  } catch (e) {
      return false;
  }
}


function displayLoader(){
  const loader = document.querySelector(".default_loader");
  loader.style.display="block"
}


function offLoader(){
  const loader = document.querySelector(".default_loader");
  loader.style.display="none"
}






function BookingModal(text, icon, classColourFilter, movieID){

  const modalContainer = document.querySelector(".modal_container")
  const modal = `<div class="modal-forum-posts_delete modal_general">


	<div class="col-custom">
		<img class="modal-tick ${classColourFilter}" src="./imgs/icons/${icon}.svg" alt="">
		<h5>${text} <br> <b>


		<button class="button-custom button-post-added bookingApprove">
			OK
		</button>

	</div>

</div>`
modalContainer.innerHTML=modal;
initiateModalWindowBg()
const modalWindow = document.querySelector(".modal-forum-posts_delete");
const buttonExit = document.querySelectorAll(".button-post-added");

buttonExit.forEach(element => { element.addEventListener("click", ()=>{
  closeModalWindowBg()

  window.location.href = `movie.php?movie=${movieID}`
  modalWindow.style.display="none";

})

});

}
function GeneralModal(text, icon, classColourFilter){

  const modalContainer = document.querySelector(".modal_container")
  const modal = `<div class="modal-forum-posts_delete modal_general">


	<div class="col-custom">
		<img class="modal-tick ${classColourFilter}" src="./imgs/icons/${icon}.svg" alt="">
		<h5>${text} <br> <b>


		<button class="button-custom button-post-added">
			OK
		</button>

	</div>

</div>`
  modalContainer.innerHTML=modal;
  initiateModalWindowBg()
  const modalWindow = document.querySelector(".modal-forum-posts_delete");
	const buttonExit = document.querySelectorAll(".button-post-added");

	buttonExit.forEach(element => { element.addEventListener("click", ()=>{
    closeModalWindowBg()
		modalWindow.style.display="none";

	})

  });
}
function modalWindowAddReview(text, icon){
  const modalContainer = document.querySelector(".modal_container")
  const modal = `<div class="modal-forum-posts_delete">


	<div class="col-custom">
		<img class="modal-tick" src="./imgs/icons/${icon}.svg" alt="">
		<h5>${text} <br> <b>


		<button class="button-custom button-post-added">
			OK
		</button>

	</div>

</div>`
  modalContainer.innerHTML=modal;
  const modalWindow = document.querySelector(".modal-forum-posts_delete");
	const buttonExit = document.querySelectorAll(".button-post-added");
  setTimeout(() => {
    window.location.reload();
  }, 3000);
	buttonExit.forEach(element => { element.addEventListener("click", ()=>{
    window.location.reload();

		modalWindow.style.display="none";

	})

  });
}


// DELETE NOTS FROM USER NAV
function deleteNotsNav(){


  const container = document.querySelector(".nots_container_list");
  const deleteButton = document.querySelector(".delete_nots_trigger");
  const notCounter = document.querySelector(".not_count_span");
  deleteButton?
  deleteButton.addEventListener("click", ()=>{

    const postId = "";
    SendDataAjax(postId, "ajax/DELETE_AND_RERENDER_NOTS.php")
      .then(data => {
        container.innerHTML=data;
        container.style.display="none"
        notCounter.innerHTML="0"


      })
      .catch(error => {
          console.error('Error:', error);
      })
  }) : null
}

deleteNotsNav()


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
  const movieTrailer = document.querySelector(".selected-popular-movie-trailer");
  const moviesSection = document.querySelector(".background-section-current-movie_popular");
  const cards = document.querySelectorAll(".movie-card-detailed");
  const buttonCurrentMovie = document.querySelector(".current-trending-button");

  if(cards[0]) {
    const cardId = cards[0].getAttribute("data-id");
    const cardTrailer = cards[0].getAttribute("data-trailer");
    cards[0].classList.add("active-card")

    movieTrailer.src= cardTrailer
    buttonCurrentMovie.setAttribute('href', `movie.php?movie=${cardId}`);
    const CardbackgroundImage = document.querySelector(`.active-card img`)
    moviesSection.style.backgroundImage = `url('${CardbackgroundImage.src}')`;
    changeBackgroundOnClick()
  }
}
function incrementDecrementTickets(){
  const counterTicket = document.querySelector(".counter-ticket");
  if(counterTicket) {

  const incrementor = document.querySelector(".ticket_increment");
  const decrementor = document.querySelector(".ticket_decrement");
  const priceTicketElement = document.querySelector(".ticket_price");
  const priceTicketValue = Number(priceTicketElement.innerHTML);
  let counter = 1;

    incrementor.addEventListener("click", ()=>{
      counter += 1;
      let priceTicketCalc = priceTicketValue * counter;
      counterTicket.innerHTML= counter;
      priceTicketElement.innerHTML= priceTicketCalc;
    })

    decrementor.addEventListener("click", ()=>{
      counter -= 1;
      let priceTicketCalc = priceTicketValue * counter;
      counterTicket.innerHTML= counter;
      priceTicketElement.innerHTML= priceTicketCalc;
    })

  }

}
incrementDecrementTickets()
initialActiveCard()

function changeBackgroundOnClick(){ //<==========change active card
  const moviesSection = document.querySelector(".background-section-current-movie_popular");
  const cards = document.querySelectorAll(".movie-card-detailed");
  const movieTrailer = document.querySelector(".selected-popular-movie-trailer");
  const buttonCurrentMovie = document.querySelector(".current-trending-button");
  const trailerContainer = document.querySelector(".trailer-trending-selected-movie-card")
  const movieSelectedDetails = document.querySelector(".current-trending-movie-details")

  cards? cards.forEach(card=>card.addEventListener("click", ()=>{
    const cardId = card.getAttribute("data-id");
    const cardTrailer = card.getAttribute("data-trailer");





    setTimeout(() => {



    // Check if the card is already active
    if (card.classList.contains("active-card")) {
      // If the card is already active, stop the function from running further
      return;
    }

    trailerContainer.classList.add("trailer-trending-selected-movie-card-animtion")
    movieSelectedDetails.classList.add("trailer-trending-selected-movie-card-animtion")
    setTimeout(() => {
      trailerContainer.classList.remove("trailer-trending-selected-movie-card-animtion")
      movieSelectedDetails.classList.remove("trailer-trending-selected-movie-card-animtion")
    }, 801);


    cards.forEach(card => card.classList.remove("active-card"));


    card.classList.add("active-card");


    buttonCurrentMovie.setAttribute('href', `movie.php?movie=${cardId}`);


    movieTrailer.src = cardTrailer;


    const cardBackgroundImage = card.querySelector('img'); // Get the image inside the current card
    moviesSection.style.backgroundImage = `url('${cardBackgroundImage.src}')`;




    }, 1);

  })): null
}
changeBackgroundOnClick()

// -------------------------Search movies bar nav--------------------------------

// function searchBar(){
//   $(".search_field .input").click(function(){
//     $(".wrapper-search .search_box .dropdown").addClass("show");
//   });



//   $(".default_option").click(function(){
//     $(".dropdown ul").toggleClass("active");
//   });

//   $(".dropdown ul li").click(function(){
//     var text = $(this).text();
//     $(".default_option").text(text);
//     $(".dropdown ul").removeClass("active");
//   });
// }
// searchBar()
function addCommentAjax(){
  const buttonTriggerAddComment = document.querySelector(".add_comment");
  const commentContainer = document.querySelector(".result_comment");
  const commentText = document.querySelector(".commentar");
  if (!buttonTriggerAddComment || !commentContainer) return;
    buttonTriggerAddComment.addEventListener("click", ()=>{

    const commentTextValue = commentText.value;
    const dataPostIdAttribute =  buttonTriggerAddComment.getAttribute("data-post-id");

    if(commentTextValue!=="") {
      dataPostId = [dataPostIdAttribute, commentTextValue ]
      const loader = `<li class="box_result row comment_row loader_box">
      <div class="loader"></div>
      </li>`
      SendDataAjax(dataPostId, "ajax/add_rerender_comments_forum.php")
      .then(data => {
        commentContainer.innerHTML=loader;
        setTimeout(() => {
          commentContainer.innerHTML=data;
          addLikeForumPosts()
          displayCommentEdit()
          deleteCommentForumAjax()
        }, 1000);


      })
      .catch(error => {
          console.error('Error:', error);
      })
    }


}) }

addCommentAjax()
// DELETE COMMENTS  NEWS
function deleteCommenNewsAjax(){
  const delete_comment_trigger = document.querySelectorAll(".delete_comment_news_trigger");
  const commentContainer = document.querySelector(".result_comment");



    delete_comment_trigger.forEach(trigger=>{
    trigger.addEventListener("click", ()=>{



    const dataCommentIdAttribute =  trigger.getAttribute("data-comment-id");
    const postIdAttribute =  trigger.getAttribute("data-post-id");
    dataPostId = [dataCommentIdAttribute, postIdAttribute ]

    const loader = `<li class="box_result row comment_row loader_box">
    <div class="loader"></div>
    </li>`
    SendDataAjax(dataPostId, "ajax/DELETE_AND_RERENDER_COMMENTS_NEWS.php")
    .then(data => {
      commentContainer.innerHTML=loader;
      setTimeout(() => {
        commentContainer.innerHTML=data;
        addLikeNews()
        displayCommentEdit()
        deleteCommenNewsAjax()
      }, 1000);


    })
    .catch(error => {
        console.error('Error:', error);
    })
}) })}

deleteCommenNewsAjax()

function addCommentNewsAjax(){
  const buttonTriggerAddComment = document.querySelector(".add_comment_news");
  const commentContainer = document.querySelector(".result_comment");
  const commentText = document.querySelector(".commentar");
  if (!buttonTriggerAddComment || !commentContainer) return;
    buttonTriggerAddComment.addEventListener("click", ()=>{

    const commentTextValue = commentText.value;

    const dataPostIdAttribute =  buttonTriggerAddComment.getAttribute("data-post-id");


    dataPostId = [dataPostIdAttribute, commentTextValue ]
    const loader = `<li class="box_result row comment_row loader_box">
    <div class="loader"></div>
    </li>`
    SendDataAjax(dataPostId, "ajax/add_rerender_comments_news.php")
    .then(data => {
      commentContainer.innerHTML=loader;
      setTimeout(() => {
        commentContainer.innerHTML=data;
        addLikeNews()
        displayCommentEdit()
        deleteCommenNewsAjax()
      }, 1000);


    })
    .catch(error => {
        console.error('Error:', error);
    })
}) }

addCommentNewsAjax()



// DELETE COMMENTS FORUM

function deleteCommentForumAjax(){
  const delete_comment_trigger = document.querySelectorAll(".delete_comment_trigger");
  const commentContainer = document.querySelector(".result_comment");



    delete_comment_trigger.forEach(trigger=>{
    trigger.addEventListener("click", ()=>{



    const dataCommentIdAttribute =  trigger.getAttribute("data-comment-id");
    const postIdAttribute =  trigger.getAttribute("data-post-id");
    dataPostId = [dataCommentIdAttribute, postIdAttribute ]

    const loader = `<li class="box_result row comment_row loader_box">
    <div class="loader"></div>
    </li>`
    SendDataAjax(dataPostId, "ajax/DELETE_AND_RERENDER_COMMENTS_FORUM.php")
    .then(data => {
      commentContainer.innerHTML=loader;
      setTimeout(() => {
        commentContainer.innerHTML=data;
        addLikeForumPosts()
        displayCommentEdit()
        deleteCommentForumAjax()
      }, 1000);


    })
    .catch(error => {
        console.error('Error:', error);
    })
}) })}

deleteCommentForumAjax()



// -------------------------change current movie background--------------------------------

function movieCurrentBackground() {
  const movieCurrentSection = document.querySelector(".background-section-current-movie");
  const movieCurrentMovie = document.querySelector(".movie-section-current img");
  if(movieCurrentSection && movieCurrentMovie) {
    const movieCurrentMovieImage = movieCurrentMovie.getAttribute("src");


    movieCurrentSection.style.backgroundImage = `url(${movieCurrentMovieImage})`;
  }



  }





  movieCurrentBackground()

// -------------------------Select popular movie and get it by sending ajax--------------------------------

function getIdFromPopularMovies(){

  const selectedMoviePopularId = document.querySelectorAll(".movie-card-detailed");

  selectedMoviePopularId.forEach(ele=>ele.addEventListener("click", ()=> {
    const MovieSelectedTitle = document.querySelector(".selected_movie_title");
    const MovieSelectedDescription = document.querySelector(".selected_movie_description");
    const MovieSelectedViews = document.querySelector(".popular-movie-views-counter");
    const popularMovieLink = document.querySelector(".popular_movie_link");

    const selectedMovieId = ele.getAttribute("data-id")

    SendDataAjax(selectedMovieId, "ajax/GET_MOVIE_BY_ID.php")
    .then(data => {
      const movieData = JSON.parse(data);
      const selectedMovieTitle = movieData[0][0];
      const selectedMovieDescription = movieData[0][1];
      const selectedMovieViews = movieData[0][2];
      const popularMoviePage = `movie.php?movie=${movieData[0][3]}`;
      const selectedMovieDescriptionShorted = selectedMovieDescription.substring(0, 250);
      popularMovieLink.href=popularMoviePage;
      MovieSelectedTitle.textContent=selectedMovieTitle;
      MovieSelectedDescription.textContent=selectedMovieDescriptionShorted + "...";
      MovieSelectedViews.textContent=selectedMovieViews;
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
    if(MovieSelectedTitle) {
    const MovieSelectedDescription = document.querySelector(".selected_movie_description");
    const ids = [];
    const popularMoviesCards = document.querySelectorAll(".movie-card-detailed");
    const MovieSelectedViews = document.querySelector(".popular-movie-views-counter");
    const popularMovieLink = document.querySelector(".popular_movie_link");
    popularMoviesCards.forEach(card=>{
      ids.push(card.getAttribute("data-id"));
    })

    SendDataAjax(ids[0], "ajax/GET_MOVIE_BY_ID.php")
    .then(data => {
      const movieData = JSON.parse(data);
      const selectedMovieTitle = movieData[0][0]
      const selectedMovieDescription = movieData[0][1]
      const selectedMovieViews = movieData[0][2];
      const popularMoviePage = `movie.php?movie=${movieData[0][3]}`;
      const selectedMovieDescriptionShorted = selectedMovieDescription.substring(0, 250);


      popularMovieLink.href=popularMoviePage;
      MovieSelectedTitle.textContent=selectedMovieTitle;
      MovieSelectedDescription.textContent=selectedMovieDescriptionShorted + "...";
      MovieSelectedViews.textContent=selectedMovieViews;
    })
    .catch(error => {
        console.error('Error:', error);
    });
  }

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


// -------------------------Display hamburger--------------------------------

function displayHamburger() {

  // const NavLinks = `

  // `
  const hamburger =  document.querySelector(".hamburger");
  const containerLinks = document.querySelector(".container-links");

  function changeToHamburger() {


    if (window.innerWidth <= 1250) {
      hamburger.style.display = "block";
      containerLinks.style.display = "none";
    } else {
      containerLinks.style.display = "flex";
      hamburger.style.display = "none";
      // displayRegistration()

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
// -------------------------Search  AJAX--------------------------------
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


function searchReviews(){
  const results = document.querySelector(".search-results-posts")
  const resultsSearched = document.querySelector(".list-searched-posts")
  const movieSearcheInput = document.querySelector(".search-reviews");


  movieSearcheInput? movieSearcheInput.addEventListener("keyup", function(){
    const reviewSearcheInputValue = movieSearcheInput.value;
    if (reviewSearcheInputValue.trim().length > 0 && reviewSearcheInputValue!="") {
      SendDataAjax(reviewSearcheInputValue, "ajax/GET_SEARCHED_REVIEWS.php")
      .then(data => {

      results.style.display="flex"
      resultsSearched.innerHTML=data;


      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
    else {
      results.style.display="none"
      resultsSearched.innerHTML=""
    }


  }) : null

}
searchReviews()
function searchUsers(){
  const results = document.querySelector(".search-results-posts")
  const resultsSearched = document.querySelector(".list-searched-posts")
  const usersSearcheInput = document.querySelector(".search-users");


  usersSearcheInput? usersSearcheInput.addEventListener("keyup", function(){
    const usersSearcheInputValue = usersSearcheInput.value;
    if (usersSearcheInputValue.trim().length > 0 && usersSearcheInputValue!="") {
      SendDataAjax(usersSearcheInputValue, "ajax/GET_SEARCHED_USERS.php")
      .then(data => {

      results.style.display="flex"
      resultsSearched.innerHTML=data;


      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
    else {
      results.style.display="none"
      resultsSearched.innerHTML=""
    }


  }) : null

}
searchUsers()

// -------------------------Search POSTS AJAX--------------------------------

function searchPosts(){

  const resultsSearched = document.querySelector(".list-searched-posts")
  const movieSearcheInput = document.querySelector(".search-post");
  const containerSearchedPosts =  document.querySelector(".search-results-posts");

  movieSearcheInput? movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;

    if (movieSearcheInputValue.trim().length > 0 && movieSearcheInputValue!="") {
      SendDataAjax(movieSearcheInputValue, "ajax/GET_SEARCHED_POSTS.php")
      .then(data => {
      containerSearchedPosts.style.display="flex"
      resultsSearched.innerHTML=data;


      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
    else {
      containerSearchedPosts.style.display="none"
      resultsSearched.innerHTML=""
    }


  }) : null

}
searchPosts()
function searchForumPosts(){

  const resultsSearched = document.querySelector(".list-searched-forum-posts")
  const postSearcheInput = document.querySelector(".search-forum-posts-input");
  const containerSearchedPosts =  document.querySelector(".search-results-posts");

  postSearcheInput? postSearcheInput.addEventListener("keyup", function(){
    const postSearcheInputValue = postSearcheInput.value;

    if (postSearcheInputValue.trim().length > 0 && postSearcheInputValue!="") {
      SendDataAjax(postSearcheInputValue, "ajax/GET_SEARCHED_USERS_FORUM_POSTS.php")
      .then(data => {
      containerSearchedPosts.style.display="flex"
      resultsSearched.innerHTML=data;


      })
      .catch(error => {
          console.error('Error:', error);
      });
    }
    else {
      containerSearchedPosts.style.display="none"
      resultsSearched.innerHTML=""
    }


  }) : null

}
searchForumPosts()
// -------------------------Search bar width mobile screen adjustement--------------------------------
// function searchbarWider(){


//   const logo = document.querySelector(".logo_container_main")
//   const hamburger = document.querySelector(".hamburger");
//   const navContainer = document.querySelector(".navigation-container");
//   const searchBox = document.querySelector(".search_box_main");
//   const searchBar = document.querySelector(".wrapper-search .search_box .search_field");

//   logo.style.display="flex"
//   searchBar.style.width="224px"
//   navContainer.style.justifyContent = "space-between";
//   function mobileNav(){

//       hamburger.style.display="none"
//       logo.style.display="none"
//       searchBox.style.width="100%"
//       searchBar.style.width="100%"


//   }


//   if (window.innerWidth > 767) {

//     searchBox.style.width="224px"
//     searchBar.style.width="180px" //while resizing back to 200px normal wide search bar
//     searchBar.addEventListener("click", ()=>{
//       logo.style.display="flex"
//       searchBox.style.width="324px"
//       searchBar.style.width="100%"

//     })
//   }
//   if (window.innerWidth < 567) {

//     searchBar.style.width="100%"

//     searchBar.addEventListener("click",  mobileNav)
//     // if click on other element than search display off hamb and logo
//     document.addEventListener('click', function(event) {

//       if (!searchBar.contains(event.target)) {
//         logo.style.display="flex"
//         if (window.innerWidth < 567) {
//           hamburger.style.display="block"

//         }

//       }
//     });
//   }

// }

// window.addEventListener("resize", function(){
//   searchbarWider()
// })
// searchbarWider()


// send ajax to create review

function sendAJAXReview(dataInput){

  SendDataAjax(dataInput, "ajax/ADD_REVIEW.php")
  .then(data => {
    console.log(data.trim())
    if(data.trim()==="success") {

      const text = "Your review has been successfully added";
      modalWindowAddReview(text, "tick")

    }
    else if(data.trim()==="not_logged") {
      const text2 = "You need to be logged in before adding reviews";
      modalWindowAddReview(text2, "error")
    }
    else if(data.trim()==="review_exists") {
      const text3 = "You already left review for this movie.";
      modalWindowAddReview(text3, "error")
    }


  })
  .catch(error => {
      console.error('Error:', error);
  });
}

function selectSearchedMovieReview() {
  const searchedMovieReviews = document.querySelectorAll(".movie-searched-review");
  const container = document.querySelector(".reviews_modal_form")
  const stars = document.querySelectorAll(".star");
  const buttonTrigger = document.querySelector(".send_forum_review");


  searchedMovieReviews.forEach(movie => {
    movie.addEventListener("click", () => {
      // Hide all reviews
      searchedMovieReviews.forEach(movie => {
        movie.style.display = "none";

      });

      // Show the clicked review
      movie.style.display = "flex";
      movie.classList.add("notHover")
      movie.classList.add("movie-selected-movie-review")
      // get movie id




      stars.forEach(star=>{
      star.addEventListener("click", ()=>{
        stars.forEach(star=>{star.classList.remove("active-star");})
        star.classList.add("active-star")

      })
      })
      buttonTrigger.addEventListener("click", (event)=>{

        const selectedMovie = document.querySelector(".movie-selected-movie-review");
        const movieId = selectedMovie.getAttribute("data-id");
        const reviewText= document.querySelector(".review_input_text").value;
        const reviewRating = document.querySelector(".active-star").getAttribute("data-value");
        const reviewAlertContaier = document.querySelector(".review-alert-container");

        event.preventDefault();

        if(reviewText.length <= 6) {
          reviewAlertContaier.innerHTML=`
          <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
            Your review need to have at least 7 characters.
          </div>`
        } else {
          event.preventDefault();
          const data = [
            movieId,
            reviewText,
            reviewRating
          ];

          // After creating extracted data from form send ajax
          sendAJAXReview(data)

          container.style.display="none"
          closeModalWindowBg()
        }






      })
    });
  });
}
function addSelectedMovieReview() {

  const container = document.querySelector(".reviews_modal_form")
  const stars = document.querySelectorAll(".star");
  const buttonTrigger = document.querySelector(".send_forum_review_selected_movie");

      stars.forEach(star=>{
        star.addEventListener("click", ()=>{
          stars.forEach(star=>{star.classList.remove("active-star");})
          star.classList.add("active-star")

        })
      })

      buttonTrigger&&buttonTrigger.addEventListener("click", (event)=>{

        const selectedMovie = document.querySelector(".movie-selected-movie-review");
        const movieId = selectedMovie.getAttribute("data-id");
        const reviewText= document.querySelector(".review_input_text").value;
        const reviewRating = document.querySelector(".active-star").getAttribute("data-value");
        const reviewAlertContaier = document.querySelector(".review-alert-container");

        event.preventDefault();

        if(reviewText.length <= 6) {
          reviewAlertContaier.innerHTML=`
          <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
            Your review need to have at least 7 characters.
          </div>`
        }
        else {
          const data = [
            movieId,
            reviewText,
            reviewRating
          ];

          // After creating extracted data from form send ajax
          sendAJAXReview(data)

          container.style.display="none"
          closeModalWindowBg()

        }





      })
}

addSelectedMovieReview()

function searchMoviesReviewsForm(){

  const resultsSearched = document.querySelector(".list-searched-movies-reviews")
  const movieSearcheInput = document.querySelector(".search-movie-review");


  movieSearcheInput&&movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;
    if (movieSearcheInputValue.trim().length > 0 && movieSearcheInputValue!="") {
      SendDataAjax(movieSearcheInputValue, "ajax/GET_SEARCHED_MOVIES_REVIEWS_FORM.php")
      .then(data => {
      resultsSearched.innerHTML=data;
      selectSearchedMovieReview()

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
function selectedMoviesReviewsForm(){

  const resultsSearched = document.querySelector(".list-searched-movies-reviews")
  const movieSearcheInput = document.querySelector(".search-movie-review");


  movieSearcheInput&&movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;
    if (movieSearcheInputValue.trim().length > 0 && movieSearcheInputValue!="") {
      SendDataAjax(movieSearcheInputValue, "ajax/GET_SEARCHED_MOVIES_REVIEWS_FORM.php")
      .then(data => {
      resultsSearched.innerHTML=data;
      selectSearchedMovieReview()

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

// -------------------------Display dropdowns--------------------------------

function displayDropdowns() {
  const loginTrigger = document.querySelector(".login-trigger");
  const loginRegDropdown = document.querySelector(".login-reg-dropdown");
  const userMenuTrigger = document.querySelector(".nav_user_avatar");
  const allLinks = document.querySelectorAll(".link");
  const allDropdowns = document.querySelectorAll(".dropdown_nav");
  const moviesDropdown = document.querySelector(".movies_dropdown");
  const featuresDropdown = document.querySelector(".features_dropdown");
  const dropNavTrigger = document.querySelector(".movies_link");
  const dropNavTriggerContact = document.querySelector(".movies_contact");
  const featuresNavTrigger = document.querySelector(".features_link");
  const notificationsTrigger = document.querySelector(".not_trigger_container")
  const notificationsDropdown = document.querySelector(".user-notification-dropdown")
  const userAvatarDropdown = document.querySelector(".user-avatar-dropdown");

  // Function to hide all dropdowns
  const hideAllDropdowns = () => {
    allDropdowns.forEach(drop => drop.style.display = "none");
  };

  // Attach event listeners
  allLinks.forEach(link => {
    link.addEventListener("mouseover", () => {
      moviesDropdown && (moviesDropdown.style.display = "none");
    });
  });
  allLinks.forEach(link => {
    link.addEventListener("mouseover", () => {
      loginRegDropdown && (loginRegDropdown.style.display = "none");
    });
  });
  // Handle user avatar dropdown


  // Handle login/register dropdown
  loginTrigger && loginTrigger.addEventListener("mouseover", () => {
    hideAllDropdowns()
    loginRegDropdown && (loginRegDropdown.style.display = "block");
    userAvatarDropdown && (userAvatarDropdown.style.display = "block");
  });
  userMenuTrigger && userMenuTrigger.addEventListener("mouseover", () => {
    hideAllDropdowns()
    userAvatarDropdown && (userAvatarDropdown.style.display = "block");
  });

  // Handle movies dropdown
  notificationsTrigger && notificationsTrigger.addEventListener("click", () => {
    hideAllDropdowns();
    notificationsDropdown && (notificationsDropdown.style.display = "flex");
  });
  dropNavTrigger && dropNavTrigger.addEventListener("mouseover", () => {
    hideAllDropdowns();
    moviesDropdown && (moviesDropdown.style.display = "block");
  });
  dropNavTriggerContact && dropNavTriggerContact.addEventListener("mouseover", () => {
    hideAllDropdowns();

  });


  featuresNavTrigger && featuresNavTrigger.addEventListener("mouseover", () => {
    hideAllDropdowns();
    featuresDropdown && (featuresDropdown.style.display = "block");

  });
  // Hide dropdowns on mouse leave (mouseleave is more reliable than mouseout)
  moviesDropdown && moviesDropdown.addEventListener("mouseleave", () => {
    moviesDropdown.style.display = "none";
  });
  // notificationsDropdown && notificationsDropdown.addEventListener("mouseleave", () => {
  //   notificationsDropdown.style.display = "none";
  // });
  featuresDropdown && featuresDropdown.addEventListener("mouseleave", () => {
    featuresDropdown.style.display = "none";
  });

  loginRegDropdown && loginRegDropdown.addEventListener("mouseleave", () => {
    loginRegDropdown.style.display = "none";
  });

  userAvatarDropdown && userAvatarDropdown.addEventListener("mouseleave", () => {
    userAvatarDropdown.style.display = "none";
  });
}

displayDropdowns();






// ------------INTERSECTION HEADERS------------
function intersectionHeaders(TriggeringElement, header){
  const ObsCallbacknext = function(entries) {
    const [entry] = entries
    if(entry.isIntersecting===true) {
      header.classList.remove("inactive-header")
      header.classList.add("active-header")


    }
    else {

      header.classList.add("inactive-header")

    }



  }
  const ObsOptionsNext = {
    root:null,
    threshold: 0,
    rootMargin: '-30px'
  }
  const observer = new IntersectionObserver(ObsCallbacknext, ObsOptionsNext)

  observer.observe(TriggeringElement)
}

for (let i = 1; i <= 99; i++) {
  const header = document.querySelector(`.header-intersect${i}`);
  const headerTrigger = document.querySelector(`.header-trigger${i}`);

  if (header && headerTrigger) {
    intersectionHeaders(headerTrigger, header);
  }
}





// --------------------READ MORE MOVIE CARD INFO-------------------

function moreinfoCard(){

  document.querySelectorAll('.trigger-more-info-button').forEach(button => {
    button.addEventListener('click', (event)=>{
      const crossActivecard = document.querySelectorAll(".card-cross-expendable");
      event.preventDefault();
      button.style.display="none"
      const parentDiv = event.target.closest('.movie-card-expandable');
      if (!parentDiv) return;



      document.querySelectorAll(".movie-card-expandable").forEach(card => card.classList.remove("selected-card-active"));


      parentDiv.classList.add("selected-card-active");
      const hiddenDesc = parentDiv.querySelectorAll(".card-movie-hidden-info");
      hiddenDesc.forEach(element => element.style.display = "flex");



      crossActivecard.forEach(cross=>{
        cross.addEventListener('click', ()=>{
          parentDiv.classList.remove("selected-card-active");
          hiddenDesc.forEach(element => element.style.display = "none");

          button.style.display="block"
        });
      })


    });

  });

}

moreinfoCard()



// ------------------------------FAQ create function to use it---------------------------------


function faqCordians(){
  const allCordiansSymbols = document.querySelectorAll(".addCordian");
  cordiansTriggers = document.querySelectorAll(".faq-container .accordian-faq");

  allCordiansSymbols.forEach(cordianSymbol=>cordianSymbol.innerHTML="add")
  cordiansTriggers.forEach(ele=>ele.addEventListener("click", function(){

      const eachQuestionSymbol = ele.querySelector(".material-symbols-outlined");
      const eachQuestionAnswer = ele.querySelector(".content-faq");

      eachQuestionSymbol.innerHTML = eachQuestionSymbol.innerHTML === "add" ? "remove" : "add";
      eachQuestionAnswer.style.display = eachQuestionAnswer.style.display === "block" ? "none" : "block";




  }))
}
faqCordians()

function displayUserAvatar() {
  const allAvatarsTriggers = document.querySelectorAll(".trigger_avatar");
  const allLabels = document.querySelectorAll(".hiddenLabel");
  let currentlyVisibleLabel = null; // Track the currently visible label

  allAvatarsTriggers.forEach(avatar => {
    avatar.addEventListener("click", (event) => {
      const hiddenAvatar = avatar.querySelector(".hiddenLabel");

      // Toggle the label for the clicked avatar
      if (hiddenAvatar === currentlyVisibleLabel) {
        hiddenAvatar.style.display = "none";
        currentlyVisibleLabel = null; // No label is visible now
      } else {
        // Hide the currently visible label if it's different
        if (currentlyVisibleLabel) {
          currentlyVisibleLabel.style.display = "none";
        }

        // Show the clicked avatar's label
        setTimeout(() => {
          hiddenAvatar.style.display = "block";
          currentlyVisibleLabel = hiddenAvatar; // Track this as the visible label
        }, 1);
      }

      event.stopPropagation(); // Prevent document click event
    });
  });


  // Handle click outside avatars to hide the currently visible label
  document.addEventListener('click', function(event) {
    if (currentlyVisibleLabel) {
      let clickedInsideAvatar = false;

      // Check if the click was inside any avatar
      allAvatarsTriggers.forEach(avatar => {
        if (avatar.contains(event.target)) {
          clickedInsideAvatar = true;
        }
      });

      // If the click was outside any avatar, hide the currently visible label
      if (!clickedInsideAvatar) {
        currentlyVisibleLabel.style.display = "none";
        currentlyVisibleLabel = null; // Reset the visible label tracker
      }
    }
  });
}


displayUserAvatar();
//issue: slick slider not adjust slides when comes browser scrollbar


// ------------STARS FUNCTION---------


function manageStartsReviews(){
  const stars = document.querySelectorAll(".star");
  const ratingTexts = document.querySelectorAll(".rating-text .text");
  const ratingInput = document.getElementById("rating");

  stars.forEach((star, index) => {
      star.addEventListener("click", function() {
          const value = star.getAttribute("data-value");
          console.log(value)
          // Toggle selected class for current star and deselect others
          stars.forEach((s, i) => {
              if (i <= index) {
                  s.classList.add("selected");
              } else {
                  s.classList.remove("selected");
              }
          });

          // Display corresponding rating text and hide others
          ratingTexts.forEach((text, i) => {
              if (i == index) {
                  text.style.display = "inline-block";
              } else {
                  text.style.display = "none";
              }
          });


      });

      star.addEventListener("mouseover", function() {
          const value = star.getAttribute("data-value");
          // Highlight stars on hover
          stars.forEach((s, i) => {
              if (i < value) {
                  s.classList.add("hovered");
              } else {
                  s.classList.remove("hovered");
              }
          });
      });

      star.addEventListener("mouseout", function() {
          // Remove hover effect on mouseout
          stars.forEach(s => s.classList.remove("hovered"));
      });
  });
}

// -----------------GALLERY ABOUT FANCYBOX----------------------


Fancybox.bind(document.getElementById("gallery-wrap"), "[data-fancybox]", {
  // Your custom options
});






// Lazy loading function
function lazyLoadImages() {
  // Select all images with the class 'lazy'
  const lazyImages = document.querySelectorAll('img.lazy');

  // Check if Intersection Observer is supported
  if ('IntersectionObserver' in window) {
    // Create a new Intersection Observer
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        // Check if the image is in the viewport
        if (entry.isIntersecting) {
          const img = entry.target;
          // Set the src attribute to load the image
          img.src = img.getAttribute('data-src');
          // Remove the 'lazy' class as it's no longer needed
          img.classList.remove('lazy');
          // Unobserve the image after loading
          observer.unobserve(img);
        }
      });
    });

    // Observe each image
    lazyImages.forEach(img => observer.observe(img));
  } else {
    // Fallback for browsers that don't support Intersection Observer
    // Simply load all images immediately
    lazyImages.forEach(img => {
      img.src = img.getAttribute('data-src');
      img.classList.remove('lazy');
    });
  }
}

// Run the lazy load function
document.addEventListener("DOMContentLoaded", lazyLoadImages);
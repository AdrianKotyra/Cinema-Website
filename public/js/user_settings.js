function logoutCloseWindow() {
    const crossExit = document.querySelector(".user_Settings_cross")
    const userSettingsUserLogged = document.querySelector(".user_settings_container");

    userSettingsUserLogged.style.display="flex"

    // initialise using log out custom function with ajax
    LogOutUser(".user_logout_link");


    crossExit.addEventListener("click", ()=>{
      userSettingsUserLogged.style.display="none"

    })
  }


  function displayUserSettings(){
    const TriggerSettingsUser = document.querySelectorAll(".user_settings-link");


    TriggerSettingsUser? TriggerSettingsUser.forEach(trigger=>{trigger.addEventListener("click", ()=>{

      setTimeout(() => {
        initiateFetchingUserData()
        logoutCloseWindow()
        userSettingsModalactiveLinks()

      }, 200);

    })}) : null

  }

  function userSettingsModalactiveLinks(){
    const allLinks = document.querySelectorAll(".user_settings_link");

    allLinks.forEach(link=>{
      link.addEventListener("click",()=>{
        allLinks.forEach(linkAll=>linkAll.classList.remove("user_settings_link_active"))
        setTimeout(() => {
          link.classList.add("user_settings_link_active");
        }, 11);


      })
    })



  }

  displayUserSettings()

  function get_user_form_settings_ajax(){


    const settingsContentContainer = document.querySelector(".user_dashboard_form_details");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
      $.ajax(
        {
            url: 'ajax/user_settings/GET_USER_FORM.php',
            aSync: false,
            dataType: "html",
            success: function(data) {
              settingsContentContainer.innerHTML=data;
              updateUserDetailsAjax()


             },
            error: function(e)
            {
                alert('Error: ' + e);
            }
        });

  }
  function get_user_tickets_ajax(){


    const settingsContentContainer = document.querySelector(".user_dashboard_form_tickets");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
      $.ajax(
        {
            url: 'ajax/user_settings/GET_USER_TICKETS.php',
            aSync: false,
            dataType: "html",
            success: function(data) {
              settingsContentContainer.innerHTML=data;
              displayUserSettingsPostCards(settingsContentContainer)
              downloadTicket()

             },
            error: function(e)
            {
                alert('Error: ' + e);
            }
        });

  }
  function get_user_posts_settings_ajax(){

    const settingsContentContainer = document.querySelector(".user_dashboard_form_posts");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
    $.ajax(
      {
          url: 'ajax/user_settings/GET_USER_POSTS_SETTINGS.php',
          aSync: false,
          dataType: "html",
          success: function(data) {
            settingsContentContainer.innerHTML=data;
            displayUserSettingsPostCards(settingsContentContainer)
            deleteFromSettingsUserPost()
            editFromSettingsUserPost()


           },
          error: function(e)
          {
              alert('Error: ' + e);
          }
      });

  }
  function get_user_reviews_settings_ajax(){

    const settingsContentContainer = document.querySelector(".user_dashboard_form_reviews");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
    $.ajax(
      {
          url: 'ajax/user_settings/GET_USER_REVIEWS_SETTINGS.php',
          aSync: false,
          dataType: "html",
          success: function(data) {
            settingsContentContainer.innerHTML=data;
            displayUserSettingsPostCards(settingsContentContainer)
            deleteFromSettingsUserReview()
            editFromSettingsUserReview()


           },
          error: function(e)
          {
              alert('Error: ' + e);
          }
      });

  }
  function get_user_details_settings_ajax(){

    const settingsContentContainer = document.querySelector(".user_dashboard_form_info");
    settingsContentContainer.innerHTML='<div class="loader"></div>';

    $.ajax(
      {
          url: 'ajax/user_settings/GET_USER_DETAILS_FORM.php',
          aSync: false,
          dataType: "html",
          success: function(data) {
            settingsContentContainer.innerHTML=data;




           },
          error: function(e)
          {
              alert('Error: ' + e);
          }
      });

  }
  function updateUserDetailsAjax(){
    document.querySelector('.update_user_main').addEventListener('click', function(e) {
      e.preventDefault();
      var form = document.getElementById('user_form_Settings');
      var formData = new FormData(form);

      // Sending the form data, including the image, via AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'ajax/user_settings/UPDATE_USER_DETAILS_FORM_SETTINGS.php', true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            settingsConfirmationModal("Details", "updated")
            // update image user from settings and then from main screen
            get_user_form_settings_ajax()
            ajaxReloadComponent("ajax/user_settings/UPDATE_USER_AVATAR_SETTINGS.php", ".user_img_modal_container")
            ajaxReloadImageMainComponent("ajax/user_settings/UPDATE_USER_AVATAR_MAIN.php", ".user_profile_img_container")
            // give new reloaded component js functionality again




          }
      };
      xhr.send(formData);
  });
  }


  function show_bought_tickets(){
    const triggerTickets = document.querySelectorAll(".movie_nots_container");

    triggerTickets.forEach(triggerLink=>{
      triggerLink.addEventListener("click", ()=>{
        logoutCloseWindow()
        userSettingsModalactiveLinks()
        userControllerSettings()
        get_user_tickets_ajax();


        // ADD ACTIVE TICKET LINK

        const allLinks = document.querySelectorAll(".user_settings_link");
        allLinks.forEach(linkAll=>linkAll.classList.remove("user_settings_link_active"))
        setTimeout(() => {
          const ticketLink = document.querySelectorAll(".user_tickets_link");
          ticketLink.forEach(link=>link.classList.add("user_settings_link_active"))
        }, 1);
      })
    })

  }
  show_bought_tickets()

  function querySelectAll(selector) {
    return document.querySelectorAll(selector);
  }

  function initiateFetchingUserData(){
    get_user_tickets_ajax();
    get_user_form_settings_ajax();
    get_user_details_settings_ajax();
    get_user_posts_settings_ajax();
    get_user_reviews_settings_ajax();
  }

  // add listener to triggers to initiate the settings
  function triggerSettings(){
    const triggerSettingsDashboard = querySelectAll(".user_settings-link");
    if (triggerSettingsDashboard) {
      triggerSettingsDashboard.forEach(trigger => {
        trigger.addEventListener("click", () => {


          userControllerSettings()
        })})}


  }


  const reviewSettingsLiteral = ``

  function userControllerSettings() {

    function disableUserDashbaord(){
      const allDashbaords = document.querySelectorAll(".user_content_settings");
      allDashbaords.forEach(allDashbaord=>{
        allDashbaord.classList.remove("user_content_settings_active");
      })
    }

    const userDetailsTrigger = querySelectAll(".user_details_link");
    const userChangeDetailsTrigger = querySelectAll(".user_change_details_link");
    const userPostsTrigger = querySelectAll(".user_posts_link");
    const userReviewsTrigger = querySelectAll(".user_reviews_link");
    const userTicketsTrigger = querySelectAll(".user_tickets_link");

    const ticketsContainer =  document.querySelector(".user_dashboard_form_tickets");
    const postsContainer = document.querySelector(".user_dashboard_form_posts");
    const reviewsContentContainer = document.querySelector(".user_dashboard_form_reviews");
    const detailsContentContainer = document.querySelector(".user_dashboard_form_info");
    const settingsUpdateContentContainer = document.querySelector(".user_dashboard_form_details");


    userTicketsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        disableUserDashbaord()

        ticketsContainer.classList.add("user_content_settings_active");

        displayUserSettingsPostCards(ticketsContainer)
        downloadTicket()


      });
    });

    userChangeDetailsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        disableUserDashbaord()
        settingsUpdateContentContainer.classList.add("user_content_settings_active");

      });
    });

    userDetailsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        disableUserDashbaord()
        detailsContentContainer.classList.add("user_content_settings_active");

      });
    });

    userPostsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        disableUserDashbaord()
        postsContainer.classList.add("user_content_settings_active");
        displayUserSettingsPostCards(postsContainer)
        deleteFromSettingsUserPost()
        editFromSettingsUserPost()

      });
    });

    userReviewsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        disableUserDashbaord()
        reviewsContentContainer.classList.add("user_content_settings_active");
        displayUserSettingsPostCards(reviewsContentContainer)
        deleteFromSettingsUserReview()
        editFromSettingsUserReview()


      });
    });


  }

  // USER SETTINGS BACK FROM EDIT TO MAIN DASHBOARD SETTINGS
  function backerReviews(){
    const triggerBack = document.querySelector(".backer-settings-reviews");
    triggerBack.addEventListener("click", ()=>{
      get_user_reviews_settings_ajax();
    })
  }
  function backerPosts(){
    const triggerBack = document.querySelector(".backer-settings-posts");
    triggerBack.addEventListener("click", ()=>{
      get_user_posts_settings_ajax();
    })
  }
  // inititate setting when page is loaded
  userControllerSettings()


  function LogOutUser(buttonSelector){
    button = document.querySelectorAll(buttonSelector)
    button? button.forEach(button=>{button.addEventListener("click", ()=>{

      $(document).ready(function(){


        $.ajax({
            url: "ajax/LOG_OUT_USER.php",
            method: 'POST',
            success: function(response) {
              window.location.href = window.location.href;

            },
            error: function(xhr, status, error) {
                // Handle any errors during the request
                console.log('Error: ' + error);
            }
        });

    });
    })
  }): null;
  }

  // INITIALISE LOG OUT TRIGGER ON PAGE LOAD
  LogOutUser(".user_logout-link");


  function displayUserSettingsPostCards(container) {
    console.log("Initializing displayUserSettingsPostCards");

    const allCardsPosts = container.querySelectorAll(".settings_user_card");
    let currentlyVisibleLabel = null;

    // Ensure all settings labels are initially hidden
    allCardsPosts.forEach(card => {
      const settingsLabel = card.querySelector(".settings_card_options");
      if (settingsLabel) {
        settingsLabel.style.display = "none"; // Explicitly hide initially
      }
    });

    // Clear any existing event listeners before adding new ones
    allCardsPosts.forEach(card => {
      const newCard = card.cloneNode(true); // Clone card to remove listeners
      card.replaceWith(newCard); // Replace the old card with the new one
    });

    const updatedCards = container.querySelectorAll(".settings_user_card");

    updatedCards.forEach(card => {
      card.addEventListener("click", (event) => {
        console.log("Card clicked:", card);

        // Remove 'active' class from all cards
        updatedCards.forEach(card => card.classList.remove("active_settings_Card"));

        // Add 'active' class to the clicked card
        card.classList.add("active_settings_Card");

        const settingsLabel = card.querySelector(".settings_card_options");
        console.log("Clicked card settings label:", settingsLabel);

        // Hide currently visible label if it's not the same
        if (currentlyVisibleLabel && currentlyVisibleLabel !== settingsLabel) {
          currentlyVisibleLabel.style.display = "none";
        }

        // Toggle the clicked card's settings label
        const computedStyle = getComputedStyle(settingsLabel);
        console.log("Computed style:", computedStyle.display);

        if (computedStyle.display === "block") {
          settingsLabel.style.display = "none";
          currentlyVisibleLabel = null;
        } else {
          settingsLabel.style.display = "block";
          currentlyVisibleLabel = settingsLabel;
        }

        event.stopPropagation(); // Prevent this click from triggering document click
      });
    });

    // Handle clicks outside cards and settings labels
    document.addEventListener("click", function(event) {
      if (currentlyVisibleLabel) {
        let clickedInsideCardOrLabel = false;

        updatedCards.forEach(card => {
          if (card.contains(event.target)) {
            clickedInsideCardOrLabel = true;
          }
        });

        // Check if the click was inside the currently visible label
        if (currentlyVisibleLabel.contains(event.target)) {
          clickedInsideCardOrLabel = true;
        }

        // If the click was outside all cards and labels, hide the visible label
        if (!clickedInsideCardOrLabel) {
          currentlyVisibleLabel.style.display = "none";
          currentlyVisibleLabel = null;

          updatedCards.forEach(card => card.classList.remove("active_settings_Card"));
        }
      }
    });
  }


  // USER MODAL WINDOW  COFIRMATION
function settingsConfirmationModal($element, $text){
    const modalContainer = document.querySelector(".modal_container")
    const modal = `<div class="modal-forum-posts_delete">


      <div class="col-custom">
          <img class="modal-tick" src="./imgs/icons/tick.svg" alt="">
          <h5>Your ${$element} has been successfully ${$text} <br> <b>


          <button class="button-custom button-post-added">
              OK
          </button>

      </div>

  </div>`
    modalContainer.innerHTML=modal;
    const modalWindow = document.querySelector(".modal-forum-posts_delete");
      const buttonExit = document.querySelectorAll(".button-post-added");

      buttonExit.forEach(element => { element.addEventListener("click", ()=>{
          modalWindow.style.display="none";
      })

    });

  }



  // DELETE USER POSTS FROM SETTINGS SENDING AJAX
  function deleteFromSettingsUserPost(){


    const triggerButtonS = document.querySelectorAll(".delete_settings_button")
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{
        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/user_settings/USER_SETTINGS_DELETE_POST_AND_RERENDER.php")
          .then(data => {
            get_user_posts_settings_ajax() //<---- GET_USER_POSTS_SETTINGS.php rerender posts by sending another ajax
            settingsConfirmationModal("Post", "deleted")
          })
          .catch(error => {
              console.error('Error:', error);
          })
      })
    })

  }
  // DELETE USER REVIEW FROM SETTINGS SENDING AJAX
  function deleteFromSettingsUserReview(){


    const triggerButtonS = document.querySelectorAll(".delete_settings_button")
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{
        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/user_settings/USER_SETTINGS_DELETE_REVIEW_AND_RERENDER.php")
          .then(data => {
            get_user_reviews_settings_ajax()//<---- GET_USER_POSTS_SETTINGS.php rerender posts by sending another ajax
            settingsConfirmationModal("Review", "deleted")

          })
          .catch(error => {
              console.error('Error:', error);
          })
      })
    })

  }
  function updateSelectedReviewAjax(){
    document.querySelector('.edit_review_button').addEventListener('click', function(e) {
      e.preventDefault();
      var form = document.getElementById('editReviewForm');
      var formData = new FormData(form);

      // Sending the form data, including the image, via AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'ajax/user_settings/UPDATE_SELECTED_REVIEW_SETTINGS.php', true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            settingsConfirmationModal("review", "updated")
             get_user_reviews_settings_ajax() //<---- GET_USER_POSTS_SETTINGS.php rerender posts by sending another ajax

          }
      };
      xhr.send(formData);
  });
  }

  function updateSelectedPostAjax(){
    document.querySelector('.edit_post_button').addEventListener('click', function(e) {
      e.preventDefault();
      var form = document.getElementById('editPostForm');
      var formData = new FormData(form);

      // Sending the form data, including the image, via AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'ajax/user_settings/UPDATE_SELECTED_POST_SETTINGS.php', true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            settingsConfirmationModal("post", "updated")
            get_user_posts_settings_ajax() //<---- GET_USER_POSTS_SETTINGS.php rerender posts by sending another ajax

          }
      };
      xhr.send(formData);
  });

  }
  // EDIT USER POSTS FROM SETTINGS SENDING AJAX
  function editFromSettingsUserPost(){


    const triggerButtonS = document.querySelectorAll(".edit_settings_button")
    const container = document.querySelector(".user_dashboard_form_posts");
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{

        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/GET_SELECTED_POST_EDIT.php")
          .then(data => {
            container.innerHTML=data;
            updateSelectedPostAjax()
            backerPosts()

          })
          .catch(error => {
              console.error('Error:', error);
          })
      })
    })

  }
  function editFromSettingsUserReview(){


    const triggerButtonS = document.querySelectorAll(".edit_settings_button_review")
    const container = document.querySelector(".user_dashboard_form_reviews");
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{

        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/GET_SELECTED_REVIEW_EDIT.php")
          .then(data => {
            container.innerHTML=data;
            updateSelectedReviewAjax()
            backerReviews()



          })
          .catch(error => {
              console.error('Error:', error);
          })
      })
    })

  }

  function downloadTicket(){


    const triggerButtonS = document.querySelectorAll(".download_settings_button")
    const container = document.querySelector(".user_dashboard_form");
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{

        const bookingId = button.getAttribute("data-booking-id");


          $.ajax({
            url: 'ajax/GET_PDF_TICKET.php', // Path to your PHP file
            method: 'POST',
            data: { data: bookingId },
            xhrFields: {
                responseType: 'blob' // Important for handling binary data
            },
            success: function(response) {
                // Create a link to download the PDF
                var blob = new Blob([response], { type: 'application/pdf' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'ticket_' + bookingId + '.pdf';
                link.click();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error generating PDF:', textStatus, errorThrown);
            }
        });



      })
    })

  }

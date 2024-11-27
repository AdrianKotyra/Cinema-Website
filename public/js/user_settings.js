function userSettingsFunctionality() {
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
        userSettingsFunctionality()
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


    const settingsContentContainer = document.querySelector(".user_dashboard_form");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
      $.ajax(
        {
            url: 'ajax/GET_USER_FORM.php',
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


    const settingsContentContainer = document.querySelector(".user_dashboard_form");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
      $.ajax(
        {
            url: 'ajax/GET_USER_TICKETS.php',
            aSync: false,
            dataType: "html",
            success: function(data) {
              settingsContentContainer.innerHTML=data;
              displayUserSettingsPostCards()
              downloadTicket()

             },
            error: function(e)
            {
                alert('Error: ' + e);
            }
        });

  }
  function get_user_posts_settings_ajax(){

    const settingsContentContainer = document.querySelector(".user_dashboard_form");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
    $.ajax(
      {
          url: 'ajax/GET_USER_POSTS_SETTINGS.php',
          aSync: false,
          dataType: "html",
          success: function(data) {
            settingsContentContainer.innerHTML=data;
            displayUserSettingsPostCards()
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

    const settingsContentContainer = document.querySelector(".user_dashboard_form");
    settingsContentContainer.innerHTML = '<div class="loader"></div>';
    $.ajax(
      {
          url: 'ajax/GET_USER_REVIEWS_SETTINGS.php',
          aSync: false,
          dataType: "html",
          success: function(data) {
            settingsContentContainer.innerHTML=data;
            displayUserSettingsPostCards()
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

    const settingsContentContainer = document.querySelector(".user_dashboard_form");
    settingsContentContainer.innerHTML='<div class="loader"></div>';

    $.ajax(
      {
          url: 'ajax/GET_USER_DETAILS_FORM.php',
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
      xhr.open('POST', 'ajax/UPDATE_USER_DETAILS_FORM_SETTINGS.php', true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            settingsConfirmationModal("Details", "updated")
            // update image user from settings and then from main screen
            get_user_form_settings_ajax()
            ajaxReloadComponent("ajax/UPDATE_USER_AVATAR_SETTINGS.php", ".user_img_modal_container")
            ajaxReloadImageMainComponent("ajax/UPDATE_USER_AVATAR_MAIN.php", ".user_profile_img_container")
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
        userSettingsFunctionality()
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

  // add listener to triggers to initiate the settings
  function triggerSettings(){
    const triggerSettingsDashboard = querySelectAll(".user_settings-link");
    if (triggerSettingsDashboard) {
      triggerSettingsDashboard.forEach(trigger => {
        trigger.addEventListener("click", () => {
          userControllerSettings()
        })})}


  }

  function userControllerSettings() {


    const userDetailsTrigger = querySelectAll(".user_details_link");
    const userChangeDetailsTrigger = querySelectAll(".user_change_details_link");
    const userPostsTrigger = querySelectAll(".user_posts_link");
    const userReviewsTrigger = querySelectAll(".user_reviews_link");
    const userTicketsTrigger = querySelectAll(".user_tickets_link");

    userTicketsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        get_user_tickets_ajax();
      });
    });

    userChangeDetailsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        get_user_form_settings_ajax();
      });
    });

    userDetailsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        get_user_details_settings_ajax();
      });
    });

    userPostsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        get_user_posts_settings_ajax();
      });
    });

    userReviewsTrigger.forEach(trigger => {
      trigger.addEventListener("click", () => {
        get_user_reviews_settings_ajax();
      });
    });


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
  function displayUserSettingsPostCards() {

    const allCardsPosts = document.querySelectorAll(".settings_user_card");
    let currentlyVisibleLabel = null; // Track the currently visible settings label

    allCardsPosts.forEach(card => {
      card.addEventListener("click", (event) => {

        allCardsPosts.forEach(card => {
          card.classList.remove("active_settings_Card");})
          setTimeout(() => {
            card.classList.add("active_settings_Card");
        }, 1);

        event.stopPropagation(); // Prevent click event from bubbling up to document

        // Get the settings label for the clicked card
        const settingsLabel = card.querySelector(".settings_card_options");

        // Hide any currently visible settings label (if it's not the same one)
        if (currentlyVisibleLabel && currentlyVisibleLabel !== settingsLabel) {
          currentlyVisibleLabel.style.display = "none";



        }

        // Toggle the visibility of the clicked card's settings label
        if (settingsLabel.style.display === "block") {
          settingsLabel.style.display = "none";

          currentlyVisibleLabel = null;
        } else {

          settingsLabel.style.display = "block";
          currentlyVisibleLabel = settingsLabel;
        }
      });
    });

    // Add an event listener to the document to handle clicks outside the cards
    document.addEventListener('click', function(event) {
      // If there is a visible label and the click was outside any card
      if (currentlyVisibleLabel) {
        let clickedInsideAvatar = false;

        allCardsPosts.forEach(card => {
          if (card.contains(event.target)) {
            clickedInsideAvatar = true;
          }
        });

        // If the click was outside all avatars, hide the visible label
        if (!clickedInsideAvatar) {
          allCardsPosts.forEach(card => {
            card.classList.remove("active_settings_Card");})
          currentlyVisibleLabel.style.display = "none";
          currentlyVisibleLabel = null; // Reset the visible label tracker
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
        SendDataAjax(postId, "ajax/USER_SETTINGS_DELETE_POST_AND_RERENDER.php")
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
        SendDataAjax(postId, "ajax/USER_SETTINGS_DELETE_REVIEW_AND_RERENDER.php")
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
      xhr.open('POST', 'ajax/UPDATE_SELECTED_REVIEW_SETTINGS.php', true);
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
      xhr.open('POST', 'ajax/UPDATE_SELECTED_POST_SETTINGS.php', true);
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
    const container = document.querySelector(".user_dashboard_form");
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{

        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/GET_SELECTED_POST_EDIT.php")
          .then(data => {
            container.innerHTML=data;
            updateSelectedPostAjax()
            // showUploadedImageSettings()

          })
          .catch(error => {
              console.error('Error:', error);
          })
      })
    })

  }
  function editFromSettingsUserReview(){


    const triggerButtonS = document.querySelectorAll(".edit_settings_button_review")
    const container = document.querySelector(".user_dashboard_form");
    triggerButtonS.forEach(button=>{
      button.addEventListener("click", ()=>{

        const postId = button.getAttribute("data-post-id");
        SendDataAjax(postId, "ajax/GET_SELECTED_REVIEW_EDIT.php")
          .then(data => {
            container.innerHTML=data;
            updateSelectedReviewAjax()



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

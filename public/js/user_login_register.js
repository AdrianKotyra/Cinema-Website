// DISPLAY LOGIN USER  CONFIRMATION WINDOW MODAL USING AJAX
function loginUserAJAX(){

    const loginUserButtonMain = document.querySelector(".login_user_button");
    loginUserButtonMain.addEventListener("click", (event)=>{
      displayLoader()
      event.preventDefault()

      const userEmailForm = document.querySelector(".log_user_email").value;
      const userPasswordForm = document.querySelector(".log_user_password").value;

      const alertContainer = document.querySelector(".ajax-container-login-alerts");
      alertContainer.innerHTML="";

     // Create a FormData object
      const formData = new FormData();
      formData.append('userEmail', userEmailForm);
      formData.append('userPassword', userPasswordForm);

      // Send data via AJAX
      fetch('ajax/LOGIN_USER_MAIN.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())  // or response.json() if expecting JSON
      .then(data => {
        offLoader()
          if(isValidJSON(data)) {
            let dataString = JSON.parse(data);
            const confirmationWindowLogin = document.querySelector(".login-confirmation-window");
            const confWindowLiteral = dataString;

            confirmationWindowLogin.innerHTML=confWindowLiteral;
            displayConfirmationWindowLoggin()
            // refresh current page
            setTimeout(() => {
              window.location.href = window.location.href;
            }, 5000);




          }

        else{

          alertContainer.innerHTML=data;
        }



      })
      .catch(error => {
          console.error('Error:', error);
      });

  })}
  function displayConfirmationWindowLoggin(){

    const confirmationWindowLogin = document.querySelector(".login-confirmation-window");
    confirmationWindowLogin.style.display="none";
    setTimeout(() => {
      const acceptButtonLogin = document.querySelector(".accept-buttom-login");
      const regContainer = document.querySelector(".registration_container");



      const BodyMask = document.querySelector(".body_mask")
      const body = document.querySelector("body");
      regContainer.style.display="none";
      confirmationWindowLogin.style.display="block";

      acceptButtonLogin.addEventListener("click", ()=>{
        BodyMask.style.display="none";
        confirmationWindowLogin.style.display="none";
        body.style.overflowY="scroll"
        window.location.href = window.location.href;
      })


    }, 1);







}

  loginUserAJAX()
  // DISPLAY REGISTRATION  USER  CONFIRMATION WINDOW MODAL USING AJAX
  function displayConfirmationWindowRegister(){
    const acceptButton = document.querySelector(".accept-buttom-login");
    const acceptButtonLogin = document.querySelector(".accept-buttom");
    const regContainer = document.querySelector(".registration_container");
    const confirmationWindow = document.querySelector(".confirmation_window_register");
    const BodyMask = document.querySelector(".body_mask")
    const body = document.querySelector("body");
    regContainer.style.display="none";
    confirmationWindow.style.display="block";


    acceptButton&&acceptButton.addEventListener("click", ()=>{
      BodyMask.style.display="none";
      confirmationWindow.style.display="none";
      body.style.overflowY="scroll"
    })
    acceptButtonLogin&&acceptButtonLogin.addEventListener("click", ()=>{
      BodyMask.style.display="none";
      confirmationWindow.style.display="none";
      body.style.overflowY="scroll"
    })


  }
  // REGISTRATION  NEW USER  USING AJAX
  function registerNewUserAJAX(){

    const registerUserButtonMain = document.querySelector(".confirm_reg_new_user");
    registerUserButtonMain.addEventListener("click", (event)=>{

      event.preventDefault()
      const userNameForm = document.querySelector(".reg_user_name").value;
      const userSurnameForm = document.querySelector(".reg_user_surname").value;
      const userEmailForm = document.querySelector(".reg_user_email").value;
      const userEmailConfirmationForm = document.querySelector(".reg_user_email_confirmation").value;
      const userPasswordForm = document.querySelector(".reg_user_password").value;
      const userPasswordConfirmationForm = document.querySelector(".reg_user_password_confirmation").value;
      const userDateAgeForm = document.querySelector(".reg_user_date").value;
      const alertContainer = document.querySelector(".ajax-container-registration-alerts");


     // Create a FormData object
      const formData = new FormData();
      formData.append('userName', userNameForm);
      formData.append('userSurname', userSurnameForm);
      formData.append('userEmail', userEmailForm);
      formData.append('userEmailConfirmation', userEmailConfirmationForm);
      formData.append('userPassword', userPasswordForm);
      formData.append('userPasswordConfirmation', userPasswordConfirmationForm);
      formData.append('userDateAge', userDateAgeForm);
      // Send data via AJAX
      fetch('ajax/CREATE_NEW_USER_MAIN.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => {
        if(data.trim()==="success") {
          displayConfirmationWindowRegister()

        }
        else{
          alertContainer.innerHTML=data;
        }


      })
      .catch(error => {
          console.error('Error:', error);
      });

  })}

  registerNewUserAJAX()


  // -------------------------Display registration menu-------------------------------
function menuReg(){
  const body = document.querySelector("body");
  const BodyMask = document.querySelector(".body_mask")
  const cross = document.querySelector(".reg-cross");
  const registrationTrigger = document.querySelectorAll(".sign_up_link");
  const loginTriggerNav = document.querySelectorAll(".login-link");
  const loginTrigger = document.querySelector(".login_button");
  const menuLayout = document.querySelector(".registration_container");
  const allMenus = document.querySelectorAll(".menu_form");
  const menu_1 = document.querySelector(".menu_form_1");
  const menu_2 = document.querySelector(".menu_form_2");
  const menu_3 = document.querySelector(".menu_form_3");
  const registerButton = document.querySelectorAll(".register_button");



 // display registration form
  function displayRegistartion(){

    registerButton.forEach(ele=>ele.addEventListener("click", ()=>{


      allMenus.forEach(menu=>menu.style.display="none")
      setTimeout(() => {

        menu_2.style.display="block";
      }, 1);
    }))
  }

  // display login form
  function displayLoginForm(){


    loginTrigger.addEventListener("click", ()=>{

      allMenus.forEach(menu=>menu.style.display="none")
      setTimeout(() => {
        menu_3.style.display="block";
        displayRegistartion()


      }, 1);

    })
  }

    // display menu form
    function initiateMenuFormLogin(){

      loginTriggerNav? loginTriggerNav.forEach(login=>{
        login.addEventListener("click", ()=>{
          body.style.overflowY="hidden";
          BodyMask.style.display="block";
          menuLayout.style.display="block";
          allMenus.forEach(menu=>menu.style.display="none")
          menu_3.style.display="block";
        })
      }): null
    }


  // display menu form
  function initiateMenuForm(){
    registrationTrigger? registrationTrigger.forEach(button=>button.addEventListener("click", ()=>{
      body.style.overflowY="hidden";
      BodyMask.style.display="block";
      menuLayout.style.display="block";
      allMenus.forEach(menu=>menu.style.display="none")
      menu_1.style.display="block";
    })) : null
  }

  initiateMenuForm()
  initiateMenuFormLogin()
  displayRegistartion()
  displayLoginForm()

  cross? cross.addEventListener("click", ()=>{

        body.style.overflowY="scroll";
        BodyMask.style.animation="fadeIn_backwards 0.4s forwards";
        menuLayout.style.animation="registration_animation_backwards 0.4s forwards";
        setTimeout(() => {
          menuLayout.style.display="none";
          BodyMask.style.display="none";
          menuLayout.style.animation="registration_animation 0.4s forwards";
          BodyMask.style.animation="fadeIn 0.4s forwards";

        }, 401);
      }): null

}
menuReg()

// DELETE NOTS FROM USER NAV
function deleteNotsNavMobile(){


  const container = document.querySelector(".nots_container_list_mobile");
  const deleteButton = document.querySelector(".delete_nots_trigger_mobile");
  const notCounter = document.querySelector(".not_count_span_mobile");
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

function userNotifications(){
  const triggerNots = document.querySelector(".not_trigger_container-mobile");
  const notsDropdown = document.querySelector(".user-notification-dropdown-mobile");
  triggerNots&&triggerNots.addEventListener("click", ()=>{
    !notsDropdown.classList.contains("nots-mobile-active")?
    notsDropdown.classList.add("nots-mobile-active") :
    notsDropdown.classList.remove("nots-mobile-active")
  })
  deleteNotsNavMobile()
}
function mobileNavSettingsHamburger(){
  const mobileLinksUser = document.querySelector(".mobile-settings-links-container");
  const hambMobile = document.querySelector(".hamburger-menu-settings-mobile");
  const allNobileLinks = document.querySelectorAll(".user_settings_link");
  hambMobile.addEventListener("click", ()=>{

    !mobileLinksUser.classList.contains("active-mobile-links")?
    mobileLinksUser.classList.add("active-mobile-links") :
    mobileLinksUser.classList.remove("active-mobile-links")

  })
  allNobileLinks.forEach(link=>{
    link.addEventListener("click", ()=>{
      mobileLinksUser.classList.remove("active-mobile-links")
    })
  })

}


function displayMobileNav(){
  const cross = document.querySelector(".cross_mobile")
  const hamb = document.querySelector(".hamburger");
  const mobileNav = document.querySelector(".mobile-nav");
  hamb.addEventListener("click", ()=>{
    mobileNav.style.display="block"
    menuReg()
    LogOutUser(".user_logout-link");

    displayUserSettings()

    userControllerSettings()
    mobileNavSettingsHamburger()
    userNotifications()

  })
  cross.addEventListener("click", ()=>{
    mobileNav.style.display="none"
  })
}

function activatedMobieMenuResizing() {

  if (window.innerWidth <= 1250) {


    displayMobileNav();


  }

}
activatedMobieMenuResizing()

window.addEventListener("resize", () => {
  displayMobileNav();
});

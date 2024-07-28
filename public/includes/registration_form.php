<div class="registration_container ">
    <img class="reg-cross" src="./imgs/icons/cross.svg" alt="">
    <div class="registration_content menu_form menu_form_1">
       
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
    <div class="registration_form menu_form menu_form menu_form_2">
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

    <div class="login_form menu_form menu_form_3">
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
        <button class="register_button"> 
            <span class="span-log">Join us</span>         
            <img class="right-arrow-btn" src="./imgs/icons/right-arrow-nobg.svg" alt="">
        </button>

    </div>

   
   
   

</div>
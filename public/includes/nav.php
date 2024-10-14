<nav>
        <div class="navigation-container row-custom">
            <div class="navigation-container-col row-custom logo_container_main ">
                <a class="logo-container row-custom" href="index.php">
                    <img src="./imgs/icons/city.svg" alt="">
                    <div class="logo_name">
                        Limelight City
                    </div>
                

                </a>
            </div>
            <div class="navigation-container-col search_box_main">  
                <div class="wrapper-search">
                    <div class="search_box">
                        <!-- to be developed?  -->
                        <!-- <div class="dropdown ">
                            <div class="default_option">All</div>  
                            <ul>
                              <li>All</li>
                              <li>Trending</li>
                              <li>Recent</li>
                              <li>Comming soon</li>
                            </ul>
                        </div> -->
                        <div class="search_field">
                          <input type="text" class="input search-movie" placeholder="Search" >
                          <i class="fas fa-search"></i>
                          <div class="search-results">
                            <ul class="list-searched-movies">

                            </ul>
                          </div>
                        </div>

                    </div>
                </div>
            
            </div>

            <img src="./imgs/icons/hamburger.svg" class="hamburger">
            <?php
              $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <div class="navigation-container-col  row-custom  container-links">
                <a class="link <?php if($current_page == 'index.php'){ echo 'active-nav'; } ?>" href="index.php">Home</a>
                <a class="link <?php if($current_page == 'about.php'){ echo 'active-nav'; } ?>" href="about.php">About</a>
                <div class="link movies_link <?php if($current_page == 'category.php'){ echo 'active-nav'; } ?>"> Movies 
                    <div class="movies_dropdown dropdown_nav">
                        <h5> Categories </h5>
                        
                        <div class="categories_container row-custom">
                            <!-- <-------------to be dynamic from hardcoded -->
                            <?php get_genres_movies();?>
                            <?php get_kinds_movies();?>
                        </div>
                    
                    
                    
                    </div>
                
                
                </div>
                <div class="link features_link <?php if($current_page == 'reviews.php' || $current_page == 'users.php' || $current_page ==  'user.php'|| $current_page == 'posts.php' || $current_page ==  'post.php' || $current_page == 'posts.php' || $current_page ==  'forum_posts_all.php'  ){ echo 'active-nav'; } ?>"> Features 
                    <div class="features_dropdown dropdown_nav">
                        <h5> Features </h5>
                        
                        <div class="features_container">
                        <a class="link <?php if($current_page == 'reviews.php'){ echo 'active-nav'; } ?>" href="reviews.php">Reviews</a>
                        <a class="link <?php if($current_page == 'users.php' || $current_page ==  'user.php' ){ echo 'active-nav'; } ?>" href="users.php">Members</a>
                            <a class="link <?php if($current_page == 'posts.php' || $current_page ==  'post.php' ){ echo 'active-nav'; } ?>"href="posts.php">News</a>
                            <a class="link <?php if($current_page == 'forum_posts_all.php' || $current_page == 'forum_post.php'){ echo 'active-nav'; } ?>"href="forum_posts_all.php">Posts</a>
                        </div>
                    
                    
                    
                    </div>
                
                
                </div>
                <a href="contact.php" class="link movies_contact <?php if($current_page == 'contact.php') { echo 'active-nav'; } ?>"> Contact 
                    
                 
                
                </a>
                <?php render_quiz_nav()?>
             
                <div class="user_nav_component_container">
                    
                    <?php include("includes/user_logged_components/nav_user_profile.php")?>
                </div>
                 
             
               
               
              


            </div>

            
        </div>

    

    </nav>

    <div class="mobile-nav">
            <img class="cross_mobile" src="./imgs/icons/cross.svg" alt="">
            <div class="reg-container-mobile-links row-custom dropdown-link">
                <button class="sign_up_mobile button-custom">Sign up</button>
                <button class="login_mobile button-custom" >Log in</button>
            </div>
            <hr>

            <a class="link " href="index.php">
                <h3 class="mobile_header">Home</h3>
            </a>
            <hr>

            <a class="link"href="posts.php">
                <h3 class="mobile_header">News</h3>
            </a>
            <hr>
            <a class="link"href="reviews.php">
                <h3 class="mobile_header">Reviews</h3>
            </a>
            <hr>
            <a class="link"href="reviews.php">
                <h3 class="mobile_header">Users</h3>
            </a>
            <hr>
            <div class="mobile_link_container col-custom">
                <h3 class="mobile_header">Categories</h3>
                <?php get_genres_movies();?>
                <?php get_kinds_movies();?>
            </div>
            <hr>
         
    </div>


<div class="body_mask">

</div>
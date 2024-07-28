<nav>
        <div class="navigation-container row-custom">
            <div class="navigation-container-col row-custom ">
                <a class="logo-container text-mid row-custom" href="index.php">
                    <img src="./imgs/icons/cinema.svg" alt="">
                    <div>
                        Cinema City
                    </div>
                

                </a>
            </div>
            <div class="navigation-container-col">  
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
           
            <div class="navigation-container-col  row-custom  container-links">
                <a class="link active-nav" href="index.php">home</a>
                <a class="link"href="">News</a>
                <div class="link movies_link"> Movies 
                    <div class="movies_dropdown dropdown_nav">
                        <h5> Categories </h5>
                        <div class="categories_container row-custom">
                            <!-- <-------------to be dynamic from hardcoded -->
                            <?php get_genres_movies();?>
                            <?php get_kinds_movies();?>
                        </div>
                    
                    
                    
                    </div>
                
                
                </div>
                <span class="link sign_up_link">Sign up</span>
                <a class="hiddenNav active-link login-link link" href="">Log in</a>

            </div>

            
        </div>

    </nav>


<div class="body_mask">

</div>
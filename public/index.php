<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
   
  
    <section class="hero-section">
        <div class="hero-text ">
            <h3 class="text-big">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h3>
            <p class="text-mid">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <button class="button-custom">Sign up</button>

        </div>
        <div class="slides_container">
            <div class="slide" >

                <video class="video" width="100%" height="100%" autoplay  muted loop>
                    <source src="./videos/rebel-moon_animation.mp4" type="video/mp4">
                   
                 
                </video>
               
            </div>
            <div class="slide" >

                <video class="video" width="100%" height="100%" autoplay  muted loop>
                    <source src="./videos/avatar_animation.mp4" type="video/mp4">
                   
                 
                </video>
               
            </div>
            <div class="slide" >

                <video class="video" width="100%" height="100%" autoplay  muted loop>
                    <source src="./videos/alien-movie.mp4" type="video/mp4">
                   
                 
                </video>
               
            </div>
            
            <div class="slide" >

                <video class="video" width="100%" height="100%" autoplay  muted loop>
                    <source src="./videos/puppies_animation.mp4" type="video/mp4">
                   
                 
                </video>
               
            </div>
            <div class="slide" >
                <video class="video" width="100%" height="100%" autoplay  muted loop >
                    <source src="./videos/batman-movie.mp4" type="video/mp4">
                   
                 
                </video>
            </div>
            <div class="slide" >
                <video class="video" width="100%" height="100%" autoplay  muted loop >
                    <source src="./videos/panda_animation.mp4" type="video/mp4">
                   
                 
                </video>
            </div>
            <div class="slide" >
                <video class="video" width="100%" height="100%" autoplay  muted loop >
                    <source src="./videos/avengers-movie.mp4" type="video/mp4">
                   
                 
                </video>
            </div>
            <div class="slide" >
                <video class="video" width="100%" height="100%" autoplay  muted loop >
                    <source src="./videos/lord-vader_animation.mp4" type="video/mp4">
                   
                </video>
            </div>
            <div class="slide" >
                <video class="video" width="100%" height="100%" autoplay  muted loop >
                    <source src="./videos/underwater_movie.mp4" type="video/mp4">
                   
                 
                </video>
              
              
            </div>
       
        </div>
       

    

        <div class="black-gradient-animation">

        </div>
    </section>

    <section class="movies-section">
    
        <div class="black-gradient-animation-top ">
    
        </div>
        <div class="background-section-popular-movies">

        </div>
        <div class="wrapper-content col-custom movies-section-container col-custom">
            <h5 class="section-header text-mid">Most popular</h5>
           
            <div class="movie-card-info-container">
                <h1 class="text-big selected_movie_title">Lorem, ipsum dolor.</h1>
                <p class="text-mid selected_movie_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore unde saepe laboriosam ipsam culpa laudantium?</p>
            </div>
          
            <div class="movies-selection-bar col-custom">
                <div class="scrolling-wrapper">
                    <?php get_popular_movies()?>
                  
                  
                   
                 
                </div>
            </div>
        </div>
        <div class="black-gradient-animation">
    
        </div>
      



    </section>

    <section class="trending-section section-trending">
        <div class="black-gradient-animation-top ">
    
        </div>
        <div class="wrapper-content">
            <h5 class="section-header text-mid">Trending</h5>
            <div class="movies-container">
                <div class="scrolling-wrapper row-custom">
                   
                    <?php get_trending_movies(); ?>
                
                </div>        
            </div>
        </div>
        <div class="black-gradient-animation">

        </div>


    </section>

    <section class="trending-section section-commingsoon">
        <div class="black-gradient-animation-top ">
    
        </div>
        <div class="wrapper-content">
            <h5 class="section-header text-mid">Coming soon</h5>
            <div class="movies-container">
                <div class="scrolling-wrapper row-custom">
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>



                   
                
                </div>        
            </div>
        </div>
        <div class="black-gradient-animation">

        </div>


    </section>

    <section class="trending-section">
        <div class="black-gradient-animation-top ">
    
        </div>
        <div class="wrapper-content">
            <h5 class="section-header text-mid">Currently playing</h5>
            <div class="movies-container">
                <div class="scrolling-wrapper row-custom">
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                    <div class="movie-card movie-card-trending" >   <!--<==== hardcoded to dynamic will be changed -->
                        <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                        <div class="text-container card-info ">
                            <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                            <p class="card-movie-date"> 20 April</p>
                            <p class="card-movie-age"> 6+</p>
                            <button class="button-custom">Book</button>
                        </div>
                    </div>
                
                </div>        
            </div>
        </div>
        <div class="black-gradient-animation">

        </div>



    </section>

    <section class="more-section">
   
        <div class="wrapper-content">
            <h5 class="section-header text-mid">You may like this</h5>
            <div class="container-custom">
                
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
                <div class="movie-card-more" >  
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
                <div class="movie-card-more" >   <!--<==== hardcoded to dynamic will be changed -->
                    <img  class="card-movie-img" src="./imgs/rock-movie.jpeg"  alt="">
                    <div class="text-container card-info ">
                        <p class="card-movie-title">Lorem ipsum dolor sit.</p>
                        <p class="card-movie-date"> 20 April</p>
                        <p class="card-movie-age"> 6+</p>
                    </div>
                </div>
             
            

            </div>





        </div>


    </section>

    <section class="blog-section">
        <div class="wrapper-content">
            <h5 class="section-header text-mid">Latest News</h5>
            <div class="container-custom row-custom  posts-container">
                <div class="recent-post col-50 row-custom">
                    <img src="./imgs/rock-movie.jpeg" alt="">
                    <div class="post-text">
                        <h5 class="recent-post-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                        <p class="recent-post-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus quasi repellendus cupiditate obcaecati, illum voluptatum recusandae quae sunt accusamus labore! Quasi ad alias repellendus sed.</p>
                      
                    </div>


                </div>
                <div class="posts-container col-50 col-custom">
                    <div class="post row-custom">
                        <img src="./imgs/rock-movie.jpeg" alt="">
                        <div class="post-text">
                            <p class="post-date">27.09.2024</p>
                            <p class="post-header">Lorem ipsum dolor sit amet.</p>
                          
                        </div>
                    </div>
                    <div class="post row-custom">
                        <img src="./imgs/rock-movie.jpeg" alt="">
                        <div class="post-text">
                            <p class="post-date">27.09.2024</p>
                            <p class="post-header">Lorem ipsum dolor sit amet.</p>
                          
                        </div>
                    </div>
                    <div class="post row-custom">
                        <img src="./imgs/rock-movie.jpeg" alt="">
                        <div class="post-text">
                            <p class="post-date">27.09.2024</p>
                            <p class="post-header">Lorem ipsum dolor sit amet.</p>
                          
                        </div>
                    </div>
                    <div class="post row-custom">
                        <img src="./imgs/rock-movie.jpeg" alt="">
                        <div class="post-text">
                            <p class="post-date">27.09.2024</p>
                            <p class="post-header">Lorem ipsum dolor sit amet.</p>
                          
                        </div>>
                    </div>

                </div>

            </div>
        </div>
      



    </section>
   
    <?php include("includes/footer.php")?>


  
   
  </body>
</html>
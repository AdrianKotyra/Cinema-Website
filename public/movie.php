<?php include "includes/header.php"?>
<?php include "includes/nav.php"?>
<script src="js/pages/movie/renderTimesBooking.js"></script>
    <section class=" movie-section">
      
        <div class="movie-section-current ">
            <div class="background-section-current-movie">

            </div>

            <?php get_selected_movie()?>
            
        

        </div>
    

       
    </section>
  
    <div class="book_container">
        <span class="book-anchor"></span>
        <div class="scrolling-wrapper row-custom date-calendar">

            <div class="date-box">
              <?php renderNext7Days()?>
            </div>

       
          
        
        </div> 
       
        <div class="screen-box-grid">
      
            <script> renderTimesBooking() </script>
           
               
                
        </div>    

        <div class="choose-tickets-booking">
            <p>Choose your tickets: </p>
            <div class="col-custom tickets-container">
                <p>Adult</p>
                <p > <span class="ticket_price"><?php echo get_selected_movie_ticket_price();?></span>£</p>
                <div class="increment_decrement_container row-custom">
                    <img class="ticket_decrement" src="./imgs/icons/minus.svg" alt="">
                    <span class="counter-ticket">1</span>
                    <img class="ticket_increment" src="./imgs/icons/plus.svg" alt="">
                </div>
                
            </div>
            <button class="button-custom confirm-booking-part_1">Confirm</button>
        </div>
        
        <div class="confiramtion-booking">
            <h3>Movie:</h3>
            <p><?php get_selected_movie_name()?></p>
            <h3>Date: </h3>
            <p class="day-booking-conf">
                
            </p>
            <h3>Time: </h3>
            <p class="time-screen-booking-conf">
            
            </p>
            <h3>Adult</h3>
            <h3> <span class="ticket_price_unit"><?php echo get_selected_movie_ticket_price();?></span>£</h3>
            <h3 >Ticket Quantity: <span class="ticket_number_conf"></span></h3>
            <h3 >Total : <span class="total_price_booking"></span></h3>
         
            <button class="button-custom book-modal-trigger">Confirm</button>
        </div>
              
           
        </div>  
  
    <!-- <section class="actors-section">
        <img class="arrow-section slider-arrow"src="./imgs/icons/right-arrow.svg" alt="">
        <div class="wrapper-content">
            <h5 class="section-header text-mid"> Cast of </h5>
                <div class="container-custom">
                    <div class="scrolling-wrapper">
                        <div class="actors-container row-custom">
                            <div class="actor-card" >  
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="actor-card" >  
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="actor-card" >  
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="actor-card" > 
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="actor-card" > 
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                            <div class="actor-card" >   
                                <img src="./imgs/rock-movie.jpeg"  alt="">
                                <div class="text-container actor-card-info ">
                                    <p class="actor-name">Lorem ipsum dolor sit.</p>
                                    <p class="actor-role">Lorem ipsum dolor sit.</p>
                                </div>
                            </div>
                        </div>
                      
                    
                    </div>
                </div>   
        </div>

    </section> -->

    <div class="movie-wrapper">

    <section class="reviews-section">
        <img class="arrow-section slider-arrow"src="./imgs/icons/right-arrow.svg" alt="">
        <div class="wrapper-content">
            <h5 class="section-header text-mid"> Reviews of <?php get_selected_movie_name()?></h5>
            <button class="add_review_post_trigger button-custom">
                Add Review
            </button>
                <div class="container-custom">
                    <div class="scrolling-wrapper">
                        <div class="reviews-container row-custom">
                            <?php get_selected_movie_reviews();?>
                       
                     
                        </div>
                     
                    </div>
                </div>   
        </div>

    </section>
    <section class="video-section">
        <div class="wrapper-content">
            <h5 class="section-header text-mid"> Watch videos of  <?php get_selected_movie_name()?> </h5>
            <div class="container-custom row-custom">
                <div class="video-card col-custom">
                    <div class="video-img-container">
                       <?php get_selected_movie_trailer()?>
                    </div>
                 
                    
                </div>
               
            </div>
        </div>

    </section>

    <section class="more-section movie-more-section">
    
    <div class="wrapper-content">
        <h5 class="section-header text-mid">Similar titles</h5>
        <div class="container-custom movie-similar-titles">
            
        <?php get_movies_of_genres_by_movie_id();?>
       

        </div> 
        <button class="show-more-titles-button button-custom">
            show more
        </button>
    
    </section>
    
        
    </div>
   
   
    <?php include("includes/add-review-form-selected-movie.php");  ?>
  
      
    <?php include("includes/footer.php")?>
    <script src="js/pages/movie/movie.js"></script>
  </body>
</html>
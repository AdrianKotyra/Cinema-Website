
<div class="create-post reviews_modal_form modal_window_alerts">

	
  
  <div	 class="container-create-post">
  <img class="closeModal" src="./imgs/icons/cross.svg">
  <h1>Create a review</h1>
  <hr>
  <div class="selected-movie">
    <?php get_selected_movie_review_movie()?>
  </div>
  <div class="star-rating">
        <h5><b>Leave Rating</b></h5>
        <div class="stars">
            <span class="star" data-value="1"><i class="fas fa-star"></i></span>
            <span class="star" data-value="2"><i class="fas fa-star"></i></span>
            <span class="star" data-value="3"><i class="fas fa-star"></i></span>
            <span class="star" data-value="4"><i class="fas fa-star"></i></span>
            <span class="star" data-value="5"><i class="fas fa-star"></i></span>
            <span class="star" data-value="6"><i class="fas fa-star"></i></span>
            <span class="star" data-value="7"><i class="fas fa-star"></i></span>
            <span class="star" data-value="8"><i class="fas fa-star"></i></span>
            <span class="star" data-value="9"><i class="fas fa-star"></i></span>
            <span class="star" data-value="10"><i class="fas fa-star"></i></span>
      </div>
    </div>
	
	<div class="form-group ">
        <label for="user_review">Review</label>
        <textarea class="form-control post-form-input review_input_text" required  rows="6"></textarea>
    </div>
		
	  <div class="review-alert-container">
    
    </div>

    
    <button name="send_forum_review"  class="submitbtn send_forum_review_selected_movie">SUBMIT</button>

  </div>

</div>



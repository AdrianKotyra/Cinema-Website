
<div class="create-post forum_posts_modal_form modal_window_alerts">

	<form action="forum_posts_all.php?send_post" method="POST" enctype="multipart/form-data">
		
  	<div	 class="container-create-post">
	  <img class="closeModal" src="./imgs/icons/cross.svg">
    <h1>Create a Post</h1>
    <hr>

    <label for="title"><b>Title:</b></label>
    <input type="text" placeholder="Enter Title" name="post_title" id="title" required>


    
	<div class="form-group ">
        <label for="user_review">Description</label>
        <textarea class="form-control post-form-input" required name="post_text" rows="6">Enter Description</textarea>
    </div>
	<label for="file-upload"><b>Choose a file:</b></label>

	<label class="file">
	<img id="thumbnail" src="" alt="Image ">
	<input required type="file"  name="image"id="imageInput">
	</label>


    
    <button name="send_forum_post" type="submit" class="submitbtn">SUBMIT</button>
  </div>
</form> 
</div>







<?php if(isset($_POST['send_forum_post']) && $session->signed_in===true) {


$user_id = $user->user_id;
$post_title    = $_POST['post_title'];
$post_text   = $_POST['post_text'];
$post_date        = date("Y-m-d H:i:s");
$post_img        = "imgs/forum_posts/".$_FILES['image']['name'];
$post_image_temp   = $_FILES['image']['tmp_name'];

//    if no uploaded image give it default image
if($post_img ===""){

	$post_img="imgs/forum_posts/default_image.jpg";

	
}

move_uploaded_file($post_image_temp, $post_img );

$query = "INSERT INTO forum_posts(post_title, post_text, post_img, post_date, post_user_id) ";

$query .= "VALUES('{$post_title}','{$post_text}','{$post_img}','{$post_date}', '{$user_id}') ";



$create_movie_query = mysqli_query($connection, $query);


} 


?>
<!-- POST AVALIDATION with modal windows triggering-->
<?php 
if (isset($_GET['send_post']) && $session->signed_in===true) {
    echo '<div class="modal-forum-posts">


	<div class="col-custom">
		<img class="modal-tick" src="./imgs/icons/tick.svg" alt="">
		<h5>Your post has been successfully added <br> <b>
		'.$user->user_firstname. ' '. $user->user_lastname.' </b></h5>
	
		<img class="post_image_modal"src="'.$post_img.'" alt="">
		<h5 class="post_title_modal">'.$post_title.' </h5>
		
		<button class="button-custom button-post-added">
			OK
		</button>

	</div>   

</div>
<script>  function addPostConfirmationModal(){
	const buttonExit = document.querySelector(".button-post-added");
	const modalWindowPost = document.querySelector(".modal-forum-posts");
	buttonExit.addEventListener("click", ()=>{
		window.location.href = "forum_posts_all.php";
	})
	setTimeout(() => {
		window.location.href = "forum_posts_all.php";
	}, 3000);
	}
	addPostConfirmationModal()
</script>

';
	
} elseif (isset($_GET['send_post']) && $session->signed_in===false) {
	echo '<div class="modal-forum-posts">


	<div class="col-custom">
		<img class="modal-cross" src="./imgs/icons/error.svg" alt="">
		<h5>You need to be logged in to add new posts <br> <b>
		
		<button class="button-custom button-post-added">
			OK
		</button>

	</div>   

</div>
<script> 
  function addPostConfirmationModal(){
	const buttonExit = document.querySelector(".button-post-added");
	const modalWindowPost = document.querySelector(".modal-forum-posts");
	buttonExit.addEventListener("click", ()=>{
		modalWindowPost.style.display="none";
	})
	setTimeout(() => {
		window.location.href = "forum_posts_all.php";
	}, 3000);
	}
	addPostConfirmationModal()
</script>

';

}
?>
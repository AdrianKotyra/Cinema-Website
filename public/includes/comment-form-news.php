<?php include("add_comment_news.php")?>
<?php  
    $limit = 5;
    $post_id = $_GET["post"];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql_total = "SELECT COUNT(comment_id) FROM comments_news where comment_post_id =  $post_id";
    $total_result = $database-> query_array($sql_total);
    $total_records = $total_result->fetch_array()[0];
    $total_pages = ceil($total_records / $limit);
        
?>

<div class="comment-container">
		<div class="col-md-12" id="fbcomment">
			<div class="header_comment">
				<div class="row">
					<div class="col-md-6 text-left">
					  <span class="count_comment"><?php echo get_num_comments_on_post();?> Comments</span>
					</div>
					<!-- <div class="col-md-6 text-right">
					  <span class="sort_title">Sort by</span>
					  <select class="sort_by">
						<option>Top</option>
						<option>Newest</option>
						<option>Oldest</option>
					  </select>
					</div> -->
				</div>
			</div>

			<div class="body_comment">
				<!-- comment form input display if user logged-->
				<?php if($session->signed_in==true) {
				

					echo '<div class="row">
						<div class="avatar_comment col-md-1">
							<img class="comment_user_avatar"src="./imgs/users_avatars/'.$user->user_img.'" alt="avatar"/>
						</div>
						<div class="box_comment col-md-11">
							<form action="" method="post" enctype="multipart/form-data">
								<textarea class="commentar" required name="comment_text" placeholder="Add a comment..."></textarea>
								<div class="box_post">
							
									<div class="pull-right">
										
										<div class="form-group">
												  <button type="button" data-post-id="' . htmlspecialchars($_GET["post"]) . '" class="button-custom add_comment_news">Comment</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>';
							
				}?>

				<!-- comments-->
				
				<div class="row">
					<ul id="list_comment" class="col-md-12">
				
							<div class="result_comment col-md-11">
								<?php get_comments_on_posts('comment_literal_news',$limit, $start )?>
							
								
							</div>
						</li>
						
					
					</ul>
				<!-- <button class="show_more" type="button">Load 42 more comments</button> -->
                <button class="show_less" type="button" style="display:none"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>
				</div>
			</div>
        </div>
 
</div>
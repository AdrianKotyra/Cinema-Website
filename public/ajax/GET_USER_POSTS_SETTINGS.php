<?php session_start();
include("../php/init.php");

$user_id_logged = $user->user_id;
if($user_id_logged) {
    global $connection;
    $query = "SELECT * FROM forum_posts where post_user_id = $user_id_logged order by post_date desc  ";
    $search_query = mysqli_query($connection, $query);
    echo  '   <h1 class="edit_post_header">Users Posts</h1>
    <div class="user_settings_forum_posts_container">';
    while($row = mysqli_fetch_array($search_query)) {
        $post_id = $row["id"];
        $post_title    = $row['post_title'];
        $post_text   = substr($row['post_text'], 0, 36);
        $post_user_id   = $row['post_user_id'];
        $post_date       = $row['post_date'];
        $post_img       = $row['post_img'];
        $post_year = substr($post_date, 0, 10);
        $post_time = substr($post_date, 11);

        $query3 = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id");
        $post_num_comments=mysqli_num_rows($query3);

        echo '  <div class="settings_user_card ">
                        <div class="settings_card_options">
                            <p class="option_card_settings"> 
                                <a target="_blank"  href="forum_post.php?id='.$post_id.'">
                                    View
                                </a>
                            </p>
                            <p class="option_card_settings delete_settings_button" data-post-id="'.$post_id.'"> Delete </p>
                            <p class="option_card_settings edit_settings_button" data-post-id="'.$post_id.'"> Edit </p>
                        </div>
                      
                        <img class="forum-post-img settings_post_img" src="'.$post_img.'" alt="">
                        
                        <div class="forum-container-text col-custom">
                          
                                <h5>'.$post_title.'</h5>
                               <div class="post-reply-counter row-custom">
                                        <div class="col-custom date-settings-post">
                                            <span class="date-label-post">'. $post_year .'</span> <br>
                                            <span class="date-label-post">'. $post_time .'</span>
                                        </div>
                                      
                                        <div> 
                                            <img class="forum-post-comment-img"src="imgs/icons/comment.svg" alt="">
                                            <span class="post-reply-counter-number">'.$post_num_comments.'</span>
                                        
                                        </div>
                                    
                                    
                                    </div>
                                
                        </div>
                        
                
                </div>';
           

        
        
    } 
    echo '</div>';
} 
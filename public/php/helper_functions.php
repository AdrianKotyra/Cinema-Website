<?php  require_once("init.php");
    require_once("data_base.php");

    function class_auto_loader($class) {
        $class= strtolower($class);

        $the_path = "includes/{$class}.php";
        if (file_exists($the_path)) {
            include($the_path);
        } else {
            die("This file name $the_path does not exist");
        }
    }
    function render_quiz_nav(){
        global $session;
        global $user;
        if($session->signed_in==true && $user->user_age <=17) {
            echo '  <div class="link quiz_link "> Quiz



            </div>';
        }
    }
    function render_quiz_nav_mobile(){
        global $session;
        global $user;
        if($session->signed_in==true && $user->user_age <=17) {
            echo ' <a class="link mobile-link quiz_link">
                <h3 class="mobile_header">Quiz</h3>
            </a>
            <hr>';
        }
    }
    function redirect($location) {

        header("Location: {$location}");


    }
    function add_forum_posts_notification($comment_user_id, $post_id ){
        // ADD NOTIFICATION
        global $database;

        $query1 = "SELECT * from forum_posts where id= $post_id";
        $search_query= $database->query_array($query1);
        // not adding notification for commenting self posts


            while($row = mysqli_fetch_array($search_query)) {
                $user_id = $row["post_user_id"];
                if($comment_user_id!=$user_id) {
                $query2 = "INSERT INTO notifications_forum_posts_comments(user_notification_id, comment_user_id, post_id) ";
                $query2 .= "VALUES('{$user_id}','{$comment_user_id}', '{$post_id}') ";
                $add_notification_query= $database->query_array($query2);
                }
                else {
                    return;
                }
            }


    }
    function render_ticket_big(){
        $ticket = '
            <div class="ticket-big">

                <div class="title">
                    <p class="cinema">Limelight Cinema</p>
                    <p class="movie-title">ONLY GOD FORGIVES</p>
                </div>
                <div class="poster">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/25240/only-god-forgives.jpg" alt="Movie: Only God Forgives" />
                </div>
                <div class="info">
                <table>
                    <tr>

                        <th class="ticket_seat_p">SEAT</th>
                    </tr>
                    <tr>
                        <td class="bigger">18</td>

                    </tr>
                </table>
                <table>
                    <tr>
                        <th>PRICE</th>
                        <th>DATE</th>
                        <th>TIME</th>
                    </tr>
                    <tr>
                        <td>$12.00</td>
                        <td>1/13/17</td>
                        <td>19:30</td>
                    </tr>
                </table>
                </div>

                <div class="serial">
                    <table class="barcode"><tr></tr></table>
                    <table class="numbers">
                        <tr>
                            <td>9</td>
                            <td>1</td>
                            <td>7</td>
                            <td>3</td>
                            <td>7</td>
                            <td>5</td>
                            <td>4</td>
                            <td>4</td>
                            <td>4</td>
                            <td>5</td>
                            <td>4</td>
                            <td>1</td>
                            <td>4</td>
                            <td>7</td>
                            <td>8</td>
                            <td>7</td>
                            <td>3</td>
                            <td>4</td>
                            <td>1</td>
                            <td>4</td>
                            <td>5</td>
                            <td>2</td>
                        </tr>
                    </table>
                </div>
            </div>


            ' ;
            return $ticket;
    }
    function notifications_count($user_id){
        global $database;


        $query1 = "SELECT * FROM notifications_forum_posts_comments where user_notification_id = $user_id ";
        $search_query= $database->query_array($query1);
        $notes_number1=mysqli_num_rows($search_query);

        $query2 = "SELECT * FROM notifications_bookings where user_notification_id = $user_id ";
        $search_query2= $database->query_array($query2);
        $notes_number2=mysqli_num_rows($search_query2);

        $notes_all = $notes_number2 + $notes_number1;

        echo  $notes_all;

    }
    function renderTimesMovie() {
        global $database;
        global $connection;

        if(isset($_GET["movie"])) {
            $movie_id = $_GET["movie"];
            $query = "SELECT * from movies_time_tables where movie_id = $movie_id";
            $select_times = $database->query_array($query);

            while($row = mysqli_fetch_assoc($select_times)) {
                $time_id = $row["time_id"];

                $query2 = "SELECT * from time_tables where time_id = $time_id";
                $select_times2 = $database->query_array($query2);

                while($row2 = mysqli_fetch_assoc($select_times2)) {
                    $time = $row2["time"];
                    $trimmed_time = substr($time, 0, 5);
                    echo '
                        <div class="select-booking screen-card-select col-custom" data-time="' . $trimmed_time . '">
                            <div class="screen-card-info col-custom">
                                <span class="time-screen">' . $trimmed_time . '</span>
                            </div>
                            <button class="button-custom book-screen">Select</button>
                        </div>
                        ';
                }
            }
        }
    }

    function get_selected_movie_genres_array_by_movie_id($movie_id) {
            global $database;
            $genres = [];
            // Use a JOIN to fetch genres in a single query
            $query = "
                SELECT g.name
                FROM movies_genres mg
                JOIN genres g ON mg.genre_id = g.id
                WHERE mg.movie_id = $movie_id
            ";

            $result = $database->query_array($query);

            if (!empty($result)) {
                foreach ($result as $row) {
                    $genres[] = $row['name'];
                }
            }


            // Start with an empty string for genres
            $genres_list = '';

            // Loop through the genres and concatenate them into a string
            foreach ($genres as $genre) {
                $genres_list .= '<a class="genre_link"href="category.php?category='.$genre.'"> <span class="genre_card ">'.$genre.'</span></a> ';
            }


        // Return the genres as a comma-separated string, or return an empty string if no genres
        return $genres_list;
    }

    function display_user_name_by_id(){

        global $connection;
        global $database;
        if(isset($_GET["id"])) {

            $user_id = $_GET["id"];

            $query = "SELECT * FROM users where user_id = $user_id ";
            $result = $database->query_array($query);
            while($row = mysqli_fetch_array($result )) {
                $user_name = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                echo "$user_name $user_lastname's ";
            }
        }

    }
    function display_all_users($limit, $start){
        global $connection;
        global $database;


        $query = "SELECT * FROM users limit $limit offset $start";
        $search_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($search_query)) {
            $user_id = $row["user_id"];
            $user_name = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_img = $row["user_img"];
            $user_twitter =  $row["user_twitter"];
            $user_facebook =  $row["user_facebook"];
            $user_linkedin =  $row["user_linkedin"];
            $user_occupation =  $row["user_occupation"];

            echo '
                <div class="user_card">

                    <div class="user_img_name_container_Card col-custom">
                        <div class="col-custom">
                            <a href="user.php?id='.$user_id.'">
                                <img class="user_card_img" src="./imgs/users_avatars/'.$user_img.'" alt="">
                                <h5>'.$user_name.' '.$user_lastname.'</h5>
                                <span class="cards-user-occpuation">'.$user_occupation.'</span>
                            </a>
                        </div>

                        <div class="col-custom">

                            <div class="user_links row-custom">
                                <a target="_blank" href="'.htmlspecialchars($user_facebook).'">
                                    <img class="fb_icon_card" src="./imgs/icons/facebook.svg">
                                </a>
                                <a target="_blank" href="'.htmlspecialchars($user_linkedin).'">
                                    <img src="./imgs/icons/linkedin.svg">
                                </a>
                                <a target="_blank" href="'.htmlspecialchars($user_twitter).'">
                                    <img src="./imgs/icons/twitter.svg">
                                </a>

                            </div>

                        </div>
                    </div>
                </div>';


        }



    }
    function user_redirect(){
        // redirect to home page if there is no post number
        if(isset($_GET["id"])) {
            global $connection;
            $user_id = $_GET["id"];
            $query = "SELECT * FROM users where user_id = $user_id ";
            $search_post = mysqli_query($connection, $query);
            $num_users = mysqli_num_rows($search_post);
            if($num_users==0) {
                header("Location: ./users.php");
            }

        } else {
            // redirect to home page if no post number provided

            header("Location: ./users.php");
        }
    }
    function forum_post_redirect(){
        // redirect to home page if there is no post number
        if(isset($_GET["id"])) {
            global $connection;
            $post_id = $_GET["id"];
            $query = "SELECT * FROM forum_posts where id = $post_id ";
            $search_post = mysqli_query($connection, $query);
            $num_posts = mysqli_num_rows($search_post);
            if($num_posts==0) {
                header("Location: ./index.php");
            }

        } else {
            // redirect to home page if no post number provided

            header("Location: ./index.php");
        }
    }
    function display_forum_posts_main($limit, $offset){
        global $connection;
        global $database;


        $query = "SELECT * FROM forum_posts order by  post_date desc limit $limit offset $offset ";
        $search_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($search_query)) {
            $post_id = $row["id"];
            $post_title    = $row['post_title'];
            $post_text   = substr($row['post_text'], 0, 36);
            $post_user_id   = $row['post_user_id'];
            $post_date       = $row['post_date'];
            $post_img       = $row['post_img'];
            $post_year = substr($post_date, 0, 10);
            $post_time = substr($post_date, 11);

            $query_num_rows = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id");
            $post_num_comments=mysqli_num_rows($query_num_rows);

            $query_select_user = $database->query_array("SELECT * FROM users where user_id = $post_user_id");
            while($row = mysqli_fetch_assoc($query_select_user)) {
                $user_id = $row["user_id"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_img = $row["user_img"];
                $user_occupation =  $row["user_occupation"];
                $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_occupation, $user_id );




            }
            echo '

            <div class="forum-card-post col-custom">
                <a class="forum-post-img" href="forum_post.php?id='.$post_id.'">
                    <img src="'.$post_img.'" alt="">
                </a>
                <div class="forum-container-text col-custom">


                    <div class="fourm-user-container row-custom ">

                        <div class="forum-user-profile row-custom trigger_avatar">

                            <img class="forum-user-profile-img" src="imgs/users_avatars/'.$user_img.'" alt="">
                            <span class="forum-user-name">'.$user_firstname.' ' .$user_lastname.'</span>'
                            .$user_label.'
                        </div>



                    </div>


                    <h5>'.$post_title.'</h5>

                    <div class="post-reply-counter row-custom">
                            <div class="col-custom">
                                <span class="date-label-post">'. $post_year .'</span>
                                <span class="date-label-post">'. $post_time .'</span>

                            </div>

                            <div>
                                <img class="forum-post-comment-img"src="imgs/icons/comment.svg" alt="">
                                <span class="post-reply-counter-number">'.$post_num_comments.'</span>

                            </div>


                    </div>


                </div>

            </div>
        ';
        }



    }
    function validate_user_registration_public() {
        $errors = [];
        $min = 3;
        $max = 26;

        if(isset($_POST['create_user_main'])){

            global $connection;

            $user_firstname= trim($_POST["reg_user_name"]);
            $user_lastname= trim($_POST["reg_user_surname"]);
            $user_password= trim($_POST["reg_user_password"]) ;
            $password_confirmed= trim($_POST["reg_user_password_confirmation"]) ;
            $user_email =trim($_POST["reg_user_email"]) ;
            $email_confirmation =trim($_POST["reg_user_email_confirmation"]) ;

            // setting up default values for user
            $user_role  = "user";
            $post_image="default-avatar.jpg";

            $destination_img_upload = "../public/imgs/users_avatars/$post_image";


            $query_email = "SELECT * from users where user_email = '$user_email'";

            $query_email_check = mysqli_query($connection, $query_email);

            if(mysqli_num_rows($query_email_check)>=1) {
                $errors[] = "Account with $user_email email already exists";
            }



            if(strlen($user_firstname)<=$min) {

                $errors[] = "Your username is too short, should be longer than $min characters";
            }
            if(strlen($user_firstname)>=$max) {

                $errors[] = "Your username is too long, should be shorter than $max characters";
            }

            if(strlen($user_lastname)<=$min) {

                $errors[] = "Your lastname is too short, should be longer than $min characters";
            }
            if(strlen($user_lastname)>=$max) {

                $errors[] = "Your lastname is too long, should be shorter than $max characters";
            }
            if(strlen($user_email)>=$max) {

                $errors[] = "Your email is too long, should be shorter than $max characters";
            }

            if(strlen($user_email)<=$min) {

                $errors[] = "Your lemail is too short, should be longer than $min characters";
            }
            if($user_email!== $email_confirmation) {
                $errors[] = "Your email does not match the confirmation email";
            }

            if($user_password!== $password_confirmed) {
                $errors[] = "Your password does not match the confirmation password";
            }

            if(!empty($errors)) {
                foreach ($errors as $error) {
                    echo "

                    <div class='alert alert-danger col-lg-12 text-center mx-auto' role='alert'>
                        $error
                    </div>
                    <br>";
                }
            }

            if(empty($errors)) {
                $status = "false";

                // if no uploaded image give it default image
                if($post_image ===""){
                    $post_image="default-avatar.jpg";
                }

                move_uploaded_file($post_image_temp, $destination_img_upload );

                $query = "INSERT INTO users (user_firstname, user_lastname, user_role, user_email, user_password, user_img ) ";
                $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$user_email}', '{$user_password}', '{$post_image}')";



                $create_user_query = mysqli_query($connection, $query);

                if($create_user_query) {

                    echo  '<div class="alert alert-success col-lg-12 text-center mx-auto" role="alert">

                    </div>';
                }
            }
        }
    }

    function get_selected_movie_genres() {
        global $database;
        $genres = [];

        if (isset($_GET["movie"])) {
            $movie_id = intval($_GET["movie"]);

            // Use a JOIN to fetch genres in a single query
            $query = "
                SELECT g.name
                FROM movies_genres mg
                JOIN genres g ON mg.genre_id = g.id
                WHERE mg.movie_id = $movie_id
            ";

            $result = $database->query_array($query);


            if (!empty($result)) {
                foreach ($result as $row) {
                    $genres[] = '<a href="category.php?category='.$row['name'].'"><p class="genre_card">'.$row['name'].'</p> </a>';
                }
            }
        }

        // Return the genres as a comma-separated string, or return an empty string if no genres
        return !empty($genres) ? implode('', $genres) : '';
    }



function get_selected_movie_review_movie(){
    global $database;
    if(isset($_GET["movie"])) {
        $movie_id = $_GET["movie"];
        $query = "SELECT * from movies where id = $movie_id";
        $select_reviewed_movie = $database->query_array($query);
        while($row = mysqli_fetch_assoc($select_reviewed_movie)) {
            $movie_id = $row["id"];
            $movie_img = $row["poster"];
            $movie_title = $row["title"];
            echo '  <li class="movie-searched movie-searched-review row-custom movie-selected-movie-review" data-id="'.$movie_id.'">
            <h3> '.$movie_title.' </h3>
            <input required class="hidden-form-review-input"type="text" value='.$movie_id.'>
            <img class="search-movie-img"src="./'. $movie_img.' ">

            </li>';
        }
    }

}

function get_movie_rating($movie_id){
        global $database;
        $query = "SELECT * from reviews where movie_review_id = $movie_id";
        $select_reviewed_movie = $database->query_array($query);
        $number_rows = mysqli_num_rows($select_reviewed_movie);
        if($number_rows==0) return;
        while($row = mysqli_fetch_assoc($select_reviewed_movie)) {
            $rating = $row["review_rating"];
            $rating_list[] =  $rating;


        }
        $sum = array_sum($rating_list);
        $count_list = count($rating_list);
        $rating_list = $sum/$count_list;

        if( $rating_list>=7) {
            $rate_colour = "#12da12";
        }
        elseif ($rating_list<7 && $rating_list>=5) {
            $rate_colour = "#e6e671";
        }
        else {
              $rate_colour = "red";
        }
        return  '<div class="rating_container">Average users rating:  <span style="background-color:'.$rate_colour.'" class="movie_rating"> '.$rating_list.'/10</span> </div>';



}
function get_ticket_serial_number() {


    $number = '';
    for ($i = 0; $i <= 10; $i++) {
        $number .= mt_rand(0, 9);  // Use random_int for better randomness
    }
    return $number;
}



function renderNext7Days() {
    if(isset($_GET["movie"])) {
        $movie_id = $_GET["movie"];
    }
    $daysOfWeek = [];
    $today = new DateTime(); // Get today's date

    // Loop through the next 7 days
    for ($i = 0; $i < 7; $i++) {
        // Get the day name, day of the month, month, and year
        $dayName = $today->format('l'); // Full day name (e.g., "Thursday")
        $dayNumber = $today->format('jS'); // Day of the month with suffix (e.g., "26th")
        $day = $today->format('d'); // Numeric day (e.g., 26)
        $month = $today->format('m'); // Numeric month (e.g., 09)
        $year = $today->format('Y'); // Year (e.g., 2024)

        // Add to the result array
        $daysOfWeek[] = [
            'dayDisplay' => $dayName . ' ' . $dayNumber,
            'dataDay' => $day . '-' . $month . '-' . $year
        ];

        // Move to the next day for the next iteration
        $today->modify("+1 day");
    }

    // Output each day with the data-day attribute
    foreach ($daysOfWeek as $day) {
        echo
            '<div class="date_day select-booking" data-day="'.$day['dataDay'].'" data-movie-id="'.$movie_id.'">
                '.$day['dayDisplay'].'
            </div>';
    }
}





    function selected_movie_page($movie_title, $release_date, $movie_poster, $movie_desc, $movie_director,  $movie_age, $movie_id) {
        global $database;
        $rating = get_movie_rating($movie_id);
        $age_colour = "";
        if( $movie_age<=12) {
            $age_colour = "#12da12";
        }
        elseif ($movie_age>12 && $movie_age<=17) {
            $age_colour = "#e6e671";
        }
        else {
              $age_colour = "red";
        }
        $genres = get_selected_movie_genres();

        $html = '
              <div class="current-movie-wrapper row-custom">
                <div class="col-custom img-book-container-movie" >

                    <img class="selected_movie_image"src="./'.$movie_poster.' ">


                    <button data_movie_id="'.$_GET["movie"].'" class="button-custom book-button ">Book</button>

                </div>

                <div class="current-movie-desc-container white-text col-custom">
                <div>
                    <h1 class="selected_movie_title ">'.$movie_title.'</h1>
                    <span class="selected_movie_director"> Directed by ' .$movie_director.'</span> <br>
                      <span class="movie_selected_age" style="background-color:'.$age_colour.'" >' .$movie_age.' +</span> <br>
                    <div class="movie-details row-custom">
                        <span>'.$release_date.'</span>
                    </div>
                    <div class="selected-movie-genres-container">
                        '.$genres.'<br>
                    </div>


                    '.$rating.'


                </div>







                <p class="movie-desc">
                    '.$movie_desc.'
                </p>
            </div>
            </div>
        ';

        return $html;
    }

    function card_movies($title, $img, $date,$movie_id) {
        $html = '
            <div class="movie-card movie-card-trending">
                <img class="card-movie-img" src="./' . $img . '" alt=' . $title . '">
                <div class="text-container card-info">
                    <p class="card-movie-title">' . $title . '</p>
                    <p class="card-movie-date">'. $date .'</p>
                    <p class="card-movie-age">6+</p>
                    <a href="movie.php?movie='.$movie_id.'">
                        <button class="button-custom">Book</button>
                    </a>
                </div>
            </div>
        ';

        return $html;
    }

    function card_movies_popular($title, $img, $date, $movie_id) {
        $html = '

                <div class="movie-card movie-card-detailed " data-id='.$movie_id.'>
                    <img class="card-movie-img-popular" src="./'.$img.'">
                    <div class="text-container ">
                        <p>'.$title.'</p>

                        <a href="movie.php?movie='.$movie_id.'">
                            <button class="button-custom">Book</button>
                        </a>
                    </div>

                </div>
        ';

        return $html;
    }
    function get_catgeory_page(){
        global $database;

        if (isset($_GET["category"])) {
            $category_name = $_GET["category"];
            $query = $database->query_array("SELECT * FROM genres WHERE name = '".$category_name."'");

            while ($row = mysqli_fetch_array($query)) {
                $category_desc = $row["desc"];
                $category_img = $row["category_img"];
            }

            echo '
            <div class="movie-section-current">
                <div class="background-section-current-movie category_background" style="background-image: url(\''.$category_img.'\');">
                </div>
                <div class="hero-text hero-text-cat">
                    <h3 class="text-big">'.$category_name.' Movies</h3>
                    <p class="text-mid">'.$category_desc.'</p>

                </div>
            </div>';

        }

        if (isset($_GET["subcategory"])) {
            $category_name = $_GET["subcategory"];
            $query = $database->query_array("SELECT * FROM kinds WHERE name = '".$category_name."'");

            while ($row = mysqli_fetch_array($query)) {
                $category_desc = $row["desc"];
                $category_img = $row["kinds_img"];
            }

            echo '
            <div class="movie-section-current">
                <div class="background-section-current-movie category_background" style="background-image: url(\''.$category_img.'\');">
                </div>
                <div class="hero-text hero-text-cat">
                    <h3 class="text-big">'.$category_name.' Movies</h3>
                    <p class="text-mid">'.$category_desc.'</p>
                    <button class="button-custom">Sign up</button>
                </div>
            </div>';

        }
    }
    function get_gallery_images(){
        global $database;
        $query = $database-> query_array("SELECT * from gallery");
        while ($row = mysqli_fetch_array($query)) {
            $image_name = $row["image_name"];
            $image_title = $row["image_title"];
            echo '<a href="./imgs/gallery_cinema/'.$image_name.'" data-fancybox="gallery" data-caption="'.$image_title.'" data-fancybox-index="0">
                <img src="./imgs/gallery_cinema/'.$image_name.'" />
            </a>';
        }
    }
    function get_selected_movie() {
        global $database;
        if (isset($_GET["movie"])) {
            $movie_id = $_GET["movie"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id");
            while ($row = mysqli_fetch_array($query)) {
                $movie_title = $row["title"];
                $movie_poster = $row["poster"];
                $movie_age = $row["age"];
                $release_date = substr($row["year"], 0, 4);
                $movie_id = $row["id"];
                $movie_desc  = $row["description"];
                $movie_director  = $row["director"];
                echo  selected_movie_page($movie_title, $release_date, $movie_poster, $movie_desc, $movie_director,  $movie_age, $movie_id);
            }

        }

    }

    function movie_booking_redirect(){
        if(!isset($_POST["submit_booking"])) {
            $movie_id = $_GET["movie"];
             header('Location: movie.php?movie='.$movie_id.'');
         }
    }
    function get_selected_movie_name() {
        global $database;
        if (isset($_GET["movie"])) {
            $movie_id = $_GET["movie"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id");
            while ($row = mysqli_fetch_array($query)) {
                $movie_title = $row["title"];

                echo $movie_title;
            }

        }

    }
    function get_selected_movie_img() {
        global $database;
        if (isset($_GET["movie"])) {
            $movie_id = $_GET["movie"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id");
            while ($row = mysqli_fetch_array($query)) {
                $movie_poster = $row["poster"];

                echo $movie_poster;
            }

        }

    }

    function get_selected_movie_trailer() {
        global $database;
        if (isset($_GET["movie"])) {
            $movie_id = $_GET["movie"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id");
            while ($row = mysqli_fetch_array($query)) {
                $movie_trailer_link = $row["trailer_link"];

                echo '  <iframe class="selected-popular-movie-trailer"width="100%"
                    height="100%"
                    src="'.$movie_trailer_link .'"
                    title="YouTube video player" frameborder="0" allow="accelerometer;
                    autoplay; clipboard-write; encrypted-media; gyroscope;
                    picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>';
            }

        }

    }

    function get_movies_of_genres_by_movie_id() {
        if (isset($_GET["movie"])) {
            $movie_id = intval($_GET["movie"]);  // Sanitize input by converting it to an integer

            global $database;
            global $connection;
            // $query =  $database-> query_array("SELECT * from movies_genres where movie_id =  $movie_id");


            // while ($row = mysqli_fetch_array($query)) {
            //     $genres_id = $row["genres_id"];

            //     $query2 =  $database-> query_array("SELECT * from movies_genres where genre_id = $genres_id ");
            //     while ($row = mysqli_fetch_array($query2)) {
            //         $movie_id_query = $row["movie_id"];
            //         $query3 =  $database-> query_array("SELECT * from movies where id = $movie_id_query ");



            // Single SQL query to replace the nested queries
            $query = "
                SELECT DISTINCT  m.id, m.title, m.age, m.description, m.poster, m.trailer_link
                FROM movies m
                JOIN movies_genres mg ON m.id = mg.movie_id
                WHERE mg.genre_id IN (
                    SELECT genre_id FROM movies_genres WHERE movie_id = $movie_id
                )
                AND m.id != $movie_id";


            $result = $database->query_array($query);


            while ($row = mysqli_fetch_array($result)) {
                $movie_title = $row["title"];
                $movie_age = $row["age"];
                $movie_desc = $row["description"];
                $movie_id = $row["id"];
                $movie_poster = $row["poster"];
                $movie_trailer = $row["trailer_link"];


                echo movie_more_card($movie_id, $movie_desc, $movie_poster, $movie_title, $movie_age, $movie_trailer,   $movie_desc);
            }
        }
    }




    function get_genres_movies(){
        global $database;
        global $connection;
        $query =  $database-> query_array("select * from genres ORDER BY name ASC");

        while ($row = mysqli_fetch_array($query)) {
            $cat_title = $row["name"];

           echo  '<a class="catgory_box" href="category.php?category='.$cat_title.'">'.$cat_title.'</a>';


        }

    }

    function get_kinds_movies(){
        global $database;
        global $connection;
        $query =  $database-> query_array("select * from kinds ORDER BY name ASC");

        while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["name"];
            echo  '<a class="catgory_box" href="category.php?subcategory='.$movie_title.'">'.$movie_title.'</a>';


        }

    }
    function get_user_posts_number($user_id){
        global $connection;
        $query = "SELECT * FROM forum_posts where post_user_id = $user_id";
        $select_all_records = mysqli_query($connection, $query);
        $row_counts = mysqli_num_rows( $select_all_records);
        return $row_counts;
    }
    function get_user_reviews_number($user_id){
        global $connection;
        $query = "SELECT * FROM reviews where user_review_id = $user_id";
        $select_all_records = mysqli_query($connection, $query);
        $row_counts = mysqli_num_rows( $select_all_records);
        return $row_counts;
    }

    function movie_small_card($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer) {
        $html = '

            <div class="movie-card movie-card-detailed " data-id='.$movie_id.' data-trailer='.$movie_trailer.'>
                <img class="card-movie-img-popular lazy" data-src="./'.$movie_poster.'" src="./'.$movie_poster.'">
                <div class="text-container col-custom">
                    <p>'.$movie_title.'</p>
                     <p class="age_info">'.$movie_age.'+</p>

                </div>

            </div>

        ';

        return $html;
    }
    function movie_more_card($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer ) {
        $genres = get_selected_movie_genres_array_by_movie_id($movie_id);
        $html = '
            <div class="card-layout-more-card">
            <div class="movie-card-more movie-card-expandable" data-id='.$movie_id.'>
                <img class="card-cross-expendable card-movie-hidden-info"  src="./imgs/icons/cross.svg" alt="">
                <img class="card-movie-img lazy" data-src="./'.$movie_poster.'" alt="">
                <div class="text-container card-info more-card-info">
                    <div class="title_age_container">
                        <p class="card-movie-title">'.$movie_title.'</p>
                        <p class="age_info">'.$movie_age .'+</p>
                    </div>

                    <p class="card-movie-genres card-movie-hidden-info">'.$genres.'</p>
                    <button class="button-custom trigger-more-info-button">Book</button>
                    <a href="movie.php?movie='.$movie_id.'" class=" movie-link card-movie-hidden-info">Book</a>
                    <p class="card-movie-desc  card-movie-hidden-info">'.$movie_desc.'</p>
                </div>
            </div>
            </div>
            ';
        return $html;
    }



    function movie_big_card($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer ) {
       $genres = get_selected_movie_genres_array_by_movie_id($movie_id);

        $movie_card = '
                  <div class="card-layout-trending-card">
                    <div class="movie-card movie-card-trending movie-card-expandable" data-id="'.$movie_id.'">
                        <img class="card-cross-expendable card-movie-hidden-info"  src="./imgs/icons/cross.svg" alt="">
                        <img class="card-movie-img lazy"  data-src="./'.$movie_poster.'"  alt="">
                            <div class="text-container card-info">
                               <div class="title_age_container">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="age_info">'.$movie_age.'+</p>
                                </div>
                                <p class="card-movie-genres card-movie-hidden-info">'.$genres.'</p>
                                <button class="button-custom trigger-more-info-button">Book</button>
                                <a href="movie.php?movie='.$movie_id.'" class=" movie-link card-movie-hidden-info">Book</a>
                                <p class="card-movie-desc  card-movie-hidden-info">'.$movie_desc.'</p>


                            </div>
                    </div>
                </div>
            ';

        return $movie_card;
    }
    function get_user_comments(){
        global $database;
        global $connection;

        if(isset($_GET["id"])) {
            $user_id = $_GET["id"];

            $query = "SELECT * FROM reviews where user_review_id = $user_id order by review_date desc  ";
            $search_query = mysqli_query($connection, $query);
            if(mysqli_num_rows($search_query) ==0) {
                echo '<div class="alert alert-secondary" role="alert">
                    No users reviews found
                    </div>';
                return;
            }
            while($row = mysqli_fetch_array($search_query)) {
                $review = $row["review"];
                $movie_review_id = $row["movie_review_id"];
                $user_review_id = $row["user_review_id"];
                $review_date = $row["review_date"];
                $review_rating = $row["review_rating"];
                $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id");

                while ($row = mysqli_fetch_array($query2)) {
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_poster = $row["poster"];

                }

                $query3 = $database-> query_array("SELECT * from users where user_id = $user_id");

                while ($row = mysqli_fetch_array($query3)) {

                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_img = $row["user_img"];
                }
                echo ' <div class="review-card-layout">
                    <div class="review-card row-custom vetical-scroll-grab-class">

                        <p class="review_rating">'.$review_rating.'/10</p>
                        <div  class="screen-up-review" alt="">
                               <img  src="./imgs/icons/zoom-in.svg" >
                        </div>

                        <a href="movie.php?movie='.$movie_id.'">
                            <img  class="movie-img-review" src="./'.$movie_poster.'" alt="">
                        </a>
                        <div class="desc-container-review col-custom">
                            <h5>'.$movie_title.'</h5>
                            <div class="user-profile-container row-custom">
                                <div class="trigger_avatar">
                                    <div class="row-custom user-profile-container">
                                        <img src="./imgs/users_avatars/'.$user_img.'" alt="">

                                        <p>'.$user_firstname.' '.$user_lastname.'</p>
                                    </div>

                                </div>
                            </div>
                            <p class="review_text_card">"'.$review.'"</p>


                        </div>

                        </div>
                    </div>';
            }

        }


    }


    // function defaultModal($text) {
    //     echo ' <div class="modal-forum-posts_delete modal">
    // <div class="col-custom">
    // <img class="modal-tick" src="./imgs/icons/tick.svg" alt="">
    // <h5>Your post has been successfully'.$text.' <br> <b>


    // <button class="button-custom button-post-added">
    //   OK
    // </button>

    // </div>
    // </div>
    // ';
    // }
    function get_user_forum_posts(){
        global $database;
        global $connection;

        if(isset($_GET["id"])) {
            $user_id = $_GET["id"];

            $query = "SELECT * FROM forum_posts where post_user_id = $user_id order by post_date desc  ";
            $search_query = mysqli_query($connection, $query);
            if(mysqli_num_rows($search_query) ==0) {
                echo '<div class="alert alert-secondary" role="alert">
                    No users posts found
                    </div>';
                return;
            }
            while($row = mysqli_fetch_array($search_query)) {
                $post_id = $row["id"];
                $post_title    = $row['post_title'];
                $post_text   = substr($row['post_text'], 0, 36);
                $post_user_id   = $row['post_user_id'];
                $post_date       = $row['post_date'];
                $post_img       = $row['post_img'];

                $query_select_user = $database->query_array("SELECT * FROM users where user_id = $user_id");
                while($row = mysqli_fetch_assoc($query_select_user)) {
                $user_id = $row["user_id"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_img = $row["user_img"];
                $user_occupation =  $row["user_occupation"];
                $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_occupation, $user_id );


                echo '

                    <div class="forum-card-post forum-card-post-all col-custom">
                        <a class="forum-post-img" href="forum_post.php?id='.$post_id.'">
                            <img  src="'.$post_img.'" alt="">
                        </a>
                        <div class="forum-container-text col-custom">
                                <div class="forum-user-profile row-custom trigger_avatar">

                                    <img class="forum-user-profile-img" src="imgs/users_avatars/'.$user_img.'" alt="">
                                    <span class="forum-user-name">'.$user_firstname.' ' .$user_lastname.'</span>'
                                    .$user_label.'

                                </div>
                                <h5>'.$post_title.'</h5>

                                <div class="fourm-user-container row-custom">




                                    <div class="post-reply-counter row-custom">
                                        <span class="date-label-post">'. $post_date .'</span>
                                        <div>
                                            <img class="forum-post-comment-img"src="imgs/icons/comment.svg" alt="">
                                            <span class="post-reply-counter-number">2</span>

                                        </div>


                                    </div>

                                </div>
                        </div>

                </div>
                ';;
            }

        }
    }


    }
    function hero_section_slider_card($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age,
        $movie_trailer, $number_card, $movie_date){
        $slider_card = '<article class="card more" data-id="'.$number_card.'">
        <img src="'.$movie_poster.'"/>

        </article>';
        return $slider_card;
    }
    function hero_section_slider_card_info($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer, $number_card, $movie_date ){
        $rating = get_movie_rating($movie_id);
        $slider_card = '


            <a  target="_blank" href="movie.php?movie='.$movie_id.'">
            <div class="detail-item" data-id="'.$number_card.'">
					<img src="'.$movie_poster.'" alt="Detail Image '.$number_card.'" class="main-img"/>
					<div class="detail-content">
                        <div class="row-custom">
                            <h3>'.$movie_title.' </h3>


                            <h3>('.$movie_date.')</h3>


                        </div>




                        <p>'.$movie_age.'+</p>
                        '.$rating.'
						<p>'. $movie_desc.'</p>



					</div>

		    </div>  </a>  ';
        return $slider_card;
    }

    function get_selected_movie_ticket_price(){

        if(isset($_GET["movie"])) {
            global $connection;
            $movie_id= $_GET["movie"];
            $query2 = "SELECT * from tickets where ticket_movie_id = $movie_id";
            $select_genres_query = mysqli_query($connection, $query2);
            while($row = mysqli_fetch_assoc($select_genres_query)) {

                $ticket_price = $row["ticket_price"];
               echo intval($ticket_price);
            }
        }
    }

    function get_movies_hero_section($type_movies, $card_type) {
        $age_limit = user_logged_age_movies_selection();
        global $database;
        global $connection;
        // SELECT ONLY MOVIES WITH RATING 8 PLUS
        $query = $database->query_array("
        SELECT
            movies.age,
            movies.title,
            movies.description,
            movies.id,
            movies.poster,
            movies.trailer_link,
            movies.year,
            reviews.review_rating,
            reviews.movie_review_id
        FROM movies
        INNER JOIN reviews ON movies.id = reviews.movie_review_id
        WHERE movies.age <= $age_limit
        AND reviews.review_rating >= 8


    ");


        $num_rows = mysqli_num_rows($query);
        $number_card = 1; // Initialize counter for cards
        while ($row = mysqli_fetch_array($query)) {




            $movie_title = $row["title"];
            $movie_age =  $row["age"];
            $movie_desc = $row["description"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            $movie_trailer = $row["trailer_link"];
            $movie_date = substr($row["year"],0,4);

            echo $card_type($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer, $number_card,  $movie_date );
            $number_card++; // Increment the card counter
        }
    }


    function get_kinds_movies_cards($type_movies, $card_type) {
        $age_limit = user_logged_age_movies_selection();
        global $database;
        global $connection;

        $query = $database->query_array("SELECT movies.age, movies.title, movies.description, movies.id, movies.poster, movies.trailer_link FROM movies INNER JOIN
        movies_kinds ON movies.id = movies_kinds.movie_id INNER JOIN kinds ON
        movies_kinds.movie_kind_id = kinds.id WHERE kinds.name ='$type_movies' and movies.age <= $age_limit");

        while ($row = mysqli_fetch_array($query)) {





            $movie_title = $row["title"];
            $movie_age =  $row["age"];
            $movie_desc = $row["description"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            $movie_trailer = $row["trailer_link"];
            echo $card_type($movie_id, $movie_desc,  $movie_poster, $movie_title,  $movie_age, $movie_trailer );
        }
    }


    function get_categories_movies_cards(){
        global $database;
        global $connection;
        $age_limit = user_logged_age_movies_selection();
        if (isset($_GET["category"])) {
            $movie_cat = $_GET["category"];
            $query =  $database-> query_array( "SELECT movies.title, movies.id, movies.poster, movies.year , movies.age, movies.description  FROM movies INNER JOIN
            movies_genres ON movies.id = movies_genres.movie_id INNER JOIN genres ON
            movies_genres.genre_id = genres.id WHERE genres.name ='$movie_cat' and movies.age <= $age_limit");

            while ($row = mysqli_fetch_array($query)) {
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_poster = $row["poster"];
                    $movie_release_date = $row["year"];
                    $movie_age = $row["age"];
                    $movie_desc = $row["description"];
                    $genres = get_selected_movie_genres_array_by_movie_id($movie_id);
                    echo '
                    <div class="card-layout-more-card">
                    <div class="movie-card movie-card-more movie-card-expandable" data-id="'.$movie_id.'">
                        <img class="card-cross-expendable card-movie-hidden-info"  src="./imgs/icons/cross.svg" alt="">
                        <img  class="card-movie-img" src="./'.$movie_poster.'" alt="">
                            <div class="text-container card-info">
                               <div class="title_age_container">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="age_info">'.$movie_age.'+</p>
                                </div>
                                <p class="card-movie-genres card-movie-hidden-info">'.$genres.'</p>
                                <button class="button-custom trigger-more-info-button">Book</button>
                                <a href="movie.php?movie='.$movie_id.'" class=" movie-link card-movie-hidden-info">Book</a>
                                <p class="card-movie-desc  card-movie-hidden-info">'.$movie_desc.'</p>


                            </div>
                        </div>
                    </div>
                ';

            }

        }
        if (isset($_GET["subcategory"])) {
            $movie_subcat = $_GET["subcategory"];
            $query =  $database-> query_array( "SELECT movies.title, movies.id, movies.poster, movies.year , movies.age, movies.description  FROM movies INNER JOIN
            movies_kinds ON movies.id = movies_kinds.movie_id INNER JOIN kinds ON
            movies_kinds.movie_kind_id = kinds.id WHERE kinds.name ='$movie_subcat'");

            while ($row = mysqli_fetch_array($query)) {
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_poster = $row["poster"];
                    $movie_release_date = $row["year"];
                    $movie_age = $row["age"];
                    $movie_desc = $row["description"];
                    $genres = get_selected_movie_genres_array_by_movie_id($movie_id);

                    echo '
                    <div class="card-layout-more-card">
                   <div class="movie-card movie-card-more movie-card-expandable" data-id="'.$movie_id.'">
                        <img class="card-cross-expendable card-movie-hidden-info"  src="./imgs/icons/cross.svg" alt="">
                        <img  class="card-movie-img" src="./'.$movie_poster.'" alt="">
                            <div class="text-container card-info">
                               <div class="title_age_container">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="age_info">'.$movie_age.'+</p>
                                </div>
                                <p class="card-movie-genres card-movie-hidden-info">'.$genres.'</p>
                                <button class="button-custom trigger-more-info-button">Book</button>
                                <a href="movie.php?movie='.$movie_id.'" class=" movie-link card-movie-hidden-info">Book</a>
                                <p class="card-movie-desc  card-movie-hidden-info">'.$movie_desc.'</p>


                            </div>
                        </div>
                    </div>
                ';

            }

        }
    }




    function render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_review_id ){
        $user_label =   '
            <div class="hiddenLabel">
            <div class="row-custom label-container-profile">
                <img src="./imgs/users_avatars/'.$user_img.'" alt="">
                <div class="col-custom label-user-details">
                    <p>'.$user_firstname.' '.$user_lastname.'</p>
                    <span>'.$user_prof.'</span>

                </div>



            </div>
            <a class="label-profile-link" href="user.php?id='.$user_review_id.'">
                View profile
            </a>

        </div>
    ';
    return $user_label;


    }

    function user_logged_age_movies_selection() {
        global $session;
        global $user;

        if ($session->signed_in == true) {
            $logged_user_age = (int) $user->user_age;
        } else {
            $logged_user_age = 9999;
        }

        return (int) $logged_user_age;
    }

    function get_render_reviews($limit, $start){
        global $connection;
        global $database;

        $age_limit = user_logged_age_movies_selection();

        $query = "SELECT * FROM reviews order by review_date desc limit $limit offset $start ";
        $search_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($search_query)) {
            $review = $row["review"];
            $movie_review_id = $row["movie_review_id"];
            $user_review_id = $row["user_review_id"];
            $review_date = $row["review_date"];
            $review_rating = $row["review_rating"];

            $review_date_year = substr($review_date, 0,10);
            $review_date_time = substr($review_date,11);

            $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id AND age <= $age_limit");
            $search_count = mysqli_num_rows($query2);
            if ($search_count>=1) {
                while ($row = mysqli_fetch_array($query2)) {
                    $movie_id = $row["id"];
                    $movie_title = $row["title"];
                    $movie_poster = $row["poster"];

                }
                $query3 = $database-> query_array("SELECT * from users where user_id = $user_review_id");

                while ($row = mysqli_fetch_array($query3)) {
                    $user_id = $row["user_id"];
                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_img = $row["user_img"];
                    $user_prof= $row["user_occupation"];
                    $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_review_id);
                }
                echo '<div class="review-card-layout ">
                    <div class="review-card row-custom vetical-scroll-grab-class">

                        <p class="review_rating">'.$review_rating.'/10</p>
                        <div  class="screen-up-review" alt="">
                               <img  src="./imgs/icons/zoom-in.svg" >
                        </div>

                        <a href="movie.php?movie='.$movie_id.'">
                            <img  class="movie-img-review" src="./'.$movie_poster.'" alt="">
                        </a>
                        <div class="desc-container-review col-custom">
                            <h5>'.$movie_title.'</h5>
                            <div class="user-profile-container row-custom">
                                <div class="trigger_avatar">
                                    <div class="row-custom user-profile-container">
                                        <img src="./imgs/users_avatars/'.$user_img.'" alt="">

                                        <p>'.$user_firstname.' '.$user_lastname.'</p>
                                    </div>'.
                                    $user_label.'
                                </div>
                            </div>
                            <p class="review_text_card">"'.$review.'"</p>
                            <span class="review-date">'. $review_date_year.'</span>
                            <span class="review-date">'. $review_date_time.'</span>

                        </div>

                        </div>
                    </div>';
            }
            }



    }

    function get_selected_movie_reviews(){
        global $connection;
        global $database;

       if(isset($_GET["movie"])) {
        $movie_selected_id = $_GET["movie"];


        $query = "SELECT * FROM reviews where movie_review_id = $movie_selected_id order by review_date";
        $search_query = mysqli_query($connection, $query);
        if(mysqli_num_rows($search_query) ==0) {
            echo '<div class="alert alert-secondary" role="alert">
                No users reviews found
                </div>';
            return;
        }
        while($row = mysqli_fetch_array($search_query)) {
            $review = $row["review"];
            $movie_review_id = $row["movie_review_id"];
            $user_review_id = $row["user_review_id"];
            $review_date = $row["review_date"];
            $review_rating = $row["review_rating"];
            $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id");
            $search_count = mysqli_num_rows($query2);
            if ($search_count>=1) {
                while ($row = mysqli_fetch_array($query2)) {
                    $movie_id = $row["id"];
                    $movie_title = $row["title"];
                    $movie_poster = $row["poster"];

                }
                $query3 = $database-> query_array("SELECT * from users where user_id = $user_review_id");

                while ($row = mysqli_fetch_array($query3)) {
                    $user_id = $row["user_id"];
                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_img = $row["user_img"];
                    $user_prof= $row["user_occupation"];
                    $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_review_id);
                }
                echo '

              <div class="review-card-layout">
                    <div class="review-card row-custom vetical-scroll-grab-class">

                        <p class="review_rating">'.$review_rating.'/10</p>
                        <div  class="screen-up-review" alt="">
                               <img  src="./imgs/icons/zoom-in.svg" >
                        </div>

                        <a href="movie.php?movie='.$movie_id.'">
                            <img  class="movie-img-review" src="./'.$movie_poster.'" alt="">
                        </a>
                        <div class="desc-container-review col-custom">
                            <h5>'.$movie_title.'</h5>
                            <div class="user-profile-container row-custom">
                                <div class="trigger_avatar">
                                    <div class="row-custom user-profile-container">
                                        <img src="./imgs/users_avatars/'.$user_img.'" alt="">

                                        <p>'.$user_firstname.' '.$user_lastname.'</p>
                                    </div>'.
                                    $user_label.'
                                </div>
                            </div>
                            <p class="review_text_card">"'.$review.'"</p>


                        </div>

                        </div>
                    </div>';
            }
            }    }




    }



    function get_render_forum_posts($limit, $start){
        global $connection;
        global $database;

        $query = "SELECT * FROM forum_posts order by post_date desc limit $limit offset $start ";
        $search_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($search_query)) {
            $post_id_db    = $row['id'];
            $post_title_db    = $row['post_title'];
            $post_text_db   = substr($row['post_text'], 0, 90);
            $post_date_db        = $row['post_date'];
            $post_img_db        = $row['post_img'];
            $post_user_id        = $row['post_user_id'];
            $post_year = substr($post_date_db, 0, 10);
            $post_time = substr($post_date_db, 11);

            $query_num_rows = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id_db");
            $post_num_comments=mysqli_num_rows($query_num_rows);


            $query3 = $database-> query_array("SELECT * from users where user_id = $post_user_id");

            while ($row = mysqli_fetch_array($query3)) {
                $user_id = $row["user_id"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_img = $row["user_img"];
                $user_prof= $row["user_occupation"];
                $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_id);
            }
            echo '

              <div class="forum-card-post forum-card-post-all col-custom">
                        <a class="forum-post-img" href="forum_post.php?id='.$post_id_db.'">
                            <img src="'.$post_img_db.'" alt="">
                        </a>
                        <div class="forum-container-text forum-posts-all-text col-custom">
                                <div class="forum-user-profile row-custom trigger_avatar">

                                    <img class="forum-user-profile-img" src="imgs/users_avatars/'.$user_img.'" alt="">
                                    <span class="forum-user-name">'.$user_firstname.' ' .$user_lastname.'</span>'
                                    .$user_label.'

                                </div>
                                <h5>'.$post_title_db.'</h5>

                                <div class="fourm-user-container row-custom">




                                    <div class="post-reply-counter row-custom">
                                        <div class="col-custom">
                                            <span class="date-label-post">'. $post_year .'</span>
                                            <span class="date-label-post">'. $post_time .'</span>

                                        </div>
                                        <div>
                                            <img class="forum-post-comment-img"src="imgs/icons/comment.svg" alt="">
                                            <span class="post-reply-counter-number">'.$post_num_comments.'</span>

                                        </div>


                                    </div>

                                </div>
                        </div>

                </div>';
        }


    }



    function get_render_movie_reviews(){
        global $connection;
        global $database;
        if(isset($_GET["id"])) {
            $movie_id = $_GET["id"];
            $query = "SELECT * FROM reviews where movie_review_id= $movie_id order by review_date desc  ";
            $search_query = mysqli_query($connection, $query);
            if(mysqli_num_rows($search_query)<1) {
                echo '<div class="alert alert-secondary reviews_alert" role="alert">
                        no results
                        </div>';
                return;
            }

            while($row = mysqli_fetch_array($search_query)) {
                $review = $row["review"];
                $movie_review_id = $row["movie_review_id"];
                $user_review_id = $row["user_review_id"];
                $review_date = $row["review_date"];
                $review_rating = $row["review_rating"];

                $review_date_year = substr($review_date, 0,10);
                $review_date_time = substr($review_date,11);
                $query2 = $database-> query_array("SELECT * from movies where id = $movie_review_id");

                while ($row = mysqli_fetch_array($query2)) {
                    $movie_title = $row["title"];
                    $movie_poster = $row["poster"];
                }
                $query3 = $database-> query_array("SELECT * from users where user_id = $user_review_id");

                while ($row = mysqli_fetch_array($query3)) {
                    $user_id = $row["user_id"];
                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_img = $row["user_img"];
                    $user_prof= $row["user_occupation"];
                    $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_id);

                }
                echo '<div class="review-card row-custom">
                           <p class="review_rating">'.$review_rating.'/10</p>
                        <img class="movie-img-review" src="./'.$movie_poster.'" alt="">
                        <div class="desc-container-review col-custom ">
                            <h5>'.$movie_title.'</h5>
                            <div class="user-profile-container row-custom trigger_avatar">

                                <img src="./imgs/users_avatars/'.$user_img.'" alt="">

                                <p>'.$user_firstname.' '.$user_lastname.'</p>'
                                .$user_label.'

                            </div>
                            <p>"'.$review.'"</p>
                            <span class="review-date">'. $review_date_year.'</span>
                            <span class="review-date">'. $review_date_time.'</span>

                        </div>


                    </div>';
            }
        }



    }

    function get_render_user(){
        global $connection;
        global $database;
        if(isset($_GET["id"])) {
            $user_id = $_GET["id"];
            $query = "SELECT * FROM users where user_id = $user_id ";
            $search_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($search_query)) {
                $user_id = $row["user_id"];
                $user_name = $row["user_firstname"];
                $user_bio = $row["user_bio"];
                $user_lastname = $row["user_lastname"];
                $user_img = $row["user_img"];
                $user_twitter =  $row["user_twitter"];
                $user_facebook =  $row["user_facebook"];
                $user_linkedin =  $row["user_linkedin"];
                $user_occupation =  $row["user_occupation"];
                echo '<div class="user_container row-custom">
                    <div class="image-name-user col-custom">
                        <img class="users_profile_img"src="./imgs/users_avatars/'.$user_img.'">

                    </div>
                    <div class="image-bio col-custom">
                        <div class="col-custom card-user-occupation-name">
                            <h1 class="users_profile_name">'. $user_name.' '. $user_lastname.'</h1>
                            <h5 class="users_profile_occupation">'. $user_occupation.'</h5>
                             <img class="users_profile_img_mobile"src="./imgs/users_avatars/'.$user_img.'">
                        </div>

                        <p class="user-bio">'.
                            $user_bio.'

                        </p>


                        <div class="user_links user_links_get_user row-custom">

                            <div class="profile-socials-user">
                                 <a target="_blank" href="'.$user_facebook.'">
                                <img class="fb_icon"src="./imgs/icons/facebook.svg">
                                </a>
                                <a target="_blank" href="'.$user_linkedin.'">
                                    <img src="./imgs/icons/linkedin.svg">
                                </a>
                                <a target="_blank" href="'.$user_twitter.'">
                                <img src="./imgs/icons/twitter.svg">
                                </a>
                            </div>


                        </div>

                    </div>
                </div>
                      <div class="user-buttons-profile-container">
                                <a class="user_link" href="user.php?id='.$user_id.'&&source=all_posts">
                                    <button class="button-custom user-button">
                                        Users posts
                                    </button>
                                </a>

                                <a  class="user_link"href="user.php?id='.$user_id.'&&source=all_reviews">
                                    <button class="button-custom user-button">
                                        Users reviews
                                    </button>
                                </a>
                            </div>
                ';
            }


        }



    }


    function get_render_members(){
        global $connection;


        $query = "SELECT * FROM staff";
        $search_query = mysqli_query($connection, $query);
        $search_count = mysqli_num_rows($search_query);
        if(!$search_query) {
            die("Query Failed" . mysqli_error($connection));
        }
        if($search_count>=1) {
            while($row = mysqli_fetch_array($search_query)) {

                $staff_firstname = $row["staff_firstname"];
                $staff_lastname = $row["staff_lastname"];
                $staff_description = $row["staff_description"];
                $staff_vocation = $row["staff_vocation"];
                $staff_image = $row["staff_image"];

                echo '<div class="accordian-faq accordian-staff col-custom">
                <div class="row-custom">
                    <div class="member_details_container">
                        <p>'.$staff_firstname.' ' .$staff_lastname.'</p>
                        <p>'.$staff_vocation.'</p>
                        <img class="staff_image"src="./imgs/staff_images/'. $staff_image.'">
                    </div>


                    <span class="material-symbols-outlined addCordian">
                    add
                    </span>

                </div>

                <div class="content-faq">'.$staff_description.'
                </div>
            </div>';
        }}

    }

    function get_render_faq(){
        global $connection;


        $query = "SELECT * FROM faq";
        $search_query = mysqli_query($connection, $query);
        $search_count = mysqli_num_rows($search_query);
        if(!$search_query) {
            die("Query Failed" . mysqli_error($connection));
        }
        if($search_count>=1) {
            while($row = mysqli_fetch_array($search_query)) {
                $question = $row["question"];
                $answer = $row["answer"];

                echo '<div class="accordian-faq">
                <div class="row-custom">
                    <p>'.$question.'</p>

                    <span class="material-symbols-outlined addCordian">
                    add
                    </span>

                </div>

                <div class="content-faq">'.$answer.'
                </div>
            </div>';
        }}

    }
    function selected_post_literal($post_title, $post_id,$post_text, $post_img, $post_header, $post_date_trimmed){
        $recent_post = '

        <div class="news-recent-post posts-main-post col-custom col-100">
            <img class="post-image"src="./'.$post_img.' " alt="">
            <div class="news-post-desc">

                <h3 class="post-header">'.$post_header.'</h3>
                <div class="post-details-container row-custom">
                    <div class="post-author-date col-custom ">
                        <span>'.$post_date_trimmed.'</span>

                    </div>


                </div>

            </div>



            </div>
            <h5 class="post-desc-selected">'.$post_text.'</h5>';
        return $recent_post;
    }

    function recent_post_literal($post_title, $post_id, $post_text, $post_img, $post_header, $post_date,
        $number_comments_post){
        $recent_post = '
        <a href="post.php?post='.$post_id.'">

            <div class="news-recent-post posts-main-post col-custom col-100">
            <p class="post-title">'.$post_title.'</p>
            <img class="post-image"src="./'.$post_img.' " alt="">
            <div class="news-post-desc">

                <h3 class="post-header">'.$post_header.'</h3>
                <div class="post-details-container row-custom">
                    <div class="post-author-date col-custom ">
                        <span>'.$post_date.'</span>

                    </div>
                    <div class="row-custom posts-comments-container">
                        <img class="feedback-icon" src="./imgs/icons/feedback.svg" alt="">
                        <span>'.$number_comments_post.' comments</span>
                    </div>

                </div>
            </div>



            </div>
        </a>';
        return $recent_post;
    }

    function two_recent_post_literal($post_title, $post_id,$post_text, $post_img,
        $post_header, $post_date, $number_comments_post){
        $recent_post = '
            <a class="news-recent-post col-custom " href="post.php?post='.$post_id.'">
                <p class="post-title">'.$post_title.'</p>
                <div>

                    <img class="post-image"src="./'.$post_img.' " alt="">
                    <div class="news-post-desc">

                        <h3 class="post-header">'.$post_header.'</h3>
                        <div class="post-details-container row-custom">
                            <div class="post-author-date col-custom ">
                                <span>'.$post_date.'</span>

                            </div>
                            <div class="row-custom posts-comments-container">
                                <img class="feedback-icon" src="./imgs/icons/feedback.svg" alt="">
                                <span>'.$number_comments_post.' comments</span>
                            </div>

                        </div>
                    </div>



                </div>
            </a>';
        return $recent_post;
    }


    function category_card_literal($cat_title, $cat_img){
        $cat_card = '
            <a href="category.php?category='.$cat_title.'">
                <div class="category-card">
                    <h5 class="category_card_title">'.$cat_title.'</h5>
                    <img class="category_card_img"src="./'.$cat_img.' " alt="">

                </div>
            </a>
        ';
        return $cat_card;
    }
    function posts_literal($post_title, $post_id, $post_text, $post_img, $post_header, $post_date, $number_comments_post){
        $recent_post = '
            <a href="post.php?post='.$post_id.'">
             <div class="list-post-card col-custom col-100">
                <h3 class="post-header post-title-all">'.$post_title.'</h3>
                <img class="list-post-image"src="./'.$post_img.' " alt="">
                <div class="list-post-image-details col-custom">


                    <h3 class="post-header">'.$post_header.'</h3>
                    <div class="post-details-container row-custom">
                        <div class="post-author-date col-custom ">
                            <span>'.$post_date.'</span>

                        </div>
                        <div class="row-custom posts-comments-container">
                            <img class="feedback-icon" src="./imgs/icons/feedback.svg" alt="">
                            <span>'.$number_comments_post.' comments</span>
                        </div>

                    </div>
                </div>


            </div>
            </a>
            ';
        return $recent_post;
    }
    function likes_count($forumCommentId){
        global $connection;
        $query = "SELECT * FROM forum_comments_likes where forum_comment_id = $forumCommentId";
        $check_num_like_post = mysqli_query($connection, $query);
        $user_num_likes = mysqli_num_rows($check_num_like_post);
        return $user_num_likes;

    }

    function likeIconChange($comment_id){

        global $connection;
        global $user;
        global $session;
        if($session->signed_in==true) {
            $comment_user_id = $user->user_id;
            $to_be_liked = ' <img class="like-icon like-icon_num_'.$comment_id.'"src="./imgs/icons/thumbs-up-empty.svg">  ';
            $liked = '<img class="like-icon like-icon_num_'.$comment_id.'" src="./imgs/icons/thumbs-up-filled.svg">';

            $query1 = "SELECT * FROM forum_comments_likes where forum_comment_id = $comment_id AND user_liker_id =  $comment_user_id";
            $check_user_likes_query = mysqli_query($connection, $query1);
            $user_num_likes = mysqli_num_rows($check_user_likes_query);
            if($user_num_likes>=1) {
                return $liked;
            }
            else {
                return $to_be_liked;
            }
        }




    }
    function likes_count_news($forumCommentId){
        global $connection;
        $query = "SELECT * FROM news_comments_likes where news_comment_id = $forumCommentId";
        $check_num_like_post = mysqli_query($connection, $query);
        $user_num_likes = mysqli_num_rows($check_num_like_post);
        return $user_num_likes;

    }
    function likeIconChangeNews($comment_id){

        global $connection;
        global $user;
        global $session;
        if($session->signed_in==true) {
            $comment_user_id = $user->user_id;
            $to_be_liked = ' <img class="like-icon like-icon_num_'.$comment_id.'"src="./imgs/icons/thumbs-up-empty.svg">  ';
            $liked = '<img class="like-icon like-icon_num_'.$comment_id.'" src="./imgs/icons/thumbs-up-filled.svg">';

            $query1 = "SELECT * FROM news_comments_likes where news_comment_id = $comment_id AND user_liker_id =  $comment_user_id";
            $check_user_likes_query = mysqli_query($connection, $query1);
            $user_num_likes = mysqli_num_rows($check_user_likes_query);
            if($user_num_likes>=1) {
                return $liked;
            }
            else {
                return $to_be_liked;
            }
        }




    }
    function comment_literal($comment_text, $user_comment_name,  $user_comment_lastname, $user_avatar,  $comment_year, $comment_time,  $comment_user_id,  $comment_id, $post_id, $user_occupation ){
        $likes_count = likes_count($comment_id);
        $like_icon = likeIconChange($comment_id);

        global $session;
        global $user;
        $user_label = render_hidden_user_label($user_avatar, $user_comment_name, $user_comment_lastname, $user_occupation, $comment_user_id);
        // only display reply if user is logged in
        if($session->signed_in==true) {
        $user_reply = '<span class="replay" >Reply</span>';
        } else {$user_reply =  ' ';
        }

        // only display edit for users comments
        if($session->signed_in==true && $user->user_id == $comment_user_id ) {
            $edit_options = '<div class="comment_edit_label col-custom">
                <img class="edit_comment edit_comment_num_'.$comment_id.'"src="./imgs/icons/edit.svg">
                <div class="comment_options">

                    <span class="edit_comment_trigger" data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Edit </span>
                    <span class="delete_comment_trigger"data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Delete </span>
                </div>
            </div>';

        } else {
            $edit_options = ' ';
        }


        $comment = '
        	<li class="box_result row comment_window">'

                    .$edit_options.'
                    <div class="row-custom comment-user-profile">
                        <div class="avatar_comment col-md-1">
                            <div class="user-profile-container row-custom trigger_avatar">
                              <img class="comment_user_avatar" src="imgs/users_avatars/'.$user_avatar.' " alt="">
                            '.$user_label.'
                            </div>

                        </div>

                        <h4>'. $user_comment_name . ' '. $user_comment_lastname. '</h4>
                    </div>

                    <p class="comment_text">'.$comment_text .'</p>
                    <span class="comment_date">'.$comment_time.'</span>
                    <span class="comment_date">'.$comment_year.'</span>

                    <div class="tools_comment">
                        '. $user_reply.'
                        <a data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'" class="like " >'.$like_icon.'</a>

                       <span class="count_'.$comment_id.'">likes: '.$likes_count.'</span>


                    </div>
            </li>

            ';
        return $comment;
    }
    function comment_literal_news($comment_text, $user_comment_name,  $user_comment_lastname, $user_avatar,  $comment_year, $comment_time,  $comment_user_id,  $comment_id, $post_id, $user_occupation ){
        $likes_count = likes_count_news($comment_id);
        $like_icon = likeIconChangeNews($comment_id);

        global $session;
        global $user;
        $user_label = render_hidden_user_label($user_avatar, $user_comment_name, $user_comment_lastname, $user_occupation, $comment_user_id);
        // only display reply if user is logged in
        if($session->signed_in==true) {
        $user_reply = '<span class="replay" >Reply</span>';
        } else {$user_reply =  ' ';
        }

        // only display edit for users comments
        if($session->signed_in==true && $user->user_id == $comment_user_id ) {
            $edit_options = '<div class="comment_edit_label col-custom">
                <img class="edit_comment edit_comment_num_'.$comment_id.'"src="./imgs/icons/edit.svg">
                <div class="comment_options">

                    <span class="edit_comment_news_trigger" data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Edit </span>
                    <span class="delete_comment_news_trigger"data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'"> Delete </span>
                </div>
            </div>';

        } else {
            $edit_options = ' ';
        }


        $comment = '
        	<li class="box_result row comment_window">'

                    .$edit_options.'
                    <div class="row-custom comment-user-profile">
                        <div class="avatar_comment col-md-1">
                            <div class="user-profile-container row-custom trigger_avatar">
                              <img class="comment_user_avatar" src="imgs/users_avatars/'.$user_avatar.' " alt="">
                            '.$user_label.'
                            </div>

                        </div>

                        <h4>'. $user_comment_name . ' '. $user_comment_lastname. '</h4>
                    </div>

                    <p class="comment_text">'.$comment_text .'</p>
                    <span class="comment_date">'.$comment_time.'</span>
                    <span class="comment_date">'.$comment_year.'</span>

                    <div class="tools_comment">
                        '. $user_reply.'
                        <a data-comment-id="'.$comment_id.'" data-post-id = "'.$post_id.'" class="like_news " >'.$like_icon.'</a>

                       <span class="count_'.$comment_id.'">likes: '.$likes_count.'</span>


                    </div>
            </li>

            ';
        return $comment;
    }
    function recent_post_literal_main_page($post_title,  $post_id, $post_text, $post_img, $post_header, $post_date){
        $recent_post = '
              <a class="recent-post  row-custom" href="post.php?post='.$post_id.'">
                <h3 class="post-title">'.$post_title.'</h3>
                <img src="./'.$post_img.' " alt="">
                <div class="post-text">

                    <h3 class="post-header">'.$post_header.'</h3>
                    <p>'.$post_date.'</p>

                </div>


                </a>';
        return $recent_post;
    }
    function recent_posts_all_literal_main_page($post_title,  $post_id, $post_text, $post_img, $post_header, $post_date_trimmed){
        $recent_post = '
               <a class="post post-main row-custom" href="post.php?post='.$post_id.'">
                         <img class="posts_main_img"src="./'.$post_img.' " alt="">
                        <div class="post-text main-posts">
                            <p class="post-date">'.$post_date_trimmed.'</p>
                            <p class="post-header">'.$post_header.'</p>

                        </div>
                </a>';
        return $recent_post;
    }

    function recent_forum_posts_literal($post_title, $post_id, $post_text, $post_img, $user_img,  $post_year,  $post_time, $user_lastname,  $user_firstname){
        $recent_post = '
               <a class="forum_post row-custom" href="forum_post.php?id='.$post_id.'">
                        <img class="forum_posts_main_img"src="'.$post_img.' " alt="">
                        <div class="forum_post_text">
                            <img class="forum_posts_user_img"src="./imgs/users_avatars/'.$user_img.' " alt="">
                            <p class="post-header">'.$user_firstname.' '.$user_lastname.'</p>
                            <p class="post-header">'.$post_title.'</p>


                        </div>
                        <p class="post-date forum-post-date">'.$post_year.'</p>

                </a>';
        return $recent_post;
    }


    function recent_posts($literal_post, $limit, $offset){
        global $database;
        global $connection;
        $query =  $database-> query_array("SELECT * FROM posts ORDER BY post_date DESC LIMIT $limit offset $offset ");

        while ($row = mysqli_fetch_array($query)) {
            $post_title = $row["post_title"];
            $post_text = $row["post_text"];
            $post_img = $row["post_img"];
            $post_header = $row["post_header"];
            $post_date = $row["post_date"];
            $post_date_trimmed = substr( $post_date, 0, 10);
            $post_id = $row["post_id"];
            $query2 =  $database-> query_array("SELECT * FROM comments_news where comment_post_id =  $post_id");
            $number_comments_post=mysqli_num_rows($query2);


            echo  $literal_post($post_title, $post_id, $post_text, $post_img,  $post_header, $post_date_trimmed, $number_comments_post);


        }
    }
    function recent_forum_posts($literal_post, $limit, $offset){
        global $database;
        global $connection;
        $query =  $database-> query_array("SELECT * FROM forum_posts ORDER BY post_date DESC LIMIT $limit offset $offset ");

        while ($row = mysqli_fetch_array($query)) {
            $post_title = $row["post_title"];
            $post_text = $row["post_text"];
            $post_img = $row["post_img"];
            $post_date = $row["post_date"];
            $post_year = substr($post_date, 0, 10);
            $post_time = substr($post_date, 11);
            $post_id = $row["id"];
            $post_user_id = $row["post_user_id"];
            $query2 =  $database-> query_array("SELECT * FROM users where user_id =  $post_user_id");
            while ($row = mysqli_fetch_array($query2)) {
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_img = $row["user_img"];

                echo  $literal_post($post_title, $post_id, $post_text, $post_img, $user_img,  $post_year,  $post_time, $user_lastname,  $user_firstname);
            }





        }
    }
    function get_selected_forum_post() {
        global $database;
        if (isset($_GET["id"])) {
            $post_id = $_GET["id"];

            $query = $database-> query_array("SELECT * from forum_posts where id = $post_id");

            while ($row = mysqli_fetch_array($query)) {
                $post_id = $row["id"];
                $post_title    = $row['post_title'];
                $post_text   = $row['post_text'];
                $post_user_id   = $row['post_user_id'];
                $post_date       = $row['post_date'];
                $post_img       = $row['post_img'];
                $post_year = substr($post_date, 0, 10);
                $post_time = substr($post_date, 11);

                $query_select_user = $database->query_array("SELECT * FROM users where user_id = $post_user_id");
                while($row = mysqli_fetch_assoc($query_select_user)) {
                    $user_id = $row["user_id"];
                    $user_firstname = $row["user_firstname"];
                    $user_lastname = $row["user_lastname"];
                    $user_img = $row["user_img"];
                    $user_prof = $row["user_occupation"];
                    $user_label = render_hidden_user_label($user_img, $user_firstname, $user_lastname, $user_prof, $user_id);
                    echo  '
                        <div class="news-recent-post posts-main-post col-custom col-100">

                        <img class="post-image"src="./'.$post_img.' " alt="">
                        <div class="news-post-desc">
                            <div class="user-profile-container row-custom trigger_avatar">

                                <img class="label-user-img"src="./imgs/users_avatars/'.$user_img.'" alt="">
                                <div class="col-custom">
                                <p class="label-user-name">'.$user_firstname.' '.$user_lastname.'</p>
                                <p class="label-user-name">'.$user_prof.'</p>
                                </div>'
                                .$user_label.'

                            </div>

                            <div class="post-details-container row-custom">
                                <div class="post-author-date col-custom ">
                                    <span>'.$post_year.'</span>
                                    <span>'.$post_time.'</span>
                                </div>


                            </div>

                        </div>

                        </div>
                        <h5 class="post-desc-selected">'.$post_text.'</h5>
                    ';


                }

            }

        }

    }
 function get_selected_post_header() {
        global $database;
        if (isset($_GET["post"])) {
            $post_id = $_GET["post"];

            $query = $database-> query_array("SELECT * from posts where post_id = $post_id");

            while ($row = mysqli_fetch_array($query)) {
                $post_title = $row["post_title"];

                echo '<h5 class="section-header white-text text-mid header-subpage post-header-page">'.$post_title.'</h5>';
            }

        }

    }
    function get_selected_forum_post_header() {
        global $database;
        if (isset($_GET["id"])) {
            $post_id = $_GET["id"];

            $query = $database-> query_array("SELECT * from forum_posts where id = $post_id");

            while ($row = mysqli_fetch_array($query)) {
                $post_title = $row["post_title"];

                echo '<h5 class="section-header text-mid white-text header-subpage post-header-page">'.$post_title.'</h5>';
            }

        }

    }

    function get_selected_post() {
        global $database;
        if (isset($_GET["post"])) {
            $post_id = $_GET["post"];

            $query = $database-> query_array("SELECT * from posts where post_id = $post_id");

            while ($row = mysqli_fetch_array($query)) {
                $post_title = $row["post_title"];
                $post_text = $row["post_text"];
                $post_img = $row["post_img"];
                $post_header = $row["post_header"];
                $post_date = $row["post_date"];
                $post_date_trimmed = substr( $post_date, 0, 10);
                $post_id = $row["post_id"];
                echo  selected_post_literal($post_title, $post_id, $post_text, $post_img, $post_header, $post_date_trimmed);
            }

        }

    }

    function get_comments_on_posts($comment_literal, $limit, $start){
        global $database;
        if (isset($_GET["post"])) {
            $post_id = $_GET["post"];

            $query = $database-> query_array("SELECT * from comments_news where comment_post_id = $post_id order by comment_date DESC limit $limit offset $start");
            $rowcount=mysqli_num_rows($query);
            if($rowcount>0) {
                while ($row = mysqli_fetch_array($query)) {
                    $comment_id = $row["comment_id"];
                    $comment_user_id = $row["comment_user_id"];
                    $comment_text = $row["comment_text"];
                    $comment_date = $row["comment_date"];
                    $comment_year = substr($comment_date, 0, 10);
                    $comment_time = substr($comment_date, 11);
                    $query2 = $database-> query_array("SELECT * from users where user_id = $comment_user_id");
                    while ($row = mysqli_fetch_array($query2)) {
                        $user_comment_name = $row["user_firstname"];
                        $user_comment_lastname = $row["user_lastname"];
                        $user_avatar = $row["user_img"];
                        $user_occupation = $row["user_occupation"];
                        echo $comment_literal($comment_text,  $user_comment_name, $user_comment_lastname, $user_avatar,  $comment_year, $comment_time,  $comment_user_id,  $comment_id, $post_id, $user_occupation );
                    }

                }


            }



        }
    }
    function get_comments_on_forum_posts($comment_literal, $limit, $start){
        global $database;
        if (isset($_GET["id"])) {
            $post_id = $_GET["id"];

            $query = $database-> query_array("SELECT * from comments_forum where comment_post_id = $post_id order by comment_date DESC limit $limit offset $start ");
            $rowcount=mysqli_num_rows($query);
            if($rowcount>0) {
                while ($row = mysqli_fetch_array($query)) {
                    $comment_id = $row["comment_id"];
                    $comment_user_id = $row["comment_user_id"];
                    $comment_text = $row["comment_text"];
                    $comment_date = $row["comment_date"];
                    $comment_year = substr($comment_date, 0, 10);
                    $comment_time = substr($comment_date, 11);
                    $query2 = $database-> query_array("SELECT * from users where user_id = $comment_user_id");
                    while ($row = mysqli_fetch_array($query2)) {
                        $user_comment_name = $row["user_firstname"];
                        $user_comment_lastname = $row["user_lastname"];
                        $user_avatar = $row["user_img"];
                        $user_occupation = $row["user_occupation"];
                        echo $comment_literal($comment_text,  $user_comment_name, $user_comment_lastname, $user_avatar,  $comment_year, $comment_time, $comment_user_id, $comment_id, $post_id, $user_occupation);
                    }

                }


            }



        }
    }
    function get_num_comments_on_post(){
        global $database;
        if (isset($_GET["post"])) {
            $post_id = $_GET["post"];
            $query = $database-> query_array("SELECT * from comments_news where comment_post_id = $post_id");
            $rowcount=mysqli_num_rows($query);
            return $rowcount;





        }
    }
    function get_seleected_movie_reviews_title(){
        global $database;
        if (isset($_GET["id"])) {
            $movie_id = $_GET["id"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id ");

            while ($row = mysqli_fetch_array($query)) {
                $movie_title = $row["title"];

                echo $movie_title;
            }





        }
    }
    function get_seleected_movie_reviews_img(){
        global $database;
        if (isset($_GET["id"])) {
            $movie_id = $_GET["id"];

            $query = $database-> query_array("SELECT * from movies where id = $movie_id ");

            while ($row = mysqli_fetch_array($query)) {
                $movie_img = $row["poster"];

                echo $movie_img;
            }





        }
    }

    function get_categories_main(){
        global $database;
        $query = $database-> query_array("SELECT * from genres");
        while ($row = mysqli_fetch_array($query)) {
            $cat_title = $row["name"];
            $cat_img = $row["category_img"];

            echo category_card_literal($cat_title, $cat_img);

        }
    }







?>
<?php 
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
    function redirect($location) {

        header("Location: {$location}");
        
        
    }

    function selected_movie_page($movie_title, $release_date, $movie_poster, $movie_desc) {
        $html = '
              <div class="current-movie-wrapper row-custom">
                <img src="./'.$movie_poster.' ">
                <div class="current-movie-desc-container col-custom">
                <div>
                    <h1>'.$movie_title.'</h1>
                    <span>director</span>
                </div>
              
                <div class="movie-details row-custom">
                    <span>year</span>
                    <span>time</span>
               
                </div>

                <button class="button-custom">
                    Book
                </button>

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
                <div class="hero-text">
                    <h3 class="text-big">'.$category_name.' Movies</h3>
                    <p class="text-mid">'.$category_desc.'</p>
                    <button class="button-custom">Sign up</button>
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
                <div class="hero-text">
                    <h3 class="text-big">'.$category_name.' Movies</h3>
                    <p class="text-mid">'.$category_desc.'</p>
                    <button class="button-custom">Sign up</button>
                </div>
            </div>';
        
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
                $release_date = $row["release_date"];
                $movie_desc  = $row["description"];
                echo  selected_movie_page($movie_title, $release_date, $movie_poster, $movie_desc);
            }
           
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

    function get_trending_movies() {
        global $database;
        global $connection;

        $query =  $database-> query_array("
            SELECT m.title, m.poster, m.release_date, m.id
            FROM movies m
            JOIN movies_kinds mk ON m.id = mk.movie_id
            WHERE mk.movie_kind_id = 1
        ");
      
     
        
        while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["title"];
            $movie_poster = $row["poster"];
            $release_date = $row["release_date"];
            $movie_id = $row["id"];
            echo card_movies($movie_title, $movie_poster, $release_date,  $movie_id);
        }
        
        
       
    }
    function get_popular_movies() {
        global $connection;
        global $database;
        $query  = $database-> query_array("
            SELECT m.title, m.poster, m.release_date, m.id
            FROM movies m
            JOIN movies_kinds mk ON m.id = mk.movie_id
            WHERE mk.movie_kind_id = 2
        ");
        
        while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["title"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            $release_date = $row["release_date"];
            echo card_movies_popular($movie_title, $movie_poster, $release_date, $movie_id);
        }
        
        
       
    }


    function get_genres_movies(){
        global $database;
        global $connection;
        $query =  $database-> query_array("select * from genres");
      
        while ($row = mysqli_fetch_array($query)) {
            $cat_title = $row["name"];
          
           echo  '<a class="catgory_box" href="category.php?category='.$cat_title.'">'.$cat_title.'</a>';
           
           
        }

    }
    
    function get_kinds_movies(){
        global $database;
        global $connection;
        $query =  $database-> query_array("select * from kinds");
      
        while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["name"];
            echo  '<a class="catgory_box" href="category.php?subcategory='.$movie_title.'">'.$movie_title.'</a>';
           
           
        }

    }








    
        
?>

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
    function movie_small_card($movie_id, $movie_poster, $movie_title) {
        $html = '

            <div class="movie-card movie-card-detailed " data-id='.$movie_id.'>
                <img class="card-movie-img-popular" src="./'.$movie_poster.'">
                <div class="text-container ">
                    <p>'.$movie_title.'</p>
                    <a href="movie.php?movie='.$movie_id.'"> 
                        <button class="button-custom">Book</button>
                    </a>
                </div>
                    
            </div>
        ';
    
        return $html;
    }
    function movie_more_card($movie_id, $movie_poster, $movie_title) {
        $html = '
            <a href="movie.php?movie='.$movie_id.'">
                <div class="movie-card-more"> 
                    <img class="card-movie-img" src="./'.$movie_poster.'" alt="">
                    <div class="text-container card-info">
                        <p class="card-movie-title">'.$movie_title.'</p>
                        <p class="card-movie-date">20 April</p>
                        <p class="card-movie-age">6+</p>
                    </div>
                </div>
            </a>';
        return $html;
    }
    
    function movie_big_card($movie_id, $movie_poster, $movie_title) {
        $movie_card = '<a href="movie.php?movie='.$movie_id.'">
                    <div class="movie-card movie-card-trending">
                       <img class="card-movie-img" src="./'.$movie_poster.'" alt="">
                            <div class="text-container card-info">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="card-movie-date">20 April</p>
                                <p class="card-movie-age">6+</p>
                                <button class="button-custom">Book</button>
                            </div>
                    </div>
            </a>';
    
        return $movie_card;
    }
    
    function get_kinds_movies_cards($type_movies, $card_type) {
        global $database;
        global $connection;
    
        $query = $database->query_array("SELECT movies.title, movies.id, movies.poster FROM movies INNER JOIN 
        movies_kinds ON movies.id = movies_kinds.movie_id INNER JOIN kinds ON 
        movies_kinds.movie_kind_id = kinds.id WHERE kinds.name ='$type_movies'");
    
        while ($row = mysqli_fetch_array($query)) {
            $movie_title = $row["title"];
            $movie_id = $row["id"];
            $movie_poster = $row["poster"];
            
            echo $card_type($movie_id, $movie_poster, $movie_title);
        }
    }
    
     
    function get_categories_movies_cards(){
        global $database;
        global $connection;
        if (isset($_GET["category"])) {
            $movie_cat = $_GET["category"];
            $query =  $database-> query_array( "SELECT movies.title, movies.id, movies.poster  FROM movies INNER JOIN 
            movies_genres ON movies.id = movies_genres.movie_id INNER JOIN genres ON 
            movies_genres.genre_id = genres.id WHERE genres.name ='$movie_cat'");
          
            while ($row = mysqli_fetch_array($query)) {
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_poster = $row["poster"];

                    echo ' 
                    <a href="movie.php?movie='.$movie_id.'">
                        <div class="movie-card-category">  
                            <img class="card-movie-img" src="./'.$movie_poster.' " alt="">
                            <div class="text-container card-info">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="card-movie-date">20 April</p>
                                <p class="card-movie-age">6+</p>
                            </div>
                        </div>
                    </a>
                ';
                
            }
        
        }
        if (isset($_GET["subcategory"])) {
            $movie_subcat = $_GET["subcategory"];
            $query =  $database-> query_array( "SELECT movies.title, movies.id, movies.poster  FROM movies INNER JOIN 
            movies_kinds ON movies.id = movies_kinds.movie_id INNER JOIN kinds ON 
            movies_kinds.movie_kind_id = kinds.id WHERE kinds.name ='$movie_subcat'");
          
            while ($row = mysqli_fetch_array($query)) {
                    $movie_title = $row["title"];
                    $movie_id = $row["id"];
                    $movie_poster = $row["poster"];

                    echo ' 
                    <a href="movie.php?movie='.$movie_id.'">
                        <div class="movie-card-more">  
                            <img class="card-movie-img" src="./'.$movie_poster.' " alt="">
                            <div class="text-container card-info">
                                <p class="card-movie-title">'.$movie_title.'</p>
                                <p class="card-movie-date">20 April</p>
                                <p class="card-movie-age">6+</p>
                            </div>
                        </div>
                    </a>
                ';
                
            }
        
        }
}    
           











    
        
?>

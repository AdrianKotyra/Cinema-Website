
<head>
<title>Movie Booking</title>
</head>
 
<body>
<h1>Select Movie</h1>
<p>
<?php include 'connect.php';
$sql="SELECT * FROM Movies";
$query=mysqli_query($conn,$sql);
 
echo("<Select id='movieSelect' Name='movieName'>");
while($row=mysqli_fetch_array($query)){
    $movie_id = $row["movieID"];
    echo("<option class='options' get_movie_id='$movie_id' value='>".$row['movieName']."'>". $row['movieName']."</option>");
 
   
    }
 echo("</select>");
 
?>
 
</p>
 
 
<label for="GO"></label>
<input  name="go" value="Book" class="button_form_accept">
</form>
</body>
</html>
 

has context menu


<script>
    const selectElement = document.getElementById('movieSelect');
    const bookButton = document.querySelector('.button_form_accept');
    let selectedMovieId = null;
    selectElement.addEventListener('change', () => {
        selectedMovieId = selectElement.options[selectElement.selectedIndex].getAttribute('get_movie_id');
        bookButton.addEventListener("click", ()=>{
                window.location.href = `tickets.php?movie_id=${selectedMovieId}`;
        })
    });

 
</script>

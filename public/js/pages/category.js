// ------------Function to show more items---------
let itemsPerPage = 10;  
let currentlyVisible = 10; 
function showItems() {

  const items = document.querySelectorAll('.category-movies-container .card-layout-more-card');
  const buttonShowMore = document.querySelector(".show-more-titles-button")

  items&&items.forEach((item, index) => {
    if (index < currentlyVisible) {
      item.style.display = 'block';  
    } else {
      item.style.display = 'none';  
    }
  });
  
  // Hide "Load More" button if all items are visible
  if (buttonShowMore&& currentlyVisible >= items.length) {
    buttonShowMore.style.display = "none";
  }
  
  buttonShowMore&&buttonShowMore.addEventListener("click", () => {
  currentlyVisible += itemsPerPage;  // Increment visible items
  showItems();  // Update the displayed items
});

}


// Initial display of 20 items
showItems();


function searchMoviesCat(){
 
  const moviesContainer = document.querySelector(".category-movies-container");
  const movieSearcheInput = document.querySelector(".search-movie-cat");

 
  movieSearcheInput&&movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;
  // Get the full URL's query string
    const queryString = window.location.search;
    // Parse the query string
    const urlParams = new URLSearchParams(queryString);
    const categoryParam = urlParams.get('category');
    const data = [categoryParam, movieSearcheInputValue ]
  

    SendDataAjax(data, "../public/ajax/GET_SEARCHED_MOVIES_CATEGORY.php")
    .then(data => {
        moviesContainer.innerHTML=data;
        moreinfoCard()
      
    })
    .catch(error => {
        console.error('Error:', error);
    });
   
    
  
  })
 
}
searchMoviesCat()


function searchMoviesSUBCAT(){
 
  const moviesContainer = document.querySelector(".category-movies-container");
  const movieSearcheInput = document.querySelector(".search-movie-subcat");

 
  movieSearcheInput&&movieSearcheInput.addEventListener("keyup", function(){
    const movieSearcheInputValue = movieSearcheInput.value;
  // Get the full URL's query string
    const queryString = window.location.search;
    // Parse the query string
    const urlParams = new URLSearchParams(queryString);
    const subcategoryParam = urlParams.get('subcategory');
    const data = [subcategoryParam, movieSearcheInputValue ]
  

    SendDataAjax(data, "../public/ajax/GET_SEARCHED_MOVIES_SUBCATEGORY.php")
    .then(data => {
        moviesContainer.innerHTML=data;
        moreinfoCard()
      
      
    })
    .catch(error => {
        console.error('Error:', error);
    });
   
    
  
  })
 
}
searchMoviesSUBCAT()


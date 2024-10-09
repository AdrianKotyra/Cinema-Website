// ------------Function to show more items---------

let itemsPerPage = 10;  
let currentlyVisible = 10; 
function showItems() {

  const items = document.querySelectorAll('.movie-similar-titles .card-layout-more-card');
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


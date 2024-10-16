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


function renderTimesBooking() {
    let minutes = 0;
    let hour = 10;
  
    const container = document.querySelector('.screen-box-grid');
  
    Array.from({ length: 35 }, () => {
      if (minutes === 60) {
        hour += 1;
        minutes = 0;
      }
      
      // Format time as HH.MM (e.g., 10.10, 10.20)
      let time = hour + '.' + (minutes === 0 ? '00' : minutes);
  
      // Create the booking element
      const bookingElement = `
        <div class="select-booking screen-card-select col-custom" data-time="${time}">
          <div class="screen-card-info col-custom">
            <span class="time-screen">${time}</span>
         
          </div>
          <button class="button-custom book-screen">Select</button>
        </div>`;
  
      // Append to the container
      container.innerHTML += bookingElement;
  
      // Increase minutes by 10 for the next iteration
      minutes += 20;
    });
  }
  

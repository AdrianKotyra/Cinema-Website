function selectSeat() {
  const seats = document.querySelectorAll(".seat-card");
  const numberSeats = document.querySelectorAll(".seat_number_booking").length;
  let currentActiveSeats = 0;

  seats.forEach(seat => {
    seat.addEventListener("click", () => {

      // Check if the seat is already active
      if (seat.classList.contains("active-seat-number")) {
        seat.classList.remove("active-seat-number");
        currentActiveSeats -= 1;
        
        // Clear the corresponding seat number booking when a seat is deselected
        document.querySelector(`.seat_number_booking${currentActiveSeats + 1}`).innerHTML = "";

      } else {
        // Check if we can still add seats based on available slots
        if (currentActiveSeats < numberSeats) {
          currentActiveSeats += 1;

          // Add active class to the clicked seat
          seat.classList.add("active-seat-number");

          // Get the seat number from the clicked seat (assuming it's stored in seat_num attribute)
          const seatBookingElement = seat.getAttribute("seat_num");

          // Set the corresponding seat number in the booking element
          document.querySelector(`.seat_number_booking${currentActiveSeats}`).innerHTML = seatBookingElement;
        }
      }
    });
  });
}

selectSeat()


function ApproveTicketGetInfo(){

  const approveBookingButton = document.querySelector(".confirm-booking-ticket");


  approveBookingButton.addEventListener("click", ()=>{
    initiateModalWindowBg()

    const activeSeats = document.querySelectorAll(".active-seat-number");
    let BookedSeats = [];
    activeSeats.forEach(activeSeat=>{
      BookedSeats.push(activeSeat.getAttribute("seat_num"));
    })


  
    const numberSeats = document.querySelectorAll(".seat_number_booking").length;
 
    const modalMain = document.querySelector(".modal_container");
    const dayBooking = document.querySelector(".day_booking").innerHTML;
    const timeBooking = document.querySelector(".time_booking").innerHTML;
    const ticketQuantity = document.querySelector(".ticket_quantity_booking").innerHTML;
    const ticketPrice = document.querySelector(".ticket_price_booking").innerHTML;
    const totalPrice = document.querySelector(".total_price_booking").innerHTML;

    const ticketId = document.querySelector(".ticket_id").innerHTML;
    const ranNumber = document.querySelector(".ran_number").innerHTML;
    const imgMovieSrc = document.querySelector(".movie-booking-banner img").src;
  
    if(BookedSeats.length==numberSeats) {
      modalMain.innerHTML= ` <form id="form_booking" method="POST" >
      <div class="modal-forum-posts_delete modal-booking">
      <img class="cross_quiz" src="./imgs/icons/cross.svg" alt="">
        <input type="hidden" class="input-hidden" name="random_number" value="${ranNumber}">
        <input type="hidden" class="input-hidden" name="ticket_id" value="${ticketId}">
        <input type="hidden" class="input-hidden" name="day" value="${dayBooking}">
        <input type="hidden" class="input-hidden" name="time" value="${timeBooking}">
        <input type="hidden"class="input-hidden" name="ticket_quantity" value="${ticketQuantity}">
        <input type="hidden"class="input-hidden" name="Ticket_price_unit" value="${ticketPrice}">
        <input type="hidden"class="input-hidden" name="total_price_number" value="${totalPrice}">
        <input type="hidden"class="input-hidden" name="seat_number" value="${BookedSeats}">
  
     
        <div class="row-custom modal-booking-container">
            <img class="modal_movie_img" src="${imgMovieSrc}" alt="">
            <div>
              <h5><b>Date: </b></h5> 
              <p class="day-booking-conf">
              ${dayBooking}
              </p>
              <h5><b> Time: </b></h5>
              <p class="time-screen-booking-conf">${timeBooking} </p>
             <h5>  <b>Ticket Quantity:</b> </h5>
              <p>${ticketQuantity} </p>
  
              <h5><b>Ticket Price: </b></h5>
              <p>${ticketPrice} </p>
  
              <h5> <b>Total Price: </b></h5>
              <p>${totalPrice} </p>
        
           
               <h5><b>Seat Number:</b></h5>
                ${BookedSeats.map(seat => `<p>${seat}</p>`).join('')}
  
              <button class="button-custom approve_booking" name="approve_booking">
                Proceed
              </button>
            </div>   
      </div>   
    
    </div>
    </form>`

    const crossExit = document.querySelector(".cross_quiz")
    crossExit.addEventListener("click", ()=>{
      modalMain.innerHTML=""
      closeModalWindowBg()
    })

    ApproveTicketAJAX()
    } 
    else {
      GeneralModal("Select Seat first", "cross", "red_icons" )
    }
   
  })
  
  
 

}

function ApproveTicketAJAX() {
  const triggerButton = document.querySelector(".approve_booking");
  const modalMain = document.querySelector(".modal_container");
  triggerButton.addEventListener("click", (e) => {
    e.preventDefault();
    var form = document.getElementById('form_booking');
    var formData = new FormData(form);

    // Sending the form data, including the image, via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/ADD_TICKET.php', true);
    
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Process the response here
        var response = xhr.responseText; 

     
        try {
    
          
          const responseArray = JSON.parse(response);
          if (responseArray[0]=="success") {
            modalMain.innerHTML="";
        
            BookingModal("You have bought a ticket", "tick", "green_icons",responseArray[1]  )
            // setTimeout(() => {
            //   window.location.href = `movie.php?movie=${responseArray[1]}`;
            // }, 2000);
          
          } else {
           
          }

        } catch (e) {
          console.error("Error parsing JSON response:", e);
      
        }
      }
    };

    xhr.send(formData); 
  });
}

ApproveTicketGetInfo()
function selectSeat(){
  const seats = document.querySelectorAll(".seat-card");
  seats.forEach(seat=>{
    seat.addEventListener("click", ()=>{
    
      seats.forEach(seat=>{

        seat.classList.remove("active-seat-number")
      })
      seat.classList.add("active-seat-number");
      getSeatNumberInfo()

    })
  })
}
selectSeat()


function getSeatNumberInfo(){
  const activeSeat = document.querySelector(".active-seat-number");
  const seatContainerInfo = document.querySelector(".seat_number_booking");
  const numberSeat = activeSeat.getAttribute("seat_num");
  seatContainerInfo.innerHTML=numberSeat
}


function ApproveTicketGetInfo(){

  const approveBookingButton = document.querySelector(".confirm-booking-ticket");


  approveBookingButton.addEventListener("click", ()=>{
    const modalMain = document.querySelector(".modal_container");
    const dayBooking = document.querySelector(".day_booking").innerHTML;
    const timeBooking = document.querySelector(".time_booking").innerHTML;
    const ticketQuantity = document.querySelector(".ticket_quantity_booking").innerHTML;
    const ticketPrice = document.querySelector(".ticket_price_booking").innerHTML;
    const totalPrice = document.querySelector(".total_price_booking").innerHTML;
    const SeatNumber = document.querySelector(".seat_number_booking").innerHTML;
    const imgMovieSrc = document.querySelector(".movie-booking-banner img").src;
   
    if(SeatNumber.trim()!=="") {
      modalMain.innerHTML= ` <form id="form_booking" method="POST" >
      <div class="modal-forum-posts_delete modal-booking">
      <img class="cross_quiz" src="./imgs/icons/cross.svg" alt="">
        <input class="input-hidden" name="day" value="${dayBooking}">
        <input class="input-hidden" name="time" value="${timeBooking}">
        <input class="input-hidden" name="ticket_quantity" value="${ticketQuantity}">
        <input class="input-hidden" name="Ticket_price_unit" value="${ticketPrice}">
        <input class="input-hidden" name="total_price_number" value="${totalPrice}">
        <input class="input-hidden" name="seat_number" value="${SeatNumber}">
  
     
        <div class="row-custom modal-booking-container">
            <img class="modal_movie_img" src="${imgMovieSrc}" alt="">
            <div>
              <h5>Date: <b> </b></h5> 
              <p class="day-booking-conf">
              ${dayBooking}
              </p>
              <h5><b> Time: </b></h5>
              <p class="time-screen-booking-conf">${timeBooking} </p>
             <h5>  <b>Ticket Quantity:</b> </h5>
              <p>${ticketQuantity} </p>
  
              <h5><b>Ticket Price: </b></h5>
              <p>${ticketPrice}£ </p>
  
              <h5> <b>Total Price: </b></h5>
              <p>${totalPrice}£ </p>
        
             <h5>  <b>Seat Number: </b></h5>
              <p>${SeatNumber}£ </p>
        
  
              <button class="button-custom approve_booking" name="approve_booking">
                Proceed
              </button>
            </div>   
      </div>   
    
    </div>
    </form>`
    ApproveTicketAJAX()
    } 
    else {
      GeneralModal("Select Seat first", "cross", "red_icons" )
    }
   
  })
  
  
 

}

function ApproveTicketAJAX() {
  const triggerButton = document.querySelector(".approve_booking");
  
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
          var jsonResponse = JSON.parse(response);
          
   
          if (jsonResponse.success) {
            console.log(jsonResponse)
          
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
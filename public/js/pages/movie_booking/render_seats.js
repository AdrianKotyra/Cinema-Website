function renderSeats(){


    Array.from({ length: 35 }, (v, i) => document.write(`<div seat_num='${i}' class="seat-card">
                      
    <span class="seat-number">${i+1}</span>
    <img src="./imgs/icons/sofa-chair.svg" alt="">
    </div>`));
    
  
  }
  
  window.onload = function() {
    var content = document.querySelector('body');
    content.style.display = 'block';
  
  };
  
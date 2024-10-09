
// SETTING UP DEFAULT TODAYS DATE TO ELEMENTS WITH datePicker id

function getTodaysDate(){
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    const dateElement = document.getElementById('datePicker');
    dateElement? document.getElementById('datePicker').value = new Date().toDateInputValue() : null;
}
getTodaysDate()



//CREATE CONFIRMATION WINDOW TO DELETE RECORD. RECORD DELETION ON PASSING DATA-LINK ATTRIBUTE  AND GOING TO THE LINK

function createConfirmWindowDeleteRow(){
    const deleteButton = document.querySelectorAll(".delete_button")
 
    const modalContainer = document.querySelector(".modal-window-container");
    const confirmationModalLiteral = `
     <div class="confirmationWindowModal">
        <img class="cross_modal_admin exit-modal"src="../public/imgs/icons/cross.svg" alt="">
    
        <div class="buttons-message-container">
            <p>Are you sure you want to delete this record?</p>
            <div class="buttons-ok-cancel">
                <button class="accept_button">OK</button>
                <button class="exit-modal">Cancel</button>
            </div>
        
        </div>
    </div>
    
    `
    
    deleteButton.forEach(button => {
       
        button.addEventListener("click", ()=>{
          
            modalContainer.innerHTML=confirmationModalLiteral;

            const acceptButton = document.querySelector(".accept_button")

            acceptButton.addEventListener("click", ()=>{
                let selectedDeleteLink = button.getAttribute("data-link");
            
                window.location.href = `${selectedDeleteLink}`;
            })
          
       
            
            const exitModal = document.querySelectorAll(".exit-modal");
            exitModal.forEach(ele=>ele.addEventListener("click", ()=>{

                modalContainer.innerHTML="";

            }))
        })
    });
  


   

}
createConfirmWindowDeleteRow()
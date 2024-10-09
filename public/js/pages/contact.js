function updateUserDetailsAjax() {
    document.querySelector('.send-contact-form-btn').addEventListener('click', function(e) {
        e.preventDefault();
        const alertContainer = document.querySelector(".alert-container-contact");
        const firstname = document.querySelector(".firstname").value;  // Fixed typo here: "fistname" to "firstname"
        const lastname = document.querySelector(".lastname").value;
        const text = document.querySelector(".msg").value;
        const email = document.querySelector(".email").value;

        const formData = new FormData();
        formData.append('firstname', firstname);
        formData.append('lastname', lastname);
        formData.append('text', text);
        formData.append('email', email);

        fetch('ajax/CONTACT_FORM_SEND_EMAIL.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())  // or response.json() if expecting JSON
        .then(data => {
            const dataTrimmed = data.trim()
            if(dataTrimmed=="success") {
                GeneralModal("Your message have been successfully sent", "tick", "green_icons")
                const buttonExit = document.querySelector(".button-post-added");
                buttonExit.addEventListener("click", ()=>{
                    window.location.href = window.location.href;
                })
                setTimeout(() => {
                    window.location.href = window.location.href;
                }, 2000);
            
            }
            else {
                alertContainer.innerHTML=dataTrimmed;
            }
           
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
}
updateUserDetailsAjax()
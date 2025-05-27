// Handles login form submission using AJAX to send data to the server without reloading the page; shows errors if login fails or redirects to OTP page on success.

const form = document.querySelector(".login form"), // SELECTING THE FORM ELEMENT INSIDE ELEMENT WITH CLASS "login"
signUpBtn = form.querySelector(".button input"); // SELECTING THE INPUT BUTTON INSIDE CLASS "button"
errorText = form.querySelector(".error-txt"); // SELECTING THE ERROR TEXT ELEMENT INSIDE THE FORM

form.onsubmit = (e)=>{ 
    e.preventDefault(); // PREVENTS THE DEFAULT FORM SUBMISSION (PAGE RELOAD)

    // Create a new XMLHttpRequest object to send and receive data from a server without reloading the page (used for AJAX requests).
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true); // CONFIGURING THE REQUEST TO SEND DATA TO "login.php" USING POST METHOD
    xhr.onload = ()=>{ // DEFINING WHAT HAPPENS WHEN RESPONSE IS LOADED
        if(xhr.readyState === XMLHttpRequest.DONE){ // CHECKING IF THE REQUEST IS COMPLETE
            if(xhr.status === 200){ // CHECKING IF THE RESPONSE STATUS IS OK (200)
                let data = xhr.response; // STORING THE RESPONSE TEXT IN 'data'
                console.log(data); // PRINTING RESPONSE IN CONSOLE FOR DEBUGGING
                if(data === "SUCCESS"){ // IF RESPONSE IS "SUCCESS"
                    location.href = "OTP/sendotp.php"; // REDIRECTING TO OTP PAGE
                }else{
                    errorText.textContent = data; // SETTING THE ERROR TEXT CONTENT TO SERVER RESPONSE
                    errorText.style.display = "block"; // DISPLAYING THE ERROR TEXT
                }
            } 
        }
    }
    // SEND THE FORM DATA THROUGH AJAX TO PHP
    let formData = new FormData(form); // CREATING A FORM DATA OBJECT FROM THE FORM
    xhr.send(formData); // SENDING THE FORM DATA TO THE SERVER
};

// FOR PASSWORD EYE ICON TOGGLE
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', function () {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
});

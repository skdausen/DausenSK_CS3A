// Handles signup form submission with AJAX to send data without page reload; shows success alert and redirects on success, or displays errors if signup fails.

const form = document.querySelector(".signup form"), // SELECT THE FORM INSIDE ELEMENT WITH CLASS "signup"
signUpBtn = form.querySelector(".button input"); // SELECT THE INPUT BUTTON INSIDE CLASS "button"
errorText = form.querySelector(".error-txt"); // SELECT THE ELEMENT FOR DISPLAYING ERROR MESSAGES


form.onsubmit = (e)=>{
    e.preventDefault(); //prevent form from submitting (STOP PAGE RELOAD)

    // Ajax - AJAX (Asynchronous JavaScript and XML)
    // a technique that lets a web page communicate with a server in the background without needing to reload the whole page. 
    // This makes web apps faster and smoother by updating only parts of the page dynamically.
    let xhr = new XMLHttpRequest(); //creating XML object (CREATE AJAX REQUEST)
    //POST - HTTP method: sending data to the server), php/signup.php - The URL of the server-side script that will handle the request, 
    //true - Makes the request asynchronous (Send the request in the background and don’t freeze the page while waiting for the server)
    xhr.open("POST", "php/signup.php", true); //SET REQUEST METHOD AND URL 
    xhr.onload = ()=>{ //When the server finishes responding, run this block of code.
        if(xhr.readyState === XMLHttpRequest.DONE){ //CHECK IF REQUEST DONE
            if(xhr.status === 200){ //CHECK IF RESPONSE OK
                let data = xhr.response; //GET RESPONSE TEXT
                console.log(data); //LOG RESPONSE
                if(data === "SUCCESS"){
                    alert("Account registered successfully!");
                    setTimeout(() => {
                        window.location.href = "login.php"; //REDIRECT TO LOGIN AFTER SUCCESS
                    }, 500);
                }else{
                    errorText.textContent = data; //SHOW ERROR MESSAGE
                    errorText.style.display = "block"; //DISPLAY ERROR BOX
                }
            } 
        }
    }
    // SEND THE FORM DATA THROUGH AJAX TO PHP
    let formData = new FormData(form); // CREATING NEW formData Object (COLLECT FORM DATA)
    xhr.send(formData); // sending the form data to php (SEND AJAX REQUEST)
};


// FOR PASSWORD & CONFIRM PASSWORD EYE ICON TOGGLE
const toggleIcons = document.querySelectorAll('.toggle-password');
toggleIcons.forEach(icon => { // LOOP THROUGH EACH TOGGLE ICON
    icon.addEventListener('click', function () {     // ADD CLICK EVENT LISTENER TO EACH ICON
        const targetId = this.getAttribute('data-target'); // GET THE VALUE OF 'data-target' ATTRIBUTE (WHICH IS THE ID OF THE PASSWORD FIELD)
        const targetInput = document.getElementById(targetId); // FIND THE PASSWORD INPUT FIELD USING THAT ID
        // CHECK IF THE INPUT TYPE IS 'password'
        // IF TRUE, CHANGE IT TO 'text' TO SHOW THE PASSWORD
        // IF FALSE, CHANGE IT BACK TO 'password' TO HIDE IT
        const type = targetInput.getAttribute('type') === 'password' ? 'text' : 'password';
        targetInput.setAttribute('type', type);

        this.classList.toggle('fa-eye-slash');  // TOGGLE THE EYE ICON STYLE (SHOW EYE OR EYE-SLASH)
    });
});



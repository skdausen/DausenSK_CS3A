const container = document.getElementById ('container'); // container for the contents of the page
const registerBtn = document.getElementById('register'); // the register button
const loginBtn = document.getElementById('login');       // the login button

//adds the active class to the container
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

//removes the active class from the container
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
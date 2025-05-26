const container = document.getElementById ('container');    // container for the contents of the page
const registerBtn = document.getElementById('register');    // the register button
const loginBtn = document.getElementById('login');          // the login button
const users = [];       // list to store users

//to make sure there are no duplicate usernames
const userExists = users.some(user => user.username === username);

//adds the active class to the container
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

//removes the active class from the container
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

//signup
function signup() {
    //take the input field values
    const username = document.getElementById("regUsername").value;
    const email = document.getElementById("regEmail").value;
    const password = document.getElementById("regPassword").value;

    //check that all fields are filled
    if (!username || !password || !email) {
        alert("Please fill in all fields");
    }
    
    //check if username already exists else push the info into the list
    if (userExists) {
        alert('Username already exists!');
    } else {
        users.push({username, email, password});
        alert('Signed up successfully!');
        document.getElementById("regUsername").value = "";
        document.getElementById("regEmail").value = "";
        document.getElementById("regPassword").value = "";
        container.classList.remove("active");
    }
}

//login
function login() {
    //take the input field values
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    //check to see if email and password exist in the list
    const user = users.find(user => user.email === email && user.password === password);

    //if they exist, login successful, otherwise, fail
    if (user) {
        alert("Successfully Logged in! Welcome!");
        window.location.href = 'homepage.html';
    } else {
        alert("Invalid email or password");
    }
}
const mainArea = document.getElementById("mainArea");
let registeredUser = {}; //store user details

// show the registration form
function showRegistrationForm() {
    mainArea.innerHTML = `
        <form id="registerForm">
            <div class="row g-2">
                <div class="col-md-6"><input class="form-control" required id="firstName" placeholder="First Name"></div>
                <div class="col-md-6"><input class="form-control" required id="lastName" placeholder="Last Name"></div>
                <div class="col-md-6"><input class="form-control" required id="course" placeholder="Course"></div>
                <div class="col-md-3"><input class="form-control" required id="yearLevel" placeholder="Year Level"></div>
                <div class="col-md-3"><input class="form-control" required id="section" placeholder="Section"></div>
                <div class="col-md-6"><input class="form-control" required id="userName" placeholder="Username"></div>
                <div class="col-md-6"><input type="password" class="form-control" required id="password" placeholder="Password"></div>
                <div class="col-12"><input class="form-control" required id="pinCode" placeholder="Pin Code (Max 8 chars)"></div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>`;

    //handle registration form submission
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        e.preventDefault();

        //pin code must be 8 chars or less
        const pin = document.getElementById("pinCode").value;
        if (pin.length > 8) {
            alert("Pin code must be 8 characters or less.");
            return;
        }

        // store all input values
        registeredUser = {
            firstName: document.getElementById("firstName").value,
            lastName: document.getElementById("lastName").value,
            course: document.getElementById("course").value,
            yearLevel: document.getElementById("yearLevel").value,
            section: document.getElementById("section").value,
            userName: document.getElementById("userName").value,
            password: document.getElementById("password").value,
            pinCode: pin
        };

        // success message after registration
        alert(`Congratulations, ${registeredUser.firstName}! Registration successful.`);
        askToLogin();   //ask the user if they want to login
    });
}

// ask whether to login or exit
function askToLogin() {
    mainArea.innerHTML = `
        <p class="mt-3">Do you want to login?</p>
        <button class="btn btn-success me-2" onclick="showLoginForm()">YES</button>
        <button class="btn btn-danger" onclick="exitProgram()">NO</button>`;
}

// show login form
function showLoginForm() {
  mainArea.innerHTML = `
    <form id="loginForm">
      <input class="form-control mb-2" id="loginUsername" placeholder="Username" required>
      <input type="password" class="form-control mb-2" id="loginPassword" placeholder="Password" required>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  `;

    //handle form submission
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const username = document.getElementById("loginUsername").value;
        const password = document.getElementById("loginPassword").value;

        // check the entered credentials if they match what was registered
        if (username === registeredUser.userName && password === registeredUser.password) {
            askForPin();
        } else {
            alert("Incorrect Username or Password.");
            showLoginForm(); // Retry login
        }
    });
}

// ask user for pin code after correct username and password
function askForPin() {
    mainArea.innerHTML = `
        <form id="pinForm">
        <input class="form-control mb-2" id="loginPin" placeholder="Enter PIN Code" required>
        <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    `;

    // pin verification
    document.getElementById("pinForm").addEventListener("submit", function (e) {
        e.preventDefault();
        const pin = document.getElementById("loginPin").value;

        // if pin matches, show user details
        if (pin === registeredUser.pinCode) {
            showUserDetails();
        } else {
            alert("Incorrect PIN Code.");
            askForPin(); // Retry PIN
        }
    });
}

// display all registered info after successful login
function showUserDetails() {
    mainArea.innerHTML = `
        <h4 class="text-success">Login Successful!</h4>
        <ul class="list-group mt-3">
        <li class="list-group-item">Name: ${registeredUser.firstName} ${registeredUser.lastName}</li>
        <li class="list-group-item">Course: ${registeredUser.course}</li>
        <li class="list-group-item">Year Level: ${registeredUser.yearLevel}</li>
        <li class="list-group-item">Section: ${registeredUser.section}</li>
        <li class="list-group-item">Username: ${registeredUser.userName}</li>
        </ul>`;
}

// exit the program / end message
function exitProgram() {
    mainArea.innerHTML = `<h4 class="text-muted">👋 Program exited. Goodbye!</h4>`;
}

// Start
showRegistrationForm();

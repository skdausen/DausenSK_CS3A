document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const role = document.getElementById("role").value;
    const password = document.getElementById("password").value;
    const outputDiv = document.getElementById("output");

    let validPassword = false;

    // Conditional Statement to Check Password Validity
    if (role === "Department Head" && password === "SiEsD3ptH34d") {
        validPassword = true;
    } else if (role === "Faculty" && password === "SiEsF4cu1ty") {
        validPassword = true;
    } else if (role === "Student Officer" && password === "#CCSOAko") {
        validPassword = true;
    } else if (role === "Student" && password === "3SapatNa!") {
        validPassword = true;
    } else {
        console.error("Invalid credentials.");
        outputDiv.innerHTML = `<span class="text-danger"> Invalid credentials.</span>`;
        return;
    }

    // Switch Case to Output User Message
    switch (role) {
        case "Department Head":
            console.log("Welcome Department Head. Access Level: Full.");
            outputDiv.innerHTML = `<span class="text-success">Welcome Department Head. Access Level: Full.</span>`;
            break;

        case "Faculty":
            console.log("Welcome Faculty. Access Level: Moderate.");
            outputDiv.innerHTML = `<span class="text-success"> Welcome Faculty. Access Level: Moderate.</span>`;
            break;

        case "Student Officer":
            console.warn("Welcome Student Officer. Limited Access.");
            outputDiv.innerHTML = `<span class="text-warning">Welcome Student Officer. Limited Access.</span>`;
            break;

        case "Student":
            console.warn("Welcome Student. Viewing Only.");
            outputDiv.innerHTML = `<span class="text-warning"> Welcome Student. Viewing Only.</span>`;
            break;

        default:
            console.error("Unknown Role.");
            outputDiv.innerHTML = `<span class="text-danger"> Unknown Role.</span>`;
            break;
    }
});
function validate() {
    const form = document.getElementById("form");
    const username = form.username.value.trim();
    const password = form.password.value.trim();

    // Check if the username and password fields are not empty
    if (username === "" || password === "") {
        alert("Please enter both class code and password.");
        return false;
    }

    return true; // Allow the form submission if validation passes
}

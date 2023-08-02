// Add an event listener to the student button
document.getElementsByClassName("login-popup").addEventListener("click", function() {
  // Create the student login popup dynamically
  var studentPopup = document.createElement("div");
  studentPopup.className = "form-box login";
  
  var heading = document.createElement("h2");
  heading.textContent = "Student Login";
  studentPopup.appendChild(heading);
  
  var form = document.createElement("form");
  form.action = "#";
  
  var inputBox = document.createElement("div");
  inputBox.className = "input-box";
  
  var icon = document.createElement("span");
  icon.className = "icon";
  var iconElement = document.createElement("i");
  iconElement.className = "bx bxs-lock-alt";
  icon.appendChild(iconElement);
  
  var input = document.createElement("input");
  input.type = "password";
  input.required = true;
  
  var label = document.createElement("label");
  label.textContent = "Passcode";
  
  inputBox.appendChild(icon);
  inputBox.appendChild(input);
  inputBox.appendChild(label);
  
  form.appendChild(inputBox);
  
  var btn = document.createElement("button");
  btn.type = "submit";
  btn.className = "btn";
  btn.textContent = "Login";
  form.appendChild(btn);
  
  var loginRegister = document.createElement("div");
  loginRegister.className = "login-register";
  
  var p = document.createElement("p");
  p.textContent = "Don't have an account?";
  
  var registerLink = document.createElement("a");
  registerLink.href = "#";
  registerLink.className = "register-link";
  registerLink.textContent = "Register";
  
  p.appendChild(registerLink);
  loginRegister.appendChild(p);
  
  form.appendChild(loginRegister);
  
  studentPopup.appendChild(form);
  
  // Append the student login popup to the popups div
  var popups = document.querySelector(".popups");
  popups.appendChild(studentPopup);
  
  // Show the student login popup
  studentPopup.style.display = "block";
});

// Add an event listener to the teacher button
document.getElementById("trButton").addEventListener("click", function() {
  // Show the teacher login popup
  var teacherPopup = document.querySelector(".form-box.login");
  teacherPopup.style.display = "block";
});

// Add an event listener to the admin button
document.getElementById("adminButton").addEventListener("click", function() {
  // Show the admin login popup
  var adminPopup = document.querySelector(".form-box.login");
  adminPopup.style.display = "block";
});

// Close the popups when the close icon is clicked
document.getElementById("iconClose").addEventListener("click", function() {
  var popups = document.querySelectorAll(".form-box.login");
  popups.forEach(function(popup) {
    popup.style.display = "none";
  });
});

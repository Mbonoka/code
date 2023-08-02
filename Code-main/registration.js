// Select all input elements for varification
const tsc_number = document.getElementById("tscnumber");
const name = document.getElementById("name");
const phone_number = document.getElementById("phonenumber");
const email = document.getElementById("email");
const password = document.getElementById("password");
const user_type = document.getElementById("usertype");

// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length < 2 || name.value.length > 20) {
    alert("Name length should be more than 2 and less than 21");
    name.focus();
    return false;
  }
  // checking email
  if (email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    alert("Please enter a valid email!");
    email.focus();
    return false;
  }
  // checking password
  if (!password.value.match(/^.{5,15}$/)) {
    alert("Password length must be between 5-15 characters!");
    password.focus();
    return false;
  }
 
  return true;
}
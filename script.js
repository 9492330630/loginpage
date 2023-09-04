// Get the form element
var form = document.getElementById("myForm");
  
// Add an event listener to the submit event
form.addEventListener("submit", function(event) {
  // Prevent the default form submission
  event.preventDefault();

  // Validate the form inputs
  var name = form.elements["name"].value;
  var email = form.elements["email"].value;
  var mobile = form.elements["mobile"].value;

  // Check if the name is empty
  var nameRegex = /^[a-zA-Z]+(?:[-'][a-zA-Z]+)*$/;
  if (name == "" || !nameRegex.test(name)) {
    alert("Please enter your name");s
    return false;
  }

  // Check if the email is valid
  if (email == "" || !email.includes("@")) {
    alert("Please enter a valid email address");
    return false;
  }

  // Check if the mobile number is valid
  if (mobile == "" || mobile.length != 10 || isNaN(mobile)) {
    alert("Please enter a valid mobile number");
    return false;
  }

  // If everything is valid, submit the form
  form.submit();
});

// call from ajax

$(function () {
$('form#Myform').on('submit', function (event) {
$.ajax({
type: 'post',
url: 'submit.php',
data: $('form').serialize(),
success: function (data) {
$("#data").html(data);
}
});
event.preventDefault();
});
});
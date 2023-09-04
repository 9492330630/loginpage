<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data from the POST request
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];

// Prepare a SQL statement to insert the data into the table
$sql = "INSERT INTO users (name, email, mobile) VALUES ($name,$email,$mobile)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("sss", $name, $email, $mobile);

// Execute the statement
if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();

// Send an email to the user
$to = $email;
$subject = "Thank you for submitting your details";
$message = "Hello $name,\n\nThank you for submitting your details on our website. We have received your information and will contact you soon.\n\nYour details are:\nName: $name\nEmail: $email\nMobile: $mobile\n\nRegards,\nBing Chat";
$headers = "From: dosapatisaikrishna24@gmail.com";

// Use the mail function to send the email
if (mail($to,$subject,$message,$headers)){
  echo "mail sent successfully";
}
else{
  echo "Error: Could not send mail";
}
?>

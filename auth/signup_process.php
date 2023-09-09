<?php
require_once '../shared/dblink.php'; // Include the database connection file


// Retrieve the form data
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];


// TODO: Perform any necessary validation


// Prepare and execute the SQL query
$query = "INSERT INTO users (username, firstname, lastname, email, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";

if ($conn->query($query) === TRUE) {
  // Sign-up successful, redirect to sign-in page
  header("Location: ../signin.php");
} else {
  // Error occurred, display an error message
  echo "Error: " . $query . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
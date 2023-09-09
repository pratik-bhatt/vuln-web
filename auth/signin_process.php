<?php
require_once '../shared/dblink.php'; // Include the database connection file

// Retrieve the form data
$email = $_POST['email'];
$password = $_POST['password'];

// TODO: Perform any necessary validation

// Prepare and execute the SQL query
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

// Check if the user exists
if ($result->num_rows == 1) {
    // User found, perform sign-in actions
    session_start();
    $_SESSION['email'] = $email;

    // Check if the email is 'banap@mailinator.com'
    if ($email === 'banap@mailinator.com') {
        $message = "Hello 6fc6a82b70dc9e10777adc2f33f2d591d4a9b96832b7fd1a32e885fb1ce55511"; // Set the hardcoded message for the specific email
    } else {
        $message = "Welcome"; // Set a default message for other emails
    }

    // Redirect to a secured page or home page
    $_SESSION['authenticated'] = true;
    header("Location: ../index.php?message=" . urlencode($message)); // Pass the message as a query parameter
} else {
    // User not found, display an error message
    echo "Invalid email or password";
}

// Close the database connection
$conn->close();
?>

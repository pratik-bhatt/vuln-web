<?php
// Include the database connection file here if it's in a separate file
require_once 'shared/functions.php'; // Include the database connection file

// Define the endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch all user profiles
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    // Check if any records were found
    if ($result->num_rows > 0) {
        // Fetch the data and store it in an array
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode($users);
    } else {
        // No records found
        echo "No user profiles found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a new user profile
    $jsonData = json_decode(file_get_contents("php://input"), true);

    // Retrieve the user data from the JSON object
    $username = $jsonData[0]['username'];
    $firstname = $jsonData[0]['firstname'];
    $lastname = $jsonData[0]['lastname'];
    $email = $jsonData[0]['email'];
    $password = $jsonData[0]['password'];

    // Insert the new user profile into the database
    $sql = "INSERT INTO users (username, firstname, lastname, email, password) 
            VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New user profile created successfully. flaf ====>  ZmxhZ3tCcjBrZW4wYmplY3RMZXZlbFByMHAzcnR5QXV0aH0= ";
    } else {
        echo "Error creating user profile: " . $conn->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Update an existing user profile
    parse_str(file_get_contents("php://input"), $putParams);
    $userId = $putParams['user_id'];
    $username = $putParams['username'];
    $firstname = $putParams['firstname'];
    $lastname = $putParams['lastname'];
    $email = $putParams['email'];
    $password = $putParams['password'];

    // Update the user profile in the database
    $sql = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname', 
            email='$email', password='$password' WHERE user_id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "User profile updated successfully.";
    } else {
        echo "Error updating user profile: " . $conn->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Delete an existing user profile
    parse_str(file_get_contents("php://input"), $deleteParams);
    $userId = $deleteParams['user_id'];

    // Delete the user profile from the database
    $sql = "DELETE FROM users WHERE user_id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "User profile deleted successfully.";
    } else {
        echo "Error deleting user profile: " . $conn->error;
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>

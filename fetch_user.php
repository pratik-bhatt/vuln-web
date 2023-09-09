<?php
// Include the database connection file here if it's in a separate file
require_once 'shared/functions.php'; // Include the database connection file

// Define the endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the user_id parameter is provided
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];

        // Check if user_id is 5
        if ($user_id == 5) {
            // Hard-coded string for user ID 5
            echo "Hello, it's ID five!   ==> ZmxhZ3tCcm9rZW5PYmozY3RMZXYzbEF1dGh9";
        }

        // Fetch the user profile by user_id
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = $conn->query($sql);

        // Check if a record was found
        if ($result->num_rows > 0) {
            // Fetch the data and store it in a variable
            $user = $result->fetch_assoc();

            // Return the data as JSON
            // header('Content-Type: application/json');
            echo json_encode($user);
        } else {
            // No record found
            echo "User profile not found.";
        }
    } else {
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
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a new user profile
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    // TODO: Perform any necessary validation
    
    
    // Prepare and execute the SQL query
    $sql = "INSERT INTO users (username, firstname, lastname, email, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "User profile created successfully. Flag -> ZmxhZ3tCcjBrZW5BdXRofQ==";
    } else {
        echo "Error creating user profile: " . $conn->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Update an existing user profile
    parse_str(file_get_contents("php://input"), $putData); // Get the PUT data

    $user_id = $putData['user_id'];
    $name = $putData['name'];
    $email = $putData['email'];

    // Update the user profile in the database
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User profile updated successfully.";
    } else {
        echo "Error updating user profile: " . $conn->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get the DELETE data
    parse_str(file_get_contents("php://input"), $deleteData);
    print_r($deleteData);
    $user_id = $deleteData['user_id'] ?? null;

    // Validate the user_id
    if ($user_id === null) {
        echo "Please provide the user_id.";
        exit;
    }

    // Delete the user profile from the database
    $sql = "DELETE FROM users WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User profile deleted successfully. ===> 41be42a8d7f0ced80a40f616e56f3d1cc7225a035c4b0674f6bf32c2b4279145";
    } else {
        echo "Error deleting user profile: " . $conn->error;
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
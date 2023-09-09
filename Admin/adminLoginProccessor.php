<?php
// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (you can replace this with your own validation logic)
    if (($username === 'admin' && $password === 'password') ||
        ($username === 'superadmin' && $password === 'superAdmin')) {
        // Start the session and store the logged-in status
        session_start();
        $_SESSION['loggedin'] = true;

        // Check if the user is a super admin
        if ($username === 'superadmin') {
            // Echo a custom message for super admin
            echo 'Hello, Super Admin! flad is => ZmxhZ3sxbXByb3BlckFzc2V0TWFuNGdlbWU5dH0=';
        } else {
            // Redirect the user to the admin page
            header('Location: admin.php');
            exit;
        }
    } else {
        // Invalid credentials
        echo 'Invalid username or password.';
    }
}
?>

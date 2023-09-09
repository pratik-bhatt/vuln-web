<?php

// Check if the user is not logged in
if (!isset($_SESSION['authenticated'])) {
    // Redirect to the login page
    header("Location: signin.php");
    exit(); // Terminate the current script
}
?>



<div class="card">
    <div class="card-body">
        <p>Web applicsations have several users and users have diffrent profiles either in an endpoint or as
            an api.Users also have lots of privilleges within a web application</p>
    </div>
</div>
<form id="flagForm" method="POST">
    <label for="flag">Enter Flag:</label>
    <input type="text" id="flag" name="flag" required>
    <button type="submit">Check Flag</button>
    <!-- http://vuln-web.localhost/improperAssetsMngmt.php -->
</form>

<div id="message"></div>

<?php

// API endpoint URL
$apiUrl = 'http://vuln-web.localhost/improperAssetsMngmt.php';

// Make a GET request to the API
$response = file_get_contents($apiUrl);
// echo $response;

// Check if the API call was successful
if ($response !== false) {
    // Convert the JSON response to an associative array
    $data = json_decode($response, true);

    // Check if the JSON decoding was successful
    if ($data !== null) {
        // Display data in a table
        echo '<table>';
        echo '<thead><tr><th>ID</th><th>Roles</th><th>Username</th><th>Password</th></tr></thead>';
        echo '<tbody>';
        foreach ($data as $item) {
            echo '<tr>';
            echo '<td>' . $item['id'] . '</td>';
            echo '<td>' . $item['Roles'] . '</td>';
            echo '<td>' . $item['username'] . '</td>';
            echo '<td>*****</td>'; // Mask the password field
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'Error decoding API response.';
    }
} else {
    echo 'Error making API request.';
}
?>

<script>
// Get the form element and message container
const form = document.getElementById('flagForm');
const messageContainer = document.getElementById('message');

// Add event listener to form submission
form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent form submission

    // Retrieve the entered flag
    const enteredFlag = document.getElementById('flag').value;

    // Perform an AJAX request to the PHP script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_flags/unsafe_api_consumption.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Get the response from the PHP script
            const response = xhr.responseText;
            messageContainer.textContent = response;
        } else {
            messageContainer.textContent = 'Error: ' + xhr.statusText;
        }
    };
    xhr.send('flag=' + encodeURIComponent(enteredFlag));
    console.log("fetching user profiles  => http://vuln-web.localhost/profiles.php");
});
</script>
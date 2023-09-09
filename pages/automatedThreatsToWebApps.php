<div class="card">
    <div class="card-body">
        <h1>Automated threats to web Applications</h1>
        <p>Web applications are vulnerable to various automated threats that can exploit vulnerabilities or cause harm.
            These automated threats can target different aspects of a web application's functionality and security eg
            Web Scraping, Credential Stuffing and bruteforce
            <br>
            Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                Execution of files should only be done in the backend!!!
            </span>
        </p>
    </div>
</div>

<form id="flagForm" method="POST">
    <label for="flag">Enter Flag:</label>
    <input type="text" id="flag" name="flag" required>
    <button type="submit">Check Flag</button>
    <!-- http://vuln-web.localhost/fetch_user.php/?user_id=6 -->
</form>

<div id="message"></div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
    $file = $_FILES['uploaded_file'];

    // Get the file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Check if the file extension is .py
    if ($extension === 'py') {
        echo "The flag is ZmxhZ3tBdXRvVGhyZWF0c1RvV2ViQXBwbGljYXRpb259 ";
    } else {
        // Process the uploaded file
        // ...
        // Here, you can move the file to a desired location, perform validation, etc.
        // For demonstration purposes, we'll simply move the file to a directory called "uploads"

        $uploadDirectory = 'uploads/';
        $uploadedFilePath = $uploadDirectory . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadedFilePath)) {
            echo "File uploaded successfully.";
        } else {
            echo "Failed to upload the file.";
        }
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <label for="uploaded_file">Select Image:</label>
    <input type="file" name="uploaded_file">
    <input type="submit" value="Upload">
</form>

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
    xhr.open('POST', 'check_flags/check_authothreats_flag.php');
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
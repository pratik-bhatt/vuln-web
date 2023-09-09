<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if there are any uploaded files
    if (isset($_FILES['file'])) {
        // Define the directory where the uploaded files will be saved
        $targetDir = "uploads/";

        // Retrieve the details of the uploaded file
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        // Generate a unique name for the uploaded file
        $uniqueName = uniqid() . '_' . $fileName;

        // Define the target path for the uploaded file
        $targetPath = $targetDir . $uniqueName;

        // Check if the file was uploaded successfully without any errors
        if ($fileError === UPLOAD_ERR_OK) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $targetPath)) {
                // File upload successful
                echo "File uploaded successfully. File path: " . $targetPath;
            } else {
                // Failed to move the uploaded file
                echo "Error moving uploaded file.";
            }
        } else {
            // An error occurred during file upload
            echo "Error uploading file. Error code: " . $fileError;
        }
    } else {
        // No file was uploaded
        echo "No file uploaded.";
    }
}
?>

<div class="card">
    <div class="card-body">
        <h1>Security Misconfiguration</h1>
        <p>Security misconfiguration in web applications refers to the improper configuration of various components,
            settings, or permissions that can lead to security vulnerabilities. These misconfigurations can provide
            attackers with unauthorized access or expose sensitive information.
            <br>
            Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                sometimes inspecting a web page can give hints
            </span>
        </p>
    </div>
</div>

<!-- HTML form for file upload -->
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>









<form id="flagForm" method="POST">
    <label for="flag">Enter Flag:</label>
    <input type="text" id="flag" name="flag" required>
    <button type="submit">Check Flag</button>
    <!-- http://vuln-web.localhost/fetch_user.php/?user_id=6 -->
</form>

<div id="message"></div>

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
        xhr.open('POST', 'check_flags/check_security_misconfig_flag.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
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
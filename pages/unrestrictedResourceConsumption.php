<div class="card">
    <div class="card-body">
        <h1>Unrestricted resource consumption</h1>
        <p>Unrestricted resource consumption, also known as a Denial of Service (DoS) attack, is a cyber security threat
            that aims to disrupt the normal
            functioning of a system or network by overwhelming it with a flood of requests or by consuming excessive
            resources.
            <br>
            Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                Applications need to be restricted in terms of resource consumption and input!!
            </span>
        </p>
    </div>
</div>

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
            // Check if the file size is larger than 200MB or if the file type is ".exe"
            if ($fileSize > 200 * 1024 * 1024 || $fileType === 'application/x-msdownload') {
                // File size is larger than 200MB or file type is ".exe", display the message
                echo '<input type="hidden" name="flag" value="You got the flag!  ==>   ZmxhZ3tVbjRlc3RyaWN0M2RSZXNvdXJjZUMwbnN1bXB0aW9ufQ== ">';
            }

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


























<!-- HTML form for file upload -->
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>







<form id="flagForm" method="POST">
    <label for="flag">Enter Flag:</label>
    <input type="text" id="flag" name="flag" required>
    <button type="submit">Check Flag</button>
    <!-- http://localhost/vuln-web/fetch_user.php/?user_id=5 -->
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
        xhr.open('POST', 'check_flags/check_urc_flag.php');
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
        console.log("fetching user profiles  => http://localhost/vuln-web/profiles.php");
    });
</script>
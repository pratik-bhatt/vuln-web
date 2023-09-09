<!DOCTYPE html>
<html>

<head>
    <title>Hacking Terminal</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h1>Server side Request Forgery</h1>
            <p>Server-Side Request Forgery (SSRF) is a web application vulnerability that allows an attacker to make
                arbitrary requests from the vulnerable server to other internal or external resources. SSRF occurs when
                an application processes user-supplied input, such as URLs or IP addresses, and uses them to make HTTP
                requests to other servers

                <br>
                Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                   Inputs need to be sanitized !!!!
                </span>
                .
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

        // Check if the file extension is .php or .exe
        if ($extension === 'php' || $extension === 'exe') {
            echo "The flag is ===>>>>    ZmxhZ3tTM3J2ZXJTaWRlNGVxdWVzdEYwZzNyeX0=";
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
            xhr.open('POST', 'check_flags/check_ssrf_flag.php');
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
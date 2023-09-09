<?php
$targetDirectory = "uploads/"; // Specify the directory where you want to save the uploaded files
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Get the file name with its path

$uploadOk = 1; // Variable to store the upload status

// Check if the file is a valid file
if(isset($_POST["submit"])) {
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if($fileType === "php") { // Check for any specific file types you want to restrict
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, and TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file formats (optional)
    $allowedFormats = array("jpg", "jpeg", "png", "gif", "pdf", "txt");
    if (!in_array($fileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, and TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else { // If everything is fine, try to upload the file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

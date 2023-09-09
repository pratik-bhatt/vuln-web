<?php
// Retrieve the entered flag from the form submission
$enteredFlag = $_POST['flag'];

include '../shared/dblink.php';

// Encode the entered flag to match the encoding in the database
$encodedFlag = base64_encode($enteredFlag);

// Prepare and execute the SQL query
$sql = "SELECT flag FROM flags WHERE vulnerability = 'bola'";
$result = mysqli_query($conn, $sql);

// Check for errors in the query execution
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if a vulnerability was found for the entered flag
$matchedFlag = false;
while ($row = mysqli_fetch_assoc($result)) {
    $storedFlag = $row['flag'];

    // Compare the encoded input with the stored flag
    if ($encodedFlag === $storedFlag) {
        $matchedFlag = true;
        echo "Success! The entered flag matches the vulnerability: bola";
        break;
    }
}

if (!$matchedFlag) {
    echo "Failure! The entered flag does not match the vulnerability: bola";
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Retrieve the entered flag from the form submission
$enteredFlag = $_POST['flag'];

include '../shared/dblink.php';

// Hash the entered flag using a hashing algorithm (e.g., SHA-256)
$hashedFlag = base64_encode($enteredFlag);

// Prepare and execute the SQL query
$sql = "SELECT flag FROM flags WHERE vulnerability = 'bfla'";
$result = mysqli_query($conn, $sql);

// Check for errors in the query execution
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if a vulnerability was found for the entered flag
$matchedFlag = false;
while ($row = mysqli_fetch_assoc($result)) {
    $storedFlag = $row['flag'];

    // Compare the hashed input with the stored hashed flag
    if (hash_equals($hashedFlag, $storedFlag)) {
        $matchedFlag = true;
        echo "Success! The entered flag matches the vulnerability: bfla";
        break;
    }
}

if (!$matchedFlag) {
    echo "Failure! The entered flag does not match the vulnerability: bfla";
}

// Close the database connection
mysqli_close($conn);
?>

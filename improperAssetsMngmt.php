<?php
// Include the database connection file
// require_once './shared/dblink.php';

// API endpoint
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Prepare and execute the query to retrieve application information
    // $query = "SELECT * FROM appInfo";
    // $result = $conn->query($query);

    // if ($result) {
    //     $data = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $data[] = $row;
    //     }

        // Return the result as JSON response
        // header('Content-Type: application/json');
        // echo json_encode($data);
    // } else {
        // Handle database query error
//         header('HTTP/1.1 500 Internal Server Error');
//         echo json_encode(['error' => 'An error occurred while retrieving the application information.']);
//     }
// }
?>


<?php
// Include the database connection file
require_once './shared/dblink.php';

// API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Prepare and execute the query to retrieve application information
    $query = "SELECT * FROM appInfo";
    $result = $conn->query($query);

    if ($result) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Return the result as JSON response
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // Handle database query error
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'An error occurred while retrieving the application information.']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the POST request to insert data into the database
    $postData = json_decode(file_get_contents('php://input'), true);

    // Extract the data from the POST request
    $field1 = $postData['Roles'];
    $field2 = $postData['username'];
    $field3 = $postData['password'];
    // Add more fields as needed

    // Prepare and execute the query to insert data
    $query = "INSERT INTO appInfo (Roles, username, password) VALUES ('$field1', '$field2', '$field3')";
    $result = $conn->query($query);

    if ($result) {
        // Data insertion successful
        header('Content-Type: application/json');
        echo json_encode(['success' => 'Data inserted successfully. and the flag for unsafe api consumption is ==> ZmxhZ3tVbnNhZmVBcGlDb25zdW1wdGlvbn0=']);
    } else {
        // Handle database query error
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'An error occurred while inserting the data.']);
    }
} else {
    // Handle unsupported request method
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Unsupported request method.']);
}
?>

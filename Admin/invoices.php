<?php
// Include the database connection file
require_once '../shared/dblink.php';

// Delete an invoice if the invoice ID is provided in the request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $invoiceId = $_GET['id'];
    // Perform the delete operation based on the invoice ID
    // Implement the delete logic here
    // Example:
    //  $sql = "DELETE FROM invoices WHERE id = $invoiceId";
    // $conn->query($sql);
    
    $sql = "DELETE FROM invoices WHERE id = $invoiceId";
    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Flag is: ZmxhZ3tCNG9rZW5GdW5jdGlvbkwzdmVsQXV0aDByaXphdGkwbn0=";
    } else {
        // Deletion failed
        echo "Error deleting invoice: " . $conn->error;
    }
}

// Retrieve invoices from the database
$sql = "SELECT * FROM invoices";
$result = $conn->query($sql);
$invoices = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Invoices</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice) : ?>
                    <tr>
                        <td><?php echo $invoice['id']; ?></td>
                        <td><?php echo $invoice['date']; ?></td>
                        <td><?php echo $invoice['amount']; ?></td>
                        <td>
                            <a href="?action=delete&id=<?php echo $invoice['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

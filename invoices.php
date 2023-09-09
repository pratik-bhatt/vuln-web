<?php
require_once 'shared/functions.php'; // Include the database connection file

    // Retrieve invoices from the database
    $sql = "SELECT *
            FROM invoices";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Invoices</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Amount</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?php echo $invoice['id']; ?></td>
                <td><?php echo $invoice['customer']; ?></td>
                <td><?php echo $invoice['date']; ?></td>
                <td><?php echo $invoice['amount']; ?></td>
                <!-- Output other invoice data as needed -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

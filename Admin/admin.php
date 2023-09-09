<?php
// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to the login page
    header('Location: adminLogin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3 bg-dark text-white">
                <h2 class="p-4">Admin Panel</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="invoices.php">Invoices</a>
                    </li>
                </ul>
            </div>
            <!-- /Sidebar -->

            <!-- Content -->
            <div class="col-9">
                <div class="container mt-4">
                    <h2>Dashboard</h2>
                    <p>welcome to admin => ZmxhZ3tCcjBrZW5BdXRofQ== </p>
                    <div class="row mt-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <p class="card-text">500</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Card 1 -->

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <p class="card-text">250</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Card 2 -->
                        <!-- <p>https://www.base64decode.org/</p> -->
                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue</h5>
                                    <p class="card-text">$10,000</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Card 3 -->
                    </div>

                    <div class="row mt-4">
                        <!-- Graph -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sales Chart</h5>
                                    <!-- Add your graph code or embed a graph here -->
                                    <img src="sales_chart.png" alt="Sales Chart" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <!-- /Graph -->

                        <!-- Statistics -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Statistics</h5>
                                    <ul>
                                        <li>Number of Users: 500</li>
                                        <li>Number of Orders: 250</li>
                                        <li>Total Revenue: $10,000</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Statistics -->
                    </div>
                </div>
            </div>
            <!-- /Content -->
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
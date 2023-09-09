<?php
include 'shared/header.php';
session_start();


?>

</head>

<body>
    <style>
    body {
        background-image: url('https://cdn.pixabay.com/photo/2018/04/22/22/57/hacker-3342696_1280.jpg');
        background-size: cover;
        background-position: center;
        color: #fff;

        background-color: #000;
        color: #0f0;
        font-family: monospace;
    }
    </style>

    <div class="container">


        <div class="sidebar">
            <ul>
                <li><a href="index.php?menu=home">Home</a></li>
                <li><a href="index.php?menu=about">About</a></li>
                <li><a href="index.php?menu=setup">Setup/getting started</a></li>
                <hr>
                <li>Vulnerabilities</li>
                <hr>
                <li><a href="index.php?menu=autoThreats">Automated Threats to Web Applications</a></li>
                <li><a href="index.php?menu=bfla">BFLA</a></li>
                <li><a href="index.php?menu=bola">BOLA</a></li>
                <li><a href="index.php?menu=bopa">BOPA</a></li>
                <li><a href="index.php?menu=brokenAuth">Broken Authentication</a></li>
                <li><a href="index.php?menu=improperAssetmngnt">Improper Asset Management</a></li>
                <li><a href="index.php?menu=secMisconfig">Security Misconfiguration</a></li>
                <li><a href="index.php?menu=ssr">SSRF</a></li>
                <li><a href="index.php?menu=urc">Unrestricted Resource Consumption</a></li>
                <li><a href="index.php?menu=unsafeConsumptionOfApis">Unsafe Consumption of APIs</a></li>

                <li><a href="index.php?menu=signout.php">Logout</a></li>


            </ul>
        </div>
        <div class="content">
            <div class="header">
                <div class="justify-content-center align-items-center">
                    <h1 class="text-center">This is a vulnerable website</h1>
                </div>
            </div>


            <?php include 'shared/resolve.php'; ?>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>
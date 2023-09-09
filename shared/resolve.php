<?php
            $menu = isset($_GET['menu']) ? $_GET['menu'] : 'home';
            // Include content based on the selected menu
            switch ($menu) {
                case 'home':
                    include 'pages/home.php';
                    break;
                case 'about':
                    include 'pages/about.php';
                    break;
                case 'setup':
                    include 'pages/setup.php';
                    break;
                case 'bola':
                    include 'pages/bola.php';
                    break;
                case 'brokenAuth':
                    include 'pages/brokenAuth.php';
                    break;
                case 'bopa':
                    include 'pages/bopa.php';
                    break;
                case 'urc':
                    include 'pages/unrestrictedResourceConsumption.php';
                    break;
                case 'bfla':
                    include 'pages/bfla.php';
                    break;
                case 'ssr':
                    include 'pages/ssr.php';
                    break;
                case 'secMisconfig':
                    include 'pages/securityMisconfiguration.php';
                    break;
                case 'autoThreats':
                    include 'pages/automatedThreatsToWebApps.php';
                    break;
                case 'improperAssetmngnt':
                    include 'pages/improperAssetManagement.php';
                    break;
                case 'unsafeConsumptionOfApis':
                    include 'pages/unsafeConsumptionOfApis.php';
                    break;
                case 'signout.php':
                    include 'signout.php';
                    break;
                case 'signin.php':
                    include 'signin.php';
                    break;
                case 'admin':
                    // http://vuln-web.localhost/Admin/admin.php
                    include 'Admin/admin.php';
                    break;
                default:
                    include 'pages/home.php';
                    break;
            }
            ?>
<?php
include 'shared/header.php';
?>


<style>
        .custom-bg {
            background-image: url('https://img.freepik.com/free-photo/online-hacking-background-3d-illustration_1419-2807.jpg?w=1380&t=st=1686418304~exp=1686418904~hmac=97419d322f926dac73b0e835662165a52da5112b7dfedafab9b9ef2a3c73c490');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .custom-card {
            width: 400px;
            margin: auto;
        }
    </style>




<div class="d-flex justify-content-center align-items-center vh-100 custom-bg">
        <form class="p-4 border rounded bg-light custom-card" action="auth/signup_process.php" method="POST">
            <h3 class="mb-4 text-dark">Sign Up</h3>
            <div class="form-group">
                <label for="username" class="text-dark">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
            </div>
            <div class="form-group">
                <label for="firstname" class="text-dark">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label for="lastname" class="text-dark">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <label for="email" class="text-dark">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <!-- Add any additional fields here -->
            <div class="form-group">
                <label for="password" class="text-dark">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <div class="mt-3">
                <span class="text-dark">Already have an account?</span> <a href="signin.php">Sign in</a>
            </div>
        </form>
    </div>



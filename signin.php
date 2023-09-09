<?php
include 'shared/header.php';
?>
<style>
        .custom-bg {
            background-image: url('https://img.freepik.com/free-photo/hacked-unprotected-system-dark-background-3d-illustration_1419-2813.jpg?w=1380&t=st=1686416945~exp=1686417545~hmac=50b655263e93e40d99e435dc367ae904a2d39a9c9ebd344f8bfeadf7679f686f');
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
        <form class="p-4 border rounded bg-light custom-card" action="auth/signin_process.php" method="POST">
            <h3 class="mb-4 text-dark">Sign In</h3>
            <div class="form-group">
                <label for="email" class="text-dark">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password" class="text-dark">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <div class="mt-3">
                <span class="text-dark">Don't have an account?</span> <a href="signup.php">Sign up</a>
            </div>
        </form>
    </div>

<!-- <?php
// include 'shared/footer.php';
?> -->



<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $cpass = $_POST["confirm_password"];
    $query = "SELECT * FROM users WHERE username = '$user'";
    $res = mysqli_query($link, $query);
    if (mysqli_num_rows($res)) {
        echo '<h2 style="text-align:center;margin-top:10vw;font-family:arial">Username already exists!! <br><br> <a href="login.php">Login</a></h2>
        <p style="text-align:center;font-family:arial">No I want to <a href="register.php">SignUp</a></p>';
        die();
    }

    if ($cpass != $pass && !empty($pass)) {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Password not match! Try again</h2>';
    } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "insert into users (username,password) values ('$user','$pass')";

        $res = mysqli_query($link, $sql);
        if ($res) {
            echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Registered Successfully</h2>';
            header("Location: login.php");
        } else {
            die("Cannnot register Some error occurred ,Please try after sometime");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div class="container col-md-6">
        <h1 class="text-center my-3">Register</h1>
        <p>Fill this form to create an account.</p>
        <form action="./register.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" minlength="8" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm password" name="confirm password" required>
            </div>
            <div class="form-group my-4">
                <div class="form-group ">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
            </div>
            <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
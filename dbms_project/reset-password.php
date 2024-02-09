<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpass = $_POST["new_password"];
    $cpass = $_POST["confirm_password"];
    if ($cpass != $newpass && !empty($newpass)) {
        echo '<h3 style="text-align:center;margin-top:5vw;font-family:arial">Password not match Try again</h3>';
    } else {
        $pass = password_hash($newpass, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$pass' WHERE username = '" . $_SESSION['user'] . "'";
        $res = mysqli_query($link, $sql);
        $num = mysqli_affected_rows($link);
        if ($num > 0) {
            echo ' password updated succesfully, Please login again';
            include 'logout.php';
        } else {
            die('failed to update password , Some error occoured');
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <div class="container col-md-6">
        <h1 class="text-center my-3">Reset Password</h1>
        <p>Please fill out this form to reset your password.</p>
        <form action="reset-password.php" method="post">
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" minlength="8" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group my-4">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="index.php">Cancel</a>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
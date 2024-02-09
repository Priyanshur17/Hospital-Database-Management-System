<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $_SESSION['user'] = $user;
    $query = "SELECT * FROM users WHERE username = '$user'";
    $res = mysqli_query($link, $query);

    if (!$res) {
        die("Query failed: " . mysqli_error($link));
    }

    if (!mysqli_num_rows($res)) {
        echo '<h2 style="text-align:center;margin-top:10vw;font-family:arial">No account found for the given username, Please <br><br> <a href="register.php"> SignUp </a> </h2>';
        die();
    }

    $user_data_row = mysqli_fetch_assoc($res);

    if (password_verify($pass, $user_data_row['password'])) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user;
        header("location: index.php?username={$user}");
        exit();
    } else {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Password is incorrect. Try again</h2>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <div class="container col-md-6">
        <h1 class="text-center my-3">Login</h1>
        <p>Please fill in your credentials to login.</p>

        <form action="./login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" minlength="8" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <p class="text-center">Don't have an account? <a href="register.php">SignUp Here</a>.</p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
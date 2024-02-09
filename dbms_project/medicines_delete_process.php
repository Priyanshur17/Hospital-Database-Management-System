<?php
include_once 'config.php';

$sql = "DELETE FROM medicines WHERE Med_ID='" . $_GET["Med_ID"] . "'";
$sql1 = "DELETE FROM medicines_updates WHERE Med_ID='" . $_GET["Med_ID"] . "'";
mysqli_query($link, $sql1);
if (mysqli_query($link, $sql)) {
    echo '
    <div class="container my-5">
        <h2 class="text-center">Record deleted successfully</h2>    
        <a class="btn btn-link d-block text-center mt-3" href="medicines_update.php">Go back and delete or update more medicines records</a>
    </div>';
} else {
    echo '<div class="container my-5">
        <h2 class="text-center">Error deleting record</h2>
        <p class="text-center">Error: ' . mysqli_error($link) . '</p>
    </div>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Page Title</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
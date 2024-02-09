<?php
include_once 'config.php';

$sql = "DELETE FROM Patient_personal_info WHERE Pat_ID='" . $_GET["Pat_ID"] . "'";

if (mysqli_query($link, $sql)) {
    echo '
    <div class="container my-5">
        <h2 class="text-center">Patient record deleted successfully</h2>
        <p class="text-center">Corresponding Records from Appointment and  In_Patients also deleted </p>
        <a class="btn btn-link d-block text-center mt-3" href="Delete_patient.php">Go back and delete more patient records</a>
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
    <?php
    $sql = "SELECT * FROM Appointment";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '
            <div class="container my-5">
                <h2>Patient Log Data</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>App_ID</th>
                            <th>Pat_ID</th>
                            <th>Doc_ID</th>
                            <th>App_Date_Time</th>
                            <th>App_Description</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = mysqli_fetch_array($result)) {
                echo '
                <tr>
                    <td>' . $row['App_ID'] . '</td>
                    <td>' . $row['Pat_ID'] . '</td>
                    <td>' . $row['Doc_ID'] . '</td>
                    <td>' . $row['App_Date_Time'] . '</td>
                    <td>' . $row['App_Description'] . '</td>
                </tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo '<h2 class="text-center my-5">No appointments were found</h2>';
        }
    } else {
        echo '<h2 class="text-center my-5">ERROR: Could not execute the query. ' . mysqli_error($link) . '</h2>';
    }
    mysqli_close($link);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
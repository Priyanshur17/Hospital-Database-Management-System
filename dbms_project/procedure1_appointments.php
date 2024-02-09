<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container my-5">

        <?php
        include "config.php";

        $sql = "SELECT DISTINCT Patient_personal_info.Pat_ID, Appointment.App_ID, Doctor_info.Doc_ID, Doctor_info.Doc_DeptID, Appointment.App_Date_Time FROM Patient_personal_info NATURAL JOIN Appointment NATURAL JOIN Doctor_info";
        if ($result = mysqli_query($link, $sql)) {
            if ($result->num_rows > 0) {
                echo '<div class="container my-5">';
                echo '<h2>Patient Appointments Data</h2>';
                echo '<table class="table table-bordered table-striped">';
                echo '<thead class="thead-dark">';
                echo '<tr>';
                echo '<th>Pat_ID</th>';
                echo '<th>App_ID</th>';
                echo '<th>Doc_ID</th>';
                echo '<th>Doc_DeptID</th>';
                echo '<th>App_Date_Time</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_array()) {
                    echo '<tr>';
                    echo '<td>' . $row['Pat_ID'] . '</td>';
                    echo '<td>' . $row['App_ID'] . '</td>';
                    echo '<td>' . $row['Doc_ID'] . '</td>';
                    echo '<td>' . $row['Doc_DeptID'] . '</td>';
                    echo '<td>' . $row['App_Date_Time'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="container my-5">';
                echo '<h2>No records matching your query were found.</h2>';
                echo '</div>';
            }
        } else {
            echo '<div class="container my-5">';
            echo 'ERROR: Could not execute the query. ' . $mysqli->error;
            echo '</div>';
        }
        ?>

        <div class="container my-2">
            <a class="btn btn-link ml-2" href="index.php">Cancel</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
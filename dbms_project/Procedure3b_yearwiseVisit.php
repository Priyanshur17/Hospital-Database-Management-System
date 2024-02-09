<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "HospitalP");
    if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    $Visit_year = $_POST['Visit_year'];
    $sql = "SELECT visit.Visit_ID, appointment.Pat_ID, patient_personal_info.Pat_fname, patient_personal_info.Pat_DOB FROM visit NATURAL JOIN appointment NATURAL JOIN patient_personal_info WHERE YEAR(appointment.app_date_time) = '$Visit_year'";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            echo "<div class='container mt-3'>";
            echo "<h2>Visit Information</h2>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<tr>";
            echo "<th>Visit_ID</th>";
            echo "<th>Pat_ID</th>";
            echo "<th>Pat_fname</th>";
            echo "<th>Pat_DOB</th>";
            echo "</tr>";

            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row['Visit_ID'] . "</td>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Pat_fname'] . "</td>";
                echo "<td>" . $row['Pat_DOB'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
            $result->free();
        } else {
            echo "<div class='container mt-3'>";
            echo "<h2>No patient visits were found for given year</h2>";
            echo "</div>";
        }
    } else {
        echo "<div class='container mt-3'>";
        echo "<p class='lead'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
        echo "</div>";
    }
    $mysqli->close();
    ?>
    <div class='container mt-3'>
        <a class='btn btn-link ml-2' href='Insert_Procedure3b.php'><strong>Go back and explore more</strong></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
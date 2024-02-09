<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>    
    <?php
    $mysqli = new mysqli("localhost", "root", "", "HospitalP");

    if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    $App_year = $_POST['App_year'];
    $sql = "SELECT * from appointment where year(appointment.app_date_time)= '$App_year' ";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            echo "<div class='container mt-3 my-5'>";
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr>";

            echo "<th>App_ID</th>";
            echo "<th>Pat_ID</th>";
            echo "<th>Doc_ID</th>";
            echo "<th>App_Date_Time</th>";
            echo "<th>App_Description</th>";
            echo "</tr>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row['App_ID'] . "</td>";
                echo "<td>" . $row['Pat_ID'] . "</td>";
                echo "<td>" . $row['Doc_ID'] . "</td>";
                echo "<td>" . $row['App_Date_Time'] . "</td>";
                echo "<td>" . $row['App_Description'] . "</td>";
            }
            echo "</table>";
            echo "</div>";
            // Free result set
            $result->free();
        } else {
            echo "<div class='container mt-3'>";
            echo "<h2>No Appointments for given year were found.</h2>";
            echo "</div>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    // Close connection
    $mysqli->close();
    ?>
    <br>
    <div class='container mt-3'>
    <a class="btn btn-link ml-2" href="Insert_Procedure_yearwiseAPP.php">Go back and explore more App years</a>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
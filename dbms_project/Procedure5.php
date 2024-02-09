<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Display Patients on Weekends</h3>
        <div class="table-responsive">
            <?php
            include "config.php";
            $sql = "SELECT p.Pat_ID, p.Pat_fname, p.Pat_contactno, a.App_ID, a.App_Date_Time 
                    FROM appointment a 
                    JOIN patient_personal_info p ON a.Pat_ID = p.Pat_ID 
                    WHERE DAYOFWEEK(a.App_Date_Time) IN (1, 7)";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Pat_ID</th>";
                    echo "<th>Pat_fname</th>";
                    echo "<th>Pat_contactno</th>";
                    echo "<th>App_ID</th>";
                    echo "<th>App_Date_Time</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['Pat_ID'] . "</td>";
                        echo "<td>" . $row['Pat_fname'] . "</td>";
                        echo "<td>" . $row['Pat_contactno'] . "</td>";
                        echo "<td>" . $row['App_ID'] . "</td>";
                        echo "<td>" . $row['App_Date_Time'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No records matching your function1 were found.</p>";
                }
            } else {
                echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
            }
            ?>
        </div>
        <br><br>
        <a class="btn btn-link ml-2" href="index.php">Go back and explore more</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
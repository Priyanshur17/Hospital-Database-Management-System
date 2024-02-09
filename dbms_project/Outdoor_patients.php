<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container col-md-12 mt-5">
        <h3 class="mb-4">Outdoor Patients Information</h3>
        <div class="table-responsive">
            <?php
            include "config.php";
            $sql = "SELECT * from patient_personal_info where Pat_ID not in (SELECT Pat_ID from in_patients);";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Pat_ID</th>";
                    echo "<th>Pat_fname</th>";
                    echo "<th>Pat_mname</th>";
                    echo "<th>Pat_lname</th>";
                    echo "<th>Pat_gender</th>";
                    echo "<th>Pat_DOB</th>";
                    echo "<th>Pat_contactno</th>";
                    echo "<th>Pat_emailID</th>";
                    echo "<th>Pat_Address</th>";
                    echo "<th>Pat_MedHistory</th>";
                    echo "<th>Pat_BloodGroup</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['Pat_ID'] . "</td>";
                        echo "<td>" . $row['Pat_fname'] . "</td>";
                        echo "<td>" . $row['Pat_mname'] . "</td>";
                        echo "<td>" . $row['Pat_lname'] . "</td>";
                        echo "<td>" . $row['Pat_gender'] . "</td>";
                        echo "<td>" . $row['Pat_DOB'] . "</td>";
                        echo "<td>" . $row['Pat_contactno'] . "</td>";
                        echo "<td>" . $row['Pat_emailID'] . "</td>";
                        echo "<td>" . $row['Pat_Address'] . "</td>";
                        echo "<td>" . $row['Pat_MedHistory'] . "</td>";
                        echo "<td>" . $row['Pat_BloodGroup'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No outdoor patients were found.</p>";
                }
            } else {
                echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
            }
            ?>
        </div>
        <br>
        <a class="btn btn-link ml-2" href="index.php">Cancel</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2 class="text-center my-2 ">Generate Individual Patient's Bill for a Particular Doctor</h2>
    <br>
    <div style="margin-left:200px;" class="col-md-6 mt-4">
        <form method="post" action="Bill_Details.php">
            <div class="form-group">
                <label for="Pat_ID1">Pat_ID:</label>
                <input type="number" class="form-control" id="Pat_ID1" name="Pat_ID1" required>
            </div>
            <div class="form-group">
                <label for="Doc_ID1">Doc_ID:</label>
                <input type="text" class="form-control" id="Doc_ID1" name="Doc_ID1" required>
            </div>
            <div class="form-group">
                <label for="visit_charge1">Visit Charge:(in Rs)</label>
                <input type="number" class="form-control" id="visit_charge1" name="visit_charge1" required>
            </div>
            <div class="form-group">
                <label for="Doc_charge1">Doctor Charge:(in Rs)</label>
                <input type="number" class="form-control" id="Doc_charge1" name="Doc_charge1" required>
            </div>

            <div class="form-group">
                <label for="no_of_days1">Number of Days:</label>
                <input type="number" class="form-control" id="no_of_days1" name="no_of_days1" required>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a class="btn btn-link ml-2" href="index.php">Cancel</a>
        </form>
    </div>

    <div class="container mt-5">
        <h3>Generate Bill with the Help of the Below Data</h3>
        <div class="table-responsive">
            <?php
            include "config.php";

            // Displaying the first table
            $sql = "SELECT DISTINCT Pat_ID, Doc_ID, Doc_charge, Visit_ID FROM Appointment NATURAL JOIN Doctor_info NATURAL JOIN Visit";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Pat_ID</th>";
                    echo "<th>Doc_ID</th>";
                    echo "<th>Doc_charge</th>";
                    echo "<th>Visit_ID</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['Pat_ID'] . "</td>";
                        echo "<td>" . $row['Doc_ID'] . "</td>";
                        echo "<td>" . $row['Doc_charge'] . "</td>";
                        echo "<td>" . $row['Visit_ID'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No patient-doctor records were found.</p>";
                }
            } else {
                echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
            }

            // Displaying the second table
            $sql = "SELECT DISTINCT Visit_ID,  Visit_charge FROM visit ";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Visit_ID</th>";
                    echo "<th>Visit_charge</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['Visit_ID'] . "</td>";
                        echo "<td>" . $row['Visit_charge'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No visit records were found.</p>";
                }
            } else {
                echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
            }

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
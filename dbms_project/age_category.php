<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="age_category_proc.php">
            <h3>Display Patients' Age and Age Category</h3>
            <div class="form-group">
                <label for="patage">Enter Patient ID:</label>
                <input type="text" class="form-control" id="patage" name="patage" required>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a class="btn btn-link ml-2" href="index.php">Cancel</a>
        </form>
        <br>
        <h3>Available Patient IDs</h3>
        <div class="table-responsive">
            <?php
            include "config.php";
            $sql = "SELECT distinct(Pat_ID) FROM Patient_personal_info ORDER BY Pat_ID ASC;";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Pat_ID</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['Pat_ID'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-muted'>No patients were found.</p>";
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
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="Bloodgroop_process.php">
            <div class="form-group">
                <label for="Pat_BloodGroup1">Enter Blood Group from below:</label>
                <input type="text" class="form-control" id="Pat_BloodGroup1" name="Pat_BloodGroup1">
            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a class="btn btn-link" href="index.php">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<br><br>
<div class="container mt-5">
    <h3 class="mb-4">Patient Blood Group Table</h3>
    <div class="table-responsive">
        <?php
        include "config.php";
        $sql = "SELECT DISTINCT(Pat_BloodGroup) FROM Patient_personal_info";
        if ($result = mysqli_query($link, $sql)) {
            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered table-hover'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th>Pat_BloodGroup</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Pat_BloodGroup'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='text-muted'>No bloodgroup found.</p>";
            }
        } else {
            echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
        }
        ?>
    </div>
</div>

</html>
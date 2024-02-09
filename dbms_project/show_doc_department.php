<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="doc_department_wise_proc.php">
            <div class="form-group">
                <label for="dept_id">Department ID</label>
                <input type="text" class="form-control" id="dept_id" name="dept_id" required>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a class="btn btn-link" href="index.php">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<br><br>
<div class="container mt-5">
    <h3 class="mb-4">Department Table</h3>
    <div class="table-responsive">
        <?php
        include "config.php";
        $sql = "SELECT `Dept_ID` , `Dept_name`FROM department";
        if ($result = mysqli_query($link, $sql)) {
            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered table-hover'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th>Department ID</th>";
                echo "<th>Department Name</th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Dept_ID'] . "</td>";
                    echo "<td>" . $row['Dept_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='text-muted'>No department found</p>";
            }
        } else {
            echo "<p class='text-danger'>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
        }
        ?>
    </div>
</div>

</html>
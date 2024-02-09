<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doc_id = $_POST['doc_id'];
    $dept_id = $_POST['dept_id'];

    $sql = "UPDATE `department` SET `hod`='$doc_id' where`Dept_ID`='$dept_id'";

    if (mysqli_query($link, $sql)) {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Record Modified successfully</h2>';
    } else {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Update failed: ' . mysqli_error($link) . '</h2>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">
        <h3 class="mb-4">Department Table</h3>
        <div class="table-responsive">
            <?php
            $sql = "SELECT `Dept_ID` , `Dept_name`,`hod`FROM department";
            if ($result = mysqli_query($link, $sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr>";
                    echo "<th>Department ID</th>";
                    echo "<th>Department Name</th>";
                    echo "<th>Department HOD</th>";
                    echo "<th>Action</th>";

                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Dept_ID'] . "</td>";
                        echo "<td>" . $row['Dept_name'] . "</td>";
                        echo "<td>" . $row['hod'] . "</td>";
                        echo '<td>
                            <a href="add_update_hod_proc.php?id=' . $row["Dept_ID"] . '" class="btn btn-primary btn-sm">Add/Update</a>
                        </td>';

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
        <br>
        <a class="btn btn-link ml-2" href="index.php">Go back</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>
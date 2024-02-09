<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <link rel="stylesheet" href="style.css">
    <div class="col-md-4 mx-5">
        <h2 class=" my-3">Insert Staff</h2>
        <form method="post" action="Staff_Insert.php">
            <div class="form-group">
                Staff ID:<br>
                <input class="form-control" type="text" name="Staff_ID" required>
            </div>
            <div class="form-group">
                First Name:<br>
                <input class="form-control" type="text" name="Staff_fname" required>
            </div>
            <div class="form-group">

                Middle Name<br>
                <input class="form-control" type="text" name="Staff_mname">
            </div>
            <div class="form-group">
                Last Name:<br>
                <input class="form-control" type="text" name="Staff_lname" required>
            </div>
            <div class="form-group">
                Gender (M or F) :<br>
                <input class="form-control" type="text" name="Staff_gender" required>
            </div>
            <div class="form-group">
                Contact number :<br>
                <input class="form-control" type="tel" minlength="10" maxlength="10" name="Staff_contactno"required>
            </div>
            <div class=" form-group">
                Staff Type :<br>
                <input class="form-control" type="text" name="Staff_type" required>
            </div>
            <div class="form-group">
                Staff Assigned Room 1:<br>
                <input class="form-control" type="text" name="Staff_roomassigned1" required>
            </div>
            <div class="form-group">
                Staff Assigned Room 2:<br>
                <input class="form-control" type="text" name="Staff_roomassigned2">
            </div>
            <div class="form-group">
                Staff duty start time:<br>
                <input class="form-control" type="time" name="Staff_dutystarttime" required>
            </div>
            <div class="form-group">
                Staff duty end time<br>
                <input class="form-control" type="time" name="Staff_dutyendtime" required>
            </div>
            <div class="form-group">
                Staff holiday:<br>
                <input class="form-control" type="text" name="Staff_holiday" required>
            </div>
            <div class="form-group">
                Staff Department ID:<br>
                <input class="form-control" type="text" name="Staff_DeptID" required>
            </div>
            <div class="form-group">

                Staff Charge(in Rs):<br>
                <input class="form-control" type="Number" name="Staff_Charge" required><br>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="submit">
                <a class="btn btn-link ml-2" href="index.php">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
include "config.php";
$sql = "SELECT * FROM Staff";

if ($result = mysqli_query($link, $sql)) {
    if ($result->num_rows > 0) {
        echo "<h3 class='my-4 '>Staff Table</h3>";

        echo "<div class='container mx-6 my-4'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Staff ID</th>";
        echo "<th>First name</th>";
        echo "<th>Middle name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Contact No</th>";
        echo "<th>  Type </th>";
        echo "<th>Assigned Room-1</th>";
        echo "<th>Assigned Room-1</th>";
        echo "<th>DutyStartTime</th>";
        echo "<th>DutyStartTime</th>";
        echo "<th>Holiday</th>";
        echo "<th>Dept ID</th>";
        echo "<th>Charge(in Rs)</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row['Staff_ID'] . "</td>";
            echo "<td>" . $row['Staff_fname'] . "</td>";
            echo "<td>" . $row['Staff_mname'] . "</td>";
            echo "<td>" . $row['Staff_lname'] . "</td>";
            echo "<td>" . $row['Staff_gender'] . "</td>";
            echo "<td>" . $row['Staff_contactno'] . "</td>";
            echo "<td>" . $row['Staff_type'] . "</td>";
            echo "<td>" . $row['Staff_roomassigned1'] . "</td>";
            echo "<td>" . $row['Staff_roomassigned2'] . "</td>";
            echo "<td>" . $row['Staff_dutystarttime'] . "</td>";
            echo "<td>" . $row['Staff_dutyendtime'] . "</td>";
            echo "<td>" . $row['Staff_holiday'] . "</td>";
            echo "<td>" . $row['Staff_DeptID'] . "</td>";
            echo "<td>" . $row['Staff_Charge'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        // Free result set
        $result->free();
    } else {
        echo "No staff members were found.";
    }
} else {
    echo "ERROR: Could not execute $sql. " . $mysqli->error;
}
?>
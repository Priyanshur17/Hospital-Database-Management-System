<!DOCTYPE html>
<html>

<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
        <div class="mx-5 col-md-6 mt-5">
                <form method="post" action="insert_doctor.php">
                        <h3>Doctor Information Form</h3>
                        <div class="form-group">
                                <label for="Doc_ID">Doctor ID:</label>
                                <input type="text" class="form-control" id="Doc_ID" name="Doc_ID" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_fname">Doctor First Name:</label>
                                <input type="text" class="form-control" id="Doc_fname" name="Doc_fname" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_mname">Doctor Middle Name:</label>
                                <input type="text" class="form-control" id="Doc_mname" name="Doc_mname" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_lname">Doctor Last Name:</label>
                                <input type="text" class="form-control" id="Doc_lname" name="Doc_lname" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_gender">Gender:</label>
                                <input type="text" class="form-control" id="Doc_gender" name="Doc_gender" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_DOB">Date of Birth:</label>
                                <input type="date" class="form-control" id="Doc_DOB" name="Doc_DOB" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_contactno">Doctor Contact Number:</label>
                                <input type="tel" maxlength="10" minlength="10"class="form-control" id="Doc_contactno" name="Doc_contactno" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_emailID">Doctor Email ID:</label>
                                <input type="email" class="form-control" id="Doc_emailID" name="Doc_emailID" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_Address">Address:</label>
                                <input type="text" class="form-control" id="Doc_Address" name="Doc_Address" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_Specialist">Doctor Specialist:</label>
                                <input type="text" class="form-control" id="Doc_Specialist" name="Doc_Specialist" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_DeptID">Doctor Department ID:</label>
                                <input type="text" class="form-control" id="Doc_DeptID" name="Doc_DeptID" required>
                        </div>
                        <div class="form-group">
                                <label for="Doc_charge">Doctor Charge:</label>
                                <input type="number" class="form-control" id="Doc_charge" name="Doc_charge" required>
                        </div>
                        <button type="submit" name="save" class="btn btn-primary">Submit</button>
                        <a class="btn btn-link ml-2" href="index.php">Cancel</a>
                </form>
        </div>

        <div class="container col-md-12 mt-5">
                <h3>Doctor's Table</h3>
                <div class="table-responsive">
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM Doctor_info";
                        if ($result = mysqli_query($link, $sql)) {
                                if ($result->num_rows > 0) {
                                        echo "<table class='table table-bordered table-hover'>";
                                        echo "<thead class='thead-dark'>";
                                        echo "<tr>";
                                        echo "<th>Doc_ID</th>";
                                        echo "<th>Doc_fname</th>";
                                        echo "<th>Doc_mname</th>";
                                        echo "<th>Doc_lname</th>";
                                        echo "<th>Doc_gender</th>";
                                        echo "<th>Doc_DOB</th>";
                                        echo "<th>Doc_contactno</th>";
                                        echo "<th>Doc_emailID</th>";
                                        echo "<th>Doc_Address</th>";
                                        echo "<th>Doc_Specialist</th>";
                                        echo "<th>Doc_DeptID</th>";
                                        echo "<th>Doc_charge</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while ($row = $result->fetch_array()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['Doc_ID'] . "</td>";
                                                echo "<td>" . $row['Doc_fname'] . "</td>";
                                                echo "<td>" . $row['Doc_mname'] . "</td>";
                                                echo "<td>" . $row['Doc_lname'] . "</td>";
                                                echo "<td>" . $row['Doc_gender'] . "</td>";
                                                echo "<td>" . $row['Doc_DOB'] . "</td>";
                                                echo "<td>" . $row['Doc_contactno'] . "</td>";
                                                echo "<td>" . $row['Doc_emailID'] . "</td>";
                                                echo "<td>" . $row['Doc_Address'] . "</td>";
                                                echo "<td>" . $row['Doc_Specialist'] . "</td>";
                                                echo "<td>" . $row['Doc_DeptID'] . "</td>";
                                                echo "<td>" . $row['Doc_charge'] . "</td>";
                                                echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                } else {
                                        echo "<p class='text-muted'>No doctors were found.</p>";
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
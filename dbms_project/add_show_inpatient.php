<!DOCTYPE html>
<html>

<head>
    <title> Show admitted patients data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="col-md-6 mx-5">
        <h2 class="text-center my-3">Add In Patient details</h2>
        <form method="post" action="insert_in_patient.php">

            <div class="form-group">
                <label for="Pat_ID">Patient ID</label>
                <input type="number" class="form-control" id="Pat_ID" name="Pat_ID" required>
            </div>
            <div class="form-group">
                <label for="treatment">In Treatments</label>
                <input type="text" class="form-control" id="treatment" name="treatment" required>
            </div>
            <div class="form-group">
                <label for="room_assigned">Assign Room</label>
                <input type="text" class="form-control" id="room_assigned" name="room_assigned" required>
            </div>
            <div class="form-group">
                <label for="ot_assigned">Assign OT </label>
                <input type="text" class="form-control" id="ot_assigned" name="ot_assigned" required>
            </div>
            <div class="form-group">
                <label for="operatime">Operation date and time</label>
                <input type="datetime-local" class="form-control" id="operatime" name="operatime" required>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
                <a class="btn btn-link ml-2" href="index.php">Cancel</a>
            </div>

        </form>
    </div>
    <div class="container my-5 mx-5">
        <?php
        include 'config.php';
        $result = mysqli_query($link, "SELECT * FROM in_patients");

        if (mysqli_num_rows($result) > 0) {
        ?>
            <h3 class="my-5">In Patients Table</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pat_ID</th>
                            <th>Admission datetime</th>
                            <th>in treatments</th>
                            <th>Room Assigned</th>
                            <th>OT Assigned</th>
                            <th>Operation datetime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["Pat_ID"]; ?></td>
                                <td><?php echo $row["Addmission_Date_Time"]; ?></td>
                                <td><?php echo $row["In_treatments"]; ?></td>
                                <td><?php echo $row["Room_assigned"]; ?></td>
                                <td><?php echo $row["OT_assigned"]; ?></td>
                                <td><?php echo $row["Operation_Date_Time"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        } else {
            echo "<h3>No in Patients found.</h3>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
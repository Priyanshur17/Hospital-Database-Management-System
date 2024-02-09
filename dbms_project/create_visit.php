<!DOCTYPE html>
<html>

<head>
    <title> Create Visit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="col-md-6 mx-5">
        <h2 class="text-center my-3">Add Patient Visit</h2>
        <form method="post" action="visit_proc.php">

            <div class="form-group">
                <label for="vis_id">Visit ID</label>
                <input type="text" class="form-control" id="vis_id" name="vis_id" required>
            </div>
            <div class="form-group">
                <label for="app_id">Appointment ID</label>
                <input type="text" class="form-control" id="app_id" name="app_id" required>
            </div>
           
            <div class="form-group">
                <label for="pat_wt">Patient Weight (in Kg)</label>
                <input type="number" class="form-control" id="pat_wt" name="pat_wt">
            </div>
            <div class="form-group">
                <label for="pat_ht">Patient Height (eg. 5ft6inch)</label>
                <input type="text" class="form-control" id="pat_ht" name="pat_ht">
            </div>
            <div class="form-group">
                <label for="disease">Disease Name</label>
                <input type="text" class="form-control" id="disease" name="disease">
            </div>
            <div class="form-group">
                <label for="vis_charge">Visit Charge (in Rs)</label>
                <input type="number" class="form-control" id="vis_charge" name="vis_charge" required>
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
                $result = mysqli_query($link, "SELECT * FROM visit");

                if (mysqli_num_rows($result) > 0) {
                ?>
                        <h3 class="my-5">Visits Table</h3>
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                                <tr>
                                                        <th>Visit ID</th>
                                                        <th>Appointment ID</th>
                                                        <th>Patient Weight</th>
                                                        <th>Patient Height</th>
                                                        <th>Disease Name</th>
                                                        <th>Visit Charge</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                                <td><?php echo $row["Visit_ID"]; ?></td>
                                                                <td><?php echo $row["App_ID"]; ?></td>
                                                                <td><?php echo $row["Pat_weight"]; ?></td>
                                                                <td><?php echo $row["Pat_height"]; ?></td>
                                                                <td><?php echo $row["Disease_name"]; ?></td>
                                                                <td><?php echo $row["Visit_charge"]; ?></td>
                                                        </tr>
                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                </table>
                        </div>
                <?php
                } else {
                        echo "<h3>No visit records found.</h3>";
                }
                ?>
        </div>
    <div class="container my-5 mx-5">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
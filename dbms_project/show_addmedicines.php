<!DOCTYPE html>
<html>

<head>
        <title> Show medicines available Data </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>

<body>
        <div class="col-md-6 mx-5">
                <h2 class="text-center my-3">Insert Medicine</h2>
                <form method="post" action="medicines_info.php">

                        <div class="form-group">
                                <label for="Med_ID">Medicine ID</label>
                                <input type="text" class="form-control" id="Med_ID" name="Med_ID" required>
                        </div>
                        <div class="form-group">
                                <label for="Med_Name">Medicine name</label>
                                <input type="text" class="form-control" id="Med_Name" name="Med_Name" required>
                        </div>
                        <div class="form-group">
                                <label for="Med_company">Medicine company</label>
                                <input type="text" class="form-control" id="Med_company" name="Med_company" required>
                        </div>
                        <div class="form-group">
                                <label for="Med_price">Medicine price (in Rs)</label>
                                <input type="number" class="form-control" id="Med_price" name="Med_price" required>
                        </div>
                        <div class="form-group">
                                <label for="Med_dose">Medicine dose (in Mg)</label>
                                <input type="number" class="form-control" id="Med_dose" name="Med_dose" required>
                        </div>
                        <div class="form-group">
                                <label for="Med_type">Medicine type</label>
                                <input type="text" class="form-control" id="Med_type" name="Med_type" required>
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
                $result = mysqli_query($link, "SELECT * FROM MEDICINES");

                if (mysqli_num_rows($result) > 0) {
                ?>
                        <h3 class="my-5">Medicines Table</h3>
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                                <tr>
                                                        <th>Med_ID</th>
                                                        <th>Med_Name</th>
                                                        <th>Med_company</th>
                                                        <th>Med_price</th>
                                                        <th>Med_dose</th>
                                                        <th>Med_type</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr>
                                                                <td><?php echo $row["Med_ID"]; ?></td>
                                                                <td><?php echo $row["Med_Name"]; ?></td>
                                                                <td><?php echo $row["Med_company"]; ?></td>
                                                                <td><?php echo $row["Med_price"]; ?></td>
                                                                <td><?php echo $row["Med_dose"]; ?></td>
                                                                <td><?php echo $row["Med_type"]; ?></td>
                                                        </tr>
                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                </table>
                        </div>
                <?php
                } else {
                        echo "<h3>No medicines found.</h3>";
                }
                ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
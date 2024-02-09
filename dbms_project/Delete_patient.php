<!DOCTYPE html>
<html>

<head>
        <title>Delete Patient data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>

<body>

        <div class="container my-5 mx-5">
                <h2>Patient Table</h2>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM Patient_personal_info";
                $result = mysqli_query($link, $sql);
                $num = mysqli_num_rows($result);
                if ($result) {
                        if ($num > 0) {
                ?>
                                <table class="table table-striped">
                                        <thead>
                                                <tr>
                                                        <th>Pat_ID</th>
                                                        <th>Pat_fname</th>
                                                        <th>Pat_mname</th>
                                                        <th>Pat_lname</th>
                                                        <th>Pat_gender</th>
                                                        <th>Pat_DOB</th>
                                                        <th>Pat_contactno</th>
                                                        <th>Pat_emailID</th>
                                                        <th>Pat_Address</th>
                                                        <th>Pat_MedHistory</th>
                                                        <th>Pat_BloodGroup</th>
                                                        <th>Actions</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr>
                                                                <td><?php echo $row['Pat_ID']; ?></td>
                                                                <td><?php echo $row['Pat_fname']; ?></td>
                                                                <td><?php echo $row['Pat_mname']; ?></td>
                                                                <td><?php echo $row['Pat_lname']; ?></td>
                                                                <td><?php echo $row['Pat_gender']; ?></td>
                                                                <td><?php echo $row['Pat_DOB']; ?></td>
                                                                <td><?php echo $row['Pat_contactno']; ?></td>
                                                                <td><?php echo $row['Pat_emailID']; ?></td>
                                                                <td><?php echo $row['Pat_Address']; ?></td>
                                                                <td><?php echo $row['Pat_MedHistory']; ?></td>
                                                                <td><?php echo $row['Pat_BloodGroup']; ?></td>
                                                                <td><a class="btn btn-danger" href="Patient_delete_process.php?Pat_ID=<?php echo $row["Pat_ID"]; ?>">Delete</a></td>
                                                        </tr>
                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                </table>
                <?php
                        } else {
                                echo "No patients were found.";
                        }
                } else {
                        die("Failed");
                }
                ?>

                <br>
                <a class="btn btn-primary btn-sm" href="index.php">Go Back</a>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>